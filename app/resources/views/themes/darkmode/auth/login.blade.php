@extends($theme.'layouts.app')
@section('title')
    @lang('Login')
@endsection

@section('content')
    <div class="login-bg py-5" id="signin-new">
        <div class="container login-main py-5 my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="signin-right">
                        <div class="login-content show">
                            <h5>@lang('Sign In')</h5>
                            <form class="login-form" id="login-form" action="{{route('loginModal')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" placeholder="@lang('Username Or Email Address')" autocomplete="off">
                                    <span class="text-danger emailError"></span>
                                    <span class="text-danger usernameError"></span>
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="@lang('Password')" autocomplete="off">
                                    <span class="text-danger passwordError"></span>
                                </div>

                                <div class="form-group">
                                    <button class="form-control login" type="submit">@lang('Login')</button>
                                </div>
                                <div class="remember">
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember" autocomplete="off">
                                        <label for="remember">@lang('Remember Me')</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forget" type="button">@lang("Forget Your Password?")</a>
                                </div>
                            </form>
                            @if(config('basic.registration') == 1)
                            <p class="text-14">@lang("Don't have an account?")
                                <a href="{{ route('register') }}" class="signup-btn"> @lang('Sign Up')
                                </a>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
