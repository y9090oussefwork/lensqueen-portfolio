@extends($theme.'layouts.app')
@section('title')
    @lang('Reset Password')
@endsection

@section('content')

    <div class="login-bg py-5" id="signin-new">
        <div class="login-main py-5 my-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="signin-right">
                        <div class="forget-pass-content show">
                            <h5 class="black">@lang('Change Password')</h5>
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                    {{ trans(session('status')) }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @error('token')
                            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                {{ trans($message) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror


                            <form class="login-form" method="post" action="{{route('password.update')}}">
                                @csrf


                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="@lang('New Password')">
                                    @error('password')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="@lang('Confirm Password')">
                                </div>


                                <div class="form-group">
                                    <button class="form-control send-code" type="submit">@lang('Change Password')</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
