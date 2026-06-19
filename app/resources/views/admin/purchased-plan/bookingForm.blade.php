@extends('admin.layouts.app')
@section('title')
    @lang('User Booking Form')
@endsection

@section('content')


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-3"> @lang('Additional Information To Plan Confirm')</h4>
                    <form action="{{route('admin.booking.form.update', $trx)}}" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                        @csrf
                        @method('put')
                        @if($fundInfo->booking_info)
                            @foreach($fundInfo->booking_info as $k => $v)

                                @if($v->type == "text")
                                    <div class="col-md-12">
                                        <div class="form-group  mt-2">
                                            <label class="text-16"><strong>{{trans($v->field_level)}}</strong>
                                            </label>
                                            <input type="text" name="{{$v->field_name}}" value="{{$v->field_value}}"
                                                    class="form-control bg-transparent py-4 text-16">
                                            @if ($errors->has($v->field_name))
                                                <span
                                                    class="text-danger">{{ trans($errors->first($v->field_name)) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($v->type == "textarea")

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class= text-16"><strong>{{trans($v->field_level)}}</strong>
                                            </label>
                                            <textarea name="{{$v->field_name}}" class="form-control bg-transparent text-16" rows="3">{{$v->field_value}}</textarea>
                                            @if ($errors->has($v->field_name))
                                                <span class="text-danger">{{ trans($errors->first($v->field_name)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($v->type == "file")

                                    <div class="col-md-4">
                                        <label class="text-16"><strong>{{trans($v->field_level)}}</strong>
                                        </label>

                                        <div class="form-group mt-2">
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail bookingForm-thumbnail"
                                                        data-trigger="fileinput">
                                                    <img class="w-100px"
                                                            src="{{getFile(config('location.bookingFrom.path').$v->field_value)}}"
                                                            alt=@lang('booking form image missing')>
                                                </div>
                                                <div
                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150">
                                                </div>

                                                <div class="img-input-div">
                                                    <span class="btn btn-info btn-file">
                                                        <span
                                                            class="fileinput-new text-16"> @lang('Change') {{$v->field_level}}
                                                        </span>
                                                        <span class="fileinput-exists"> @lang('Change')</span>
                                                        <input type="file" name="{{$v->field_name}}" accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                        data-dismiss="fileinput"> @lang('Remove')</a>


                                                </div>

                                            </div>
                                            @if ($errors->has($v->field_name))
                                                <br>
                                                <span
                                                    class="text-danger">{{ __($errors->first($v->field_name)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <p class="text-center d-block text-danger text-28 p-2">Booking Form Not Submited by User.</p>
                            </div>
                        @endif


                        <div class="col-md-12">
                            <div class="form-group">
                                @if($fundInfo->booking_info)
                                    <button type="submit" class="btn btn-primary btn-block mt-3">
                                        <span>@lang('Update Now')</span>
                                    </button>
                                @endif

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('js')
    <script>
        $(document).ready(function (e) {
            "use strict";

            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endpush

@push('js-lib')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endpush

