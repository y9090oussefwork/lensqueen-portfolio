@extends($theme.'layouts.app')
@section('title')
    @lang($page_title)
@endsection

@section('content')
    <div class="login-bg py-5" id="signin-new">

        <div class="container login-main py-5 my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="signin-right">
                        <div class="login-content show">
                            <h5>@lang($page_title)</h5>
                            <form class="login-form" action="{{route('user.twoFA-Verify')}}"
                                  method="post">
                                @csrf
                                <div class="form-group">
                                    <input name="code" type="text" class="form-control" placeholder="@lang('Code')"
                                           autocomplete="off">
                                    @error('code')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                    @error('error')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <button class="form-control " type="submit">@lang('Submit')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
