@extends('layouts.site')

        @section('categories_menu')
        @endsection

        @section('categories_menu_mobile')
        @endsection

@section('head')

    <style>
        header.main-header {
            background: transparent;
        }

        body {
            background-image: url(/users/image/hero_sobstvennikam.jpg);
            background-repeat: no-repeat;
            background-position: top center;
        }

        /* .hero {

                    max-height: 712px;
                    min-height: 650px;
                } */

        .landing {
            font-family: Geometria;
            font-size: 18px;
        }

        .landing .section {
            apadding-top: 75px;
        }

        .landing h1 {
            color: #C1A771;
            text-transform: uppercase;
            text-align: center;

        }

        .landing h2 {
            font-size: 24px;
            text-transform: uppercase;
            margin-top: 40px;
            text-align: center;
        }

        .landing h3 {
            text-align: center;
        }

        .landing h6 {
            text-align: center;

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

        .landing .top-form {
            padding-left: -10%;
            padding-right: -10%;
        }

        .landing .top-form input {
            background: transparent;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .landing .top-form input:focus {
            background: transparent;
            border: none;
        }

        .landing .top-form input::placeholder {
            color: #333;
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

        .landing .hoverline h4 {
            font-size: 16px;
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

        .loop-man {
            background: url(/users/image/loop_man.jpg);
            width: 100%;
            height: 100%;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 100px 0px;
            min-height: 300px;
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

        .landing .left-diamond-inline {
            list-style: none;
            margin: 0 auto;
            text-align: center;
            font-size: 14px;
        }

        .landing .left-diamond-inline li {
            display: inline-block;
            text-transform: uppercase;
            margin-left: 10px;
        }

        .landing .left-diamond-inline li::before {
            content: '◆';
            color: #C1A771;
            margin-right: 5px;
        }

    </style>

@endsection

@section('content')
    <div class="landing">

        <div class="hero">
            <div class="main-header-desktop-content section" style="background: transparent; padding-bottom: 150px;">
                <h1
                    style="margin-top: 109px; margin-bottom:0; padding-bottom: 0; font-size: 48px; line-height: 60px; font-weight: 600">
                    КРУГЛОСУТОЧНЫЙ СЕРВИС <br>
                    ПО ПРОДАЖЕ ВАШЕЙ НЕДВИЖИМОСТИ
                </h1>
                <h2 style="margin-top:0; padding-top: 0;">
                    ЗАПОЛНИТЕ ДАННЫЕ И ПОЛУЧИТЕ БЕСПЛАТНУЮ КОНСУЛЬТАЦИЮ ЭКСПЕРТА
                </h2>
                <div style="margin-top: 107px;">
                    <div style="text-align: center; text-transform: uppercase; color: #C1A771; padding-bottom: 70px; font-size: 36px; font-weight: 700">
                        Я продаю
                    </div>
                    @include('pages.standalone.elements.leadform_room')
                </div>
            </div>
        </div>

        <div class="main-header-desktop-content section" style="padding-top: 0;">
            {{-- <h1>ЧТО МЫ ПРЕДЛАГАЕМ</h1> --}}
            <h1>ПОЧЕМУ ПРОДАВАТЬ С НАМИ БЫСТРО И ВЫГОДНО</h1>

            <div class="row align-items-end" style="margin-top: 70px; padding-left: -10%; padding-right: -10%">
                <div class="col-lg text-center hoverline">
                    <div>
                        <x-icon name="house-dollar" style="height: 60px;" />
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0">ОЦЕНКА<br> НЕДВИЖИМОСТИ</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col-lg text-center hoverline">
                    <div>
                        <x-icon name="heart-small" width="48" height="44" />
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0">ПЕРСОНАЛЬНЫЙ<br> БРОКЕР</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col-lg text-center hoverline">
                    <div>
                        <x-icon name="tech" />
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0">МАРКЕТИНГОВЫЕ<br> ТЕХНОЛОГИИ</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col-lg text-center hoverline">
                    <div>
                        <x-icon name="law" />
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0">ЮРИДИЧЕСКОЕ<br> СОПРОВОЖДЕНИЕ</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>

                <div class="col-lg text-center hoverline">
                    <div>
                        <x-icon name="shield-check" />
                    </div>
                    <div>
                        <h4 class="mt-3 mb-0 pb-0">КОНТРОЛЬ<br>КАЧЕСТВА</h4>
                    </div>
                    <div class="goldline mx-auto mt-3">&nbsp;</div>
                </div>
            </div>

            <div class="col-lg-10 offset-lg-1 mt-5 pt-5">
                <p align="center" class="text-center mt-5">
                    Юридическая служба окажет полный спектр профессиональных юридических услуг по<br> сопровождению сделок
                </p>
                <div class="gold-line mt-4">

                </div>
            </div>
        </div>

        <div class="" style="background: url(/users/image/section_room.jpg); margin-top: 146px;">
            <div class="row pt-5" style="background: rgba(0,0,0,0.4);">
                <div class="main-header-desktop-content" style="background: transparent">
                    <h1 class="text-center text-white pb-0 mb-0 mt-4" style="font-size: 48px;">ОЦЕНКА НЕДВИЖИМОСТИ</h1>
                    <h4 class="text-white pt-0 mt-0 w-75 text-center mx-auto" style="font-size: 18px; font-weight: 200">Наш
                        эксперт сравнит сделки с аналогичными параметрами за последние полгода и даст точное заключение
                        по рыночной стоимости объекта недвижимости.</h4>
                    <h2 class="text-white" style="margin-top: 70px;">ОСТАВЬТЕ ЗАЯВКУ ЭКСПЕРТУ</h2>
                    <div style="margin-top: 40px; margin-bottom: 40px;">
                        @include('pages.standalone.elements.leadform_room')
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header-desktop-content section" style="margin-top: 150px;">
            <h1 style="font-size: 48px">ПЕРСОНАЛЬНЫЙ БРОКЕР</h1>
            <h3 style="font-size: 24px">ПОЗАБОТИИТСЯ ОБО ВСЕМ!</h3>
            <p style="font-size: 18px; margin-top: 40px; text-align: center">
                На всех этапах брокер является вашим эксклюзивным представителем и возьмет на себя все заботы,<br>
                связанные с продажей недвижимости:
            </p>
            <div class="row" style="margin-top: 70px;">
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="rich-man">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-8 d-flex flex-column justify-content-between">
                    <div class="row">
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ОЦЕНИТ НЕДВИЖИМОСТЬ
                                </h5>
                                <div style="color: #333">
                                    проведёт сравнительный анализ, даст экспертное заключение по цене и сроках продажи
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПОДГОТОВИТ ДОКУМЕНТЫ
                                </h5>
                                <div style="color: #333">
                                    проведет аудит и подготовит пакет документов для сделки
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПОДГОТОВИТ КВАРТИРУ К ПРОДАЖЕ
                                </h5>
                                <div style="color: #333">
                                    организует выезд дизайнера и технических служб для устранения неполадок
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПРЕДЛОЖИТ АЛЬТЕРНАТИВНЫЕ СПОСОБЫ ПРОДАЖИ
                                </h5>
                                <div style="color: #333">
                                    через аукцион или бартер
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ДЕЙСТВУЕТ КАК ДОВЕРЕННОЕ ЛИЦО
                                </h5>
                                <div style="color: #333">
                                    остается на связи 24/7, гарантирует конфиденциальность
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПРОФЕССИОНАЛЬНО ПРЕЗЕНТУЕТ ОБЪЕКТ
                                </h5>
                                <div style="color: #333">
                                    оганизует показы и профессионально отработает возражения покупателя
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ОКАЖЕТ СОДЕЙСТВИЕ В ПЕРЕГОВОРАХ
                                </h5>
                                <div style="color: #333">
                                    аргументирует стоимость, ответит на вопросы о собственности
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <x-icon name="double-check" width="30" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ОКАЖЕТ ПОМОЩЬ В ПЕРЕЕЗДЕ И ПОДБОРЕ ПЕРСОНАЛА
                                </h5>
                                <div style="color: #333">
                                    наши проверенные партнеры помогут с решением задач на высоком уровне
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-4" style="background: url(/users/image/section_upakuem.jpg); margin-top: 150px; padding-bottom: 70px">

            <div class="container" style="margin-top: 70px;">
                <h1 style="font-size: 48px;">ПОДГОТОВКА К ПРОДАЖЕ</h1>
                <h5 class="text-center" style="font-size: 24px; font-weight: 700l">
                    УПАКУЕМ ВАШУ КВАРТИРУ В ЛУЧШЕМ ВИДЕ, ЧТОБЫ ИСКЛЮЧИТЬ<br>
                    НЕ АРГУМЕНТИРОВАННЫЙ ТОРГ
                </h5>
            </div>

            <div class="row"
                style="background: rgba(255,255,255,0.6); margin-top: 150px; padding-top: 40px; padding-bottom: 40px;">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <x-icon name="double-check" height="40" width="40" />
                        <div class="pl-2" style="font-size: 16px">
                            ПРОВЕДЕМ
                            ПРОФЕССИОНАЛЬНУЮ ФОТОСЪЕМКУ
                        </div>

                        <x-icon name="double-check" height="40" width="40" />
                        <div class="pl-2" style="font-size: 16px">
                            СОЗДАДИМ
                            3D -ТУР ПО ОБЪЕКТУ
                        </div>

                        <x-icon name="double-check" height="40" width="40" />
                        <div class="pl-2" style="font-size: 16px">
                            ОТРИСУЕМ
                            ПЛАНИРОВКИ
                        </div>

                        <x-icon name="double-check" height="40" width="40" />
                        <div class="pl-2" style="font-size: 16px">
                            СОЗДАДИМ
                            ПРОДАЮЩЕЕ ПОРТФОЛИО
                        </div>
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 70px; padding-bottom: 70px">
                <h1 style="color: #000; font-weight: 700; font-size: 48px;">1% ИНВЕСТИРОВАННЫЙ В STAGING<br>
                    ПОВЫШАЕТ СТОИМОСТЬ НЕДВИЖИМОСТИ НА 3-5%</h1>

                <ul class="left-diamond-inline">
                    <li>
                        Уборка
                    </li>
                    <li>
                        расхламление
                    </li>
                    <li>
                        деиндивидуализация
                    </li>
                    <li>
                        косметика
                    </li>
                    <li>
                        иллюминация
                    </li>
                    <li>
                        ароматизация
                    </li>
                </ul>
            </div>

            <div class="" style="margin-top: 70px">
                <div class="text-center">
                    <a href="#" class="rounded-pill bg-white text-center"
                        style="padding-top: 15px; padding-bottom: 15px; padding-left: 60px; padding-right: 60px; font-weight: 700; font-size: 18px; color:#333; border: 1px solid #C1A771;">
                        ПОДАТЬ ЗАЯВКУ
                    </a>
                </div>
            </div>
        </div>

        <div class=""
            style="padding-bottom: 150px; padding-top: 150px; background: url(/users/image/section_marketingovie_tehnologii.jpg); background-position: center center; background-size: cover">
            <div class="container">
                <h1 style="font-size: 48px;">МАРКЕТИНГОВЫЕ ТЕХНОЛОГИИ</h1>
                <h2 class="text-white" style="font-size: 24px; margin-top: 15px;">
                    НИКАКИХ НАЧАЛЬНЫХ ЗАТРАТ ПОКА ВАШ ОБЪЕКТ НЕ БУДЕТ ПРОДАН
                </h2>
                <div class="text-white text-center" style="font-size: 18px; margin-top: 40px; font-weight: 400">
                    Мы не берем комиссию для покрытия затрат за консультации, создание презентационных материалов, рекламное
                    продвижение
                </div>
            </div>

            <div class="container pt-4 text-white">
                <div class="row" style="margin-top: 70px;">
                    <div class="col d-flex">
                        <x-icon name="double-check" style="width: 60px" />
                        <div class="pl-2">
                            <h5 class="pt-0 mt-0 pb-2 mb-0">
                                БОЛЕЕ 40 ТЫСЯЧ ПОСЕТИТЕЛЕЙ
                                НАШЕГО САЙТА В МЕСЯЦ
                            </h5>
                            <div>
                                ваши потенциальные покупатели
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <x-icon name="double-check" style="width: 60px" />
                        <div class="pl-2">
                            <h5 class="pt-0 mt-0 pb-2 mb-0">
                                БОЛЕЕ 70 ТЫСЯЧ КЛИЕНТОВ,
                                ВКЛЮЧАЯ FORBES 100
                            </h5>
                            <div>
                                получат электронные, SMS и Whatsapp-рассылки
                                о вашем объекте
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 70px;">
                    <div class="col d-flex">
                        <x-icon name="double-check" style="width: 60px" />
                        <div class="pl-2">
                            <h5 class="pt-0 mt-0 pb-2 mb-0">
                                4 ТОПОВЫЕ
                                ПЛОЩАДКИ
                            </h5>
                            <div>
                                ЦИАН, Яндекс.Недвижимость, ДомКлик и Авито для размещения премиум-объявления об объекте
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <x-icon name="double-check" style="width: 60px" />
                        <div class="pl-2">
                            <h5 class="pt-0 mt-0 pb-2 mb-0">
                                КАЧЕСТВЕННЫЕ РЕКЛАМНЫЕ МАТЕРИАЛЫ
                            </h5>
                            <div>
                                наружная реклама, фотосъемка, 3D-моделирование, виртуальные туры
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 70px;">
                    <div class="col d-flex">
                        <x-icon name="double-check" style="width: 60px" />
                        <div class="pl-2">
                            <h5 class="pt-0 mt-0 pb-2 mb-0">
                                ЦИФРОВОЙ МАРКЕТИНГ
                            </h5>
                            <div>
                                от Facebook до Google, создание сайта объекта, реклама по собственным алгоритмам
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div style="width:45px;">&nbsp;</div>
                        <div class="pl-2 pt-4 w-100">
                            <a href="#" class="rounded-pill text-center w-100 d-block"
                                style="padding-top: 20px; padding-bottom: 15px; padding-left: 40px; padding-right: 40px; color: #000; font-weight: 700; font-size: 18px; background: #C1A771; border: 1px solid #C1A771;">
                                ПОДАТЬ ЗАЯВКУ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header-desktop-content section section" style="padding-top: 150px;">
            <h1 style="font-size: 48px;">ЮРИДИЧЕСКОЕ СОПОВОЖДЕНИЕ</h1>
            <h5 class="text-center" style="font-size: 18px; font-weight: 400">Юридическая служба окажет полный спектр профессиональных юридических услуг по сопровождению сделок</h5>

            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПРОРАБОТКА ФИНАНСОВО - ПРАВОВЫХ СТРУКТУР
                                </h5>
                                <div>
                                    реализации и приобретения объектов недвижимости
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ОРГАНИЗАЦИЯ ГОСУДАРСТВЕННОЙ РЕГИСТРАЦИИ
                                </h5>
                                <div>
                                    в соответствии со структурой сделок
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПОДГОТОВКА ВСЕХ НЕОБХОДИМЫХ ПРОЕКТОВ ДОКУМЕНТОВ
                                </h5>
                                <div>
                                    в соответствии со структурой сделок
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col d-flex">
                            <x-icon name="double-check" style="width: 60px" />
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    НАЛОГОВЫЙ АНАЛИЗ И МОДЕЛИРОВАНИЕ ПОСЛЕДСТВИЙ
                                </h5>
                                <div>
                                    оценка рисков и структурирование сделок с учетом налоговых обязательств
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-end">
                    <div>
                        <img src="/users/image/law_staff.jpg" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>

        <div class="gold-line d-flex justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">
            <a href="#" class="rounded-pill border-gold p-2 px-4"
                style="position: absolute; transform: translateY(-50%); background: #FFF; text-decoration: none; color: #777">
                ПОДАТЬ ЗАЯВКУ
            </a>
        </div>


        <div class="container section" style="margin-top: 150px;">
            <h1 style="font-size: 48px;">КОНТРОЛЬ КАЧЕСТВА</h1>
            <h5 class="text-center" style="font-size: 24px; font-weight: 700;">В ЛИЧНОМ КАБИНЕТЕ ВЫ ВСЕГДА БУДЕТЕ В КУРСЕ ТОГО, КАК ПРОДАЁТСЯ ВАШ ОБЪЕКТ</h5>
            <div class="text-center" style="margin-top: 40px; font-size: 18px;">
                Мы еженедельно анализируем количество обращений по объекту. На основании фактических данных<br> мы
                осуществляем продвижение или корректируем стратегию.
            </div>
            <div class="row" style="margin-top: 70px;">
                <div class="col-lg-7 d-none d-lg-block">
                    <div>
                        <div class="loop-man">
                            &nbsp;
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 flex-column">
                    <div class="row">
                        <div class="col d-flex">
                            <div>
                                <x-icon name="double-check" width="30" height="30" />
                            </div>
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    КОЛИЧЕСТВО ПРОСМОТРОВ НА САЙТЕ
                                </h5>
                                <div style="color: #333; font-size: 14px;">
                                    На основании данных независимых систем подсчета посетителей, Яндекс.Метрика и
                                    Гугл.Аналитика
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col d-flex">
                            <div>
                                <x-icon name="double-check" width="30" height="30" />
                            </div>
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    КОЛИЧЕСТВО ОБРАЩЕНИЙ И ЗАЯВОК
                                </h5>
                                <div style="color: #333; font-size: 14px;">
                                    На основанни данных, поступающих в CRM систему компании
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 ">
                        <div class="col d-flex ">
                            <div>
                                <x-icon name="double-check" width="30" height="30" />
                            </div>
                            <div class="pl-2">
                                <h5 class="pt-0 mt-0 pb-2 mb-0">
                                    ПРОГНОЗЫ О СРОКАХ ПРОДАЖИ
                                </h5>
                                <div style="color: #333; font-size: 14px;">
                                    На основанные на данных о продаже аналогичного объекта
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section" style="margin-top: 150px;">
            <h1 class="text-center" style="font-size: 48px;">ПОЛУЧИТЕ ПЕРСОНАЛЬНЫЙ СЕРВИС ПРОДАЖИ НЕДВИЖИМОСТИ</h1>
            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-4">
                    <div class="rich-man">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-8" style="padding-left: 60px; padding-top: 60px;">
                    <h1 class="mt-4 text-left">ПРОДАТЬ<br>НЕДВИЖИМОСТЬ</h1>
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
    <div class="container section" style="padding-top: 150px;">&nbsp;</div>
@endsection
