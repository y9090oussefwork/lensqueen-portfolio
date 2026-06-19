@extends($theme.'layouts.user')
@section('title',trans('My Products'))

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
                                        <th scope="col">@lang('Product Name')</th>
                                        <th scope="col">@lang('Price')</th>
                                        <th scope="col">@lang('Purchased At')</th>
                                        <th scope="col">@lang('Action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($myProducts as $data)
                                        <tr>
                                            <td data-label="@lang('SL No.')">{{loopIndex($myProducts) + $loop->index}}</td>
                                            <td data-label="@lang('Product Name')">
                                                @lang(optional($data->productDetails)->title)
                                            </td>
                                            <td data-label="@lang('Price')">
                                                {{getAmount($data->amount)}} @lang($basic->currency)
                                            </td>
                                            <td data-label="@lang('Purchased At')">
                                                {{ dateTime($data->created_at, 'd M Y h:i A') }}
                                            </td>

                                            <td data-label="@lang('Action')">
                                                <a href="{{route('user.product.download', encrypt($data->product_id))}}" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-download"></i> @lang('Download')
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

                            {{ $myProducts->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

