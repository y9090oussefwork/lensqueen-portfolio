<?php

namespace App\Http\Controllers\User;

use App\Models\Fund;
use App\Models\Plan;
use App\Models\Ticket;
use App\Models\Gateway;
use App\Models\Product;
use App\Models\Language;
use App\Models\Wishlist;
use App\Models\Configure;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use Illuminate\Validation\Rule;
use App\Helper\GoogleAuthenticator;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Facades\App\Services\BasicService;
use Illuminate\Validation\Rules\Password;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;
use hisorange\BrowserDetect\Parser as Browser;

class HomeController extends Controller
{
    use Upload, Notify;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
        $this->theme = template();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['myBooking'] = BookingRequest::where('user_id', $this->user->id)->whereIn('status',[0,2])->count();
        $data['newBooking'] =  BookingRequest::where('user_id', $this->user->id)->limit(5)->orderBy('id', 'DESC')->get();
        $data['productPurchase'] = Fund::where('user_id', $this->user->id)->where('product_id',"!=", null)->where('status', 1)->count();
        $data['wishlists'] = Wishlist::where('user_id', $this->user->id)->count();
        $data['ticket'] = Ticket::where('user_id', $this->user->id)->count();
        $data['funds'] =  Fund::where('user_id', $this->user->id)->where('status', '!=', 0)->limit(5)->orderBy('id', 'DESC')->with('gateway')->get();

