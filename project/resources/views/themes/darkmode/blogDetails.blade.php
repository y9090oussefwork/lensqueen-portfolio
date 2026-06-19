@extends($theme.'layouts.app')
@section('title',trans('Blog Details'))

@push('css-lib')
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jssocials.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jssocials-theme-minima.css')}}">
@endpush
@push('style')
    <style>
        .jssocials-share-link { border-radius: 50%; }
    </style>
@endpush

@section('content')

    <!-- BLOG -->
    <div class="blog-details-page">
        <div class="blog-post-body">
            <div class="container">
                <div class="blog-post-content">
                    <div class="row">
                        <div class="col-lg-9 offset-1">
                            <div class="blog-post-main">
                                <div class="blog-details">
                                    <h1 class="blog-heading font-mont text-36 font-weight-bold white">@lang($singleItem['title'])</h1>
                                    <p class="date text-14 font-open font-weight-light base">{{$singleItem['date']}}</p>
                                    <div class="blog-details-image wow fadeInUp" data-wow-delay=".2s" data-wow-offset="400">
                                        <img src="{{$singleItem['image']}}" alt="@lang('Blog Details Image')">
                                    </div>
                                    <div class="blog-description">
                                        <div class="paragraph wow fadeInUp" data-wow-delay=".2s" data-wow-offset="70">
                                            <p>@lang($singleItem['description'])</p>
                                        </div>
                                        <div class="share pt-4">
                                            <p class="text-uppercase">@lang('Share this blog post :')
                                                <span id="share"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="recent-post">
                                <h3 class="recent-heading text-24 font-mont medium white">{{trans('Recent Posts')}}</h3>
                                <div class="row">
                                    @if(isset($popularContentDetails['blog']))
                                        @foreach($popularContentDetails['blog']->sortDesc()->shuffle() as $data)
                                            <div class="col-md-6 wow fadeInUp" data-wow-delay=".2s" data-wow-offset="200">
                                                <a href="{{route('blogDetails', [$data->content_id,slug(@$data->description->title)])}}" class="recent-blog">
                                                    <div class="recent-post-image">
                                                        <img src="{{getFile(config('location.content.path').'thumb_'.@$data->content->contentMedia->description->image)}}" alt="@lang(@$data->description->title)">
                                                    </div>
                                                    <div class="recent-post-description">
                                                        <h4 class="font-mont text-20 medium white">@lang(\Illuminate\Support\Str::limit(strip_tags(@$data->description->title),30))</h4>
                                                        <div class="paragraph">
                                                            <p class="text-14 font-open font-weight-light white">@lang(Illuminate\Support\Str::limit(strip_tags(@$data->description->description),150))</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /BLOG -->

@endsection



@push('extra-js')
    <script src="{{asset($themeTrue.'js/jssocials.min.js')}}"></script>
@endpush
@push('script')
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            // shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            shares: [
                {
                    share: "email",
                    logo: "icofont-email"
                },
                {
                    share: "twitter",
                    logo: "icofont-twitter"
                },
                {
                    share: "facebook",
                    logo: "icofont-facebook"
                },
                {
                    share: "googleplus",
                    logo: "icofont-google-plus"
                },
                {
                    share: "linkedin",
                    logo: "icofont-linkedin"
                },
                {
                    share: "pinterest",
                    logo: "icofont-pinterest"
                },
                {
                    share: "stumbleupon",
                    logo: "icofont-stumbleupon"
                },
                {
                    share: "whatsapp",
                    logo: "icofont-whatsapp"
                },
            ]
        });
    </script>
@endpush
