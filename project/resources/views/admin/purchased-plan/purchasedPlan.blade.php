@extends('admin.layouts.app')
@section('title')
    @lang('Sold Plans')
@endsection

@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">

        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('SL No.')</th>
                        <th scope="col">@lang('User')</th>
                        <th scope="col">@lang('Plan')</th>
                        <th scope="col">@lang('Price')</th>
                        <th scope="col">@lang('Purchased At')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($userPlans as $item)
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

                                <td data-label="@lang('Plan')">
                                    <a href="{{route('admin.planEdit', $item->plan_id)}}">
                                    @lang(optional($item->planDetails)->name)
                                    </a>

                                </td>
                                <td data-label="@lang('Price')">
                                    {{ $basic->currency_symbol ?? '$' }}{{getAmount($item->amount)}}
                                </td>
                                <td data-label="@lang('Purchased At')">
                                    {{ dateTime($item->created_at, 'd M Y h:i A') }}
                                </td>
                                <td data-label="@lang('Action')">
                                    <a href="{{route('admin.show.booking.form', $item->transaction)}}" class="btn btn-primary btn-circle btn-sm" title="@lang('Details')">
                                        <i class="fas fa-desktop"></i>
                                    </a>
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
        "use strict";
        $(document).ready(function () {
            $('select[name=status]').select2({
                selectOnClose: true
            });
        });
    </script>

@endpush
