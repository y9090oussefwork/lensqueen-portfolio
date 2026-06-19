@if(!request()->routeIs('home'))
    @if(isset($templates['testimonial'][0]) && $testimonial = $templates['testimonial'][0])
        @push('style')
            <style>
                .testimonial{
                    background-image:linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url({{getFile(config('location.content.path').@$testimonial->templateMedia()->image)}});
                }
            </style>
        @endpush
    @endif
@endif

@if(isset($contentDetails['testimonial']))
<section class="testimonial {{ request()->routeIs('about') ? 'pt-0' : '' }} {{ request()->routeIs('services') ? 'pt-0' : '' }}">
    <div class="container">
        <div class="testimonial-content">
            <div class="testimonial-slider row">
                    @foreach($contentDetails['testimonial'] as $key=>$data)
                        <div class="col-md-6">
                            <div class="testimonial-card wow fadeInLeft" data-wow-delay=".2s" data-wow-offset="300">
                                <p class="review text-color2">@lang(@$data->description->description)</p>
                                <div class="client-profile">
                                    <div class="client-image">
                                        <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}" alt="@lang('testimonial image')">
                                    </div>
                                    <div class="client-body">
                                        <p class="client-name font-mont text-14 font-weight-bold white"> @lang(@$data->description->name)</p>
                                        <div class="rating">
                                            @for($i = 1; $i <= $data->description->review; $i++)
                                                <i class="icofont-star"></i>
                                            @endfor
                                            @for($i = $data->description->review; $i < 5; $i++)
                                                <i class="icofont-star star-blank"></i>
                                            @endfor
                                        </div>
                                        <p class="text-12 font-open font-weight-regular text-color4">@lang(@$data->description->designation)</p>
                                    </div>
                                </div>
                                <div class="quote-mark">
                                    <i class="icofont-quote-right text-24"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>
</section>
@endif

