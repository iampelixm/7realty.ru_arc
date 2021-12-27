<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="item-lon" content='{{ $meta_lon ?? 0 }}' />
    <meta name="item-lat" content='{{ $meta_lat ?? 0 }}' />
    <meta name="data-backend" content='{!! $data_backend ?? '' !!}'>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <meta name="description" content="@section('meta_description')@show" >
    @yield('meta_description')
    <meta name="theme-color" content="#C1A771">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('/users/css/app_mobile.min.css') }}">

    <title>{{ $page_title ?? $html_title }}</title>
    @section('head')
    @show
</head>

<body>
    <div class="app">
        <!-- Header -->
        @section('header')
            <header class="main-header">
                <div class="main-header__buttons-wrapper">

                    <div class="main-header__phone">
                        <x-icon name="phone-tube" width="15" />
                    </div>

                    <div class="main-header__logo">
                        <img src="/users/image/mobile/logo.png">
                    </div>

                    <div class="main-header__menu-button" onClick="showHideMenu('.header-menu')">
                        <x-icon name="menu-button" width="15" />
                    </div>
                </div>

                <div class="main-header__slogan">
                    Помогаем людям
                    купить недвижимость с 2007 года
                </div>

                <div class="main-header__menu-wrapper">
                    <div class="header-menu">
                        <div class="header-menu__city-select">
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="selectCityDropdown" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <x-icon name="map-marker" /> {{ $current_city_title }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="selectCityDropdown">
                                    @foreach ($cities as $city)
                                        <a class="dropdown-item" href="{{ route('site.change_city', $city->id) }}">
                                            {{ $city->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="header-menu__menu-type-switch-wrapper">
                            <div class="header-menu__menu-type-switch active"
                                onClick="switchElement('.header-menu__menu-wrapper', '.header-menu__menu-type-switch-wrapper', '#menuPortal')">
                                Портал
                            </div>
                            <div class="header-menu__menu-type-switch"
                                onClick="switchElement('.header-menu__menu-wrapper', '.header-menu__menu-type-switch-wrapper', '#menuCategories')">
                                Недвижимость
                            </div>
                        </div>
                        <div class="header-menu__menu-wrapper">
                            <div class="header-menu__menu-container active" id="menuPortal">
                                @include('partials.top_menu_mobile')
                            </div>
                            <div class="header-menu__menu-container" id="menuCategories">
                                @include('partials.categories_menu_mobile')
                            </div>
                        </div>
                        <div class="header-menu__close-button-wrapper">
                            <div class="header-menu__close-button" onClick="showHideMenu('.header-menu')">
                                &#x2715;
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @show
        <!-- Конец Header -->
        <!-- main content -->
        <div class="main-content">
            @yield('content')
        </div>
        <!-- end of mobile content -->
        <!-- Footer -->
        @include('partials/footer_mobile')
        <!-- Всплывающие окна -->

        {{-- этот пиздец засирает страницу --}}
        {{-- @include('partials/modals') --}}

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->


        <script src="{{ mix('/users/js/app_mobile.min.js') }}"></script>

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
    </div>
@stack('javascript')

</body>

</html>
