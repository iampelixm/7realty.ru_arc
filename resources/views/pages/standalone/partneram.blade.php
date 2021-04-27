@extends('layouts.site')

@section('head')

    <style>

        .main-header{
            background: transparent;
        }
        body{
            background-image: url(/users/image/hero_partneram.jpg);
            background-repeat: no-repeat;
            /* background-size: cover; */
            background-position: top left;
        }
        .hero {

            max-height: 712px;
            min-height: 650px;
            /* position: absolute; */
        }

        .landing {
            font-family: Geometria;
            font-size: 18px;
        }

        /* .landing .section {
            padding-top: 75px;
        } */

        .landing h1 {
            color: #C1A771;
            text-transform: uppercase;
            text-align: center;
            font-size: 48px;
            margin-bottom: 0;
        }

        .landing h2 {
            font-size: 24px;
            text-transform: uppercase;
            margin-top: 40px;
            text-align: center;
            margin-bottom: 0;
        }


        .landing .border-gold {
            border: 1px solid #C1A771;
        }

        .bg-gold {
            background: #C1A771;
        }


        .text-gold {
            color: #C1A771;
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

        .landing .title-left {
            font-size: 24px;
            color: #333;
            font-weight: 700;
            padding: 0;
            text-align: right;
            margin: 0;
        }

        .landing .subtitle-left {
            font-size: 16px;
            color: #333;
            font-weight: 200;
            padding: 0;
            text-align: right;
            margin: 0;
        }

        .landing .title-right {
            font-size: 24px;
            color: #C1A771;
            font-weight: 700;
            padding: 0;
            text-align: left;
            margin: 0;
        }

        .landing .subtitle-right {
            font-size: 16px;
            color: #C1A771;
            font-weight: 200;
            padding: 0;
            text-align: left;
            margin: 0;
        }

        .landing .icon-right {}

    </style>

@endsection

@section('content')
    <div class="landing">
        <div class="hero">
            <div class="main-header-desktop-content section d-block" style="background: transparent;">
                <div class="d-flex" style="padding-top: 30px">
                    <div class="acol-lg-7">
                        <img src="/users/image/money_man.png" style="width: 724px;">
                    </div>

                    <div class="acol-lg-5" style="padding-left: 130px;">
                        <h1 style="margin-top: 75px;">РАБОТАЕМ ВМЕСТЕ!</h1>
                        <h3 style="text-transform: uppercase; font-size: 20px;">Приведите клиента и получите до 70% от
                            комиссии компании</h3>

                        <div class="mt-4">
                            <div class="row flex-nowrap mt-4">
                                <div>
                                    <x-icon name="double-check" />
                                </div>
                                <div class="pl-4">
                                    Брокер из любого региона России
                                </div>
                            </div>

                            <div class="row flex-nowrap mt-4">
                                <div>
                                    <x-icon name="double-check" />
                                </div>
                                <div class="pl-4">
                                    Вы персональный ассистент руководителя и помогаете ему с поиском недвижимости
                                </div>
                            </div>

                            <div class="row flex-nowrap mt-4">
                                <div>
                                    <x-icon name="double-check" />
                                </div>
                                <div class="pl-4">
                                    Вы знакомы с человеком, который планирует купить или арендовать элитную недвижимость в
                                    России и за рубежом
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="#"
                                class="text-decoration: none; rounded-pill mt-5 bg-white d-block text-center w-75 mx-auto"
                                style="font-weight: 700; color:#333; border: 1px solid #C1A771; line-height: 50px">СТАТЬ
                                ПАРТНЕРОМ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section" style="padding-top: 70px">
            <h1 class="text-center" style="color: #C1A771">ПОЧЕМУ ЭТО ВЫГОДНО</h1>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">ВЫСОКОЕ ВОЗНАГРАЖДЕНИЕ</h2>
                    <h5 class="subtitle-left">Вы получаете от 30 до 70% от комиссии компании за сделку</h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="money-stack" />
                    <div class="pl-4 ml-2">
                        <h2 class="title-right">70 МЛН РУБЛЕЙ</h2>
                        <h5 class="subtitle-right">заработали партнеры за последний год</h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">
                        ПРОЗРАЧНАЯ СТАТИСТИКА
                    </h2>
                    <h5 class="subtitle-left">
                        Вносите данные о клиентах в crm и следите за статусом сделки
                    </h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="chart-up-look" />
                    <div class="pl-4 ml-2">
                        <h2 class="title-right">
                            Более 60
                        </h2>
                        <h5 class="subtitle-right">
                            партнерских сделок за 2020 год
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">
                        УДОБНЫЕ ВЫПЛАТЫ
                    </h2>
                    <h5 class="subtitle-left">
                        Получите заработанные средства удобным вам способом
                    </h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="wallet" />
                    <div class="pl-4 ml-2">
                        <h2 class="title-right">
                            7 млн рублей
                        </h2>
                        <h5 class="subtitle-right">
                            максимальная комиссия в этом году по партнерской программе
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">
                        100% ГАРАНТИЯ
                    </h2>
                    <h5 class="subtitle-left">
                        Все сроки выплат и суммы зафиксированы в договоре. Вы получите свое вознаграждение в полном объеме в
                        оговоренный срок
                    </h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="shield-check" />
                    <div class="pl-4 ml-2">
                        <h2 class="title-right">
                            более 200
                        </h2>
                        <h5 class="subtitle-right">
                            партнеров присоединились к нашей программе
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">
                        24/7 ПОДДЕРЖКА
                    </h2>
                    <h5 class="subtitle-left">
                        Персональный брокер сопровождает на всех этапах работы и поможет решить вопросы с клиентами
                    </h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="support-agent" />
                    <div class="pl-4 ml-2">
                        <h2 class="title-right">
                            20+ лет
                        </h2>
                        <h5 class="subtitle-right">
                            экспертиза на рынке элитной недвижимости
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="title-left">
                        КОНФИДЕНЦИАЛЬНОСТЬ
                    </h2>
                    <h5 class="subtitle-left">
                        Гарантируем полную конфиденциальность информации
                        о сделке и о клиенте
                    </h5>
                </div>

                <div class="col-lg-6 d-flex">
                    <x-icon name="microphone-mute" />
                    <div class="pl-4 ml-2">
                        <a href="#" class="rounded-pill bg-white d-block text-center px-5"
                            style="font-size: 14px; font-weight: 700; color:#333; border: 1px solid #C1A771; line-height: 40px">
                            СТАТЬ ПАРТНЕРОМ
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section" style="padding-top: 150px;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="rich-man">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-8" style="padding-left: 60px; padding-top: 60px;">
                    <h1 class="mt-4 text-left">РАБОТАЕМ<br>ВМЕСТЕ!</h1>
                    <form action="#" method="POST" enctype="application/x-www-form-urlencoded" class="bottom-form">
                        <input type="name" id="name" name="name" placeholder="Ваше имя" required>
                        <input type="tel" id="phone" name="phone" placeholder="Номер телефона" required>
                        <input type="email" id="email" name="email" placeholder="Ваш e-mail" required>
                        <button class="rounded-pill w-100 p-2 border-gold bg-white" style="margin-top: 40px;">
                        СТАТЬ ПАРТНЕРОМ
                        </button>
                        <small style="color: #777">Нажимая на кнопку Вы соглашаетесь на обработку данных. Политика
                            конфиденциальности.</small>
                    </form>
                </div>
            </div>
        </div>
        <div class="container section" style="padding-top: 150px;">&nbsp;</div>
    </div>
@endsection
