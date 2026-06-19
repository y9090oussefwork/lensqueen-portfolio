@if(request()->routeIs('home'))
    <section class="services">
        <div class="container">
            <div class="services-content">
                @if(isset($templates['services'][0]) && $services = $templates['services'][0])
                    <h5 class="text-14 font-mont base bold uppercase">@lang(@$services->description->title)</h5>
                    <h1 class="text-40 font-mont bold white bar-horizontal left text-capitalize">@lang(@$services->description->sub_title)</h1>
                @endif
                @if(isset($contentDetails['services']))
                    <div class="services-slider">
                        @foreach($contentDetails['services'] as $data)
                            <div class="d-flex wow fadeInUp" data-wow-offset="300" data-wow-delay="1">
                                <div class="service-item">
                                    <div class="service-card">
                                        <div class="service-image">
                                            <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}" alt="@lang('service image')">
                                        </div>
                                        <div class="service-detail">
                                            <p class="text-14 font-open regualr text-color1 text-right">@lang(@$data->description->name)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@else
    <section class="services-page services">
        <div class="container">
            <div class="services-content">
                @if(isset($templates['services'][0]) && $services = $templates['services'][0])
                    <h5 class="text-14 font-mont base bold uppercase text-center">@lang(@$services->description->title)</h5>
                    <h1 class="text-40 font-mont bold white bar-horizontal text-center bar-center">@lang(@$services->description->sub_title)</h1>
                @endif
                @if(isset($contentDetails['services']))
                    <div class="services-body">
                        <div class="row">
                            @foreach($contentDetails['services'] as $data)
                                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                    <div class="service-item wow fadeInUp" data-wow-delay=".1s" data-wow-offset="200">
                                        <div class="service-card">
                                            <div class="service-image">
                                                <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}" alt="@lang('service image')">
                                            </div>
                                            <div class="service-detail">
                                                <p class="text-14 font-open regualr text-color1 text-right">@lang(@$data->description->name)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
