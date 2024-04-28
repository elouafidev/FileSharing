<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{route('home')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset("assets/images/logo.png")}}" srcset="{{asset("assets/images/logo2x.png")}} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{asset("assets/images/logo-dark.png")}}" srcset="{{asset("assets/images/logo-dark2x.png")}} 2x" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @foreach($routes as $route)
                        <li class="nk-menu-item">
                            <a href="{{route($route['route'])}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="{{$route['icon']}}"></em></span>
                                <span class="nk-menu-text">{{$route['name']}}</span>
                            </a>
                        </li>
                    @endforeach


                    <li class="nk-menu-item">
                        <a href="html/email-templates.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                            <span class="nk-menu-text">Contact-nous</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
