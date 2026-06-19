@extends($theme.'layouts.app')
@section('title', trans($title))

@section('content')

    @if(isset($contentDetails['blog']))
        <!-- BLOG -->
        <section class="blog1-page blog {{ request()->routeIs('blog') ? 'blog-page-bgcolor' : '' }}">
            <div class="container">
                <div class="blog-content">
                    <div class="row">
                        @foreach($contentDetails['blog'] as $data)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".1s" data-wow-offset="200">
                                <a href="{{route('blogDetails', [$data->content_id,slug(@$data->description->title)])}}"
                                   class="blog-card">
                                    <div class="blog-image">
                                        <img
                                            src="{{getFile(config('location.content.path').'thumb_'.@$data->content->contentMedia->description->image)}}"
                                            alt="@lang('blog image')">
                                        <div class="overlayer">
                                            <h3 class="text-14 font-mont white text-uppercase font-weight-light">@lang('Read More')</h3>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <div
                                            class="blog-heading text-24 font-mont white font-weight-bold">@lang(\Illuminate\Support\Str::limit(@$data->description->title,25))</div>
                                        <p class="text-14 font-open font-weight-light white">@lang(Illuminate\Support\Str::limit(strip_tags(@$data->description->description),120))</p>
                                    </div>

                                    <div class="flex flex-row justify-content-between like-comment">
                                        <div class="like media">
                                            <i class="icofont-user-alt-5 base text-14"></i>
                                            <span
                                                class="font-mont text-14 font-weight-light white">@lang(\Illuminate\Support\Str::limit(@$data->description->author,18))</span>
                                        </div>
                                        <div class="comment media">
                                            <div class="date media">
                                                <i class="icofont-calendar base text-12"></i>
                                                <span
                                                    class="font-mont text-13 font-weight-light text-light align-self-center">{{dateTime(@$data->created_at,'d-m-Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /BLOG -->

    @endif

@endsection
