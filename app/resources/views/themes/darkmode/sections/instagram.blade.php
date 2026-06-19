@if(isset($templates['instagram'][0]) && $instagram = $templates['instagram'][0])
    <section class="instagram {{ request()->routeIs('services') ? 'pt-0' : '' }}">
        <div class="container">
            <div class="instragram-content">
                <h5 class="text-14 font-mont font-weight-bold base text-uppercase text-center">@lang(@$instagram['description']->title)</h5>
                <h1 class="text-40 font-mont font-weight-bold white text-center text-capitalize bar-horizontal bar-center">@lang(@$instagram['description']->sub_title)</h1>
                <div class="instagram-photos popup-insta wow fadeInUp" data-wow-delay=".2s" data-wow-offset="200">
                    <a href="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_one)}}" class="insta-image"><img src="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_one)}}" alt="@lang("instagram's photo one")"></a>
                    <a href="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_two)}}" class="insta-image"><img src="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_two)}}" alt="@lang("instagram's photo two")"></a>
                    <a href="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_three)}}" class="insta-image"><img src="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_three)}}" alt="@lang("instagram's photo three")"></a>
                    <a href="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_four)}}" class="insta-image"><img src="{{getFile(config('location.content.path').@$instagram->templateMedia()->image_four)}}" alt="@lang("instagram's photo four")"></a>
                </div>
                <a href="{{@$instagram->templateMedia()->button_link}}" target="_blank">
                    <button class="follow-on-insta white text-14"><i class="{{$instagram->templateMedia()->button_icon}}"></i><span class="font-open text-uppercase font-weight-normal pl-2"> @lang(@$instagram['description']->button_name)</span></button>
                </a>

            </div>
        </div>
    </section>
@endif
