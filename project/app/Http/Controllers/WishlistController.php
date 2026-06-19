<?php

namespace App\Http\Controllers;

use App\Http\Traits\Notify;
use App\Models\Fund;
use App\Models\Review;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    use Notify;

    public function updateWishlist(Request $request, $product_id){
        if (Auth::check()) {
            if($request->ajax()){
                $data = $request->all();
                $countWishlist = Wishlist::where([
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $product_id
                                ])->count();
            }

            $wishlist = new Wishlist;
            if($countWishlist == 0){
                $wishlist->product_id = $data['product_id'];
                $wishlist->user_id = $data['user_id'];
                $wishlist->save();
                return response()->json(['action' => 'add', 'message'=>'Successfully Added to Wishlist']);
            }else{
                Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->delete();
                return response()->json(['action' => 'remove', 'message'=>'Successfully Removed from Wishlist']);
            }
        }else{
            return response()->json(['action' => 'signin', 'message' => 'At First Login to Your Account']);
        }
    }


    public function productRating(Request $request, $id){
        $request->validate([
            'feedback' => 'required|max:1000',
            'star' => 'required|integer|between:1,5',
        ]);

        $checkExistingReview= Review::where('user_id', Auth::id())->where('product_id', $id)->first();
        $isPurchasedProduct = Fund::where('user_id', Auth::id())->where('product_id', $id)->where('status', 1)->first();

        if (Auth::check()) {

            if ($checkExistingReview) {
                return redirect()->back()->with('error', 'You have already reviewed this product');

            } else {

                if ($isPurchasedProduct) {
                    $review = new Review();
                    $review->user_id = Auth::id();
                    $review->product_id = $id;
                    $review->star = $request->star;
                    $review->feedback = $request->feedback;

                    $review->save();

                    $msg = [
                        'username' => optional($review->user)->username,
                        'product_id' => optional($review->productDetails)->title
                    ];
                    $action = [
                        "link" => route('admin.productReview',$review->product_id),
                        "icon" => "fas fa-comment-dots text-white"
                    ];

                    $this->adminPushNotification('PRODUCT_REVIEW_ADDED', $msg, $action);

                    return redirect()->back()->with('success', 'Review Submitted Successfully');

                } else {
                    return redirect()->back()->with('error', 'You must first purchase the product before review');
                }

            }

        }else{
            return redirect()->route('login')->with('error', 'At First Login to Your Account');
        }

    }

}
