<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('panel/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('panel/plugins/font-awesome/css/font-awesome.min.css')}}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="{{asset('panel/plugins/Ionicons/css/ionicons.min.css')}}">
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

    {{-- recaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {{-- //recaptcha --}}



</head>
<body class="hold-transition login-page">
@yield("content")



{{-- REQUIRED JS SCRIPTS --}}

{{-- jQuery 3 --}}
<script src="{{asset('panel/plugins/jquery/dist/jquery.min.js')}}"></script>
{{-- Bootstrap 3.3.7 --}}
<script src="{{asset('panel/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{-- SlimScroll --}}
<script src="{{asset('panel/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
{{-- FastClick --}}
<script src="{{asset('panel/plugins/fastclick/lib/fastclick.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{asset('panel/js/adminlte.min.js')}}"></script>

{{-- Custom JavaScript --}}
@yield('script')
{{-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. --}}

</body>
</html>
