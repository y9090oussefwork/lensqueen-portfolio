<section class="skills-and-equip">
    <div class="container">
        <div class="skills-and-equip-content">
            <div class="row">

                @if(isset($templates['skills'][0]) && $skills = $templates['skills'][0])
                    <div class="col-md-7">
                        <div class="skills wow fadeInUp" data-wow-delay=".2s">
                            <h5 class="font-mont text-14 font-weight-bold text-uppercase base">@lang(@$skills->description->title)</h5>
                            <h1 class="font-mont text-40 font-weight-bold white bar-horizontal text-capitalize">@lang(@$skills->description->sub_title)</h1>
                            @if(isset($contentDetails['skills']))
                                <div class="skills-bar">
                                    @foreach($contentDetails['skills'] as $key => $item)
                                        <div>
                                            <h4 class="text-16 font-mont font-weight-bold white">@lang(@$item->description->name)</h4>
                                            <div id="skill-bar-{{$key}}" class="skill-progress-bar"
                                                 data-percent="{{$item->description->percentage}}"></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif


                @if(isset($templates['equipment'][0]) && $equipment = $templates['equipment'][0])
                    <div class="col-md-5">
                        <div class="equipment wow fadeInUp" data-wow-delay=".1s">
                            <h5 class="font-mont text-14 font-weight-bold text-uppercase base">@lang(@$equipment->description->title)</h5>
                            <h1 class="font-mont text-40 font-weight-bold white bar-horizontal text-capitalize">@lang(@$equipment->description->sub_title)</h1>
                            @if(isset($contentDetails['equipment']))
                                @foreach($contentDetails['equipment'] as $item)
                                    <ul class="equipment-list">
                                        <li class="equipment-item"><p>@lang(@$item->description->item)</p></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

@push('script')
    <script>
        "use strict";
        $(document).ready(function () {
            $('.skill-progress-bar').each(function (key, value) {
                $('#skill-bar-' + key).LineProgressbar({
                    percentage: $(value).data('percent'),
                    duration: 3000
                });
            })
        });
    </script>
@endpush
