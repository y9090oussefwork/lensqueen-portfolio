<a class="das-nav nav-item {{menuActive('user.home')}} " href="{{route('user.home')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/db_nav_icon_1.png')}}" alt="@lang('Dashboard Icon')">
        </div>
        <span>@lang('Dashboard')</span>
    </div>
</a>


<a class="das-nav nav-item" href="{{route('product')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/icons8-favorite-cart-50.png')}}" alt="@lang('Shop')">
        </div>
        <span>@lang('Shop')</span>
    </div>
</a>

<a class="das-nav nav-item {{menuActive(['user.myPlans'])}}" href="{{route('user.myPlans')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/icons8-plan-50.png')}}" alt="@lang('MyPlans Icon')">
        </div>
        <span>@lang('My Plans')</span>
    </div>
</a>



<a class="das-nav nav-item {{menuActive(['user.myProducts'])}}" href="{{route('user.myProducts')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/icons8-basket-64.png')}}" alt="@lang('myProducts Icon')">
        </div>
        <span>@lang('Purchased Item')</span>
    </div>
</a>


<a class="das-nav nav-item {{menuActive(['user.wishlist'])}}" href="{{route('user.wishlist')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/icons8-wish-list-50.png')}}" alt="@lang('Wishlist Icon')">
        </div>
        <span>@lang('Wishlist')</span>
    </div>
</a>


<a class="das-nav nav-item {{menuActive(['user.myBooking'])}}" href="{{route('user.myBooking')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/icons8-planner-64.png')}}" alt="@lang('myBooking Icon')">
        </div>
        <span>@lang('My Booking')</span>
    </div>
</a>


<a class="das-nav nav-item {{menuActive(['user.fund-history', 'user.fund-history.search'])}}" href="{{route('user.fund-history')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/db_nav_icon_3.png')}}" alt="@lang('Payment Icon')">
        </div>
        <span>@lang('Payment History')</span>
    </div>
</a>


<a class="das-nav nav-item {{menuActive(['user.profile'])}}" href="{{route('user.profile')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/feature_1.png')}}" alt="@lang('Profile Settings Icon')">
        </div>
        <span>@lang('Profile Settings')</span>
    </div>
</a>


<a class="das-nav nav-item {{menuActive(['user.ticket.list', 'user.ticket.create', 'user.ticket.view'])}}" href="{{route('user.ticket.list')}}">
    <div class="icon-wrapper">
        <div class="nav-icon">
            <img src="{{asset($themeTrue.'images/icon/feature_3.png')}}" alt="@lang('Support Ticket Icon')">
        </div>
        <span>@lang('Support Ticket')</span>
    </div>
</a>
