
<li class="ml-20">
    <div class="dropdown account-dropdown">
        <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <img src="{{getFile(config('location.user.path').auth()->user()->image)}}" alt="@lang('Profile Image')">
        </a>
        <div class="dropdown-menu dropdown-right">
            <div class="dropdown-content">

                <a class="dropdown-item" href="{{route('user.home')}}">
                    <div class="media align-items-center">
                        <div class="media-icon">
                            <i class="icofont-dashboard"></i>
                        </div>
                        <div class="media-body ml-15">
                            <h6 class="font-weight-regular">{{trans('Dashboard')}}</h6>
                        </div>
                    </div>
                </a>

                <a class="dropdown-item" href="{{ route('user.profile') }}">
                    <div class="media align-items-center">
                        <div class="media-icon">
                            <i class="icofont-gear-alt"></i>
                        </div>
                        <div class="media-body ml-15">
                            <h6 class="font-weight-regular">@lang('My Profile')</h6>
                            <p><i class="icofont-user-alt-7"></i><span class="ml-5">@lang('Set up all necessary info')</span></p>
                        </div>
                    </div>
                </a>

                <a class="dropdown-item" href="{{route('user.twostep.security')}}">
                    <div class="media align-items-center">
                        <div class="media-icon">
                            <i class="icofont-ssl-security"></i>
                        </div>
                        <div class="media-body ml-15">
                            <h6 class="font-weight-regular">@lang('2FA Security')</h6>
                        </div>
                    </div>
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    <div class="media align-items-center">
                        <div class="media-icon">
                            <i class="icofont-power"></i>
                        </div>
                        <div class="media-body ml-15">
                            <h6 class="font-weight-regular">{{__('Logout') }}</h6>
                        </div>
                    </div>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</li>
