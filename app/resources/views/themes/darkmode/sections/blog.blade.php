@if(isset($contentDetails['blog']))
    <section class="blog">
        <div class="container">
            <div class="blog-content">
                @if(isset($templates['blog'][0]) && $blog = $templates['blog'][0])
                    <h5 class="text-14 bold text-center base text-uppercase">@lang(@$blog->description->title)</h5>
                    <h1 class="text-40 text-center bold white bar-horizontal bar-center">@lang(@$blog->description->sub_title)</h1>
                @endif

                <div class="row ">
                    @foreach($contentDetails['blog']->take(3)->sortDesc() as $data)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href="{{route('blogDetails', [$data->content_id,slug(@$data->description->title)])}}"
                               class="blog-card wow fadeInUp " data-wow-delay=".1s" data-wow-offset="300">
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
                                        class="blog-heading text-20 font-mont white font-weight-bold">@lang(\Illuminate\Support\Str::limit(@$data->description->title,25))</div>
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
@endif

