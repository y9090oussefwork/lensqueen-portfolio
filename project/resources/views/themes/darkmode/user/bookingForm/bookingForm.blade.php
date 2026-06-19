@extends($theme.'layouts.user')
@section('title')
    @lang('Booking Form')
@endsection

@section('content')


<section id="dashboard" class="py-5 pb-0">
    <div class="feature-wrapper">
        <div class="container py-5 pb-0">
            <div class="row justify-content-center py-5 pb-0">
                <div class="col-md-12">

                    <div class="card bg-booking">
                        <div class="card-header text-center border-white">
                            <h5 class="card-title text-white text-22 p-3">@lang('Information For Plan Confirmation')</h5>
                        </div>

                        <div>
                            @if ($fundInfo->booking_info == null)
                                <div class="card-body">
                                    <form action="{{route('user.booking.form.submit', $trx)}}" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                                        @csrf
                                        @if($bookingForm->booking_info)
                                            @foreach($bookingForm->booking_info as $k => $v)
                                                @if($v->type == "text")
                                                    <div class="col-md-12">
                                                        <div class="form-group  mt-2">
                                                            <label class="text-white text-16"><strong>{{trans($v->field_level)}} @if($v->validation == 'required')
                                                                <span class="text-danger">*</span>  @endif</strong>
                                                            </label>
                                                            <input type="text" name="{{$k}}"
                                                                    class="form-control bg-transparent text-white py-4 text-16"
                                                                    @if($v->validation == "required") required @endif>
                                                            @if ($errors->has($k))
                                                                <span
                                                                    class="text-danger">{{ trans($errors->first($k)) }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @elseif($v->type == "textarea")
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-white text-16"><strong>{{trans($v->field_level)}} @if($v->validation == 'required')
                                                                <span class="text-danger">*</span>  @endif </strong>
                                                            </label>
                                                            <textarea name="{{$k}}" class="form-control bg-transparent text-16 text-white" rows="3" @if($v->validation == "required") required @endif></textarea>
                                                            @if ($errors->has($k))
                                                                <span class="text-danger">{{ trans($errors->first($k)) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @elseif($v->type == "file")

                                                    <div class="col-md-4">
                                                        <label class="text-white text-16"><strong>{{trans($v->field_level)}} @if($v->validation == 'required')
                                                                    <span class="text-danger">*</span>  @endif </strong>
                                                        </label>

                                                        <div class="form-group mt-2">
                                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail bookingForm-thumbnail"
                                                                        data-trigger="fileinput">
                                                                    <img class="w-150px"
                                                                            src="{{ getFile(config('location.default')) }}"
                                                                            alt="@lang('Booking form image')">
                                                                </div>
                                                                <div
                                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                                                <div class="img-input-div">
                                                                    <span class="btn btn-outline-primary btn-file">
                                                                        <span
                                                                            class="fileinput-new text-16"> @lang('Select') {{$v->field_level}}</span>
                                                                        <span
                                                                            class="fileinput-exists"> @lang('Change')</span>
                                                                        <input type="file" name="{{$k}}" accept="image/*"
                                                                                @if($v->validation == "required") required @endif>
                                                                    </span>
                                                                    <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                                        data-dismiss="fileinput"> @lang('Remove')</a>
                                                                </div>

                                                            </div>
                                                            @if ($errors->has($k))
                                                                <br>
                                                                <span
                                                                    class="text-danger">{{ __($errors->first($k)) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif


                                        <div class="col-md-12">
                                            <div class=" form-group">
                                                <button type="submit" class="btn btn-f-button btn-block mt-3">
                                                    <span>@lang('Confirm Now')</span>
                                                </button>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            @else
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                                        @csrf
                                        @if($fundInfo->booking_info)
                                            @foreach($fundInfo->booking_info as $k => $v)


                                                @if($v->type == "text")
                                                    <div class="col-md-12">
                                                        <div class="form-group  mt-2">
                                                            <label class="text-white text-16"><strong> {{trans($v->field_level)}}</strong> </label>
                                                                <input type="text" name="{{$k}}" value="{{$v->field_value}}"
                                                                        class="form-control bg-transparent text-white py-4 text-16" readonly>
                                                        </div>
                                                    </div>
                                                @elseif($v->type == "textarea")
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-white text-16"><strong>{{trans($v->field_level)}}</strong></label>
                                                            <textarea name="{{$k}}" class="form-control bg-transparent text-16 text-white" rows="3" readonly> {{$v->field_value}} </textarea>
                                                        </div>
                                                    </div>
                                                @elseif($v->type == "file")

                                                    <div class="col-md-4">
                                                        <label class="text-white text-16"><strong>{{trans($v->field_level)}}</strong>
                                                        </label>

                                                        <div class="form-group mt-2">
                                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail bookingForm-thumbnail"
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
                                            {{-- @endforeach --}}
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

