@extends('admin.layouts.app')
@section('title')
    @lang('Plan List')
@endsection

@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">

        <div class="card-body">

            <div class="media mb-4 float-right">
                <a href="{{route('admin.planCreate')}}" class="btn btn-sm btn-primary mr-2">
                    <span><i class="fa fa-plus-circle"></i> @lang('Add New')</span>
                </a>
            </div>


            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('SL No.')</th>
                        <th scope="col">@lang('Plan')</th>
                        <th scope="col">@lang('Plan Price')</th>
                        <th scope="col">@lang('Status')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($managePlans as $item)
                        <tr>
                            <td data-label="@lang('SL No.')">{{$loop->index+1}}</td>

                            <td data-label="@lang('Plan')">
                                <div class="d-flex no-block align-items-center">
                                    <div class="mr-3"><img src="{{ getFile(config('location.plan.path').$item->image)}}" alt="user" class="rounded-circle" width="45" height="45"></div>
                                    <div class="">
                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">@lang(optional($item->details)->name)</h5>
                                    </div>
                                </div>
                            </td>

                            <td data-label="@lang('Plan Price')">
                                <p class="font-weight-bold">{{ $basic->currency_symbol ?? '$' }}{{$item->price}}</p>
                            </td>
                            <td data-label="@lang('Status')">
                                <?php echo  $item->statusMessage; ?>
                            </td>

                            <td data-label="@lang('Action')">
                                <div class="dropdown dropup show">
                                    <a class="dropdown-toggle p-3" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('admin.planEdit', $item->id)}}">
                                            <i class="fa fa-pencil-alt text-primary pr-2"
                                               aria-hidden="true"></i> @lang('Edit')
                                        </a>
                                        <a class="dropdown-item notiflix-confirm" href="javascript:void(0)"
                                           data-toggle="modal"
                                           data-target="#delete-modal"
                                           data-route="{{route('admin.planDelete',['id'=>$item->id])}}">
                                            <i class="fa fa-trash-alt text-danger pr-2"
                                               aria-hidden="true"></i> @lang('Delete')
                                        </a>
                                    </div>
                                </div>

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
