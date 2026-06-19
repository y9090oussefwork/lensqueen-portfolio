<!-- TOPBAR | TOPBAR-LOGGEDIN -->
<section id="topbar" class="topbar-loggedin">
    <div class="{{Request::routeIs('user*') ? 'container-fluid' : 'container'}}">
        <div class="row">
            <div class="col-md-6">
                <div class="topbar-contact">
                    <div class="d-flex flex-wrap justify-content-between">
                        @if(isset($contactUs['contact-us'][0]) && $contact = $contactUs['contact-us'][0])
                            <ul class="topbar-contact-list d-flex justify-content-between justify-content-lg-start">
                                <li><i class="icofont-envelope"></i><span
                                        class="ml-5">@lang(@$contact->description->email)</span></li>
                                <li class="ml-sm-0 ml-20"><i class="icofont-android-tablet"></i><span
                                        class="ml-5">@lang(@$contact->description->phone)</span></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div
                    class="topbar-content d-flex align-items-center justify-content-between justify-content-md-end">

                    @if(isset($contentDetails['social']))
                        <div class="topbar-social">
                            @foreach($contentDetails['social'] as $k => $data)
                                <a @if($k == 0)class="pl-0" @endif href="{{@$data->content->contentMedia->description->link}}"><i class="{{@$data->content->contentMedia->description->icon}}"></i></a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /TOPBAR | TOPBAR-LOGGEDIN -->
