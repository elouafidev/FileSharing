<!DOCTYPE html>
{{--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
 --}}
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('panel/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('panel/plugins/font-awesome/css/font-awesome.min.css')}}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="{{asset('panel/plugins/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset("panel/plugins/toastr/toastr.min.css")}}">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{asset('panel/css/AdminLTE.min.css')}}">
    {{-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. --}}
    <link rel="stylesheet" href="{{asset('panel/css/skins/skin-blue.min.css')}}">
    {{-- Custom CSS --}}
@yield('head')

{{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{-- [if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] --}}

    {{-- Google Font --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
{{--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
 --}}
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    {{-- Main Header --}}
    <header class="main-header">

        {{-- Logo --}}
        <a href="{{route('panel.home')}}" class="logo">
            {{-- mini logo for sidebar mini 50x50 pixels --}}
            <span class="logo-mini"><b>FS</b>P</span>
            {{-- logo for regular state and mobile devices --}}
            <span class="logo-lg"><b>{{config('app.name')}}</b> PANEL</span>
        </a>
        {{-- Header Navbar: --}}
    @include('panel.layouts.navbar-top')
    {{-- /.Header Navbar --}}

    </header>
    {{-- Left side column. contains the logo and sidebar --}}
    <aside class="main-sidebar">

        {{-- sidebar: style can be found in sidebar.less --}}
        <section class="sidebar">

            {{-- Sidebar user panel (optional) --}}
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('panel/img/avatar5.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    {{-- Status --}}
                </div>
            </div>


            @include('panel.layouts.main-sidebar')
        </section>
        {{-- /.sidebar --}}
    </aside>


    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <h1>
            @yield('titlepage')
            {{-- <small>Optional description</small> --}}
            </h1>
        </section>

        {{-- Main content --}}
        <section class="content container-fluid">

            @yield('content')

        </section>
        {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}

    {{-- Main Footer --}}
    <footer class="main-footer">
        {{-- To the right --}}
        {{--<div class="pull-right hidden-xs">
            Anything you want
        </div>--}}
        {{-- Default to the left --}}
        <strong>{{config('app.name')}} Copyright &copy; {{\Carbon\Carbon::now()->year}} Developed By <a href="//elouafi.dev">elouafi.dev</a>.</strong> All rights reserved.
    </footer>


{{-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar --}}
    <div class="control-sidebar-bg"></div>
</div>
{{-- ./wrapper --}}

{{-- REQUIRED JS SCRIPTS --}}

{{-- jQuery 3 --}}
<script src="{{asset('panel/plugins/jquery/dist/jquery.min.js')}}"></script>
{{-- Bootstrap 3.3.7 --}}
<script src="{{asset('panel/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{-- SlimScroll --}}
<script src="{{asset('panel/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
{{-- FastClick --}}
<script src="{{asset('panel/plugins/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset("panel/plugins/toastr/toastr.min.js")}}"></script>
{{-- AdminLTE App --}}
<script src="{{asset('panel/js/adminlte.min.js')}}"></script>
<script src="{{asset('panel/js/custom.js')}}"></script>

{{-- Ionic Framework --}}
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
{{-- Custom JavaScript --}}
@yield('script')
{{-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. --}}
<script>
    @if ($message = Session::get('success'))
    toastr.success('{{ $message }}');
    @endif
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}');
        @endforeach
    @endif
</script>
</body>
</html>
