@extends('admin.layouts.app')
@section('title')
    @lang('Edit Plan')
@endsection
@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="media mb-4 justify-content-end">
                <a href="{{route('admin.planList')}}" class="btn btn-sm  btn-primary mr-2">
                    <span><i class="fas fa-arrow-left"></i> @lang('Back')</span>
                </a>
            </div>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($languages as $key => $language)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#lang-tab-{{ $key }}" role="tab" aria-controls="lang-tab-{{ $key }}"
                           aria-selected="{{ $loop->first ? 'true' : 'false' }}">@lang($language->name)</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content mt-2" id="myTabContent">
                @foreach($languages as $key => $language)

                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lang-tab-{{ $key }}" role="tabpanel">
                        <form method="post" action="{{ route('admin.planUpdate',[$id, $language->id]) }}" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row generate-btn-parent">
                                <div class="col-sm-12 col-md-6">
                                    <label for="name"> @lang('Plan Name') </label>
                                    <input type="text" name="name[{{ $language->id }}]"
                                            class="form-control  @error('name'.'.'.$language->id) is-invalid @enderror"
                                            value="<?php echo old('name'.$language->id, isset($planDetails[$language->id]) ? @$planDetails[$language->id][0]->name : '') ?>">
                                    <div class="invalid-feedback">
                                        @error('name'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                @if ($loop->index == 0)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Plan Price')</label>
                                            <div class="input-group">
                                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                                value="<?php echo old('price'.$language->id, isset($planDetails[$language->id]) ? @$planDetails[$language->id][0]->plan->price : '') ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        {{ $basic->currency ?? 'USD' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('price') @lang($message) @enderror
                                            </div>
                                            <div class="valid-feedback"></div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="image">{{ ('Image') }}</label>
                                            <div class="image-input ">
                                                <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                                <input type="file" name="image" placeholder="@lang('Choose image')" id="image">
                                                <img id="image_preview_container" class="preview-image"
                                                    src="{{getFile(config('location.plan.path').(isset($planDetails[$language->id]) ? @$planDetails[$language->id][0]->plan->image : ''))}}"
                                                    alt="@lang('preview image')">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4 ">
                                        <label>@lang('Status')</label>

                                        <input data-toggle="toggle" id="status" data-onstyle="success"
                                               data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%"
                                               type="checkbox" @if(@$planDetails[$language->id][0]->plan->status) checked @endif name="status">

                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif


                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <a href="javascript:void(0)" data-language="{{ $language->id }}" class="btn btn-success float-left mt-3 generate"><i
                                                class="fa fa-plus-circle"></i> Add Plan Feature</a>
                                    </div>
                                </div>
                            </div>

                                <div class="row addedField mt-3">
                                    @for($i = 0; $i<count($detailsCount->details); $i++)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">

                                                    <input name="details[{{ $language->id }}][]" class="form-control"
                                                        type="text" value="<?php echo old('details'.$language->id, isset($planDetails[$language->id]) ? @$planDetails[$language->id][0]->details[$i] : '') ?>" required
                                                        placeholder="{{trans('Enter Feature')}}">

                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger  delete_desc" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">@lang('Save')</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        "use strict";

        $(document).ready(function () {
            $('select[name=plan_id]').select2({
                selectOnClose: true
            });
        });
    </script>

    <script>

        "use strict";
        $(document).ready(function (e) {

            $(".generate").on('click', function () {
                let lang = $(this).data("language");
                var form = `<div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="details[${lang}][]" class="form-control" type="text" required placeholder="{{trans('Enter Plan Feature')}}" value="">

                                        <span class="input-group-btn">
                                            <button class="btn btn-danger delete_desc" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div> `;
                $(this).parents('.generate-btn-parent').siblings('.addedField').append(form)
            });


            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').parent().remove();
            });


            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });


        });

        $(document).ready(function () {
            $('select').select2({
                selectOnClose: true
            });
        });
    </script>

    @if ($errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp
        <script>
            "use strict";
            @foreach ($errors as $error)
            Notiflix.Notify.Failure("{{trans($error)}}");
            @endforeach
        </script>
    @endif
@endpush
