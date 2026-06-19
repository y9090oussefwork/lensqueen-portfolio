@extends($theme.'layouts.app')
@section('title')
    {{ trans('Pay with ').optional($order->gateway)->name ?? '' }}
@endsection


@section('content')

    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>


    <section id="dashboard-payment">
        <div class="container dashboard-wrapper add-fund py-5">
            <div class="row bg-dark justify-content-center p-5">
                <div class="col-md-12">
                    <div class="card secbg br-4">
                        <div class="card-body br-4 bg-dark">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <img
                                        src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}"
                                        class="card-img-top gateway-img br-4" alt="@lang('stripe payment image')">
                                </div>
                                <div class="col-md-9">
                                    <h4 class="text-white">@lang('Please Pay') {{getAmount($order->final_amount)}} {{$order->gateway_currency}}</h4>
                                    <h4 class="my-3 text-white">@lang('To Get') {{getAmount($order->amount)}}  {{$basic->currency}}</h4>
                                    <form action="{{$data->url}}" method="{{$data->method}}">
                                        <script
                                            src="{{$data->src}}"
                                            class="stripe-button"
                                            @foreach($data->val as $key=> $value)
                                            data-{{$key}}="{{$value}}"
                                            @endforeach>
                                        </script>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    @push('script')
        <script>
            $(document).ready(function () {
                $('button[type="submit"]').removeClass("stripe-button-el").addClass("btn btn-f-button").find('span').css('min-height', 'initial');
            })
        </script>
    @endpush

@endsection




