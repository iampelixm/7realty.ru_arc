@extends('layouts.site')

@section('head')

    <style>
        body {
            background-image: url(/users/image/hero_invest.jpg);
            background-repeat: no-repeat;
            background-size: auto 800px;
            background-position: top center;
        }

        .main-header{
            background: transparent;
        }
        .landing {
            font-family: Geometria;
            font-size: 18px;
        }

        .landing h1 {
            color: #C1A771;
            text-transform: uppercase;
            text-align: center;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .landing h2 {
            font-size: 24px;
            text-transform: uppercase;
            margin-top: 40px;
            text-align: center;
            margin-bottom: 0;
        }

        .landing h6 {
            text-align: center;

        }

        .landing ul.ancor_nav {
            list-style: none;
            margin: 0 auto;
            text-align: center;
            font-size: 14px;
        }

        .landing ul.ancor_nav li {
            display: inline-block;
            text-transform: uppercase;
        }

        .landing .ancor_nav li {}

        .landing ul.ancor_nav li::after {
            content: '◆';
            color: #C1A771;
            font-size: 8px;
            vertical-align: middle;
            margin-left: 10px;
            margin-right: 10px;
        }

        .landing .linespacer {
            border-bottom: 2px solid #C1A771;
            margin: 0 auto;
            width: 150px;
            margin-top: 70px;
            /* margin-bottom: 95px; */
        }

        .landing .form-group.rounded {
            border-radius: 0;
        }

        .landing .form-group.rounded:first-child {
            border-left: 1px solid #C1A771;
            border-radius: 50%;
        }

        .landing .form-group.rounded:last-child {
            border-right: 1px solid #C1A771;
        }

        .landing .form-group.rounded {
            border-top: 1px solid #C1A771;
            border-bottom: 1px solid #C1A771;
        }

        .landing .border-gold {
            border: 1px solid #C1A771;
        }

        .top-form input {
            background: transparent;
            border: none;
            text-align: center;
        }

        .top-form input:focus {
            background: transparent;
            border: none;
        }

        .bg-gold {
            background: #C1A771;
        }

        .gold-line {
            border-bottom: 1px solid #C1A771;
        }

        .text-gold {
            color: #C1A771;
        }

        .landing .hoverline:hover>.goldline {
            width: 80%;
        }

        .landing .hoverline {
            color: #333;
            transition: all 200ms;
        }

        .landing .hoverline:hover {
            color: #C1A771;
        }

        .landing .hoverline .goldline {
            width: 70px;
            border-bottom: 1px solid #C1A771;
            height: 1px;
            transition: all 400ms;
        }

        .rich-man {
            background: url(/users/image/rich_man.jpg);
            width: 100%;
            height: 100%;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 100px 0px;
            min-height: 577px;
        }

        .bottom-form input {
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid #C1A771;
            margin-top: 40px;
            color: #C1A771;
        }

        .bottom-form input::placeholder {
            color: #C1A771
        }

    </style>

@endsection

@section('content')
    <div class="landing">

        <div class="hero">
            <div class="container section">
                <h1 style="margin-top: 73px;">ИНВЕСТИЦИИ<br>В НЕДВИЖИМОСТЬ</h1>
                <ul class="ancor_nav">
                    <li>закрытые продажи</li>
                    <li>строящиея объекты</li>
                    <li>арендный бизнес</li>
                </ul>
                <h2 style="margin-top: 40px;">ПОДБЕРЕМ ЛУЧШИЕ ИНВЕСТИЦИОННЫЕ ВАРИАНТЫ ДЛЯ ВАС!</h2>

                <div class="linespacer"></div>

                <h6 class="" style="margin-top: 79px; margin-bottom: 15px;">Оставьте контакты, отправим подборку на почту</h6>
                <form action="#" method="POST" enctype="application/x-www-form-urlencoded" class="w-100 top-form">
                    <div class="row border-gold rounded-pill align-items-center overflow-hidden"
                        style="background: rgba(255, 255, 255, 0.7);">
                        <div class="col ">
                            <input type="text" name="name" id="name" placeholder="Ваше имя"
                                class="form-control py-2 rounded-pill">
                        </div>
                        <div class="bg-gold" style="width: 2px">&nbsp;</div>
                        <div class="col ">
                            <input type="text" name="phone" id="phone" placeholder="Номер телефона"
                                class="form-control py-2 rounded-pill">
                        </div>

                        <div class="col bg-gold">
                            <input type="submit" class="form-control py-2 rounded-pill">
                        </div>
                    </div>
                    <p align="center" class="text-right" style="font-size: 14px; color: #777">
                        Нажимая на кнопку “Получить варианты” Вы соглашаетесь
                        на
                        обработку данных. Политика
                        конфиденциальности.
                    </p>
                </form>
            </div>
        </div>

        <div class="container section">
            <h1 style="margin-top: 110px;">ЧТО МЫ ПРЕДЛАГАЕМ</h1>

            <div class="row" style="margin-top: 75px;">
                <div class="col text-center hoverline">
                    <div>
                        <svg width="44" height="50" viewBox="0 0 44 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.68727 46.8752C1.27287 46.8752 0.875434 47.0398 0.582405 47.3328C0.289377 47.6259 0.124756 48.0233 0.124756 48.4377C0.124756 48.8521 0.289377 49.2495 0.582405 49.5426C0.875434 49.8356 1.27287 50.0002 1.68727 50.0002H42.3126C42.727 50.0002 43.1245 49.8356 43.4175 49.5426C43.7105 49.2495 43.8751 48.8521 43.8751 48.4377C43.8751 48.0233 43.7105 47.6259 43.4175 47.3328C43.1245 47.0398 42.727 46.8752 42.3126 46.8752H37.6251V7.81233C37.6251 6.56912 37.1312 5.37682 36.2521 4.49774C35.3731 3.61866 34.1808 3.12479 32.9375 3.12479H31.375V1.56228C31.375 1.33862 31.327 1.11758 31.2341 0.914092C31.1413 0.710604 31.0059 0.529412 30.837 0.382764C30.6682 0.236116 30.4698 0.12743 30.2553 0.0640504C30.0408 0.000671251 29.8152 -0.0159233 29.5938 0.0153885L7.71857 3.14042C7.34581 3.19312 7.00462 3.37864 6.75773 3.66284C6.51084 3.94705 6.37487 4.31084 6.37481 4.6873V46.8752H1.68727ZM31.375 6.24982H32.9375C33.3519 6.24982 33.7494 6.41444 34.0424 6.70747C34.3354 7.0005 34.5001 7.39793 34.5001 7.81233V46.8752H31.375V6.24982ZM23.5625 31.25C22.7 31.25 21.9999 29.85 21.9999 28.125C21.9999 26.4 22.7 25 23.5625 25C24.425 25 25.125 26.4 25.125 28.125C25.125 29.85 24.425 31.25 23.5625 31.25Z"
                                fill="#C1A771" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">ЗАКРЫТЫЕ ПРОДАЖИ</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col text-center hoverline">
                    <div>
                        <svg width="46" height="49" viewBox="0 0 46 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28 5.625V7.5H39.875C41.3668 7.5 42.7976 8.09263 43.8525 9.14752C44.9074 10.2024 45.5 11.6332 45.5 13.125V46.875C45.5 47.3723 45.3025 47.8492 44.9508 48.2008C44.5992 48.5525 44.1223 48.75 43.625 48.75H37.375C37.0435 48.75 36.7255 48.6183 36.4911 48.3839C36.2567 48.1495 36.125 47.8315 36.125 47.5V41.875C36.125 41.5435 35.9933 41.2255 35.7589 40.9911C35.5245 40.7567 35.2065 40.625 34.875 40.625H28.625C28.2935 40.625 27.9755 40.7567 27.7411 40.9911C27.5067 41.2255 27.375 41.5435 27.375 41.875V47.5C27.375 47.8315 27.2433 48.1495 27.0089 48.3839C26.7745 48.6183 26.4565 48.75 26.125 48.75H2.375C1.87772 48.75 1.40081 48.5525 1.04917 48.2008C0.697544 47.8492 0.5 47.3723 0.5 46.875V5.625C0.5 4.13316 1.09263 2.70242 2.14752 1.64752C3.20242 0.592632 4.63316 0 6.125 0H22.375C23.8668 0 25.2976 0.592632 26.3525 1.64752C27.4074 2.70242 28 4.13316 28 5.625ZM6.125 3.75C5.62772 3.75 5.15081 3.94754 4.79917 4.29917C4.44754 4.65081 4.25 5.12772 4.25 5.625V45H18V13.125C18 11.6332 18.5926 10.2024 19.6475 9.14752C20.7024 8.09263 22.1332 7.5 23.625 7.5H24.25V5.625C24.25 5.12772 24.0525 4.65081 23.7008 4.29917C23.3492 3.94754 22.8723 3.75 22.375 3.75H6.125ZM38 32.5C38 31.837 37.7366 31.2011 37.2678 30.7322C36.7989 30.2634 36.163 30 35.5 30C34.837 30 34.2011 30.2634 33.7322 30.7322C33.2634 31.2011 33 31.837 33 32.5C33 33.163 33.2634 33.7989 33.7322 34.2678C34.2011 34.7366 34.837 35 35.5 35C36.163 35 36.7989 34.7366 37.2678 34.2678C37.7366 33.7989 38 33.163 38 32.5ZM28 35C28.663 35 29.2989 34.7366 29.7678 34.2678C30.2366 33.7989 30.5 33.163 30.5 32.5C30.5 31.837 30.2366 31.2011 29.7678 30.7322C29.2989 30.2634 28.663 30 28 30C27.337 30 26.7011 30.2634 26.2322 30.7322C25.7634 31.2011 25.5 31.837 25.5 32.5C25.5 33.163 25.7634 33.7989 26.2322 34.2678C26.7011 34.7366 27.337 35 28 35ZM38 25C38 24.337 37.7366 23.7011 37.2678 23.2322C36.7989 22.7634 36.163 22.5 35.5 22.5C34.837 22.5 34.2011 22.7634 33.7322 23.2322C33.2634 23.7011 33 24.337 33 25C33 25.663 33.2634 26.2989 33.7322 26.7678C34.2011 27.2366 34.837 27.5 35.5 27.5C36.163 27.5 36.7989 27.2366 37.2678 26.7678C37.7366 26.2989 38 25.663 38 25ZM28 27.5C28.663 27.5 29.2989 27.2366 29.7678 26.7678C30.2366 26.2989 30.5 25.663 30.5 25C30.5 24.337 30.2366 23.7011 29.7678 23.2322C29.2989 22.7634 28.663 22.5 28 22.5C27.337 22.5 26.7011 22.7634 26.2322 23.2322C25.7634 23.7011 25.5 24.337 25.5 25C25.5 25.663 25.7634 26.2989 26.2322 26.7678C26.7011 27.2366 27.337 27.5 28 27.5ZM38 17.5C38 16.837 37.7366 16.2011 37.2678 15.7322C36.7989 15.2634 36.163 15 35.5 15C34.837 15 34.2011 15.2634 33.7322 15.7322C33.2634 16.2011 33 16.837 33 17.5C33 18.163 33.2634 18.7989 33.7322 19.2678C34.2011 19.7366 34.837 20 35.5 20C36.163 20 36.7989 19.7366 37.2678 19.2678C37.7366 18.7989 38 18.163 38 17.5ZM28 20C28.663 20 29.2989 19.7366 29.7678 19.2678C30.2366 18.7989 30.5 18.163 30.5 17.5C30.5 16.837 30.2366 16.2011 29.7678 15.7322C29.2989 15.2634 28.663 15 28 15C27.337 15 26.7011 15.2634 26.2322 15.7322C25.7634 16.2011 25.5 16.837 25.5 17.5C25.5 18.163 25.7634 18.7989 26.2322 19.2678C26.7011 19.7366 27.337 20 28 20Z"
                                fill="#C1A771" />
                        </svg>

                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">СТРОЯЩИЕСЯ ОБЪЕКЫ</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col text-center hoverline">
                    <div>
                        <svg width="48" height="51" viewBox="0 0 48 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24 5.63294e-07C24.321 5.63294e-07 24.642 0.0120006 24.96 0.0390006C22.8075 1.56219 21.052 3.57968 19.8409 5.92201C18.6298 8.26434 17.9985 10.8631 18 13.5C18 17.451 19.389 21.078 21.705 23.919L19.5 26.121V31.2C19.5 31.6774 19.3104 32.1352 18.9728 32.4728C18.6352 32.8104 18.1774 33 17.7 33H12V37.2C12 37.6774 11.8104 38.1352 11.4728 38.4728C11.1352 38.8104 10.6774 39 10.2 39H1.8C1.32261 39 0.864773 38.8104 0.527208 38.4728C0.189642 38.1352 0 37.6774 0 37.2V28.623C0.000420125 28.1458 0.190338 27.6882 0.528 27.351L12.486 15.393C11.9583 13.603 11.8554 11.7146 12.1855 9.87785C12.5155 8.04111 13.2693 6.30665 14.3871 4.81229C15.5049 3.31793 16.9558 2.10487 18.6245 1.26949C20.2933 0.434104 22.1338 -0.00057118 24 5.63294e-07Z"
                                fill="#C1A771" />
                            <path
                                d="M21 13.5C21.0002 11.1677 21.6046 8.8753 22.7543 6.8461C23.904 4.81691 25.5598 3.12018 27.5603 1.92128C29.5609 0.722373 31.8379 0.0621968 34.1694 0.00508643C36.501 -0.0520239 38.8076 0.49588 40.8644 1.5954C42.9212 2.69492 44.6581 4.30855 45.9058 6.27902C47.1535 8.2495 47.8694 10.5096 47.9838 12.8391C48.0981 15.1685 47.607 17.4879 46.5584 19.5711C45.5097 21.6543 43.9392 23.4303 42 24.726V30.876L44.349 33.228C44.6861 33.5655 44.8754 34.023 44.8754 34.5C44.8754 34.977 44.6861 35.4345 44.349 35.772L41.121 39L44.325 42.201C44.504 42.3801 44.6432 42.595 44.7335 42.8316C44.8238 43.0682 44.8632 43.3212 44.849 43.574C44.8349 43.8269 44.7675 44.0739 44.6514 44.299C44.5352 44.524 44.3729 44.722 44.175 44.88L37.125 50.52C36.8057 50.7756 36.409 50.9149 36 50.9149C35.591 50.9149 35.1943 50.7756 34.875 50.52L27.675 44.76C27.4645 44.5915 27.2946 44.3778 27.1777 44.1348C27.0609 43.8918 27.0002 43.6256 27 43.356V24.726C25.1531 23.4933 23.6391 21.8236 22.5925 19.8653C21.5458 17.907 20.9988 15.7205 21 13.5ZM36.75 10.5C36.75 9.90327 36.5129 9.33098 36.091 8.90902C35.669 8.48706 35.0967 8.25001 34.5 8.25001C33.9033 8.25001 33.331 8.48706 32.909 8.90902C32.4871 9.33098 32.25 9.90327 32.25 10.5C32.25 11.0967 32.4871 11.669 32.909 12.091C33.331 12.513 33.9033 12.75 34.5 12.75C35.0967 12.75 35.669 12.513 36.091 12.091C36.5129 11.669 36.75 11.0967 36.75 10.5Z"
                                fill="#C1A771" />
                        </svg>


                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">АРЕНДНЫЙ БИЗНЕС</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>
            </div>

            <div class="col-lg-10 offset-lg-1">
                <p align="center" class="text-center" style="margin-top: 70px;">
                    Приобретение недвижимости до официального объявления старта продаж – удел избранных. Выгода от
                    покупки в
                    закрытых продажах в среднем составляет 20% от стартовой цены.
                </p>
                <div class="gold-line" style="margin-top: 40px;">

                </div>
            </div>
        </div>

        <div class="container section" style="padding-top: 154px;">
            <h1>ЗАКРЫТЫЕ ПРОДАЖИ</h1>
            <h2 style="margin-top: 15px; font-size: 24px; margin-bottom: 0;">ИНВЕСТИЦИИ ОТ 60% ГОДОВЫХ! ИНВЕСТИРУЙ НАДЕЖНО И ВЫГОДНО!</h2>

            <div style="margin-top: 70px; margin-left: -50px; margin-right: -50px;">
                <div class="object-card-sliders">
                    <div class="row no-gutters">
                        <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                            @foreach (App\Models\Item::all()->take(7) as $key => $slider_item)
                                <!-- 5 Block - Размножаем этот блок -->
                                @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                                    @include(('components.object_slider.'.$slider_item->type->slug))
                                @else
                                    @include('components.object_slider.default')
                                @endif
                                {{-- @include('components.object_slider.default') --}}

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <p align="justify" class="text-justify" style="color: #777">
                Приобретение недвижимости до официального объявления старта продаж – удел избранных. Выгода от покупки в
                закрытых продажах в среднем составляет 20% от стартовой цены, с которой объект выйдет на открытый рынок.
                Еще
                одним из поводов - ограниченное количество лотов. Вы можете выбрать лучшие варианты из представленных.
                Объекты,
                находящиеся в закрытых продажах доступны лишь через ограниченный пул брокеров, самостоятельно подобные
                предложения не найти. Более того, профессиональный брокер сможет помочь в выборе наиболее
                привлекательного с
                точки зрения инвестиций лота. И только брокер, имеющий опыт и глубокую экспертизу рынка может
                реалистично
                оценить потенциал будущей покупки.
            </p>
        </div>

        <div class="gold-line d-flex justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="rounded-pill border-gold p-2 px-4"
                style="position: absolute; transform: translateY(-50%); background: #FFF">
                ПОЛНЫЙ КАТАЛОГ ИНВЕСТИЦИОННЫХ ПРЕДЛОЖЕНИЙ СОЧИ
            </div>
        </div>

        <div class="container section" style="padding-top: 50px;">
            <h1>СТРОЯЩИЕСЯ ОБЪЕКТЫ</h1>
            <h2>ИНВЕСТИЦИИ ОТ 40% ГОДОВЫХ! КВАЛИФИЦИРОВАННЫЙ БРОКЕР - ГАРАНТИЯ УСПЕХА.</h2>
            <div style="margin-top: 70px; margin-left: -50px; margin-right: -50px;">
                <div class="object-card-sliders">
                    <div class="row no-gutters">
                        <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                            @foreach (App\Models\Item::all()->take(7) as $key => $slider_item)
                                <!-- 5 Block - Размножаем этот блок -->
                                @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                                    @include(('components.object_slider.'.$slider_item->type->slug))
                                @else
                                    @include('components.object_slider.default')
                                @endif
                                {{-- @include('components.object_slider.default') --}}

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <p align="justify" class="text-justify" style="color: #777">
                Недвижимость в Сочи всегда в цене и стабильно растет. Правильно инвестируя в строящиеся объекты Вы
                зарабатываете
                от 40% годовых. Мало где можно получать такую прибыль, а учитывая нестабильную позицию российской валюты
                по
                сравнению с мировыми аналогами, держать средства в денежной массе не безопасно. Недвижимость всегда
                будет в
                цене, а особенно на лучшем курорте страны. Главное инвестировать в надежные и ликвидные объекты, а в
                этом
                Вам
                поможет квалифицированный специалист.
            </p>
        </div>

        <div class="gold-line d-flex justify-content-center" style="margin-top: 70px; margin-bottom: 100px;">
            <div class="rounded-pill border-gold p-2 px-4"
                style="position: absolute; transform: translateY(-50%); background: #FFF">
                ПОЛНЫЙ КАТАЛОГ ИНВЕСТИЦИОННЫХ ПРЕДЛОЖЕНИЙ СОЧИ
            </div>
        </div>


        <div class="container section" style="padding-top: 50px;">
            <h1>АРЕНДНЫЙ БИЗНЕС</h1>
            <h2 style="margin-top: 15px; margin-bottom: 0; font-size: 24px;">ИНВЕСТИЦИИ ОТ 20% ГОДОВЫХ!</h2>
            <div style="margin-top: 70px; margin-left: -50px; margin-right: -50px;">
                <div class="object-card-sliders">
                    <div class="row no-gutters">
                        <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                            @foreach (App\Models\Item::all()->take(7) as $key => $slider_item)
                                <!-- 5 Block - Размножаем этот блок -->
                                @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                                    @include(('components.object_slider.'.$slider_item->type->slug))
                                @else
                                    @include('components.object_slider.default')
                                @endif
                                {{-- @include('components.object_slider.default') --}}

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <p align="justify" class="text-justify" style="color: #777">
                Лучшие варианты недвижимости для сдачи в аренду. Не зная города и рынка аренды недвижимости очень сложно
                сделать
                правильны выбор объекта. Может получится так, что два дома рядом стоящих будут существенно отличатся в
                стоимости
                аренда. Но мало угадать с домом, нужно еще правильно выбрать район. Это касается не только аренды, но и
                собственного отдыха, где Вам будет комфортно отдыхать. Для этого и необходим квалифицированный
                специалист по
                недвижимости, а не дилетант - риелтор.
            </p>
        </div>


        <div class="gold-line d-flex justify-content-center" style="margin-top: 70px; margin-bottom: 100px;">
            <div class="rounded-pill border-gold p-2 px-4"
                style="position: absolute; transform: translateY(-50%); background: #FFF">
                ПОЛНЫЙ КАТАЛОГ ИНВЕСТИЦИОННЫХ ПРЕДЛОЖЕНИЙ СОЧИ
            </div>
        </div>
        <div class="container section" style="padding-top: 50px;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="rich-man">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-8" style="padding-left: 60px; padding-top: 60px;">
                    <h1 class="mt-4 text-left">ОБСУДИМ<br>СОТРУДНИЧЕСТВО?</h1>
                    <form action="#" method="POST" enctype="application/x-www-form-urlencoded" class="bottom-form">
                        <input type="name" id="name" name="name" placeholder="Ваше имя" required>
                        <input type="tel" id="phone" name="phone" placeholder="Номер телефона" required>
                        <input type="email" id="email" name="email" placeholder="Ваш e-mail" required>
                        <button class="rounded-pill w-100 p-2 border-gold bg-white" style="margin-top: 40px;">ОТПРАВИТЬ
                            ЗАЯВКУ</button>
                        <small style="color: #777">Нажимая на кнопку Вы соглашаетесь на обработку данных. Политика
                            конфиденциальности.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="" style="padding-top: 70px">&nbsp;</div>
@endsection