        return view($this->theme . 'user.dashboard', $data);
    }


    public function wishlist()
    {
        $wishlists = Wishlist::with('details')->where('user_id', $this->user->id)->orderBy('id', 'DESC')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.wishlist.wishlist', compact('wishlists'));
    }

    public function deleteWishlist($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return back()->with('success', 'Wishlist has been deleted successfully');
    }

    public function purchasePlan(Request $request)
    {
        $this->validate($request, [
            'checkout' => 'required',
            'plan_id' => 'required',
        ]);

        $user = $this->user;
        $plan = Plan::where('id', $request->plan_id)->where('status', 1)->first();
        if (!$plan) {
            return back()->with('error', 'Invalid Plan Request');
        }

        $balance_type = $request->checkout;
        if (!in_array($balance_type, ['checkout'])) {
            return back()->with('error', 'Invalid Wallet Type');
        }

        $amount = $plan->price;
        $basic = (object)config('basic');

        if ($balance_type == "checkout") {
            session()->put('amount', encrypt($amount));
            session()->put('plan_id', encrypt($plan->id));
            return redirect()->route('user.add.purchase.plan');
        }
    }

    public function addPurchasePlan()
    {
        $amount = session()->get('amount');
        $encPlanId = session()->get('plan_id');
        if ($encPlanId != null) {
            $plan = Plan::where('id', decrypt($encPlanId))->where('status', 1)->first();
            if (!$plan) {
                session()->forget('plan_id');
                session()->forget('amount');
            }
            $data['totalPayment'] = decrypt($amount);
        } else {
            $data['totalPayment'] = null;
            session()->forget('plan_id');
            session()->forget('amount');
        }

        $data['gateways'] = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();
        return view($this->theme . 'user.addPurchasePlan', $data);
    }

    public function myPlans(){
        $myPlans = Fund::with('planDetails')->where('user_id', $this->user->id)->where('plan_id',"!=", null)->where('status', 1)->orderBy('id', 'DESC')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.myPlans.myPlans', compact('myPlans'));
    }


    public function purchaseProduct(Request $request)
    {
        $this->validate($request, [
            'checkout' => 'required',
            'product_id' => 'required',
        ]);

        $user = $this->user;
        $product = Product::where('status', 1)->findOrFail($request->product_id);
        if (!$product) {
            return back()->with('error', 'Invalid Product Request');
        }

        $balance_type = $request->checkout;
        if (!in_array($balance_type, ['checkout'])) {
            return back()->with('error', 'Invalid Wallet Type');
        }

        $amount = $product->price;
        $basic = (object)config('basic');
        if ($balance_type == "checkout") {
            session()->put('amount', encrypt($amount));
            session()->put('product_id', encrypt($product->id));
            return redirect()->route('user.add.purchase.product');
        }
    }

    public function addPurchaseProduct()
    {
        $encProductId = session()->get('product_id');
        if($encProductId == null){
            abort(404);
        }



        $amount = session()->get('amount');
        $encProductId = session()->get('product_id');

        $product = Product::where('status', 1)->findOrfail(decrypt($encProductId));
        if (!$product) {
            session()->forget('product_id');
            session()->forget('amount');
        }
        $data['totalPayment'] = decrypt($amount);


        $data['pro_id'] = decrypt(session()->get('product_id')) ;
        $data['gateways'] = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();
        return view($this->theme . 'user.addPurchaseProduct', $data);
    }

    public function myProducts()
    {
        $myProducts = Fund::with('productDetails')->where('user_id', $this->user->id)->where('product_id',"!=", null)->where('status', 1)->orderBy('id', 'DESC')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.myProducts.myProducts', compact('myProducts'));
    }

    public function myProductDownload($id)
    {
        $pro_id = decrypt($id);
        $fund = Fund::with('productDetails.product')->where('product_id',$pro_id)->where('user_id',Auth::id())->firstOrFail();
        if(isset($fund->productDetails->product->product_file)){
            $filePath = config('location.productFile.path').$fund->productDetails->product->product_file;
            $title = slug(config('basic.site_title').' '.uniqid(). ' '.$fund->productDetails->title);
            $mimetype = mime_content_type($filePath);
            $ext = pathinfo($fund->productDetails->product->product_file, PATHINFO_EXTENSION);
            header('Content-Disposition: attachment; filename="' . $title . '.' . $ext . '";');
            header("Content-Type: " . $mimetype);
            return readfile($filePath);
        }
        return back()->with('error', 'Invalid Product File for Downloading');
    }


    public function bookingDate(Request $request)
    {
        $date = $request->date;
        $bookingForm = Configure::firstOrNew();
        return view($this->theme . 'user.bookingForm.bookingRequestForm', compact('bookingForm', 'date'));
    }


    public function userBookingRequestFormSubmit(Request $request)
    {
        $bookingRequest = new BookingRequest ();

        $config = Configure::first();

        $rules = [];
        $inputField = [];

        if ($config->booking_info != null) {
            foreach ($config->booking_info as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }

        $this->validate($request, $rules);
        $user = Auth::user();

        $collection = collect($request);
        $reqField = [];
        if (isset($config->booking_info)) {
            foreach ($collection as $k => $v) {
                foreach ($config->booking_info as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                $image = $request->file($inKey);
                                $filename = time() . uniqid() . '.jpg';
                                $location = config('location.bookingFrom.path');
                                $reqField[$inKey] = [
                                    'field_name' => $inKey,
                                    'field_value' => $filename,
                                    'field_level' => $inVal->field_level,
                                    'type' => $inVal->type,
                                    'validation' => $inVal->validation,
                                ];
                                try {
                                    $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename);
                                } catch (\Exception $exp) {
                                    return back()->with('error', 'Image could not be uploaded.');
                                }

                            }
                        } else {
                            $reqField[$inKey] = [
                                'field_name' => $inKey,
                                'field_value' => $v,
                                'field_level' => $inVal->field_level,
                                'type' => $inVal->type,
                                'validation' => $inVal->validation,
                            ];
                        }
                    }
                }
            }
            $bookingRequest->booking_info = $reqField;
        } else {
            $bookingRequest->booking_info = null;
        }

        $request->validate([
            'date' => 'date_format:m/d/Y'
        ]);

        $bookingRequest->user_id = Auth::id();
        $bookingRequest->date = $request->date;
        $bookingRequest->status = 0;

        $bookingRequest->save();

        $msg = [
            'username' => optional($bookingRequest->user)->username,
            'date' => $bookingRequest->date
        ];
        $action = [
                "link" => route('admin.show.booking.request.form',$bookingRequest->id),
                "icon" => "fab fa-wpforms text-white"
        ];

        $this->adminPushNotification('BOOKING_FORM_REQUEST_ADDED', $msg, $action);

        return redirect()->route('user.myBooking')->with('success', 'Your Booking Request Submitted Successfully');
    }


    public function myBooking()
    {
        $myBooking = BookingRequest::where('user_id', $this->user->id)->orderBy('id', 'ASC')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.bookingForm.bookingList', compact('myBooking'));
    }

    public function myBookingRequestForm($id)
    {
        $fundInfo = BookingRequest::where('user_id', $this->user->id)->findOrFail($id);
        return view($this->theme . 'user.bookingForm.showMyBookingForm', compact('fundInfo', 'id'));
    }


    public function fundHistory()
    {
        $funds = Fund::where('user_id', $this->user->id)->where('status', '!=', 0)->orderBy('id', 'DESC')->with('gateway')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.transaction.fundHistory', compact('funds'));
    }

    public function fundHistorySearch(Request $request)
    {
        $search = $request->all();

        $dateSearch = $request->date_time;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);

        $funds = Fund::orderBy('id', 'DESC')->where('user_id', $this->user->id)->where('status', '!=', 0)
            ->when(isset($search['name']), function ($query) use ($search) {
                return $query->where('transaction', 'LIKE', $search['name']);
            })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->when(isset($search['status']), function ($query) use ($search) {
                return $query->where('status', $search['status']);
            })
            ->with('gateway')
            ->paginate(config('basic.paginate'));
        $funds->appends($search);
        return view($this->theme . 'user.transaction.fundHistory', compact('funds'));
    }


    public function profile()
    {
        $user = $this->user;
        $languages = Language::all();
        return view($this->theme . 'user.profile.myprofile', compact('user','languages'));
    }


    public function updateProfile(Request $request)
    {

        $allowedExtensions = array('jpg', 'png', 'jpeg');

        $image = $request->image;
        $this->validate($request, [
            'image' => [
                'required',
                'max:4096',
                function ($fail) use ($image, $allowedExtensions) {
                    $ext = strtolower($image->getClientOriginalExtension());
                    if (($image->getSize() / 1000000) > 2) {
                        return $fail("Images MAX  2MB ALLOW!");
                    }
                    if (!in_array($ext, $allowedExtensions)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                }
            ]
        ]);
        $user = $this->user;
        if ($request->hasFile('image')) {
            $path = config('location.user.path');
            try {
                $user->image = $this->uploadImage($image, $path);
            } catch (\Exception $exp) {
                return back()->with('error', 'Could not upload your ' . $image)->withInput();
            }
        }
        $user->save();
        return back()->with('success', 'Updated Successfully.');
    }


    public function updateInformation(Request $request)
    {

         $languages = Language::all()->map(function ($item){
            return $item->id;
        });

        $req = Purify::clean($request->all());
        $user = $this->user;
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => "sometimes|required|alpha_dash|min:5|unique:users,username," . $user->id,
            'address' => 'required',
            'language_id' => Rule::in($languages),
        ];
        $message = [
            'firstname.required' => 'First Name field is required',
            'lastname.required' => 'Last Name field is required',
        ];

        $validator = Validator::make($req, $rules, $message);
        if ($validator->fails()) {
            $validator->errors()->add('profile', '1');
            return back()->withErrors($validator)->withInput();
        }
        $user->language_id = $req['language_id'];
        $user->firstname = $req['firstname'];
        $user->lastname = $req['lastname'];
        $user->username = $req['username'];
        $user->address = $req['address'];
        $user->save();
        return back()->with('success', 'Updated Successfully.');
    }


    public function updatePassword(Request $request)
    {
        if (config('basic.strong_password') == 0) {
            $rules['password'] = ['required', 'min:5', 'confirmed'];
        } else {
            $rules['password'] = ["required", 'confirmed',
                Password::min(6)->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()];
        }
        $rules['current_password'] = ['required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->errors()->add('password', '1');
            return back()->withErrors($validator)->withInput();
        }
        $user = $this->user;
        try {
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                return back()->with('success', 'Password Changes successfully.');
            } else {
                throw new \Exception('Current password did not match');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function twoStepSecurity()
    {
        $basic = (object)config('basic');
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($this->user->username . '@' . $basic->site_title, $secret);
        $previousCode = $this->user->two_fa_code;

        $previousQR = $ga->getQRCodeGoogleUrl($this->user->username . '@' . $basic->site_title, $previousCode);
        return view($this->theme . 'user.twoFA.index', compact('secret', 'qrCodeUrl', 'previousCode', 'previousQR'));
    }

    public function twoStepEnable(Request $request)
    {
        $user = $this->user;
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        $userCode = $request->code;
        if ($oneCode == $userCode) {
            $user['two_fa'] = 1;
            $user['two_fa_verify'] = 1;
            $user['two_fa_code'] = $request->key;
            $user->save();
            $browser = new Browser();
            $this->mail($user, 'TWO_STEP_ENABLED', [
                'action' => 'Enabled',
                'code' => $user->two_fa_code,
                'ip' => request()->ip(),
                'browser' => $browser->browserName() . ', ' . $browser->platformName(),
                'time' => date('d M, Y h:i:s A'),
            ]);
            return back()->with('success', 'Google Authenticator Has Been Enabled.');
        } else {
            return back()->with('error', 'Wrong Verification Code.');
        }

    }


    public function twoStepDisable(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = $this->user;
        $ga = new GoogleAuthenticator();

        $secret = $user->two_fa_code;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            $user['two_fa'] = 0;
            $user['two_fa_verify'] = 1;
            $user['two_fa_code'] = null;
            $user->save();
            $browser = new Browser();
            $this->mail($user, 'TWO_STEP_DISABLED', [
                'action' => 'Disabled',
                'ip' => request()->ip(),
                'browser' => $browser->browserName() . ', ' . $browser->platformName(),
                'time' => date('d M, Y h:i:s A'),
            ]);

            return back()->with('success', 'Google Authenticator Has Been Disabled.');
        } else {
            return back()->with('error', 'Wrong Verification Code.');
        }
    }

}
