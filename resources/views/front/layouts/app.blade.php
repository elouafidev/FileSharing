<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset("images/favicon.png")}}">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset("assets/css/dashlite.min.css?ver=3.1.2")}}">
    <link id="skin-default" rel="stylesheet" href="{{asset("assets/css/theme.css?ver=3.1.2")}}">
    <link rel="stylesheet" href="{{asset("plugins/toastr/toastr.min.css")}}">
    <style>
        .nk-sidebar-logo{
            font-weight: 700;
            font-size: large;
            color: white;
        }
    </style>
    @yield('head')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        @php($routes=[
            [
                'name' => __('Gestionnaire de fichiers'),
                'route' => 'file_manager',
                'icon' => 'icon ni ni-coins'
            ],
            [
                'name' => __('Contact-Nous'),
                'route' => 'contact',
                'icon' => 'icon ni ni-text-rich'
            ],
        ])
        @include('front.layouts.sidebar',['routes' => $routes])
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('front.layouts.header')
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            @include('front.layouts.footer')
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

<!-- JavaScript -->
<script src="{{asset("assets/js/bundle.js?ver=3.1.2")}}"></script>
<script src="{{asset("assets/js/scripts.js?ver=3.1.2")}}"></script>
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>
@yield('script')
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
