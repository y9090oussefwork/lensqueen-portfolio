<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fund;
use App\Models\Review;
use App\Models\Product;
use App\Models\Language;
use App\Models\Configure;
use App\Http\Traits\Upload;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Http\Controllers\Controller;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Upload;

    public function productList()
    {
        $manageProducts = Product::with('details')->latest()->get();
        return view('admin.product.productList', compact('manageProducts'));
    }

    public function productCreate()
    {
        $languages = Language::all();
        return view('admin.product.productCreate', compact('languages'));
    }


    public function productStore(Request $request, $language)
    {
        $purifiedData = Purify::clean($request->except('image', 'product_file', '_token', '_method'));

        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }
        if ($request->has('product_file')) {
            $purifiedData['product_file'] = $request->product_file;
        }

        $rules = [
            'title.*' => 'required|max:40',
            'price' => 'required|numeric',
            'category.*' => 'required',
            'short_details.*' => 'required|max:500',
            'description.*' => 'required',
            'product_file' => 'required|mimes:zip,rar',
            'image.*' => 'required|mimes:jpg,jpeg,png',
        ];
        $message = [
            'title.*.required' => 'Title field is required',
            'title.*.max' => 'This field may not be greater than :max characters.',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price must be a numeric value',
            'category.*.required' => 'Category field is required',
            'short_details.*.required' => 'Short Details field is required',
            'short_details.*.max' => 'This field may not be greater than :max characters.',
            'description.*.required' => 'Description field is required',
            'product_file.required' => 'Product File field is required',
            'product_file.mimes' => 'This File must be a file of type: zip, rar',
            'image.*.required' => 'Image is required',
            'image.*.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
        ];

        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $product = new Product();
        $product->price = $purifiedData['price'];
        $product->status = isset($purifiedData['status']) ? 1 : 0;

        $site_title = Configure::select('site_title')->first();

        $images = [];

        if ($request->hasFile('image')) {
            try {
                $ProductImages = $purifiedData['image'];
                foreach($ProductImages as $file){
                    $images[] = $this->uploadImage($file, config('location.product.path'), null, null, null, null, $site_title->site_title);
                }
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
            $product->image = $images;
        }


        if ($request->hasFile('thumb')) {
            try {
                $productThumb = $request->thumb;
                $thumbs = $this->uploadImage($productThumb, config('location.product.path'), config('location.product.thumb'));

            } catch (\Exception $exp) {
                return back()->with('error', 'Thumb could not be uploaded.');
            }
            $product->thumb = $thumbs;
        }


        if ($request->hasFile('product_file')) {
            try {
                $file = $purifiedData['product_file'];
                $location = config('location.productFile.path');
                $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
                $file->move($location,$filename);
                $product->product_file = $filename;

            } catch (\Exception $exp) {
                return back()->with('error', 'Product File could not be uploaded.');
            }
        }

        $product->save();

        $product->details()->create([
            'language_id' => $language,
            'title' => $purifiedData["title"][$language],
            'short_details' => $purifiedData["short_details"][$language],
            'tag' => $purifiedData["tag"][$language],
            'category' => $purifiedData["category"][$language],
            'description' => $purifiedData["description"][$language],
        ]);

        return back()->with('success', 'Product Saved Successfully');
    }


    public function productDelete($id){
        $productData = Product::findOrFail($id);
        $old_images = $productData->image;
        $old_file = $productData->product_file;
        $oldThumb = $productData->thumb;
        $location = config('location.product.path');

        if (!empty($old_images)) {
            foreach($old_images as $file){
                @unlink($location . $file);
            }
        }

        if (!empty($oldThumb)) {
            @unlink($location .  $oldThumb);
        }

        if (!empty($old_file)) {
            $location = config('location.productFile.path');
            @unlink($location .  $old_file);
        }


        $productData->delete();

        return back()->with('success', 'Product has been deleted');
    }


    public function productEdit($id)
    {
        $languages = Language::all();
        $productDetails = ProductDetails::with('product')->where('product_id', $id)->get()->groupBy('language_id');
        $imageCount = Product::where('id', $id)->select('image','id')->first();
        return view('admin.product.productEdit',compact('languages','productDetails','id','imageCount'));
    }

    public function productImageDelete($id,$imgDelete)
    {
        $images = [];
        $productImage = Product::findOrFail($id);
        $old_images = $productImage->image;
        $location = config('location.product.path');

        if (!empty($old_images)) {
            foreach($old_images as $file){
                if ($file == $imgDelete) {
                    @unlink($location . $file);
                } elseif ($file != $imgDelete) {
                    $images[] = $file;
                }
            }
        }
        $productImage->image = $images;
        $productImage->save();

        return redirect(url()->previous() . '#productGallery')->with('success', 'Product image has been deleted');
    }


    public function productUpdate(Request $request, $id, $language_id)
    {
        $purifiedData = Purify::clean($request->except('image', 'product_file', '_token', '_method'));

        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }
        if ($request->has('product_file')) {
                $purifiedData['product_file'] = $request->product_file;
        }

        $rules = [
                'title.*' => 'required|max:40',
                'price' => 'sometimes|required|numeric',
                'category.*' => 'required',
                'short_details.*' => 'required|max:500',
                'description.*' => 'required',
                'product_file' => 'mimes:zip,rar',
                'image.*' => 'mimes:jpg,jpeg,png',
        ];
        $message = [
                'title.*.required' => 'Title field is required',
                'title.*.max' => 'This field may not be greater than :max characters.',
                'price.required' => 'Price field is required',
                'price.numeric' => 'Price must be a numeric value',
                'category.*.required' => 'Category field is required',
                'short_details.*.required' => 'Short Details field is required',
                'short_details.*.max' => 'This field may not be greater than :max characters.',
                'description.*.required' => 'Description field is required',
                'product_file.mimes' => 'This File must be a file of type: zip, rar',
                'image.*.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
        ];

        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        $product = Product::findOrFail($id);
        $site_title = Configure::select('site_title')->first();


        $images = $product->image;


        if ($request->hasFile('image')) {
            try {
                $ProductImages = $purifiedData['image'];
                foreach($ProductImages as $file){
                    $images[] = $this->uploadImage($file, config('location.product.path'), null, null, null, null, $site_title->site_title);
                }
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
            $product->image = $images;
        }

        $thumb = $product->thumb;
        if ($request->hasFile('thumb')) {
            try {
                $productThumb = $request->thumb;
                    $thumbs = $this->uploadImage($productThumb, config('location.product.path'), config('location.product.thumb'), $thumb);

            } catch (\Exception $exp) {
                return back()->with('error', 'Thumb could not be uploaded.');
            }
            $product->thumb = $thumbs;
        }


        if ($request->hasFile('product_file')) {
            try {
                $file = $purifiedData['product_file'];
                $location = config('location.productFile.path');
                $old_file = $product->product_file;
                if (file_exists($location . '/' . $old_file)) {
                    @unlink($location . '/' . $old_file);
                }
                $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
                $file->move($location,$filename);
                $product->product_file = $filename;

            } catch (\Exception $exp) {
                    return  redirect(url()->previous() . '#productGallery')->with('error', 'Product File could not be uploaded.');
            }
        }
        if($request->has('status')){
            $product->status = isset($purifiedData['status']) ? 1 : 0;
        }
        if($request->has('price')){
            $product->price = $purifiedData['price'];
        }
        $product->save();

        $product->details()->updateOrCreate([
                'language_id'  => $language_id
            ],
            [
                'title' => $purifiedData["title"][$language_id],
                'short_details' => $purifiedData["short_details"][$language_id],
                'tag' => $purifiedData["tag"][$language_id],
                'category' => $purifiedData["category"][$language_id],
                'description' => $purifiedData["description"][$language_id],
            ]
        );

        return redirect(url()->previous() . '#productGallery')->with('success', 'Product Successfully Updated');
    }


    public function purchasedProductList()
    {
        $userProducts = Fund::with('productDetails')->where('status', 1)->where('product_id',"!=", null)->orderBy('id', 'DESC')->get();
        return view('admin.purchased-product.purchasedProduct', compact('userProducts'));
    }


    public function productReview($id)
    {
        $manageReviews = Review::whereHas('user')->whereHas('product')
            ->with('user')->where('product_id', $id)->get();
        return view('admin.product.productReview', compact('manageReviews'));
    }

    public function reviewDelete($id)
    {
        $manageReview = Review::findOrFail($id);

        $manageReview->delete();

        return back()->with('success', 'Review has been deleted');
    }

    public function productDownload($id)
    {
        $data = Product::with('details')->findOrFail($id);
        if(isset($data->product_file)){
            $filePath = config('location.productFile.path').$data->product_file;
            $title = slug(config('basic.site_title').' '.uniqid(). ' '.$data->details->title);
            $mimetype = mime_content_type($filePath);
            $ext = pathinfo($data->product_file, PATHINFO_EXTENSION);
            header('Content-Disposition: attachment; filename="' . $title . '.' . $ext . '";');
            header("Content-Type: " . $mimetype);
            return readfile($filePath);
        }
        abort(404);

    }
}
