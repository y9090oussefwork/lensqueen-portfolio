<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Plan;
use App\Models\Gateway;
use App\Models\Product;
use App\Models\Configure;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use Notify, Upload;

    public function __construct()
    {
        $this->theme = template();
    }

    public function purchasePlanRequest(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'gateway' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response($validator->messages(), 422);
        }

        $basic = (object)config('basic');
        $gate = Gateway::where('code', $request->gateway)->where('status', 1)->first();
        if (!$gate) {
            return response()->json(['error' => 'Invalid Gateway'], 422);
        }

        $encPlanId = session()->get('plan_id');
        $plan_id = null;
        if ($encPlanId != null) {
            $amount = session()->get('amount');
            $reqAmount = decrypt($amount);
            $plan = Plan::where('id', decrypt($encPlanId))->where('status', 1)->first();
            $plan_id = $plan->id;
        } else {
            $reqAmount = $request->amount;

            if ($gate->min_amount > $reqAmount || $gate->max_amount < $reqAmount) {
                return response()->json(['error' => 'Please Follow Transaction Limit'], 422);
            }
        }


        $charge = getAmount($gate->fixed_charge + ($reqAmount * $gate->percentage_charge / 100));
        $payable = getAmount($reqAmount + $charge);
        $final_amo = getAmount($payable * $gate->convention_rate);
        $user = auth()->user();
        $product_id = null;

        $fund = $this->newFund($request, $user, $gate, $charge, $final_amo, $reqAmount, $plan_id, $product_id);

        session()->put('track', $fund['transaction']);

        $method_currency = (checkTo($fund->gateway->currencies, $fund->gateway_currency) == 1) ? 'USD' : $fund->gateway_currency;
        $isCrypto = (checkTo($fund->gateway->currencies, $fund->gateway_currency) == 1) ? true : false;

        return [
            'gateway_image' => getFile(config('location.gateway.path') . $gate->image),
            'amount' => getAmount($fund->amount) . ' ' . $basic->currency_symbol,
            'charge' => getAmount($fund->charge) . ' ' . $basic->currency_symbol,
            'gateway_currency' => trans($fund->gateway_currency),
            'payable' => getAmount($fund->amount + $fund->charge) . ' ' . $basic->currency_symbol,
            'conversion_rate' => 1 . ' ' . $basic->currency . ' = ' . getAmount($fund->rate) . ' ' . $method_currency,
            'in' => trans('In') . ' ' . $method_currency . ':' . getAmount($fund->final_amount, 2),
            'isCrypto' => $isCrypto,
            'conversion_with' => ($isCrypto) ? trans('Conversion with') . $fund->gateway_currency . ' ' . trans('and final value will Show on next step') : null,
            'payment_url' => route('user.purchase.plan.request.confirm'),
        ];

    }

    public function purchasePlanConfirm(Request $request)
    {
        $track = session()->get('track');
        $order = Fund::where('transaction', $track)->orderBy('id', 'DESC')->with(['gateway', 'user'])->first();
        if ($order->product_id == null) {
            if (is_null($order)) {
                return redirect()->route('user.add.purchase.plan')->with('error', 'Invalid Plan Purchase Request');
            }
            if ($order->status != 0) {
                return redirect()->route('user.add.purchase.plan')->with('error', 'Invalid Plan Purchase Request');
            }
        }
        if ($order->plan_id == null) {
            if (is_null($order)) {
                return redirect()->route('user.add.purchase.product')->with('error', 'Invalid Product Purchase Request');
            }
            if ($order->status != 0) {
                return redirect()->route('user.add.purchase.product')->with('error', 'Invalid Product Purchase Request');
            }
        }


        $method = $order->gateway->code;
        try {
            $getwayObj = 'App\\Services\\Gateway\\' . $method . '\\Payment';
            $data = $getwayObj::prepareData($order, $order->gateway);
            $data = json_decode($data);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        if (isset($data->error)) {
            return back()->with('error', $data->message);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }
        $page_title = 'Payment Confirm';
        return view(template() . $data->view, compact('data', 'page_title', 'order'));
    }

    public function gatewayIpn(Request $request, $code, $trx = null, $type = null)
    {
        if (isset($request->m_orderid)) {
            $trx = $request->m_orderid;
        }

        if ($code == 'coinbasecommerce') {
            $input = fopen("php://input", "r");
            @file_put_contents(time() . '_coinbasecommerce.txt', $input);

            $gateway = Gateway::where('code', $code)->first();

            $postdata = file_get_contents("php://input");
            $res = json_decode($postdata);

            if (isset($res->event)) {
                $order = Fund::where('transaction', $res->event->data->metadata->trx)->orderBy('id', 'DESC')->with(['gateway', 'user'])->first();
                //$headers = apache_request_headers();
                //$sentSign = $headers['X-Cc-Webhook-Signature'];
                $sentSign = $request->header('X-Cc-Webhook-Signature');

                $sig = hash_hmac('sha256', $postdata, $gateway->parameters->secret);
                @file_put_contents(time() . '_coinbasecommerce_sign.txt', $sentSign);

                if ($sentSign == $sig) {
                    if ($res->event->type == 'charge:confirmed' && $order->status == 0) {
                        BasicService::preparePaymentUpgradation($order);
                    }
                }
            }

            session()->flash('success', 'You request has been processing.');
            return redirect()->route('user.fund-history');
        }

        try {
            $gateway = Gateway::where('code', $code)->first();
            if (!$gateway) throw new \Exception('Invalid Payment Gateway.');
            if (isset($trx)) {
                $order = Fund::where('transaction', $trx)->orderBy('id', 'desc')->with(['gateway', 'user'])->first();
                if (!$order) throw new \Exception('Invalid Payment Request.');
            }
            $getwayObj = 'App\\Services\\Gateway\\' . $code . '\\Payment';
            $data = $getwayObj::ipn($request, $gateway, @$order, @$trx, @$type);

            if (isset($data['redirect'])) {
                if ($order->product_id != null) {
                    return redirect(route('user.myProducts'))->with($data['status'], $data['msg']);
                } else {
                    if (isset($data['status']) && $data['status'] == 'success') {
                        return redirect(route('booking.form', $trx))->with($data['status'], $data['msg']);
                    } else {
                        return redirect(route('user.myPlans'))->with($data['status'], $data['msg']);
                    }
                }

            }

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }


    }


    public function purchaseProductRequest(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'gateway' => 'required',
            'amount' => 'required'
        ]);
        if ($validator->fails()) {
            return response($validator->messages(), 422);
        }

        $basic = (object)config('basic');
        $gate = Gateway::where('code', $request->gateway)->where('status', 1)->first();
        if (!$gate) {
            return response()->json(['error' => 'Invalid Gateway'], 422);
        }

        $encProductId = session()->get('product_id');
        $product_id = null;
        if ($encProductId != null) {
            $amount = session()->get('amount');
            $reqAmount = decrypt($amount);
            $product = Product::where('id', decrypt($encProductId))->first();
            $product_id = $product->id;
        } else {
            $reqAmount = $request->amount;

            if ($gate->min_amount > $reqAmount || $gate->max_amount < $reqAmount) {
                return response()->json(['error' => 'Please Follow Transaction Limit'], 422);
            }
        }


        $charge = getAmount($gate->fixed_charge + ($reqAmount * $gate->percentage_charge / 100));
        $payable = getAmount($reqAmount + $charge);
        $final_amo = getAmount($payable * $gate->convention_rate);
        $user = auth()->user();

        $plan_id = null;
        $pro_id = $request->pro_id;

        $fund = $this->newFund($request, $user, $gate, $charge, $final_amo, $reqAmount, $plan_id, $pro_id);

        session()->put('track', $fund['transaction']);

        $method_currency = (checkTo($fund->gateway->currencies, $fund->gateway_currency) == 1) ? 'USD' : $fund->gateway_currency;
        $isCrypto = (checkTo($fund->gateway->currencies, $fund->gateway_currency) == 1) ? true : false;

        return [
            'gateway_image' => getFile(config('location.gateway.path') . $gate->image),
            'amount' => getAmount($fund->amount) . ' ' . $basic->currency_symbol,
            'charge' => getAmount($fund->charge) . ' ' . $basic->currency_symbol,
            'gateway_currency' => trans($fund->gateway_currency),
            'payable' => getAmount($fund->amount + $fund->charge) . ' ' . $basic->currency_symbol,
            'conversion_rate' => 1 . ' ' . $basic->currency . ' = ' . getAmount($fund->rate) . ' ' . $method_currency,
            'in' => trans('In') . ' ' . $method_currency . ':' . getAmount($fund->final_amount, 2),
            'isCrypto' => $isCrypto,
            'conversion_with' => ($isCrypto) ? trans('Conversion with') . $fund->gateway_currency . ' ' . trans('and final value will Show on next step') : null,
            'payment_url' => route('user.purchase.plan.request.confirm'),
        ];

    }


    public function userBookingForm($trx)
    {
        $bookingForm = Configure::firstOrNew();
        $fundInfo = Fund::orderBy('id', 'desc')->where('transaction', $trx)->firstOrFail();
        if ($fundInfo->status == 1) {
            return view($this->theme . 'user.bookingForm.bookingForm', compact('bookingForm', 'fundInfo', 'trx'));
        }
        abort(404);
    }


    public function userBookingFormSubmit(Request $request, $trx)
    {
        $fund = Fund::where('transaction', $trx)->where('status', 1)->firstOrFail();
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
            $fund->booking_info = $reqField;
        } else {
            $fund->booking_info = null;
        }

        $fund->save();

        $msg = [
            'username' => optional($fund->user)->username,
            'plan_name' => optional($fund->planDetails)->name
        ];
        $action = [
            "link" => route('admin.show.booking.form', $fund->transaction),
            "icon" => "fab fa-wpforms text-white"
        ];

        $this->adminPushNotification('BOOKING_FORM_FOR_PLAN_CREATED', $msg, $action);
        return redirect()->route('user.myPlans')->with('success', 'Your Request Submitted Successfully');
    }


    public function success()
    {
        return view('success');
    }

    public function failed()
    {
        return view('failed');
    }

    /**
     * @param Request $request
     * @param $user
     * @param $gate
     * @param $charge
     * @param $final_amo
     * @return Fund
     * @return $amount
     * @return $plan_id
     */
    public function newFund(Request $request, $user, $gate, $charge, $final_amo, $amount, $plan_id = null, $pro_id = null): Fund
    {
        $fund = new Fund();
        $fund->user_id = $user->id;
        $fund->gateway_id = $gate->id;
        $fund->plan_id = $plan_id;
        $fund->product_id = $pro_id;
        $fund->gateway_currency = strtoupper($gate->currency);
        $fund->amount = $amount;
        $fund->charge = $charge;
        $fund->rate = $gate->convention_rate;
        $fund->final_amount = getAmount($final_amo);
        $fund->btc_amount = 0;
        $fund->btc_wallet = "";
        $fund->transaction = strRandom();
        $fund->try = 0;
        $fund->status = 0;
        $fund->save();
        return $fund;
    }

}
