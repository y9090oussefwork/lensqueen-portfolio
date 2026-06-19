@if(isset($templates['about-us'][0]) && $aboutUs = $templates['about-us'][0])
    <section class="about">
        <div class="container">
            <div class="about-content" >
                <div class="row">
                    <div class="col-lg-6 about-image-col">
                        <div class="d-flex wow fadeInUp" data-wow-delay=".3s" data-wow-offset="300" >
                            <div class="about-image">
                                <img src="{{getFile(config('location.content.path').@$aboutUs->templateMedia()->image)}}" alt="@lang("about image")">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 .col-md-12">
                        <div class="shape-outside"></div>
                        <div class="about-text wow fadeInUp" data-wow-delay=".1s" data-wow-offset="200">
                            <h5 class="text-14 bold uppercase font-mont base">@lang(@$aboutUs->description->title)</h5>
                            <h1 class="text-40 bold gradient-text font-mont bar-horizontal">@lang(@$aboutUs->description->sub_title)</h1>
                            <div class="paragraph mt-4">
                                <p class="text-16 white font-open light">@lang(@$aboutUs->description->short_description)</p>
                            </div>
                            @if(request()->routeIs('home'))
                                <a href="{{route('about')}}" class="more-button" aria-disabled="true">
                                    <span class="next-pagination">
                                        <span class="hover-pagination-next">@lang('Read more')</span>
                                        <svg class="svg-next">
                                            <circle class="circle-next" cx="22" cy="24" r="23"></circle>
                                        </svg>
                                    </span>
                                </a>
                            @else
                                @if(isset($contentDetails['social']))
                                    <ul class="profile-links">
                                        @foreach($contentDetails['social'] as $data)
                                        <li class="link">
                                            <a href="{{@$data->content->contentMedia->description->link}}" target="_blank">
                                                <i class="{{@$data->content->contentMedia->description->icon}}"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
