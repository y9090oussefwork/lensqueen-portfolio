<div class="home">
    <section class="home-header ">
        @if(isset($contentDetails['social']))
            <div class="social-links">
                <ul class="social-icon" >
                    @foreach($contentDetails['social'] as $data)
                        <li class="">
                            <a href="{{@$data->content->contentMedia->description->link}}" target="_blank">
                                <i class="{{@$data->content->contentMedia->description->icon}}"></i><span class="text-r text-14 font-open regualr"> {{@$data->description->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($templates['hero'][0]) && $hero = $templates['hero'][0])
            <div class="container">
                <div class="banner-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="gradient-text text-58 font-mont bold">@lang(@$hero['description']->title)</h1>
                            <div class="paragraph">
                                <p class="regualr pt-0 font-open text-18 bar-vertical">@lang(@$hero['description']->short_description)</p>
                            </div>
                            <a href="{{@$hero->templateMedia()->button_link}}" class="book-button text-14 text-white semi-bold font-mont uppercase">
                                @lang(@$hero['description']->button_name)
                            </a>
                        </div>
                    </div>
                    <div class="banner-image">
                        <div class="d-flex">
                            <div class="hero-image-2 wow fadeInUp" data-wow-offset="200">
                                <img src="{{getFile(config('location.content.path').@$hero->templateMedia()->image_top)}}" alt="@lang('hero image top')">
                            </div>
                        </div>
                        <div class="d-flex  justify-content-end">
                            <div class="hero-image-1 wow fadeInUp" data-wow-delay=".3s" data-wow-offset="200">
                                <img src="{{getFile(config('location.content.path').@$hero->templateMedia()->image_bottom)}}" alt="@lang('hero image bottom')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>
