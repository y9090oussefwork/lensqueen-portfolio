@extends($theme.'layouts.app')
@section('title',trans($title))

@section('content')
    <section class="shop pb-5">
        <div class="container pb-5">
            <div class="shop-body">
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
                            <div class="product-card" >
                                <div class="product-image">
                                    <img src="{{ getFile(config('location.product.path').@$product->thumb) }}" alt=@lang('product image')>
                                    <div class="product-label {{@$product->details->tag ? 'show' : ''}}">
                                        <p>@lang(@$product->details->tag)</p>
                                    </div>
                                    <div class="overlayer">
                                        <a href="{{route('shopDetails',[slug(optional($product->details)->title??'item details'),$product->id])}}">
                                            <i class="icofont-eye-alt"></i>
                                        </a>
                                        <div class="popup-product-item">
                                            <a href="{{ getFile(config('location.product.path').@$product->thumb) }}" class="popup-product-image">
                                                <i class="icofont-search-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div>
                                        <a href="{{route('shopDetails',[slug(optional($product->details)->title??'item details'),$product->id])}}">
                                            <p class="text-18 font-mont font-weight-bold base product-name">@lang(optional($product->details)->title)</p>
                                        </a>
                                        <h5 class="white">{{ $basic->currency_symbol ?? '$' }}@lang($product->price)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>@lang('Sorry! No item available for Shop at this moment')</p>
                    @endforelse
                </div>
                <!-- Make a condition for no pagination add class 'd-none' -->
                <button class="more-button center">
                    <span>{{ $products->links('themes.darkmode.pagination.custom-prev-next-pagination') }}</span>
                </button>
                <!-- Make a condition for no pagination add class 'd-none' -->
            </div>
        </div>
    </section>
@endsection
