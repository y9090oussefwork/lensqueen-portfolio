@extends($theme.'layouts.app')
@section('title',trans($title))

@section('content')
    <!-- CONTACT -->
    <section class="contact-page">
        <section class="contact-main">
            <div class="container">
                <div class="contact-body">
                    <h5 class="text-14 font-mont font-weight-bold base text-uppercase">@lang('Location')</h5>
                    <h1 class="text-40 font-mont font-weight-bold white bar-horizontal bar-left">@lang(@$contact->title) @lang('Info')</h1>
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay=".2s" data-wow-offset="400">
                            <div class="contact-wrapper">

                                <div class="paragraph">
                                    <p class="text-14 white font-opne font-weight-light">@lang(@$contact->footer_short_details)</p>
                                </div>
                                <div class="contact-info">
                                    <div class="phone media">
                                        <i class="icofont-phone"></i>
                                        <p class="font-open text-14 white font-weight-light">@lang(@$contact->phone)</p>
                                    </div>
                                    <div class="mail media">
                                        <i class="icofont-envelope"></i>
                                        <p class="font-open text-14 white font-weight-light">@lang(@$contact->email)</p>
                                    </div>
                                    <div class="address media">
                                        <i class="icofont-location-pin"></i>
                                        <p class="font-open text-14 white font-weight-light"> @lang(@$contact->address)</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay=".4s" data-wow-offset="400">
                            <div class="send-massage">
                                <form action="{{route('contact.send')}}" method="post" class="send-massage-form">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="@lang('Full Name')" >
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input name="email" value="{{old('email')}}" type="email" class="form-control" id="email" placeholder="@lang('Email')">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input name="subject" value="{{old('subject')}}" type="text" class="form-control" id="subject" placeholder="@lang('Subject')">
                                            @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="1" name="message" id="massage" placeholder="@lang('Message')">{{old('message')}}</textarea>
                                        @error('message')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="send-massage-button">
                                        <button type="submit" class="cmn--btn">{{trans('Send Message')}}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-12 wow fadeInUp" data-wow-delay=".2s" data-wow-offset="300">
                            <div class="map">
                                <iframe src="@lang(@$contact->map_embed_link)" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- /CONTACT -->
@endsection

