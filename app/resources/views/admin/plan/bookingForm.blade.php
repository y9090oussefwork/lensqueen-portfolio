@extends('admin.layouts.app')
@section('title')
    @lang('Booking Form')
@endsection

@section('content')

@php
    $previous_Booking_info = $configure->booking_info;
    $a = 1;
@endphp

    <div class="row ">
        <div class="col-12">
            <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
                <div class="card-body">

                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf

                        @if ($previous_Booking_info)
                            @foreach($previous_Booking_info as $key => $value)
                                <div class="col-md-12 mt-3">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <input name="field_name[]" class="form-control " type="text" value="{{$value->field_level}}" required placeholder="@lang('Field Name')">

                                            <select name="type[]"  class="form-control">
                                                <option
                                                    value="text" {{ (old('type[]',$value->type) == 'text') ? 'selected' : '' }}>
                                                    {{trans('Input Text')}}
                                                </option>
                                                <option
                                                    value="textarea" {{ (old('type[]',$value->type) == 'textarea') ? 'selected' : '' }}>
                                                    {{trans('Textarea')}}
                                                </option>
                                                <option
                                                    value="file" {{ (old('type[]',$value->type) == 'file') ? 'selected' : '' }}>
                                                    {{trans('File upload')}}
                                                </option>
                                            </select>

                                            <select name="validation[]"  class="form-control  ">
                                                <option value="required" {{ (old('validation[]',$value->validation) == 'required') ? 'selected' : '' }}>
                                                    {{trans('Required')}}
                                                </option>
                                                <option value="nullable" {{ (old('validation[]',$value->validation) == 'nullable') ? 'selected' : '' }}>
                                                    {{trans('Optional')}}
                                                </option>
                                            </select>

                                            @if ($a++ == 1)
                                                <span class="input-group-btn">
                                                    <div class="form-group">
                                                        <a href="javascript:void(0)" class="btn btn-primary" id="generate"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </span>
                                            @else
                                                <span class="input-group-btn">
                                                    <div class="form-group">
                                                        <a href="javascript:void(0)" class="btn btn-danger delete_desc">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 mt-3">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <input name="field_name[]" class="form-control " type="text" value="" required placeholder="{{trans('Field Name')}}">

                                        <select name="type[]"  class="form-control">
                                            <option value="text">{{trans('Input Text')}}</option>
                                            <option value="textarea">{{trans('Textarea')}}</option>
                                            <option value="file">{{trans('File upload')}}</option>
                                        </select>

                                        <select name="validation[]"  class="form-control  ">
                                            <option value="required">{{trans('Required')}}</option>
                                            <option value="nullable">{{trans('Optional')}}</option>
                                        </select>

                                        <span class="input-group-btn">
                                            <div class="form-group">
                                                <a href="javascript:void(0)" class="btn btn-primary" id="generate"><i
                                                        class="fas fa-plus"></i></a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="addedField mt-0">

                        </div>

                        <button type="submit" class="btn  btn-primary btn-block mt-3">@lang('Save Changes')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>

        "use strict";
        $(document).ready(function (e) {

            $("#generate").on('click', function () {
                var form = `<div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="field_name[]" class="form-control " type="text" value="" required placeholder="{{trans('Field Name')}}">

                                        <select name="type[]"  class="form-control">
                                            <option value="text">{{trans('Input Text')}}</option>
                                            <option value="textarea">{{trans('Textarea')}}</option>
                                            <option value="file">{{trans('File upload')}}</option>
                                        </select>

                                        <select name="validation[]"  class="form-control  ">
                                            <option value="required">{{trans('Required')}}</option>
                                            <option value="nullable">{{trans('Optional')}}</option>
                                        </select>

                                        <span class="input-group-btn">

                                            <button class="btn btn-danger delete_desc" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div> `;

                $('.addedField').append(form)
            });


            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').parent().remove();
            });

        });

        $(document).ready(function () {
            $('select').select2({
                selectOnClose: true
            });
        });
    </script>
@endpush
