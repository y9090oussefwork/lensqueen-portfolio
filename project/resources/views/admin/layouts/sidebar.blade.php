<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">@lang('Dashboard')</span>
                    </a>
                </li>

                {{--Manage Booking--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage Booking')</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.bookingForm')}}" aria-expanded="false">
                        <i class="fab fa-wpforms"></i>
                        <span class="hide-menu">@lang('Generate Form')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.all.bookingRequest','admin.show.booking.request.form'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.all.bookingRequest')}}" aria-expanded="false">
                        <i class="fab fa-wpforms"></i>
                        <span class="hide-menu">@lang('Pending Request')</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{route('admin.all.bookingRequest.nonPending')}}" aria-expanded="false">
                        <i class="fab fa-wpforms"></i>
                        <span class="hide-menu">@lang('Booking History')</span>
                    </a>
                </li>


                {{--Manage Plan--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Plan Manage')</span></li>
                <li class="sidebar-item {{menuActive(['admin.planList','admin.planCreate','admin.planEdit'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.planList')}}" aria-expanded="false">
                        <i class="fas fa-cubes"></i>
                        <span class="hide-menu">@lang('Plan List')</span>
                    </a>
                </li>


                <li class="sidebar-item {{menuActive(['admin.purchased.planList','admin.show.booking.form'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.purchased.planList')}}" aria-expanded="false">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span class="hide-menu">@lang('Sold Plan')</span>
                    </a>
                </li>


                {{--Manage Product--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage Shop')</span></li>
                <li class="sidebar-item {{menuActive(['admin.productList','admin.productCreate','admin.productEdit','admin.productReview'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.productList')}}" aria-expanded="false">
                        <i class="fas fa-store"></i>
                        <span class="hide-menu">@lang('Product List')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.purchased.productList')}}" aria-expanded="false">
                        <i class="fas fa-shopping-basket"></i>
                        <span class="hide-menu">@lang('Sold Item')</span>
                    </a>
                </li>




                {{--Manage User--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage User')</span></li>

                <li class="sidebar-item {{menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.users') }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">@lang('All User')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.email-send') }}"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu">@lang('Send Email')</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">@lang('All Transaction ')</span></li>

                <li class="sidebar-item {{menuActive(['admin.transaction*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.transaction') }}" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="hide-menu">@lang('Transaction')</span>
                    </a>
                </li>





                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Payment Settings')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.methods')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu">@lang('Payment Methods')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payment.log','admin.payment.search'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.log')}}" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu">@lang('Payment Log')</span>
                    </a>
                </li>


                <li class="nav-small-cap"><span class="hide-menu">@lang('Support Tickets')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.ticket')}}" aria-expanded="false">
                        <i class="fas fa-ticket-alt"></i>
                        <span class="hide-menu">@lang('All Tickets')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['open']) }}"
                       aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu">@lang('Open Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['closed']) }}"
                       aria-expanded="false">
                        <i class="fas fa-times-circle"></i>
                        <span class="hide-menu">@lang('Closed Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['answered']) }}"
                       aria-expanded="false">
                        <i class="fas fa-reply"></i>
                        <span class="hide-menu">@lang('Answered Ticket')</span>
                    </a>
                </li>



                <li class="nav-small-cap"><span class="hide-menu">@lang('Controls')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.basic-controls')}}" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">@lang('Basic Controls')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="hide-menu">@lang('Email Settings')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-controls')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Email Controls')</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-template.show')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Email Template') </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-mobile-alt"></i>
                        <span class="hide-menu">@lang('SMS Settings')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms.config') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Controls')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms-template') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="hide-menu">@lang('Push Notification')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.notify-config')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Configuration')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.notify-template.show') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{menuActive(['admin.language.create','admin.language.edit*','admin.language.keywordEdit*'],3)}}">
                    <a class="sidebar-link" href="{{  route('admin.language.index') }}"
                       aria-expanded="false">
                        <i class="fas fa-language"></i>
                        <span class="hide-menu">@lang('Manage Language')</span>
                    </a>
                </li>



                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Theme Settings')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.logo-seo')}}" aria-expanded="false">
                        <i class="fas fa-image"></i>
                        <span class="hide-menu">@lang('Manage Logo & SEO')</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.breadcrumb')}}" aria-expanded="false">
                        <i class="fas fa-file-image"></i>
                        <span class="hide-menu">@lang('Manage Banner')</span>
                    </a>
                </li>



                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-images"></i>
                        <span class="hide-menu">@lang('Manage Gallery')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.tagManage')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Gallary Tags')</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.galleryList')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Gallery Items') </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{menuActive(['admin.template.show*'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">@lang('Section Headings')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line {{menuActive(['admin.template.show*'],1)}}">

                        @foreach(array_diff(array_keys(config('templates')),['message','template_media']) as $name)
                            <li class="sidebar-item {{ menuActive(['admin.template.show'.$name]) }}">
                                <a class="sidebar-link {{ menuActive(['admin.template.show'.$name]) }}"
                                   href="{{ route('admin.template.show',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>


                @php
                    $segments = request()->segments();
                    $last  = end($segments);
                @endphp


                <li class="sidebar-item {{menuActive(['admin.content.create','admin.content.show*'],3)}}">
                    <a class="sidebar-link has-arrow {{Request::routeIs('admin.content.show',$last) ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">@lang('Content Settings')</span>
                    </a>


                    <ul aria-expanded="false" class="collapse first-level base-level-line {{menuActive(['admin.content.create','admin.content.show*'],1)}}">
                        @foreach(array_diff(array_keys(config('contents')),['message','content_media']) as $name)

                            <li class="sidebar-item {{($last == $name) ? 'active' : '' }} ">
                                <a class="sidebar-link {{($last == $name) ? 'active' : '' }}"
                                   href="{{ route('admin.content.index',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="list-divider"></li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
