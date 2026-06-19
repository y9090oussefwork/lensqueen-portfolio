@extends('admin.layouts.app')
@section('title')
    @lang('Product Review List')
@endsection

@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">

        <div class="card-body">

            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('SL No.')</th>
                        <th scope="col">@lang('Product')</th>
                        <th scope="col">@lang('User')</th>
                        <th scope="col">@lang('Star')</th>
                        <th scope="col">@lang('Feedback')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($manageReviews as $item)
                        <tr>
                            <td data-label="@lang('SL No.')">{{$loop->index+1}}</td>
                            <td data-label="@lang('Product')">
                                <a href="{{route('admin.productEdit', $item->product_id)}}">
                                    {{optional($item->productDetails)->title}}
                                </a>
                            </td>
                            <td data-label="@lang('User')">
                                <a href="{{route('admin.user-edit', $item->user_id)}}">
                                <div class="d-flex no-block align-items-center">
                                    <div class="mr-3"><img src="{{ getFile(config('location.user.path').$item->image)}}" alt="user" class="rounded-circle" width="45" height="45"></div>
                                    <div class="">
                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">{{optional($item->user)->fullname}}</h5>
                                        <span class="text-muted font-14"><span>@</span>{{optional($item->user)->username}}</span>
                                    </div>
                                </div>
                                </a>
                            </td>
                            <td data-label="@lang('Star')">
                                <span class="stars">
                                    @for($i = 1; $i <= $item->star; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    @for($i = $item->star; $i < 5; $i++)
                                        <i class="fa fa-star text-dark"></i>
                                    @endfor
                                </span>
                            </td>
                            <td data-label="@lang('Feedback')">
                                @lang($item->feedback)
                            </td>
                            <td data-label="@lang('Action')">
                                <a href="javascript:void(0)"
                                    data-route="{{ route('admin.reviewDelete',$item->id) }}"
                                    data-toggle="modal"
                                    data-target="#delete-modal"
                                   title="@lang('Delete')"
                                    class="btn btn-danger btn-sm btn-rounded notiflix-confirm"><i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="100%">@lang('No Data Found')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Delete Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header modal-colored-header bg-primary">
                   <h4 class="modal-title" id="primary-header-modalLabel">@lang('Delete Confirmation')
                   </h4>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-hidden="true">×
                   </button>
               </div>
               <div class="modal-body">
                   <p>@lang('Are you sure to delete this?')</p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-light"
                           data-dismiss="modal">@lang('Close')</button>
                   <form action="" method="post" class="deleteRoute">
                       @csrf
                       @method('delete')
                       <button type="submit" class="btn btn-primary">@lang('Yes')</button>
                   </form>
               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

@endsection


@push('style-lib')
    <link href="{{asset('assets/admin/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.init.js') }}"></script>


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

    <script>
        'use strict'
        $(document).ready(function () {
            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
@endpush
