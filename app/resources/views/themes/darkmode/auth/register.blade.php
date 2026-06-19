@extends($theme.'layouts.app')
@section('title')
    @lang('Register')
@endsection

@section('content')
    <div class="login-bg py-5" id="signin-new">
        <div class="login-main py-5 my-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="signin-right">
                        <div class="signup-content show">
                            <h5 class="black">@lang('Sign Up')</h5>
                            <form class="login-form" id="signup-form" action="{{route('register')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input name="firstname" value="{{old('firstname')}}" type="text" class="form-control" placeholder="@lang('First Name')" autocomplete="off">
                                    <span class="text-danger firstnameError"></span>
                                </div>

                                <div class="form-group">
                                    <input name="lastname" value="{{old('lastname')}}" type="text" class="form-control" placeholder="@lang('Last Name')" autocomplete="off">
                                    <span class="text-danger lastnameError"></span>
                                </div>

                                <div class="form-group">
                                    <input name="username" value="{{old('username')}}" type="text" class="form-control" placeholder="@lang('Username')" autocomplete="off">
                                    <span class="text-danger usernameError"></span>
                                </div>

                                <div class="form-group">
                                    <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="@lang('Email Address')" autocomplete="off">
                                    <span class="text-danger emailError"></span>
                                </div>

                                <div class="form-group">
                                    @php
                                        $country_code = (string) @getIpInfo()['code'] ?: null;
                                        $myCollection = collect(config('country'))->map(function($row) {
                                            return collect($row);
                                        });
                                        $countries = $myCollection->sortBy('code');
                                    @endphp


                                    <div class="input-group">
                                        <div class="input-group-prepend w-50">
                                            <select name="phone_code" class="form-control country_code dialCode-change">
                                                @foreach($countries as $value)
                                                    <option value="{{$value['phone_code']}}"
                                                            data-name="{{$value['name']}}"
                                                            data-code="{{$value['code']}}"
                                                        {{$country_code == $value['code'] ? 'selected' : ''}}
                                                    > {{$value['name']}} ({{$value['phone_code']}})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input autocomplete="off" type="text" name="phone" class="form-control dialcode-set pl-3 ml-3" value="{{old('phone')}}" placeholder="@lang('Your Phone Number')">
                                    </div>

                                    <span class="text-danger phoneError"></span>

                                    <input  autocomplete="off" type="hidden" name="country_code" value="{{old('country_code')}}" class="text-dark">
                                </div>

                                <div class="form-group">
                                    <input name="password" value="{{old('password')}}" placeholder="@lang('Password')" type="password" class="form-control" autocomplete="off">
                                    <span class="text-danger passwordError"></span>
                                </div>

                                <div class="form-group">
                                    <input name="password_confirmation" type="password" value="{{old('password')}}" placeholder="@lang('Confirm Password')" type="password" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <button class="form-control signup" type="submit">@lang('Create Account')</button>
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
