@extends($theme.'layouts.app')
@section('title')
    @lang('500')
@endsection


@section('content')
    <section class="not-found-404">
        <h2>@lang("Internal Server Error")</h2>
        <h1>@lang('500')</h1>
        <p class="font-open text-18 white font-weight-light">
            @lang("The server encountered an internal error misconfiguration and was unable to complate your request. Please contact the server administrator.")
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

