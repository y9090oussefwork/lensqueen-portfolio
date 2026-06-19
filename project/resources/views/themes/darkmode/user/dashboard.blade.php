@extends($theme.'layouts.user')
@section('title',trans('Dashboard'))
@section('content')
    <!-- DASHBOARD -->
    <section id="dashboard">
        <div class="dashboard-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
            <div class="balance-information">
                <div class="row justify-content-center ">
                    <div class="col-xl-3 col-md-6 col-sm-10 mb-3 mb-xl-4">
                        <div class="dashboard__card ">
                            <div class="dashboard__card-content">
                                <h2 class="price">{{trans($myBooking)}}</h2>
                                <p class="info">@lang('Total Booking')</p>
                            </div>
                            <div class="dashboard__card-icon">
                                <img src="{{asset($themeTrue.'images/icon/icons8-planner-64.png')}}" alt="@lang('dashboard image')">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-sm-10 mb-3 mb-xl-4">
                        <div class="dashboard__card">
                            <div class="dashboard__card-content">
                                <h2 class="price">{{trans($productPurchase)}}</h2>
                                <p class="info">@lang('Purchase Item')</p>
                            </div>
                            <div class="dashboard__card-icon ">
                                <img src="{{asset($themeTrue.'images/icon/icons8-basket-64.png')}}" alt="@lang('dashboard image')">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-10 mb-3 mb-xl-4">
                        <div class="dashboard__card">
                            <div class="dashboard__card-content">
                                <h2 class="price">{{trans($wishlists)}}</h2>
                                <p class="info">@lang('My Favourites')</p>
                            </div>
                            <div class="dashboard__card-icon ">
                                <img src="{{asset($themeTrue.'images/icon/icons8-wish-list-50.png')}}" alt="@lang('dashboard image')">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-10 mb-3 mb-xl-4">
                        <div class="dashboard__card">
                            <div class="dashboard__card-content">
                                <h2 class="price">{{trans($ticket)}}</h2>
                                <p class="info">@lang('Support Ticket')</p>
                            </div>
                            <div class="dashboard__card-icon">
                                <img src="{{asset($themeTrue.'images/icon/feature_3.png')}}" alt="@lang('dashboard image')">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row mt-30">
                    <div class="col-md-6">
                        <div class="card secbg">
                            <div class="card-body ">
                                <h5 class="card-title mb-3">@lang('Last 5 Payments')</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped text-white mb-0" id="service-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">@lang('Transaction ID')</th>
                                            <th scope="col">@lang('Gateway')</th>
                                            <th scope="col">@lang('Amount')</th>
                                            <th scope="col">@lang('Status')</th>
                                            <th scope="col">@lang('Time')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($funds as $data)
                                            <tr>

                                                <td data-label="#@lang('Transaction ID')">{{$data->transaction}}</td>
                                                <td data-label="@lang('Gateway')">@lang(optional($data->gateway)->name)</td>
                                                <td data-label="@lang('Amount')">
                                                    <strong>{{getAmount($data->amount)}} @lang($basic->currency)</strong>
                                                </td>

                                                <td data-label="@lang('Status')">
                                                    @if($data->status == 1)
                                                        <span class="badge badge-success">@lang('Complete')</span>
                                                    @elseif($data->status == 2)
                                                        <span class="badge badge-warning">@lang('Pending')</span>
                                                    @elseif($data->status == 3)
                                                        <span class="badge badge-danger">@lang('Cancel')</span>
                                                    @endif
                                                </td>

                                                <td data-label="@lang('Time')">
                                                    {{ dateTime($data->created_at, 'd M, Y H:i') }}
                                                </td>
                                            </tr>
                                        @empty

                                            <tr class="text-center">
                                                <td colspan="100%">{{__('No Data Found!')}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card secbg ">
                            <div class="card-body ">
                                <h5 class="card-title mb-3">@lang('Last 5 Booking')</h5>

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped text-white mb-0" >
                                        <thead>
                                        <tr>
                                            <th scope="col">@lang('SL No.')</th>
                                            <th scope="col">@lang('Date')</th>
                                            <th scope="col">@lang('Status')</th>
                                            <th scope="col">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($newBooking as $item)
                                            <tr>
                                                <td data-label="@lang('SL No.')">{{++$loop->index}}</td>
                                                <td data-label="@lang('Date')">
                                                    @lang($item->date)
                                                </td>
                                                <td data-label="@lang('Status')">
                                                    @if($item->status == 0)
                                                        <span class="badge badge-warning">@lang('Pending')</span>
                                                    @elseif($item->status == 1)
                                                        <span class="badge badge-danger">@lang('Rejected')</span>
                                                    @elseif($item->status == 2)
                                                        <span class="badge badge-success">@lang('Approved')</span>
                                                    @endif
                                                </td>
                                                <td data-label="@lang('Action')">
                                                    <a href="{{route('user.booking.request.form', $item->id)}}"
                                                       class="btn btn-outline-primary btn-sm"><i
                                                            class="fas fa-info-circle"></i> @lang('Details')
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty

                                            <tr class="text-center">
                                                <td colspan="100%">{{__('No Data Found!')}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /DASHBOARD -->
@endsection

