@extends($theme.'layouts.user')
@section('title',trans('Wishlist'))
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
                                        <th scope="col">@lang('Added At')</th>
                                        <th scope="col">@lang('Action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($wishlists as $data)
                                        <tr>
                                            <td data-label="@lang('SL No.')">{{loopIndex($wishlists) + $loop->index}}</td>
                                            <td data-label="@lang('Product Name')">
                                                <a href="{{route('shopDetails',[slug(optional($data->details)->title??'item details'),$data->product_id])}}" class="wishlistProduct title">
                                                    @lang(optional($data->details)->title)
                                                </a>
                                            </td>
                                            <td data-label="@lang('Added At')">
                                                {{ dateTime($data->created_at, 'd M Y h:i A') }}
                                            </td>
                                            <td data-label="@lang('Action')">
                                                <a href="javascript:void(0)"
                                                    data-route="{{ route('user.deleteWishlist',$data->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#delete-modal"
                                                    class="btn btn-outline-primary btn-sm notiflix-confirm"><i class="fas fa-trash-alt"></i>
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

                            {{ $wishlists->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content bg-dark">
               <div class="modal-header modal-colored-header">
                   <h4 class="modal-title" id="primary-header-modalLabel">@lang('Delete Confirmation')
                   </h4>
                   <button type="button" class="close text-white" data-dismiss="modal"
                           aria-hidden="true">×
                   </button>
               </div>
               <div class="modal-body">
                   <p>@lang('Are you sure to delete this?')</p>
               </div>
               <div class="modal-footer">
                   <form action="" method="post" class="deleteRoute">
                       @csrf
                       @method('delete')
                       <button type="submit" class="btn btn-success">@lang('Yes')</button>
                   </form>
               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

@endsection


@push('script')
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


