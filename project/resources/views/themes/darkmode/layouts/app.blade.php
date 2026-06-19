<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en" @if(session()->get('rtl') == 1) dir="rtl" @endif >
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.seo')


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/notiflix.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jquery.exzoom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/icofont.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/jquery.lineProgressbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/flipper-responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/style.css')}}">

    @stack('css-lib')

    <script src="{{asset($themeTrue.'js/modernizr.custom.js')}}"></script>

@stack('style')


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="application/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="application/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="home">
<nav class="navbar navbar-expand-xl justify-content-between">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button">
            <i class="icofont-navigation-menu"></i>
        </button>
        <div class="navbar-collapse collapse nav-fotografia w-50 order-1 order-xl-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('home')}}">@lang('Home') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('about')}}">@lang('About') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('services')}}">@lang('Services') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('blog')}}">@lang('Blog') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('gallery')}}">@lang('Gallery') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{route('product')}}">@lang('Shop') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('contact') }}">@lang('Contact') </a>
                </li>
            </ul>
        </div>
        <a href="{{route('home')}}"
           class="navbar-brand d-block text-center order-0 order-xl-1 w-25 uppercase">
            <img src="{{getFile(config('location.logo.path').'logo.png') ? : 0}}" alt="@lang($basic->site_title)">
        </a>
        <div class="navbar-collapse collapse nav-fotografia w-50 order-2">
            <ul class="nav navbar-nav ml-auto">
                @guest
                    <li class="nav-item sign-in">
                        <button type="button" class="nav-link" data-toggle="modal"
                                data-target="#signin">@lang('Sign In')</button>
                    </li>
                @endguest
                @auth
                    <div class="dropdown sign-in">
                        <button class="dropdown-toggle nav-link" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                            @lang('My Profile')
                        </button>
                        <div class="dropdown-menu dropdown-menu-profile">
                            <a class="dropdown-item" href="{{route('user.home')}}">
                                <i class="icofont-dashboard mr-2"> </i> {{trans('Dashboard')}}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                <i class="icofont-gear-alt mr-2"></i> @lang('My Profile')
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icofont-power mr-2"></i> @lang('Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
                <li class="nav-item book-now">
                    <button type="button" class="nav-link" data-toggle="modal"
                            data-target="#booking">@lang('Book Now')</button>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="side-nav">
    <button class="cross">&times;</button>
    <div class="book-and-signin">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item book-now">
                <button type="button" class="nav-link" data-toggle="modal"
                        data-target="#booking">@lang('Book Now')</button>
            </li>
            @guest
            <li class="nav-item sign-in">
                <button type="button" class="nav-link" data-toggle="modal"
                        data-target="#signin">@lang('Sign In')</button>
            </li>
            @endguest
        </ul>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('home')}}">@lang('Home') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('about')}}">@lang('About Us') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('services')}}">@lang('Services') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('blog')}}">@lang('Blog') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('gallery')}}">@lang('Gallery') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-0" href="{{route('product')}}">@lang('Shop') </a>
        </li>

        <li class="nav-item">
            <a class="nav-link pl-0" href="{{ route('contact') }}">@lang('Contact') </a>
        </li>
    </ul>

    @if(isset($contentDetails['social']))
        <div class="social-links">
            <ul class="social-icon">
                @foreach($contentDetails['social'] as $data)
                    <li class="">
                        <a href="{{@$data->content->contentMedia->description->link}}">
                            <i class="{{@$data->content->contentMedia->description->icon}}"></i><span
                                class="text-r text-12 font-open regualr"> {{@$data->description->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


@if(isset($exception) &&  $exception->getStatusCode() > 400)
@else
    @include($theme.'partials.banner')
@endif


@yield('content')




@if(isset($exception) &&  $exception->getStatusCode() > 400)
@else
    @include($theme.'partials.footer')
@endif


@stack('extra-content')

@include($theme.'partials.modal-form')

<script src="{{asset($themeTrue.'js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/popper.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery-ui.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/bootstrap.min.js')}}"></script>

@stack('extra-js')

<script src="{{asset($themeTrue.'js/notiflix-aio-2.7.0.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery.exzoom.js')}}"></script>
<script src="{{asset($themeTrue.'js/plugins.js')}}"></script>
<script src="{{asset($themeTrue.'js/mixitup.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/slick.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/wow.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/multi-animated-counter.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery.lineProgressbar.js')}}"></script>
<script src="{{asset($themeTrue.'js/jquery.flipper-responsive.js')}}"></script>
<script src="{{asset($themeTrue.'js/main.js')}}"></script>


<script src="{{asset($themeTrue.'js/pusher.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/vue.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/axios.min.js')}}"></script>

@stack('script')


@include($theme.'partials.notification')
<script>
    "use strict";
    var root = document.querySelector(':root');
    root.style.setProperty('--base', '{{config('basic.base_color')}}');
    root.style.setProperty('--transparent-base', '{{hex2rgba(str_replace('#','',config('basic.base_color')), 0.7)}}');

</script>

</body>
</html>
