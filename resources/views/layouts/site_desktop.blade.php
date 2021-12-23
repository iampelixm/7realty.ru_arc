<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="item-lon" content='{{ $meta_lon ?? 0 }}' />
    <meta name="item-lat" content='{{ $meta_lat ?? 0 }}' />
    <meta name="data-backend" content='{!! $data_backend ?? '' !!}'>
    <meta name="description" content="@section('meta_description')@show">
    <meta name="theme-color" content="#C1A771">
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
    <title>
        @yield('page_title')
        {{-- {{ $page_title ?? $html_title }} --}}
    </title>
    @section('head')
    @show
</head>

@section('body')

    <body class="{{ $body_class ?? '' }}">
        <!-- Header -->
    @section('header')
        <header class="main-header main-header_position">
        @section('top_menu')
            @include('partials.top_menu_desktop')
        @show

        @section('header_logo')
            @include('partials.header_logo')
        @show

        @section('categories_menu')
            @include('partials.categories_menu')
        @show
    </header>
@show

<!-- Конец Header -->
<!-- main content -->
@yield('content')
<!-- end of mobile content -->
<!-- Footer -->
@include('partials/footer')
<!-- Всплывающие окна -->

{{-- этот пиздец засирает страницу --}}
{{-- @include('partials/modals') --}}
<div class="modal modal-form fade" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 40px; padding: 0">
            <div class="modal-body">
                <div class="modal-form__content-wrapper">
                    <h1 class="modal-form__title">
                        Оставьте ваши контакты
                        и получите ответ эксперта
                        уже <span class="text-gold">сегодня</span>
                    </h1>
                </div>
                <form action="/form" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="modal-form__content-wrapper">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ваше имя"
                            required>
                        <input type="tel" name="phone" id="phone" class="form-control"
                            placeholder="Ваш номер телефона" required>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ваш вопрос"
                            required>
                    </div>
                    <div class="modal-form__button-wrapper">
                        <div class="modal-form__content-wrapper">
                            <button class="mx-auto button w-100">
                                ОТПРАВИТЬ ЗАЯВКУ
                            </button>
                        </div>
                    </div>
                    <div class="modal-form__content-wrapper">
                        <div class="modal-form__disclaimer">
                            Нажимая на кнопку “Отправить” Вы соглашаетесь на обработку данных.
                            <a href="">Политика конфиденциальности.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('/users/js/app.min.js') }}"></script>

@include('partials/scripts')
@yield('scripts')
@if (!Config::get('app.debug'))
    <link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
    <script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?cbk_code=e3edd5e3c5c2efdf3ae00b10bd4f2e28"
        charset="UTF-8" async>
    </script>
@endif
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
            .insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(73798639, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/73798639" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
</body>
@show

</html>
