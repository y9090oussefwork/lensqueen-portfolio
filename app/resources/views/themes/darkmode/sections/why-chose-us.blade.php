<section class="choose">
    <div class="container">
        <div class="choose-content">
            @if(isset($templates['why-chose-us'][0]) && $whyChoseUs = $templates['why-chose-us'][0])
                <h1 class="text-40 text-center bold white bar-horizontal bar-center">@lang(@$whyChoseUs->description->title)</h1>
            @endif

            @if(isset($contentDetails['why-chose-us']))
                <div class="choose-items">
                    @foreach($contentDetails['why-chose-us'] as $item)
                        <div class="choose-card wow fadeInUp" data-wow-delay=".0s" data-wow-offset="200">
                            <div class="choose-icon">
                                <img src="{{getFile(config('location.content.path').@$item->content->contentMedia->description->image)}}" alt="@lang('image')">
                            </div>
                            <div class="choose-details">
                                <h4 class="text-18 font-mont font-weight-bold white text-center">@lang(@$item->description->title)</h4>
                                <p class="text-14 font-mont font-weight-light text-center white">@lang(@$item->description->information)</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
