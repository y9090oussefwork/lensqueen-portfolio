@extends($theme.'layouts.user')
@section('title',trans('My Bookings'))
@section('content')

    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="card secbg-6">
                        <div class="card-body ">

                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-white" id="service-table">
                                    <thead>
                                      <tr>
                                          <th scope="col">@lang('SL No.')</th>
                                          <th scope="col">@lang('Date')</th>
                                          <th scope="col">@lang('Status')</th>
                                          <th scope="col">@lang('Action')</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($myBooking as $item)
                                        <tr>
                                            <td data-label="@lang('SL No.')">{{loopIndex($myBooking) + $loop->index}}</td>
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
                                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-info-circle"></i> @lang('Details')
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

                            {{ $myBooking->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

