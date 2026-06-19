<!--------- Modal signin+booking ----------------->

<!--- Modal signin --->
<div class="modal fade" id="signin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-main">
                    <div class="row justify-content-center">
                        <div class="btn-close close-all-modal">&times;</div>
                        <div class="col-md-6 pl-0">
                            <div class="signin-right">

                                <!--------- Sign In ------------>
                                <div class="login-content show">
                                    <h5>@lang('Sign In')</h5>
                                    <form class="login-form" id="login-form" action="{{route('loginModal')}}"
                                          method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control"
                                                   placeholder="@lang('Username Or Email Address')" autocomplete="off">
                                            <span class="text-danger emailError"></span>
                                            <span class="text-danger usernameError"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control"
                                                   placeholder="@lang('Password')" autocomplete="off">
                                            <span class="text-danger passwordError"></span>
                                        </div>

                                        <div class="form-group">
                                            <button  class="form-control login" type="submit">@lang('Login')</button>
                                        </div>
                                        <div class="remember row justify-content-between">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="remember"
                                                           {{ old('remember') ? 'checked' : '' }} id="remember"
                                                           autocomplete="off">
                                                    <label for="remember">@lang('Remember Me')</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                            <button class="forget" type="button">@lang("Forget Your Password?")</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if(config('basic.registration') == 1)
                                    <p class="text-14">@lang("Don't have an account?")
                                        <button class="signup-btn"> @lang('Sign up')</button>
                                    </p>
                                    @endif
                                </div>

                                <!--------- Sign Up ------------>
                                <div class="signup-content">
                                    <h5 class="black">@lang('Sign Up')</h5>
                                    <form class="login-form" id="signup-form" action="{{route('register')}}"
                                          method="post">
                                        @csrf

                                        <div class="form-group">
                                            <input name="firstname" value="{{old('firstname')}}" type="text"
                                                   class="form-control" placeholder="@lang('First Name')"
                                                   autocomplete="off">
                                            <span class="text-danger firstnameError"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="lastname" value="{{old('lastname')}}" type="text"
                                                   class="form-control" placeholder="@lang('Last Name')"
                                                   autocomplete="off">
                                            <span class="text-danger lastnameError"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="username" value="{{old('username')}}" type="text"
                                                   class="form-control" placeholder="@lang('Username')"
                                                   autocomplete="off">
                                            <span class="text-danger usernameError"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="email" value="{{old('email')}}" type="email"
                                                   class="form-control" placeholder="@lang('Email Address')"
                                                   autocomplete="off">
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
                                                    <select name="phone_code"
                                                            class="form-control country_code dialCode-change">
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
                                                <input autocomplete="off" type="text" name="phone"
                                                       class="form-control dialcode-set pl-3 ml-3"
                                                       value="{{old('phone')}}"
                                                       placeholder="@lang('Your Phone Number')">
                                            </div>

                                            <span class="text-danger phoneError"></span>

                                            <input autocomplete="off" type="hidden" name="country_code"
                                                   value="{{old('country_code')}}" class="text-dark">
                                        </div>

                                        <div class="form-group">
                                            <input name="password" value="{{old('password')}}"
                                                   placeholder="@lang('Password')" type="password" class="form-control"
                                                   autocomplete="off">
                                            <span class="text-danger passwordError"></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="password_confirmation"
                                                   value="{{old('password')}}" placeholder="@lang('Confirm Password')"
                                                   type="password" class="form-control" autocomplete="off">
                                        </div>

                                        @if(config('basic.registration') == 1)
                                        <div class="form-group">
                                            <button class="form-control signup"
                                                    type="submit">@lang('Create Account')</button>
                                        </div>
                                            @endif
                                    </form>
                                    <p class="text-14">@lang('Already have an account?')
                                        <button class="login-btn" >@lang('Sign in')</button>
                                    </p>
                                </div>


                                <!--------- Forget Password ------------>
                                <div class="forget-pass-content">
                                    <h5 class="black">@lang('Forget Your Password?')</h5>
                                    <form class="login-form" id="reset-form" method="post"
                                          action="{{route('password.email')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{old('email')}}"
                                                   class="form-control" autocomplete="off"
                                                   placeholder="@lang('Enter your email address to reset your password')">
                                            <span class="text-danger emailError"></span>
                                        </div>

                                        <div class="form-group">
                                            <button class="form-control send-code"
                                                    type="submit">@lang('Send Password Reset Link')</button>
                                        </div>

                                    </form>
                                    <p class="text-14">@lang('Already have an account?')
                                        <button class="login-btn" >@lang('Sign in')</button>
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!--- Modal booking --->
<div class="modal fade" id="booking">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="date getDate" id="datepicker-booking"></div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#datepicker-booking').on('change', function () {
                var pickedDate = $('#datepicker-booking').val();
                window.location.href = "{{route('user.bookingDate')}}?date=" + pickedDate;
            });
        });

        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });
            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }
        });



    </script>
@endpush

