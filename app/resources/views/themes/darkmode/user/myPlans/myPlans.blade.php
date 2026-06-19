@extends($theme.'layouts.user')
@section('title',trans('My Plans'))
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
                                        <th scope="col">@lang('Plan Name')</th>
                                        <th scope="col">@lang('Price')</th>
                                        <th scope="col">@lang('Purchased At')</th>
                                        <th scope="col">@lang('Action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($myPlans as $data)
                                        <tr>
                                            <td data-label="@lang('SL No.')">{{loopIndex($myPlans) + $loop->index}}</td>
                                            <td data-label="@lang('Plan Name')">
                                                @lang(optional($data->planDetails)->name)
                                            </td>
                                            <td data-label="@lang('Price')">
                                                {{getAmount($data->amount)}} @lang($basic->currency)
                                            </td>
                                            <td data-label="@lang('Purchased At')">
                                                {{ dateTime($data->created_at, 'd M Y h:i A') }}
                                            </td>
                                            <td data-label="@lang('Action')">
                                                <a href="{{route('booking.form', $data->transaction)}}"
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

                            {{ $myPlans->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

