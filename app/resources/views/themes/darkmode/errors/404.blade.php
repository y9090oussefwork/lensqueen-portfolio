@extends($theme.'layouts.app')
@section('title')
    @lang('404')
@endsection


@section('content')
    <section class="not-found-404">
        <h2>@lang('Page Not Found')</h2>
        <h1>@lang('404')</h1>
        <p class="font-open text-18 white font-weight-light">
            @lang("We're sorry, the page you requested could not be found. Please go back to the homepage or contact us at") {{config('basic.sender_email')}}
        </p>
        <a class="back-to-home" href="{{url('/')}}">@lang('Back To Home')</a>
    </section>

@endsection

@push('style')
    <style>
        .not-found-404 {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{getFile(config('location.logo.path').'error.jpg')}});
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            text-align: center;
        }
    </style>
@endpush
