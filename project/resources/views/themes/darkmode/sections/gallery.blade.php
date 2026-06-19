@if(request()->routeIs('gallery'))
    @push('style')
    <style>
        .portfolio {
            background-color: #000000;
        }
    </style>
    @endpush
@endif

<section class="portfolio">
    <div class="container">
        <div class="portfolio-content">
            @if(request()->routeIs('home'))
                @if(isset($templates['gallery'][0]) && $gallery = $templates['gallery'][0])
                    <h5 class="text-14 bold uppercase font-mont base text-center">@lang(@$gallery->description->title)</h5>
                    <h1 class="text-40 bold white font-mont bar-horizontal bar-center text-center mt-0 text-capitalize">@lang(@$gallery->description->sub_title)</h1>
                @endif
            @else
                @if(isset($templates[0]) && $gallery = $templates[0])
                    <h5 class="text-14 bold uppercase font-mont base text-center">
                        @lang($gallery->description->title)
                    </h5>
                    <h1 class="text-40 bold white font-mont bar-horizontal bar-center text-center mt-0 text-capitalize">
                        @lang($gallery->description->sub_title)
                    </h1>
                @endif
            @endif


            <ul class="gallery-nav text-14 white font-mont regualr">
                <li class="item-name" data-filter="all">@lang('All')</li>
                @foreach ($tags as $data)
                    <li class="item-name" data-filter=".gallery-{{$data->id}}">@lang($data->name)</li>
                @endforeach
            </ul>
            <div class="portfolio-gallery">
                <div class="gallery-body popup-gallery">
                    @if(request()->routeIs('home'))
                        @foreach ($galleries->take(11) as $data)
                            <div class="mix gallery-item gallery-{{$data->tag_id??0}} wow fadeInUp" data-wow-delay=".1s"
                                 data-wow-offset="100">
                                <a href="{{getFile(config('location.gallery.path').$data->image)}}" class="popup-image">
                                    <img src="{{getFile(config('location.gallery.path').$data->image)}}"
                                         class="gallery-image" alt="@lang('gallery image')">
                                    <div class="icon"></div>
                                    <div class="overlayer">
                                        <p class="text-60 font-mont white light">+</p>
                                        <div class="image-label">
                                            <p class="text-22 font-mont medium white">@lang(@$data->tag->name)</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        @foreach ($galleries as $data)
                            <div class="mix gallery-item gallery-{{$data->tag_id}} wow fadeInUp" data-wow-delay=".1s"
                                 data-wow-offset="100">
                                <a href="{{getFile(config('location.gallery.path').$data->image)}}" class="popup-image">
                                    <img src="{{getFile(config('location.gallery.path').$data->image)}}"
                                         class="gallery-image" alt="@lang('gallery image')">
                                    <div class="icon"></div>
                                    <div class="overlayer">
                                        <p class="text-60 font-mont white light">+</p>
                                        <div class="image-label">
                                            <p class="text-22 font-mont medium white">@lang(@$data->tag->name)</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

            @if(request()->routeIs('home'))
                <div class="home-gallery-more" >
                    <a href="{{route('gallery')}}" class="more-button mt-5" aria-disabled="true">
                    <span class="next-pagination">
                        <span class="hover-pagination-next">@lang('See more')</span>
                        <svg class="svg-next">
                            <circle class="circle-next" cx="22" cy="24" r="23"></circle>
                        </svg>
                    </span>
                    </a>
                </div>
            @endif

        </div>
    </div>
</section>
