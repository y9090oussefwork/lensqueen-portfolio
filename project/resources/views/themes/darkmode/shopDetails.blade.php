@extends($theme.'layouts.app')
@section('title',trans($title))

@push('css-lib')
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jssocials.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jssocials-theme-minima.css')}}">
@endpush

@php
    $imageCount = ($productDetails->image != null) ? count($productDetails->image):0;
@endphp

@section('content')
    <section class="product-detail-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-image-slider wow fadeInUp" data-wow-delay=".1s" data-wow-offset="400">
                        @for($i = 0; $i < $imageCount; $i++)
                            <a href="{{ getFile(config('location.product.path').$productDetails->image[$i]) }}"
                               class="product-image">
                                <img src="{{ getFile(config('location.product.path').$productDetails->image[$i]) }}"
                                     alt=@lang('product image')>
                                <div class="product-label {{$productDetails->details->tag ? 'show' : ''}}">
                                    <p>@lang($productDetails->details->tag)</p>
                                </div>
                            </a>
                        @endfor
                    </div>
                    <div class="product-image-nav ">
                        @for($i = 0; $i < $imageCount; $i++)
                            <div class="product-image wow fadeInUp" data-wow-delay=".1s" data-wow-offset="100">
                                <img src="{{ getFile(config('location.product.path').$productDetails->image[$i]) }}"
                                     alt=@lang('product image')>
                            </div>
                        @endfor
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="about-product wow fadeInUp" data-wow-delay=".1s" data-wow-offset="200">
                        <h1 class="text-36 font-mont font-weight-bold base product-name">@lang($productDetails->details->title)</h1>
                        <div class="price-and-stars">
                            <h1 class="white">
                                <sup>{{ $basic->currency_symbol ?? '$' }}</sup>@lang($productDetails->price)</h1>

                            <div class="stars">

                                @for($i = 1; $i <= $reviewAverage; $i++)
                                    <i class="icofont-star color-pill"></i>
                                @endfor
                                @for($i = $reviewAverage; $i < 5; $i++)
                                    <i class="icofont-star star-blank"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="paragraph">
                            <p class="font-open text-14 font-weight-light ">@lang($productDetails->details->short_details)</p>
                        </div>

                        <hr>

                        <div class="purchase">

                            <button class="purchaseNow buy" type="button" data-toggle="modal"
                                    data-target="#productPurchaseModal"
                                    data-price="{{$productDetails->price}}"
                                    data-resource="{{$productDetails->details}}">
                                <i class="icofont-shopping-cart"></i>
                            </button>

                            <button class="like update_wishlist" title="Wishlist">
                                @if($countWishlist > 0)
                                    <i class="fas fa-heart text-dark"></i>
                                @else
                                    <i class="far fa-heart"></i>
                                @endif
                            </button>
                            <div id="notifDiv" class="text-center text-white ml-5 p-3"></div>
                        </div>
                        <div class="share">
                            <p class="text-16 font-open font-weight-light text-uppercase pr-2">@lang('Share : ')</p>
                            <div id="share" class="social-links-footer ">
                            </div>
                        </div>
                        <div class="category">
                            @php
                                $category = explode(",",$productDetails->details->category);
                                $categorySeparatedByComma = implode(", ",$category);
                            @endphp
                            <p class="font-open text-16 font-weight-light white">@lang('CATEGORY : ')<span
                                    class="text-14">@lang($categorySeparatedByComma)</p>
                        </div>
                        <p class="text-16 font-open white font-weight-light">@lang('Guaranteed Checkout')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="description-and-review">
        <div class="container">
            <ul class="nav nav-tabs">
                <li><a href="#description" data-toggle="tab" class="active show">@lang('Description')</a></li>
                <li><a href="#review" data-toggle="tab">@lang('Review')</a></li>
            </ul>
            <div class="tab-content">
                <div id="description" class="tab-pane fade show active">
                    <div class="paragraph wow fadeInUp" data-wow-delay=".1s" data-wow-offset="200">
                        <p>@lang($productDetails->details->description)</p>
                    </div>
                </div>

                <div id="review" class="tab-pane fade">
                    @if(Auth::check() && $isPurchasedProduct && !$checkExistingReview)
                        <form action="{{route('user.product.rating', $productDetails->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wrapper">
                                        <input name="star" type="radio" id="st1" value="5"/>
                                        <label for="st1"></label>
                                        <input name="star" type="radio" id="st2" value="4"/>
                                        <label for="st2"></label>
                                        <input name="star" type="radio" id="st3" value="3"/>
                                        <label for="st3"></label>
                                        <input name="star" type="radio" id="st4" value="2"/>
                                        <label for="st4"></label>
                                        <input name="star" type="radio" id="st5" value="1"/>
                                        <label for="st5"></label>

                                        @error('star')
                                          <p class="text-danger">@lang($message)</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control bg-transparent text-light" rows="5" cols="3"
                                                  name="feedback" id="feedback"
                                                  placeholder="@lang('Enter Feedback')"></textarea>

                                        @error('feedback')
                                          <span class="text-danger">@lang($message)</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="media">
                                            <div class="media-body d-flex flex-row">
                                                <div>
                                                    @if(isset(auth()->user()->image))
                                                        <img class="mr-3 rounded-circle d-inline reviewer-profile"
                                                             src="{{getFile(config('location.user.path').auth()->user()->image)}}"
                                                             alt=@lang('user image')>
                                                    @else
                                                        <img class="mr-3 rounded-circle d-inline reviewer-profile"
                                                             src="{{getFile(config('location.default'))}}"
                                                             alt=@lang('user image')>
                                                    @endif
                                                </div>

                                                <div>
                                                    @if(isset(auth()->user()->username))
                                                        <h6 class="mt-4 text-white d-block">@lang(auth()->user()->username)</h6>
                                                    @else
                                                        <h6 class="mt-4 text-white d-block">@lang("User's name here")</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-lg text-light review-button">{{trans('Submit')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    @endif

                    <div class="row mt-5">
                        @foreach ($review as $data)
                            <div class="col-md-12 mt-3">
                                <div class="testimonial-review-wrap">
                                    <div class="testimonial-review">
                                        <p>@lang($data->feedback)</p>
                                    </div>
                                    <cite class="testimonial-review-author">
                                        <span class="float-left">
                                            <img class="mr-3 rounded-circle d-inline w-50px"
                                                 src="{{getFile(config('location.user.path').optional($data->user)->image)}}"
                                                 alt=@lang('user image') >
                                        </span>
                                        <span class="name">
                                            <strong>@lang(optional($data->user)->username)</strong>
                                            <p class="pt-2 base">{{ \Carbon\Carbon::parse($data->created_at)->diffForhumans() }}</p>
                                        </span>
                                        <span class="stars float-right">
                                            @for($i = 1; $i <= $data->star; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($i = $data->star; $i < 5; $i++)
                                                <i class="fa fa-star star-blank"></i>
                                            @endfor
                                        </span>
                                    </cite>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </section>

    @if(0 < count($products))
        <section class="related-products">
            <div class="container">
                <div class="related-products-content">
                    <h1 class="text-40 font-mont bold white bar-horizontal left">@lang('Related Product')</h1>
                    <div class="reladet-products-slider row">
                        @forelse ($products as $product)
                            <div class="col-md-4">
                                <div class="product-card wow fadeInUp" data-wow-delay=".0s" data-wow-offset="200">
                                    <div class="product-image">
                                        <img src="{{ getFile(config('location.product.path').@$product->image[0]) }}"
                                             alt=@lang('product image')>
                                        <div class="product-label {{$product->details->tag ? 'show' : ''}}">
                                            <p>@lang($product->details->tag)</p>
                                        </div>
                                        <div class="overlayer">
                                            <a href="{{route('shopDetails',[slug(optional($product->details)->title??'item details'),$product->id])}}">
                                                <i class="icofont-eye-alt"></i>
                                            </a>
                                            <div class="popup-product-item">
                                                <a href="{{ getFile(config('location.product.path').@$product->image[0]) }}"
                                                   class="popup-product-image">
                                                    <i class="icofont-search-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div>
                                            <a href="{{route('shopDetails',[slug(optional($product->details)->title??'item details'),$product->id])}}">
                                                <p class="text-18 font-mont font-weight-bold base product-name">@lang(@$product->details->title)</p>
                                            </a>
                                            <h5 class="white">{{ $basic->currency_symbol ?? '$' }}@lang($product->price)</h5>
                                        </div>
                                        <p class="product-type text-14 font-open font-weight-light white">@lang('Photo')</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>@lang('Sorry! No item available for Shop at this moment')</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection


@push('extra-content')
    <!-- Plan-Purchase-Modal -->
    <div class="modal fade" id="productPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="productPurchaseTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark p-4">
                <div class="modal-body">
                    <form class="login-form" id="invest-form" action="{{route('user.purchase-product')}}" method="post">
                        @csrf
                        <div class="signin">
                            <h2 class="text-white text-center mb-30 product-name"></h2>
                            <p class="text-white text-center product-price p-4 text-22"></p>
                            <input type="hidden" name="checkout" value="checkout">
                            <input type="hidden" name="product_id" class="product-id">
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


@push('extra-js')
    <script src="{{asset($themeTrue.'js/jssocials.min.js')}}"></script>
@endpush


@push('script')

    <script>
        "use strict";
        var logID = 'log',
            log = $('<div id="' + logID + '"></div>');
        $('body').append(log);
        $('[type*="radio"]').change(function () {
            var me = $(this);
            log.html(me.attr('value'));
        });
    </script>

    <script>
        "use strict";
        (function ($) {
            $(document).on('click', '.purchaseNow', function () {
                $("#productPurchaseModal").toggleClass("modal-open");
                let data = $(this).data('resource');
                let price = $(this).data('price');

                let symbol = "{{trans($basic->currency_symbol)}}";

                $('.product-price').text(`@lang('Price'): ${symbol}${price}`);

                $('.product-name').text(data.title);
                $('.product-id').val(data.product_id);
            });
        })(jQuery);

    </script>


    @if(count($errors) > 0 )
        <script>
            @foreach($errors->all() as $key => $error)
            Notiflix.Notify.Failure("@lang($error)");
            @endforeach
        </script>
    @endif


    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            shares: [
                {
                    share: "email",
                    logo: "icofont-email"
                },
                {
                    share: "twitter",
                    logo: "icofont-twitter"
                },
                {
                    share: "facebook",
                    logo: "icofont-facebook"
                },
                {
                    share: "googleplus",
                    logo: "icofont-google-plus"
                },
                {
                    share: "linkedin",
                    logo: "icofont-linkedin"
                },
                {
                    share: "pinterest",
                    logo: "icofont-pinterest"
                },
                {
                    share: "stumbleupon",
                    logo: "icofont-stumbleupon"
                },
                {
                    share: "whatsapp",
                    logo: "icofont-whatsapp"
                },
            ]
        });
    </script>

    <script>
        var user_id = "{{ Auth::id() }}";
        $(document).ready(function () {
            $(document).on('click', '.update_wishlist', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = "{{$productDetails->id}}"
                $.ajax({
                    type: 'GET',
                    url: "{{  url('/add/wishlist/') }}/" + product_id,
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        user_id: user_id,
                    },
                    success: function (response) {
                        // console.log(response);
                        if (response.action == 'add') {
                            $('.update_wishlist').html(`<i class="fas fa-heart text-dark"></i>`);
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', "{{config('basic.base_color')}}");
                            $('#notifDiv').text(response.message);
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 2000);
                        } else if (response.action == 'remove') {
                            $('.update_wishlist').html(`<i class="far fa-heart"></i>`);
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', "{{config('basic.base_color')}}");
                            $('#notifDiv').text(response.message);
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 2000);
                        } else if (response.action == 'signin') {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', "{{config('basic.base_color')}}");
                            $('#notifDiv').text(response.message);
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 2000);
                        }
                    }
                })
            });
        });
    </script>
@endpush
