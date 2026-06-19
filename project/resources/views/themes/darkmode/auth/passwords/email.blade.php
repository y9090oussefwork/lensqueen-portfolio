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
                            <h5 class="black">@lang('Forget Your Password?')</h5>
                            <form class="login-form" id="reset-form" method="post" action="{{route('password.email')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" autocomplete="off" placeholder="@lang('Enter your email address to reset your password')">
                                    <span class="text-danger emailError"></span>
                                </div>

                                <div class="form-group">
                                    <button class="form-control send-code" type="submit">@lang('Send Password Reset Link')</button>
                                </div>

                            </form>
                            <p class="text-14">@lang('Already have an account?') <a href="{{ route('login') }}" class="login-btn">@lang('Sign in')</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
