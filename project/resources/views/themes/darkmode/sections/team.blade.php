@if(isset($templates['team'][0]) && $team = $templates['team'][0])
    <section class="our-team">
        <div class="container">
            <div class="our-team-content">
                <h5 class="text-14 font-weight-bold base text-uppercase font-mont">@lang(@$team->description->title)</h5>
                <h1 class="text-40 bar-horizontal white font-weight-bold font-mont">@lang(@$team->description->sub_title)</h1>

                @if(isset($contentDetails['team']))
                    <div class="team-members">
                        <div class="row">
                            @foreach($contentDetails['team'] as $item)
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div class="member-card wow fadeInUp" data-wow-delay=".3s"
                                             data-wow-offset="300">
                                            <div class="member-image">
                                                <img
                                                    src="{{getFile(config('location.content.path').@$item->content->contentMedia->description->image)}}"
                                                    alt="@lang('team member image')">
                                                <div class="member-name">
                                                    <p class="text-16 font-open white vertical-text font-weight-normal">@lang(@$item->description->name)</p>
                                                </div>

                                            </div>
                                            <p class="text-24 font-open font-weight-normal white designation">@lang(@$item->description->designation)</p>
                                            <ul class="profile-links">
                                                @if($item->description->dribbble)
                                                    <li class="link">
                                                        <a href="@lang(@$item->description->dribbble)" target="_blank">
                                                            <i class="icofont-dribbble"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($item->description->behance)
                                                    <li class="link">
                                                        <a href="@lang(@$item->description->behance)" target="_blank">
                                                            <i class="icofont-behance"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($item->description->instagram)
                                                    <li class="link">
                                                        <a href="@lang(@$item->description->instagram)" target="_blank">
                                                            <i class="icofont-instagram"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($item->description->flikr)
                                                    <li class="link">
                                                        <a href="@lang(@$item->description->flikr)" target="_blank">
                                                            <i class="icofont-flikr"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($item->description->facebook)
                                                    <li class="link">
                                                        <a href="@lang(@$item->description->facebook)" target="_blank">
                                                            <i class="icofont-facebook"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
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
