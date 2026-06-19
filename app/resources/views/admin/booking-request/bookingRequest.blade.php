@extends('admin.layouts.app')
@section('title')
    @lang('User Booking Request List')
@endsection

@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('SL No.')</th>
                        <th scope="col">@lang('User')</th>
                        <th scope="col">@lang('Date')</th>
                        <th scope="col">@lang('Status')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($bookingRequests as $item)
                        <tr>
                            <td data-label="@lang('SL No.')">{{$loop->index+1}}</td>
                            <td data-label="@lang('User')">
                                <a href="{{route('admin.user-edit', $item->user_id)}}"
                                   target="_blank">

                                    <div class="d-flex no-block align-items-center">
                                        <div class="mr-3"><img
                                                src="{{getFile(config('location.user.path').optional($item->user)->image) }}"
                                                alt="user" class="rounded-circle" width="45" height="45"></div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">{{optional($item->user)->fullname}}</h5>
                                            <span class="text-muted font-14"><span>@</span>{{optional($item->user)->username}}</span>
                                        </div>
                                    </div>
                                </a>

                            </td>
                            <td data-label="@lang('Date')">
                                @lang($item->date)
                            </td>
                            <td data-label="@lang('Status')">
                                @if($item->status == 0)
                                    <span class="badge badge-warning badge-pill">@lang('Pending')</span>
                                @elseif($item->status == 1)
                                    <span class="badge badge-danger badge-pill">@lang('Rejected')</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-success badge-pill">@lang('Approved')</span>
                                @endif
                            </td>

                            <td data-label="@lang('Action')">

                                <div class="dropdown dropup show">
                                    <a class="dropdown-toggle p-3" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item"
                                           href="{{route('admin.show.booking.request.form', $item->id)}}">
                                            <i class="fa fa-eye text-primary pr-2"
                                               aria-hidden="true"></i> @lang('Details')
                                        </a>
                                        @if($item->status != 2)
                                            <a class="dropdown-item approve-button" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#approveModal"
                                               data-route="{{route('admin.booking.form.approve',['id'=>$item->id])}}">
                                                <i class="fa fa-check-circle text-success pr-2"
                                                   aria-hidden="true"></i> @lang('Approve')
                                            </a>
                                        @endif
                                        @if($item->status != 1)
                                            <a class="dropdown-item reject-button" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#rejectModal"
                                               data-route="{{route('admin.booking.form.reject',['id'=>$item->id])}}">
                                                <i class="fa fa-window-close text-danger pr-2"
                                                   aria-hidden="true"></i> @lang('Reject')
                                            </a>
                                        @endif


                                        <a class="dropdown-item delete-button" href="javascript:void(0)"
                                           data-toggle="modal"
                                           data-target="#deleteModal"
                                           data-route="{{route('admin.booking.form.delete',['id'=>$item->id])}}">
                                            <i class="fa fa-trash-alt text-danger pr-2"
                                               aria-hidden="true"></i> @lang('Delete')
                                        </a>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">
                                <p class="text-dark">@lang('No Data Found')</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">@lang('Reject Booking Request')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="rejectForm">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Note')</label>
                            <textarea name="note" cols="10" rows="2" class="rejectClass form-control form-control-lg"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">
                            <span>@lang('Cancel')</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fas fa-save"></i> @lang('Reject')</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">@lang('Approve Booking Request')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="approveForm">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Note')</label>
                            <textarea name="note" cols="10" rows="2"
                                      class="approveClass form-control form-control-lg"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">
                            <span>@lang('Cancel')</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fas fa-save"></i> @lang('Approve')</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">@lang('Delete Booking Request')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="deleteForm">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p>@lang('Are you sure to delete this?')</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">
                            <span>@lang('Cancel')</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fas fa-save"></i> @lang('Yes')</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>




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

    <script>
        "use strict";
        $(document).ready(function () {
            $(document).on('click', '.reject-button', function () {
                $('#rejectForm').attr('action', $(this).data('route'))
                $('.rejectClass').val('')
            });

            $(document).on('click', '.approve-button', function () {
                $('#approveForm').attr('action', $(this).data('route'))
                $('.approveClass').val('')
            });

            $(document).on('click', '.delete-button', function () {
                $('#deleteForm').attr('action', $(this).data('route'))
                $('.deleteClass').val('')
            });

        });
    </script>
@endpush
