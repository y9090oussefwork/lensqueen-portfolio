@extends($theme.'layouts.app')
@section('title')
    @lang('Purchase Plan')
@endsection

@section('content')

    <section id="dashboard-payment">
        <div class="container dashboard-wrapper add-fund py-5">
            <div class="row feature-wrapper top-0 add-fund">
                @foreach($gateways as $key => $gateway)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mb-30">
                        <div class="card card-type-1 text-center bg-dark p-2 my-3">

                            <div class="card-icon">
                                <img src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                                     alt="{{trans($gateway->name)}}" class="gateway">
                            </div>

                            <button type="button"
                                    data-id="{{$gateway->id}}"
                                    data-name="{{$gateway->name}}"
                                    data-currency="{{$gateway->currency}}"
                                    data-gateway="{{$gateway->code}}"
                                    data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                    data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                                    data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                                    data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"
                                    class="btn btn-f-button btn-block mt-2 colorbg-1 addFund"
                                    data-backdrop='static' data-keyboard='false'
                                    data-toggle="modal" data-target="#addFundModal">@lang('Pay Now')</button>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    @push('extra-content')
        <div id="addFundModal" class="modal fade addFundModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content notiflix-loader form-block bg-dark text-white">
                    <div class="modal-header">
                        <h6 class="modal-title method-name text-white text-16"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="payment-form">
                            @if(0 == $totalPayment)
                                <p class="text-danger depositLimit"></p>
                                <p class="text-danger depositCharge"></p>
                            @endif

                            <input type="hidden" class="gateway" name="gateway" value="">

                            <div class="form-group mb-30">
                                <label class="text-white mb-1">@lang('Amount')</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="amount form-control" name="amount"
                                        @if($totalPayment != null) value="{{$totalPayment}}" readonly @endif>
                                    <div class="input-group-append">
                                        <span class="input-group-text show-currency"></span>
                                    </div>
                                </div>
                                <pre class="text-danger errors"></pre>
                            </div>
                        </div>

                        <div class="payment-info text-center">
                            <img id="loading" src="{{asset('assets/admin/images/loading.gif')}}" alt="@lang('purchase plan image')"
                                 class="w-15"/>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-lg btn-f-button checkCalc text-white">@lang('Next')</button>
                    </div>

                </div>
            </div>
        </div>
    @endpush


@endsection



@push('script')

    <script>
        $('#loading').hide();
        "use strict";
        $(document).ready(function () {
            // $('.notiflix-loader').hide();
            var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, amount, gateway;
            $(document).on('click', '.addFund', function () {
                id = $(this).data('id');
                gateway = $(this).data('gateway');
                minAmount = $(this).data('min_amount');
                maxAmount = $(this).data('max_amount');
                baseSymbol = "{{config('basic.currency_symbol')}}";
                fixCharge = $(this).data('fix_charge');
                percentCharge = $(this).data('percent_charge');
                currency = $(this).data('currency');
                $('.depositLimit').text(`@lang('Transaction Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`);

                var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
                $('.depositCharge').text(depositCharge);

                $('.method-name').text(`@lang('Payment By') ${$(this).data('name')} - ${currency}`);
                $('.show-currency').text("{{config('basic.currency')}}");
                $('.gateway').val(currency);

                // amount
            });


            $(".checkCalc").on('click', function () {
                $('.payment-form').addClass('d-none');

                $('#loading').show();
                $('.modal-backdrop.fade').addClass('show');
                amount = $('.amount').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('user.purchase.plan.request')}}",
                    type: 'POST',
                    data: {
                        amount,
                        gateway
                    },
                    success(data) {
                        $('.payment-form').addClass('d-none');
                        $('.checkCalc').closest('.modal-footer').addClass('d-none');

                        var htmlData = `
                         <ul class="list-group text-center bg-dark text-16">
                            <li class="list-group-item bg-dark">
                                <img src="${data.gateway_image}" class="w-50 mx-auto"/>
                            </li>
                            <li class="list-group-item bg-dark">
                                @lang('Amount'):
                                <strong>${data.amount} </strong>
                            </li>
                            <li class="list-group-item bg-dark">@lang('Charge'):
                                    <strong>${data.charge}</strong>
                            </li>
                            <li class="list-group-item bg-dark">
                                @lang('Payable'): <strong> ${data.payable}</strong>
                            </li>
                            <li class="list-group-item bg-dark">
                                @lang('Conversion Rate'): <strong>${data.conversion_rate}</strong>
                            </li>
                            <li class="list-group-item bg-dark">
                                <strong>${data.in}</strong>
                            </li>

                            ${(data.isCrypto == true) ? `
                            <li class="list-group-item bg-dark">
                                ${data.conversion_with}
                            </li>
                            ` : ``}

                            <li class="list-group-item bg-dark">
                            <a href="${data.payment_url}" class="btn text-white text-16 btn-block addFund btn-f-button">@lang('Pay Now')</a>
                            </li>
                            </ul>`;

                        $('.payment-info').html(htmlData)
                    },
                    complete: function () {
                        $('#loading').hide();
                        // Notiflix.Block.remove('.notiflix-loader');
                    },
                    error(err) {
                        //alert('error');
                        var errors = err.responseJSON;
                        console.log(errors);
                        for (var obj in errors) {
                            $('.errors').text(`${errors[obj]}`)
                        }

                        $('.payment-form').removeClass('d-none');
                    }
                });
            });


            $('.close').on('click', function (e) {
                $('#loading').hide();
                // Notiflix.Block.remove('.notiflix-loader');
                $('.payment-form').removeClass('d-none');
                $('.checkCalc').closest('.modal-footer').removeClass('d-none');
                $('.payment-info').html(``)
                $('.amount').val(``);
                $("#addFundModal").modal("hide");
            });
        })

    </script>
@endpush

