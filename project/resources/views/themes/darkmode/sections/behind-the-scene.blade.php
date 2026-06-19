@if(isset($templates['behind-the-scene'][0]) && $behindTheScene = $templates['behind-the-scene'][0])
    <section class="behind-the-seen">
        <div class="container">
            <div class="behind-the-seen-content">
                <h5 class="text-14 bold text-center base text-uppercase">@lang(@$behindTheScene['description']->title)</h5>
                <h1 class="text-40 text-center bold white bar-horizontal bar-center">@lang(@$behindTheScene['description']->sub_title)</h1>
                <div class="paragraph">
                    <p class="text-14 white font-opne text-center">@lang(@$behindTheScene['description']->short_details)</p>
                </div>
                <div class="behind-the-seen-video wow fadeInUp" data-wow-delay=".2s" data-wow-offset="300">
                    <video
                        src="{{getFile(config('location.content.path').@$behindTheScene->templateMedia()->video)}}"></video>
                    <div class="controls">
                        <div class="play-button">
                            <button id="play-pause" class="play">
                                <i class="icofont-ui-play"></i>
                            </button>
                        </div>
                        <div class="video-progress-bar">
                            <div class="progress-bar-flag"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
