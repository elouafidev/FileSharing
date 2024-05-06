{{-- Header Navbar --}}
<nav class="navbar navbar-static-top" role="navigation">
    {{-- Sidebar toggle button --}}
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    {{-- Navbar Right Menu --}}
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            {{-- User Account Menu --}}
            <li class="dropdown user user-menu">
                {{-- Menu Toggle Button --}}
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{-- The user image in the navbar --}}
                    {{-- hidden-xs hides the username on small devices so only the image appears. --}}
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    {{-- The user image in the menu --}}
                    <li class="user-header">
                        <img src="{{asset('backend/img/avatar5.png')}}" class="img-circle" alt="User Image">

                        <p>
                            {{ Auth::user()->name }}
                        </p>
                    </li>
                    {{-- Menu Footer --}}
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
