<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{route('home')}}" class="logo-link">
                    <h6>{{config('app.name')}}</h6>
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        @guest
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info d-none d-md-block">
                                        <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>{{Auth::user()->name[0]}}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ Auth::user()->name }}</span>
                                            <span class="sub-text">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="{{route('profile')}}"><em class="icon ni ni-user-alt"></em><span>{{__('Profile')}}</span></a></li>
                                    </ul>
                                    <ul class="link-list">
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <em class="icon ni ni-signout"></em><span>{{__('Sign out')}}</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
