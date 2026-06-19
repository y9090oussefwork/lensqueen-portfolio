@if(isset($contentDetails['statistics']))
    <div class="about-me {{ request()->routeIs('services') ? 'service-padding-top' : '' }}">
        <div class="container">
            <div class="counters wow fadeInUp" data-wow-dealy=".2s" data-wow-offset="100" id="counters_1">
                @foreach($contentDetails['statistics'] as $item)
                    <div class="counter-card">
                        <p class="text-48 font-mont bold base text-center counter" data-TargetNum="@lang(@$item->description->number)">@lang(@$item->description->number)</p>
                        <p class="text-16 font-mont-font-weight-regular white text-center">@lang(@$item->description->title)</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
