@extends($theme.'layouts.user')
@section('title')
    @lang('My Booking Request Form')
@endsection

@section('content')

    <section id="dashboard" class="py-5 pb-0">
        <div class="feature-wrapper">
            <div class="container py-5 pb-0">
                <div class="row justify-content-center py-5 pb-0">
                    <div class="col-md-12">

                        <div class="card bg-booking">
                            <div class="card-header text-center border-white">
                                <h5 class="card-title text-white text-22 p-3">@lang('Additional Information')</h5>
                            </div>

                            <div>
                                @if ($fundInfo->booking_info != null)
                                    <div class="card-body">
                                        <form action="#" method="post" enctype="multipart/form-data"
                                              class="form-row text-left preview-form">
                                            @csrf
                                            @if($fundInfo->booking_info)
                                                @foreach($fundInfo->booking_info as $k => $v)
                                                    @if($v->type == "text")
                                                        <div class="col-md-12">
                                                            <div class="form-group  mt-2">
                                                                <label
                                                                    class="text-white text-16"><strong> {{trans($v->field_level)}}</strong>
                                                                </label>
                                                                <input type="text" name="{{$k}}"
                                                                       value="{{$v->field_value}}"
                                                                       class="form-control bg-transparent text-white py-4 text-16"
                                                                       readonly>
                                                            </div>
                                                        </div>
                                                    @elseif($v->type == "textarea")
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label
                                                                    class="text-white text-16"><strong>{{trans($v->field_level)}}</strong></label>
                                                                <textarea name="{{$k}}"
                                                                          class="form-control bg-transparent text-16 text-white"
                                                                          rows="3"
                                                                          readonly> {{$v->field_value}} </textarea>
                                                            </div>
                                                        </div>
                                                    @elseif($v->type == "file")

                                                        <div class="col-md-4">
                                                            <label
                                                                class="text-white text-16"><strong>{{trans($v->field_level)}}</strong>
                                                            </label>

                                                            <div class="form-group mt-2">
                                                                <div class="fileinput fileinput-new "
                                                                     data-provides="fileinput">
                                                                    <div
                                                                        class="fileinput-new thumbnail bookingForm-thumbnail"
                                                                        data-trigger="fileinput">
                                                                        <img class="w-150px"
                                                                             src="{{getFile(config('location.bookingFrom.path').$v->field_value)}}"
                                                                             alt="@lang('Booking form image')">
                                                                    </div>
                                                                    <div
                                                                        class="fileinput-preview fileinput-exists thumbnail wh-200-150">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </form>
                                    </div>
                                @endif
                            </div>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection



@push('css-lib')
    <link rel="stylesheet" href="{{asset($themeTrue.'css/bootstrap-fileinput.css')}}">
@endpush

@push('extra-js')
    <script src="{{asset($themeTrue.'js/bootstrap-fileinput.js')}}"></script>
@endpush

@push('script')

@endpush

