<?php

namespace App\Http\Controllers;

use App\Models\Configure;
use App\Models\Fund;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Content;
use App\Models\Product;
use App\Models\Language;
use App\Models\Template;
use App\Models\Wishlist;
use App\Models\ManageTag;
use App\Http\Traits\Notify;
use Illuminate\Http\Request;
use App\Models\ManageGallery;
use App\Models\ContentDetails;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

class FrontendController extends Controller
{
    use Notify;

    public function __construct()
    {
        $this->theme = template();
    }

    public function index()
    {

        $templateSection = ['hero', 'about-us', 'why-chose-us', 'instagram', 'testimonial', 'blog', 'services', 'behind-the-scene', 'team', 'gallery', 'contact-us', 'login'];
        $data['templates'] = Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['why-chose-us', 'testimonial', 'blog', 'services', 'team', 'statistics', 'social'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');


        $data['galleries'] = ManageGallery::with('tag')->latest()->get();
        $data['tags'] = ManageTag::latest()->get();

        $data['plans'] = Plan::with('details')->where('status', 1)->latest()->get();

        return view($this->theme . 'home', $data);
    }


    public function about()
    {
        $templateSection = ['about-us', 'skills', 'equipment', 'why-chose-us', 'testimonial', 'blog', 'instagram'];
        $data['templates'] = Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['social', 'skills', 'equipment', 'why-chose-us', 'testimonial', 'blog', 'statistics'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        return view($this->theme . 'about', $data);
    }


    public function blog()
    {
        $data['title'] = "Blog";
        $contentSection = ['blog'];

        $templateSection = ['blog'];
        $data['templates'] = Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        return view($this->theme . 'blog', $data);
    }

    public function blogDetails($id, $slug = null)
    {
        $getData = Content::findOrFail($id);

        $contentSection = [$getData->name];
        $contentDetail = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->where('content_id', $getData->id)
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');


        $singleItem['title'] = @$contentDetail[$getData->name][0]->description->title;
        $singleItem['description'] = @$contentDetail[$getData->name][0]->description->description;
        $singleItem['date'] = dateTime(@$contentDetail[$getData->name][0]->created_at, 'd M, Y');
        $singleItem['image'] = getFile(config('location.content.path') . @$contentDetail[$getData->name][0]->content->contentMedia->description->image);


        $contentSectionPopular = ['blog'];
        $popularContentDetails = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSectionPopular) {
                return $query->whereIn('name', $contentSectionPopular);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->where('content_id', '!=', $id)->orderBy('created_at', 'desc')->get()->take(2)->groupBy('content.name');

        return view($this->theme . 'blogDetails', compact('singleItem', 'popularContentDetails'));
    }


    public function services()
    {
        $templateSection = ['services', 'why-chose-us', 'testimonial', 'instagram', 'behind-the-scene'];
        $data['templates'] = Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['services', 'why-chose-us', 'testimonial', 'plan', 'statistics'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $data['plans'] = Plan::with('details')->where('status', 1)->latest()->get();

        return view($this->theme . 'services', $data);
    }


    public function gallery()
    {
        $galleries = ManageGallery::with('tag')->latest()->get();
        $tags = ManageTag::latest()->get();

        $templates = Template::setLang()->templateMedia()->where('section_name', 'gallery')->get();
        return view($this->theme . 'gallery', compact('galleries', 'tags', 'templates'));
    }

    public function shop()
    {
        $products = Product::with('details')->where('status', 1)->latest()->paginate(12);
        $title = 'Shop';
        return view($this->theme . 'shop', compact('products', 'title'));
    }

    public function shopDetails($slug = null, $id)
    {
        $productDetails = Product::with('details')->where('status', 1)->findOrFail($id);
        $title = 'Product Details';
        $products = Product::with('details')->where('status', 1)->where('id', '!=', $id)->latest()->get();
        $review = Review::whereHas('user')->where('product_id', $id)->with('user')->get();
        if (Auth::check()) {
            $countWishlist = Wishlist::where([
                'user_id' => Auth::user()->id,
                'product_id' => $id
            ])->count();
        } else {
            $countWishlist = 0;
        }

        $reviewCount = Review::where('product_id', $id)->count();
        $totalStar = Review::where('product_id', $id)->sum('star');
        $reviewAverage = 0;
        if ($reviewCount !== 0 && $totalStar != 0) {
            $reviewAverage = intval($totalStar / $reviewCount);
        }

        $checkExistingReview = Review::where('user_id', Auth::id())->where('product_id', $id)->first();
        $isPurchasedProduct = Fund::where('user_id', Auth::id())->where('product_id', $id)->where('status', 1)->first();
        return view($this->theme . 'shopDetails', compact('productDetails', 'title', 'products', 'countWishlist', 'review', 'reviewAverage', 'checkExistingReview', 'isPurchasedProduct'));
    }

    public function contact()
    {
        $templateSection = ['contact-us'];
        $templates = Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');
        $title = 'Contact Us';
        $sub_title = 'Location';
        $contact = @$templates['contact-us'][0]->description;

        return view($this->theme . 'contact', compact('title', 'sub_title', 'contact'));
    }

    public function contactSend(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:91',
            'subject' => 'required|max:100',
            'message' => 'required|max:1000',
        ]);
        $requestData = Purify::clean($request->except('_token', '_method'));

        $basic = Configure::firstOrNew();
        $basicEmail = $basic->sender_email;

        $name = $requestData['name'];
        $email_from = $requestData['email'];
        $subject = $requestData['subject'];

        $message = $requestData['message'] . "<br> Regards <br>" . $name;
        $from = $email_from;

        $headers = "From: <$from> \r\n";
        $headers .= "Reply-To: <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $to = $basicEmail;

        if (@mail($to, $subject, $message, $headers)) {
            // echo 'Your message has been sent.';
        } else {
            //echo 'There was a problem sending the email.';
        }

        return back()->with('success', 'Mail has been sent');
    }


    public function language($code)
    {
        $language = Language::where('short_name', $code)->first();
;
        if (!$language) $code = 'US';

        session()->put('trans', $code);
        session()->put('rtl', $language ? $language->rtl : 0);



        return redirect()->back();
    }


}
