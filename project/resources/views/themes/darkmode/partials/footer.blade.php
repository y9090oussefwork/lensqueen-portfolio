<section class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="up-coming-event">
                @if(isset($templates['contact-us'][0]) && $contact = $templates['contact-us'][0])
                    <h2 class="text-30 font-open font-weight-normal white bar-horizontal bar-left">
                        @lang(strip_tags(@$contact->description->heading))
                    </h2>
                @endif
                <div class="date" id="datepicker-footer"></div>
            </div>
            <div class="about-fotografia">
                @if(isset($templates['contact-us'][0]) && $contact = $templates['contact-us'][0])
                    <h2 class="text-30 font-open bold white bar-horizontal bar-left text-capitalize">@lang(strip_tags(@$contact->description->sub_heading))</h2>
                    <div class="paragraph">
                        <p class="font-open text-14 font-weight-normal text-white">
                            @lang(strip_tags(@$contact->description->footer_short_details))
                        </p>
                    </div>
                @endif

                @if(isset($contentDetails['social']))
                    <div class="social-links-footer ">
                        <ul >
                            @foreach($contentDetails['social'] as $data)
                                <li>
                                    <a class="white" href="{{@$data->content->contentMedia->description->link}}" target="_blank">
                                        <i class="{{@$data->content->contentMedia->description->icon}}"></i><span class="text-r text-12 font-open regular"> {{@$data->description->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="footer-contact">
                @if(isset($templates['contact-us'][0]) && $contact = $templates['contact-us'][0])
                    <h2 class="text-30 font-open font-weight-normal white bar-horizontal bar-left">@lang(strip_tags(@$contact->description->title))</h2>
                    <ul class="font-open text-14 font-weight-normal white">
                        <li> <span >@lang(strip_tags(@$contact->description->address))</span></li>
                        <li><i class="icofont-phone"></i> <span>@lang(strip_tags(@$contact->description->phone))</span></li>
                        <li><i class="icofont-ui-message"></i> <span>@lang(strip_tags(@$contact->description->email))</span></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="copy ">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 col-sm-12">

                <p class="text-14 font-open font-weight-normal white text-md-left text-center ">
                    @lang('Copyright') &copy; {{date('Y')}} @lang($basic->site_title) @lang('All Rights Reserved')
                </p>
            </div>
            <div class="col-md-6 col-sm-12">

                <div class=" mt-3 mt-md-0">
                    <ul class="d-flex flex-wrap flex-row justify-content-md-end justify-content-center ">
                        @foreach($languages as $data)
                            <li class="px-2">
                                <a class="white @if(session()->get('trans') == $data->short_name) activeLink @endif" href="{{route('language',$data->short_name)}}" ><span class="text-r text-14 font-open regular"> @lang($data->name)</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



@push('script')
    <script>
        $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#datepicker-footer').on('change', function() {
                    var pickedDate = $('#datepicker-footer').val();
                    window.location.href = "{{route('user.bookingDate')}}?date="+pickedDate;
                });
        });
  </script>
@endpush
