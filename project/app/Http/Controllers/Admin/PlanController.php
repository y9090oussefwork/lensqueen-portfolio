<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fund;
use App\Models\Plan;
use App\Models\Language;
use App\Models\Configure;
use App\Http\Traits\Upload;
use App\Models\PlanDetails;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use App\Http\Traits\Notify;
use App\Http\Controllers\Controller;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    use Upload, Notify;

    public function plan()
    {
        $managePlans = Plan::with('details')->latest()->get();
        return view('admin.plan.planList', compact('managePlans'));
    }

    public function planCreate()
    {
        $languages = Language::all();
        return view('admin.plan.planCreate', compact('languages'));
    }


    public function planStore(Request $request, $language)
    {
        $purifiedData = Purify::clean($request->except('image', '_token', '_method'));

        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }

        $rules = [
            'name.*' => 'required|max:191',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'details.*' => 'required',
        ];
        $message = [
            'name.*.required' => 'Name field is required',
            'name.*.max' => 'This field may not be greater than :max characters.',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price must be a numeric value',
            'image.required' => 'Image is required',
            'image.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
            'details.*.required' => 'Please add plan feature',
        ];

        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $plan = new Plan();
        $plan->price = $purifiedData['price'];
        $plan->status = isset($purifiedData['status']) ? 1 : 0;

        if ($request->hasFile('image')) {
            try {
                $plan->image = $this->uploadImage($purifiedData['image'], config('location.plan.path'), config('location.plan.size'));
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $plan->save();


        $plan->details()->create([
            'language_id' => $language,
            'name' => $purifiedData["name"][$language],
            'details' => $purifiedData["details"][$language],
        ]);

        return redirect()->route('admin.planList')->with('success', 'Plan Successfully Saved');
    }


    public function planDelete($id)
    {
        $planData = Plan::findOrFail($id);
        $old_image = $planData->image;
        $location = config('location.plan.path');

        if (!empty($old_image)) {
            unlink($location . '/' . $old_image);
        }

        $planData->delete();
        return back()->with('success', 'Plan has been deleted');
    }


    public function planEdit($id)
    {
        $languages = Language::all();
        $planDetails = PlanDetails::with('Plan')->where('plan_id', $id)->get()->groupBy('language_id');
        $detailsCount = PlanDetails::where('plan_id', $id)->select('details')->first();
        return view('admin.plan.planEdit', compact('languages', 'planDetails', 'id', 'detailsCount'));
    }


    public function planUpdate(Request $request, $id, $language_id)
    {
        $purifiedData = Purify::clean($request->except('image', '_token', '_method'));

        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }

        $rules = [
            'name.*' => 'required|max:191',
            'price' => 'sometimes|required|numeric',
            'image' => 'mimes:jpg,jpeg,png',
            'details.*' => 'required',
        ];
        $message = [
            'name.*.required' => 'Name field is required',
            'name.*.max' => 'This field may not be greater than :max characters.',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price must be a numeric value',
            'image.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
            'details.*.required' => 'Please add plan feature',
        ];

        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $plan = Plan::findOrFail($id);

        if ($request->hasFile('image')) {
            $plan->image = $this->uploadImage($purifiedData['image'], config('location.plan.path'), config('location.plan.size'), $plan->image);
        }

        if($request->has('price')){
            $plan->price = $purifiedData['price'];
        }
        if($request->has('status')) {
            $plan->status = isset($purifiedData['status']) ? 1 : 0;
        }
        $plan->save();

        $plan->details()->updateOrCreate([
            'language_id' => $language_id
        ],
            [
                'name' => $purifiedData["name"][$language_id],
                'details' => $purifiedData["details"][$language_id],
            ]
        );
        return back()->with('success', 'Plan Successfully Updated');

    }


    public function bookingForm(Request $request)
    {
        if ($request->isMethod('GET')) {
            $configure = Configure::firstOrNew();
            return view('admin.plan.bookingForm', compact('configure'));

        } elseif ($request->isMethod('POST')) {
            $configure = Configure::firstOrNew();

            $input_form = [];
            if ($request->has('field_name')) {
                for ($a = 0; $a < count($request->field_name); $a++) {
                    $arr = array();
                    $arr['field_name'] = clean($request->field_name[$a]);
                    $arr['field_level'] = $request->field_name[$a];
                    $arr['type'] = $request->type[$a];
                    $arr['validation'] = $request->validation[$a];
                    $input_form[$arr['field_name']] = $arr;
                }
            }

            $configure->booking_info = $input_form;

            $configure->save();

            return redirect()->back()->with('success', 'Updated Successfully');
        }
    }

    public function bookingFormStore(Request $request)
    {
        $configure = Configure::firstOrNew();

        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = clean($request->field_name[$a]);
                $arr['field_level'] = $request->field_name[$a];
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $configure->booking_info = $input_form;

        $configure->save();

        return redirect()->back()->with('success', 'Updated Successfully');
    }


    public function purchasedPlanList()
    {
        $userPlans = Fund::whereHas('user')->whereHas('plan')->with('planDetails')->where('status', 1)->where('plan_id',"!=", null)->orderBy('id', 'DESC')->get();
        return view('admin.purchased-plan.purchasedPlan', compact('userPlans'));
    }


    public function showBookingForm($trx)
    {
        $fundInfo = Fund::where('transaction', $trx)->firstOrFail();
        if ($fundInfo->status == 1) {
            return view('admin.purchased-plan.bookingForm', compact('fundInfo', 'trx'));
        }
        abort(404);
    }


    public function bookingFormUpdate(Request $request, $trx)
    {
        $fund = Fund::where('transaction', $trx)->where('status', 1)->firstOrFail();


        $rules = [];
        $inputField = [];

        if ($fund->booking_info != null) {
            foreach ($fund->booking_info as $key => $cus) {

                // $rules[$key] = [$cus->validation];
                $rules[$key] = [];
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
        $reqField = [];
        if (isset($fund->booking_info)) {
                foreach ($fund->booking_info as $inKey => $inVal) {
                    if ($inVal->type == 'file') {
                        if ($request->hasFile($inKey)) {
                            $old = $fund->booking_info->$inKey->field_value;

                            $image = $request->file($inKey);
                            $filename = time() . uniqid() . '.jpg';
                            $location = config('location.bookingFrom.path');
                            $reqField[$inKey] = [
                                'field_name' => $inKey,
                                'field_value' => $filename,
                                'field_level' => $inVal->field_level,
                                'type' => $inVal->type,
                            ];
                            try {
                                $this->uploadImage($image, $location, $size = null, $old, $thumb = null, $filename);
                            } catch (\Exception $exp) {
                                return back()->with('error', 'Image could not be uploaded.');
                            }

                        }else{
                            $reqField[$inKey] = [
                                'field_name' => $fund->booking_info->$inKey->field_name,
                                'field_value' => $fund->booking_info->$inKey->field_value,
                                'field_level' => $inVal->field_level,
                                'type' => $inVal->type,
                            ];
                        }
                    }else{
                        $reqField[$inKey] = $inKey;
                        $reqField[$inKey] = [
                            'field_name' => $inKey,
                            'field_value' => $request->$inKey,
                            'field_level' => $inVal->field_level,
                            'type' => $inVal->type,
                        ];
                    }
                }
            $fund->booking_info = $reqField;
        } else {
            $fund->booking_info = null;
        }

        $fund->save();

        return redirect()->back()->with('success', 'Booking Form Updated Successfully');
    }



    public function showBookingRequestPending()
    {
        $bookingRequests = BookingRequest::with('user')->orderBy('id', 'DESC')->where('status',0)->get();
        return view('admin.booking-request.bookingRequest', compact('bookingRequests'));
    }
    public function showBookingRequestNonPending()
    {
        $bookingRequests = BookingRequest::with('user')->orderBy('id', 'DESC')->where('status','!=',0)->get();
        return view('admin.booking-request.bookingRequest', compact('bookingRequests'));
    }


    public function showBookingRequestForm($id)
    {
        $bookingRequestInfo = BookingRequest::findOrFail($id);
        return view('admin.booking-request.bookingRequestForm', compact('bookingRequestInfo', 'id'));
    }

    public function rejectBookingRequestForm(Request $request, $id)
    {
        $data = BookingRequest::findOrFail($id);
        $data->note = $request->note;
        $data->status = 1;
        $data->save();

        $msg = [
            'date' => $data->date,
            'status' => 'Rejected'
        ];
        $action = [
                "link" => route('user.myBooking'),
                "icon" => "far fa-window-close text-white"
        ];

        $this->userPushNotification($data->user, 'BOOKING_FORM_REQUEST_STATUS_CHANGED', $msg, $action);


        $this->sendMailSms($data->user, 'BOOKING_FORM_REQUEST_STATUS_CHANGED', [
            'date' => $data->date,
            'status' => 'Rejected'
        ]);

        return redirect()->back()->with('success', 'Booking is Rejected');
    }

    public function approveBookingRequestForm(Request $request, $id)
    {
        $data = BookingRequest::findOrFail($id);
        $data->note = $request->note;
        $data->status = 2;
        $data->save();


        $msg = [
            'date' => $data->date,
            'status' => 'Approved'
        ];
        $action = [
                "link" => route('user.myBooking'),
                "icon" => "far fa-window-close text-white"
        ];

        $this->userPushNotification($data->user, 'BOOKING_FORM_REQUEST_STATUS_CHANGED', $msg, $action);


        $this->sendMailSms($data->user, 'BOOKING_FORM_REQUEST_STATUS_CHANGED', [
            'date' => $data->date,
            'status' => 'Approved'
        ]);

        return redirect()->back()->with('success', 'Booking is Approved');
    }

    public function deleteBookingRequestForm(Request $request, $id)
    {
        $data = BookingRequest::findOrFail($id);
        $location = config('location.bookingFrom.path');

        if($data->booking_info){
            foreach ($data->booking_info as $key => $obj){
                if($obj->type != 'file'){
                    continue;
                }else{
                    @unlink($location . '/' . $obj->field_value);
                }
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }

    public function bookingRequestFormUpdate(Request $request, $id)
    {
        $fund = BookingRequest::where('id', $id)->firstOrFail();

        $rules = [];
        $inputField = [];

        if ($fund->booking_info != null) {
            foreach ($fund->booking_info as $key => $cus) {

                // $rules[$key] = [$cus->validation];
                $rules[$key] = [];
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
        $reqField = [];
        if (isset($fund->booking_info)) {
                foreach ($fund->booking_info as $inKey => $inVal) {
                    if ($inVal->type == 'file') {
                        if ($request->hasFile($inKey)) {
                            $old = $fund->booking_info->$inKey->field_value;

                            $image = $request->file($inKey);
                            $filename = time() . uniqid() . '.jpg';
                            $location = config('location.bookingFrom.path');
                            $reqField[$inKey] = [
                                'field_name' => $inKey,
                                'field_value' => $filename,
                                'field_level' => $inVal->field_level,
                                'type' => $inVal->type,
                            ];
                            try {
                                $this->uploadImage($image, $location, $size = null, $old, $thumb = null, $filename);
                            } catch (\Exception $exp) {
                                return back()->with('error', 'Image could not be uploaded.');
                            }

                        }else{
                            $reqField[$inKey] = [
                                'field_name' => $fund->booking_info->$inKey->field_name,
                                'field_value' => $fund->booking_info->$inKey->field_value,
                                'field_level' => $inVal->field_level,
                                'type' => $inVal->type,
                            ];
                        }
                    }else{
                        $reqField[$inKey] = $inKey;
                        $reqField[$inKey] = [
                            'field_name' => $inKey,
                            'field_value' => $request->$inKey,
                            'field_level' => $inVal->field_level,
                            'type' => $inVal->type,
                        ];
                    }
                }
            $fund->booking_info = $reqField;
        } else {
            $fund->booking_info = null;
        }

        $fund->note = $request->note;
        $fund->save();

        return redirect()->back()->with('success', 'Booking Request Form Updated Successfully');
    }

}
