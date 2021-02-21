<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="item-lon" content='{{ $meta_lon ?? 0 }}' />
    <meta name="item-lat" content='{{ $meta_lat ?? 0 }}' />
    <meta name="data-backend" content='{!!  $data_backend ?? '' !!}'>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('front/fonts/fontawesome-free-5.14.0-web/css/all.css') }}" >
		<link rel="stylesheet" href="{{ asset('front/fonts/Geometria/stylesheet.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style/main/style.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style/main/view-style.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style/main/object-card.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style/main/contacts.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style/main/new-buildings.css') }}"> --}}
    <link rel="stylesheet" href="{{ mix('/users/css/app.min.css') }}">

    <link href="{{ asset('static/css/2.8f118048.chunk.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/main.b4c1df24.chunk.css') }}" rel="stylesheet">
    <title>{{ $page_title ?? $html_title }}</title>
    @section('head')
    @show
</head>

<body>
    <!-- Header -->
    @include('partials/header_new')
    <!-- Конец Header -->
    <!-- main content -->
    @yield('content')
    <!-- end of mobile content -->
    <!-- Footer -->
    @include('partials/footer')
    <!-- Всплывающие окна -->
    @include('partials/modals')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="{{ mix('/users/js/app.min.js') }}"></script>

    @include('partials/scripts')
    @yield('scripts')
    @if (!Config::get('app.debug'))
        <link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
        <script type="text/javascript"
            src="https://cdn.envybox.io/widget/cbk.js?cbk_code=e3edd5e3c5c2efdf3ae00b10bd4f2e28" charset="UTF-8" async>
        </script>
    @endif
</body>

</html>
