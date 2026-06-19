@extends('admin.layouts.app')
@section('title')
    @lang('Add New')
@endsection
@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="media mb-4 justify-content-end">
                <a href="{{route('admin.productList')}}" class="btn btn-sm  btn-primary mr-2">
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
                        <form method="post" action="{{ route('admin.productStore', $language->id) }}" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            <div class="row generate-btn-parent">
                                <div class="col-sm-12 col-md-6">
                                    <label for="title"> @lang('Product Title') </label>
                                    <input type="text" name="title[{{ $language->id }}]"
                                            class="form-control  @error('title'.'.'.$language->id) is-invalid @enderror"
                                            value="{{ old('title'.'.'.$language->id) }}">
                                    <div class="invalid-feedback">
                                        @error('title'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                @if ($loop->index == 0)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Product Price')</label>
                                            <div class="input-group">
                                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}">
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
                                @endif


                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="tag"> @lang('Product Tag') </label>
                                    <input type="text" name="tag[{{ $language->id }}]"
                                            class="form-control  @error('tag'.'.'.$language->id) is-invalid @enderror"
                                            value="{{ old('tag'.'.'.$language->id) }}">
                                    <div class="invalid-feedback">
                                        @error('tag'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="category"> @lang('Product Category') </label>
                                    <input type="text" name="category[{{ $language->id }}]"
                                            class="form-control  @error('category'.'.'.$language->id) is-invalid @enderror"
                                            value="{{ old('category'.'.'.$language->id) }}"  data-role="tagsinput">
                                    <div class="invalid-feedback">
                                        @error('category'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-3">
                                    <label for="short_details"> @lang('Short Details') </label>
                                    <input type="text" name="short_details[{{ $language->id }}]"
                                            class="form-control  @error('short_details'.'.'.$language->id) is-invalid @enderror"
                                            value="{{ old('short_details'.'.'.$language->id) }}">
                                    <div class="invalid-feedback">
                                        @error('short_details'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-group ">
                                        <label for="description"> @lang('Product Description') </label>
                                        <textarea class="form-control summernote @error('description'.'.'.$language->id) is-invalid @enderror" name="description[{{ $language->id }}]" id="summernote" rows="15" value="{{ old('description'.'.'.$language->id) }}">{{old('description'.'.'.$language->id)}}</textarea>

                                        <div class="invalid-feedback">
                                            @error('description'.'.'.$language->id) @lang($message) @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>


                                @if ($loop->index == 0)


                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <label for="product_file"> @lang('Product File (file type: .zip/.rar)') </label>
                                        <input type="file" name="product_file"
                                                class="form-control  @error('product_file') is-invalid @enderror"
                                                value="{{ old('product_file') }}">
                                        <div class="invalid-feedback">
                                            @error('product_file') @lang($message) @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>




                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Thumb')</label>
                                            <div class="image-input ">
                                                <label for="image-upload" id="admin_image-label"><i class="fas fa-upload"></i></label>
                                                <input type="file" name="thumb" placeholder="Choose image" id="admin_image">
                                                <img id="admin_image_preview_container" class="preview-image" src="{{ getFile(config('location.product.path')) }}"
                                                     alt="preview image">
                                            </div>
                                            @if(config("location.product.thumb"))
                                                <span class="text-muted mb-2">{{trans('Thumb size should be')}} {{config("location.product.thumb")}}{{trans('px')}}</span>
                                            @endif

                                            @error('thumb')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4 ">
                                        <label>@lang('Status')</label>
                                        <input data-toggle="toggle" id="status" data-onstyle="success"
                                               data-offstyle="info" data-on="Active" data-off="Deactive" data-width="100%"
                                               type="checkbox" checked name="status">
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-lg-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <a href="javascript:void(0)" class="btn btn-success float-left mt-3 generate">
                                                <i class="fa fa-image"></i> @lang('Add More')</a>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="row addedField mt-3">

                            </div>

                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">@lang('Save')</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/summernote.min.css')}}">
    <link href="{{asset('assets/admin/css/tagsinput.css')}}" rel="stylesheet">
@endpush
@push('js-lib')
    <script src="{{ asset('assets/admin/js/summernote.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/tagsinput.js') }}"></script>
@endpush


@push('js')
    <script>

        "use strict";
        $(document).ready(function (e) {

            $(".generate").on('click', function () {
                var form = `<div class="col-sm-12 col-md-4 image-column">
                                <div class="form-group">
                                        <div class="image-input position-relative z0">
                                            <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                            <input type="file" name="image[]" placeholder="@lang('Choose image')" class="image-preview" required>
                                            <img id="image_preview_container" class="preview-image"	src="{{ getFile(config('location.product.path')) }}" alt="@lang('preview image')">

                                        </div>

                                         <button class="btn btn-danger delete_desc removeFile z9" type="button">
                                                <i class="fa fa-times"></i>
                                        </button>

                                </div>
                                       @if(config("location.product.size"))
                <span class="text-muted mb-2">{{trans('Image size should be')}} {{config("location.product.size")}} {{trans('px')}}</span>
                                        @endif
                            </div> `;
                $(this).parents('.generate-btn-parent').siblings('.addedField').append(form)
            });

            $('#admin_image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#admin_image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });


            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.form-group').parents('.image-column').remove();
            });


            $(document).on('change', '.image-preview', function () {
                let currentIndex = $('.image-preview').index(this);
                $(this).attr('name', `image[${currentIndex}]`);
                let reader = new FileReader();
                let _this = this;
                reader.onload = (e) => {
                    $(_this).siblings('.preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });


            $('.summernote').summernote({
                height: 250,
                callbacks: {
                    onBlurCodeview: function() {
                        let codeviewHtml = $(this).siblings('div.note-editor').find('.note-codable').val();
                        $(this).val(codeviewHtml);
                    }
                }
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
