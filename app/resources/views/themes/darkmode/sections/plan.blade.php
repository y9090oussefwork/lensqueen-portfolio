@if(0 < count($plans))
    <section class="price ">
        <div class="container">
            <div class="row">
                @foreach ($plans as $data)
                    <div class="col-md-6 col-lg-4 px-0">
                        <div class="seassion lifestyle wow fadeInRight" data-wow-offset="400" data-wow-delay=".1s"
                             style="background-image:linear-gradient(to bottom, rgba(20, 20, 20, 0.7), rgba(20, 20, 20, 0.7)), url('{{getFile(config('location.plan.path').@$data->image)}}');">
                            <h5 class="text-16 font-mont font-weight-bold text-uppercase white text-center">{{optional($data->details)->name}}</h5>
                            <h1 class="text-120 font-mont bold white text-center">
                                <sup>@lang($basic->currency_symbol ?? '$')</sup>@lang($data->price)</h1>
                            <h2 class="text-20 pb-4 font-mont font-weight-regular text-uppercase text-center white bar-horizontal bar-center">@lang('Session Features')</h2>

                            @if(optional($data->details)->details)
                                <table>
                                    @for($i = 0; $i<count($data->details->details); $i++)
                                        <tr>
                                            <td class="text-14 font-open font-weight-normal text-color2 text-center">
                                                @lang($data->details->details[$i])
                                            </td>
                                        </tr>
                                    @endfor
                                </table>
                            @endif
                            <button type="button" data-toggle="modal" data-target="#planModal"
                                    class="select-plan font-open text-14 white text-uppercase media purchaseNow follow-on-insta border-0"
                                    data-price="{{$data->price}}"
                                    data-resource="{{$data->details}}">
                                <span>@lang('Purchase Plan')</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@push('extra-content')
    <!-- Plan-Purchase-Modal -->
    <div class="modal fade" id="planModal" tabindex="-1" role="dialog" aria-labelledby="planModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark p-4">
                <div class="modal-body">
                    <form class="login-form" id="invest-form" action="{{route('user.purchase-plan')}}" method="post">
                        @csrf
                        <div class="signin">
                            <h2 class="text-white text-center mb-30 plan-name"></h2>

                            <p class="text-white text-center plan-price p-4 text-22"></p>

                            <input type="hidden" name="checkout" value="checkout">

                            <input type="hidden" name="plan_id" class="plan-id">

                            <div class="btn-area mb-30">
                                <button class="btn btn-block btn-f-button text-16 mt-4 text-white" type="submit">
                                    <span>@lang('Purchase Now')</span>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush


@push('script')
    <script>
        "use strict";
        (function ($) {
            $(document).on('click', '.purchaseNow', function () {
                $("#planModal").toggleClass("modal-open");
                let data = $(this).data('resource');
                let price = $(this).data('price');

                let symbol = "{{trans($basic->currency_symbol)}}";

                $('.plan-price').text(`@lang('Price'): ${symbol}${price}`);

                $('.plan-name').text(data.name);
                $('.plan-id').val(data.plan_id);
            });
        })(jQuery);


        @if(count($errors) > 0 )

        @foreach($errors->all() as $key => $error)
        Notiflix.Notify.Failure("@lang($error)");
        @endforeach

        @endif

    </script>


@endpush
