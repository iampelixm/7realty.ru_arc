@extends('layouts.site')

@section('head')
    <style>
        .logobox {
            display: none;
        }

        .container {
            padding: 0;
        }

        .textgold {
            color: #C1A771;
        }

        .titlebox {
            position: absolute;
            margin-left: 50%;
            transform: translateX(-50%) translateY(-50%);
            background: white;
            text-align: center;
            left: 0;
            padding-right: 20px;
            padding-left: 20px;
            color: #C1A771;
        }



        .goldbg {
            background: #C1A771;
        }

        @media (min-width: 100px) {
            .sevengoldbox {
                border: 1px solid #C1A771;
            }

            .goldcontainer {
                border: none;
            }

            .titlebox h3 {
                font-size: 22px;
                white-space: nowrap;
            }

            .titlebox h4 {
                font-size: 14px;
            }

            .ceoword p {
                text-align: justify;
            }

            .boxintro {
                padding-top: 50px;
                margin-bottom: 40px;
            }

            .goldcontainer p {
                padding-left: 30px;
                padding-right: 30px;
                text-align: justify;
            }

            .imgceo {
                width: 100%;
            }

            .seventestimonials {
                margin-top: 40px;
                padding-top: 80px;
                padding-bottom: 80px;
                padding-left: 20px;
                padding-right: 20px;
                text-align: center;
                color: white;
            }

            .seventestimonials img {
                display: block;
                margin: 0 auto;
                width: auto;
            }

            .seventestimonials img.recycle {
                display: block;
                margin: 0 auto;
                width: 30%;
            }

            .seventestimonials .tm__item {
                margin-top: 60px;
            }

            .tm__item small {
                white-space: nowrap;
            }

            .seventestimonials h4 {
                font-family: Geometria;
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 25px;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            .seventestimonials small {
                font-size: 20px;
            }

            .imgcrystal {
                position: absolute;
                margin-left: 50%;
                transform: translate(-50%) translateY(-60%);
                left: 0;
                background: white;
                padding-left: 20px;
                padding-right: 20px;
            }

            .infotitlebox {
                display: flex;
                justify-content: center;
                margin-top: -20px;
            }

            .infotitlebox h3 {
                color: #C1A771;
                text-align: center;
                font-family: Geometria;
                font-style: normal;
                font-weight: bold;
                font-size: 16px;
                line-height: 45px;
                white-space: nowrap;
                background: white;
                padding-left: 10px;
                padding-right: 10px;
            }

            .infocontent {
                font-family: Geometria;
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 23px;
                text-align: justify;
                padding-left: 40px;
                padding-right: 40px;
                padding-bottom: 60px;
                color: #333;
            }

            .infobox {
                margin-top: 50px;
                margin-bottom: 0;
                width: auto;
            }

            .crystalwrapper {
                margin-bottom: 50px;
            }
        }

        @media (min-width: 400px) {
            .infotitlebox h3 {
                font-size: 24px
            }

            .seventestimonials h4 {
                font-size: 36px;
                white-space: nowrap;
            }

            .seventestimonials small {
                font-size: 38px;
            }

            .titlebox h3 {
                font-size: 24px;
                white-space: nowrap;
            }

            .titlebox h4 {
                font-size: 20px;
            }
        }

        @media (min-width: 992px) {
            .twolines {
                padding-left: 150px;
                padding-right: 150px;
            }

            .goldcontainer {
                border: 1px solid #C1A771;
            }

            .goldcontainer p {
                padding-left: 0;
                padding-right: 0;
                text-align: left;
            }

            .imgceo {
                width: 400px;
            }

            .logobox {
                display: block;
                position: absolute;
                width: 400px;
                background: white;
                margin-left: 50%;
                transform: translate(-50%) translateY(-50%);
                padding-left: 30px;
                padding-right: 30px;
                margin-top: 120px;
            }

            .logobox div {
                border: 2px solid #C1A771;
                padding: 10px;
            }

            .logobox img {
                width: 100%;
                border: 1px solid #C1A771;
                padding-left: 30px;
                padding-right: 30px;
            }

            .firstcontainer {
                margin-top: 120px;
            }

            .ceoword p {
                text-align: right;
            }

            .sevengoldbox {
                border: 1px solid #C1A771;
            }

            .titlebox h3 {
                font-family: Geometria;
                font-style: normal;
                font-weight: bold;
                font-size: 48px;
                /*line-height: 60px;*/
                /*display: flex;*/
                /*align-items: center;*/
                text-align: center;
                letter-spacing: 0.15em;
                text-transform: uppercase;
                line-height: 0.5;
            }


            .boxinner {
                margin-bottom: 70px;
                margin-top: 100px;
                margin-left: 40px;
                margin-right: 40px;
            }

            .boxintro {
                display: flex;
                align-items: center;
                margin-bottom: 40px;
            }

            .boxinner p {
                margin-right: 40px;
                font-family: Geometria;
                font-style: normal;
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
            }

            .seventestimonials {
                display: flex;
                justify-content: space-between;
                padding-top: 80px;
                padding-bottom: 80px;
                padding-left: 120px;
                padding-right: 120px;
                text-align: center;
                color: white;
            }

            .seventestimonials img {
                display: block;
                margin: 0 auto;
                width: auto;
            }

            .seventestimonials img.recycle {

                width: auto;
            }

            .seventestimonials h4 {
                font-family: Geometria;
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 25px;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            .seventestimonials small {
                font-size: 16px;
            }

            .tm_img_wrapper {
                height: 100px;
            }

            .imgcrystal {
                position: absolute;
                margin-left: 50%;
                transform: translate(-50%) translateY(-60%);
                left: 0;
                background: white;
                padding-left: 20px;
                padding-right: 20px;
            }

            .contentwrapper {
                padding-left: 100px;
                padding-right: 100px;
                padding-top: 160px;
            }

            .infotitlebox {
                display: flex;
                justify-content: center;
                margin-top: -20px;
            }

            .infotitlebox h3 {
                color: #C1A771;
                text-align: center;
                font-family: Geometria;
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 45px;
                white-space: nowrap;
                background: white;
                padding-left: 10px;
                padding-right: 10px;
            }

            .infocontent {
                font-family: Geometria;
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 23px;
                text-align: justify;
                padding-left: 40px;
                padding-right: 40px;
                padding-bottom: 60px;
                color: #333;
            }

            .infobox {
                width: 350px;
                margin-bottom: 50px;
                margin-top: 0;
            }

            .crystalwrapper {
                margin-bottom: 0px;
            }

        }

        @media(min-width: 1200px) {
            .twolines {
                padding-left: 150px;
                padding-right: 150px;
            }

            .infobox {
                width: 450px;
            }
        }

    </style>
@endsection

@section('content')


    <div class="logobox">
        <div>
            <img src="/users/image/2000.png">
        </div>
    </div>
    <div class="container goldcontainer firstcontainer">
        <div class="contentwrapper">
            <div class="sevengoldbox" style="margin-bottom: 40px;">
                <div class="titlebox">
                    <h3>Люди для людей</h3>
                </div>
                <div class="boxinner">
                    <div class="boxintro">
                        <div class="ceoword">
                            <p>
                                Дорогие Друзья!
                            </p>
                            <p>
                                Меня зовут Сергей Гоголев и я основатель компании <span class="textgold">Seven!</span>
                            </p>
                            <p>
                                Компания <span class="textgold">Seven</span> родилась в далеком, но от этого не менее жарком
                                и солнечном июле 2007 года. И летние, солнечные эмоции времени основания предопределили
                                настроение, с которым мы ведем бизнес!
                            </p>
                            <p>
                                С нами легко, надежно и солнечно!</p>
                        </div>
                        <img class="imgceo" src="/users/image/ceo.png">
                    </div>
                    <p>
                        В 2017 году под брендом <span class="textgold">Seven Realty</span>
                        мы открыли агентство недвижимости в Москве, а в конце 2020 года
                        стартовал
                        проект в Сочи!
                    </p>
                    <p>

                        Почему <span class="textgold">Se7en</span> ? Потому что цифра <span class="textgold">7</span> это
                        счастливое число! В нашем случае,
                        счастливое число каждой сделки,
                        которую
                        мы делаем для и вместе с нашими клиентами!
                    </p>
                    <p>

                        Сейчас компания насчитывает уже более 250 профессионалов в сфере недвижимости и мы продолжаем расти!
                    </p>
                    <p>
                        На протяжении многих лет мы занимаемся реализацией проектов высочайшего уровня! Мы очень любим свое
                        дело,
                        дорожим репутацией и предлагаем нашим клиентам только то, что купили бы сами!
                    </p>
                    <p>
                        Мы работаем только с лучшими в России и мире архитекторами, застройщиками и девелоперами! Вообще мы
                        работаем
                        только с лучшими в любой сфере! Потому что только работая с лучшими профессионалами можно
                        гарантировать
                        превосходный результат, к которому всегда стремимся мы и который так ценят наши клиенты!
                    </p>
                    <p>
                        Среди наших собственных проектов высококлассные объекты в сфере жилой недвижимости класса люкс,
                        торговые
                        комплексы и крупнейший в Европе гостиничный комплекс. С ними Вы можете познакомится ниже.
                    </p>
                    <h6 class="text-center textgold" style="text-transform: uppercase">Наша миссия</h6>
                    <p>
                        «Мы Помогаем Людям Купить Недвижимость!»
                    </p>
                    <h6 class="text-center textgold" style="text-transform: uppercase">Наше кредо</h6>
                    <p>
                        Люди для Людей
                    </p>
                    <p>
                        Звоните, пишите или просто приходите в наши офисы!
                    </p>
                    <p>
                        Мы всегда будем рады Вас видеть и помочь Вам купить или продать недвижимость! А также решить любые
                        другие
                        вопросы в этой сфере!
                    </p>
                    <p>&nbsp;</p>
                    <p>

                        До скорой всречи!<br>
                        Счастливых покупок и сделок!<br>
                        Сергей Гоголев<br>
                        Основатель <span class="textgold">SeVen Realty</span><br>
                    </p>
                </div>
            </div>
        </div>
        <div class="goldbg" style="">
            <div class="seventestimonials">

                <div class="tm__item">
                    <div class="tm_img_wrapper">
                        <img src="/users/image/bril.png">
                    </div>
                    <h4 class="tm__title">Признанные</h4>
                    <small>лидеры рынка</small>
                </div>
                <div class="tm__item">
                    <div class="tm_img_wrapper">
                        <img src="/users/image/handshake.png">
                    </div>
                    <h4 class="tm__title">Более 10 000</h4>
                    <small>успешных сделок</small>
                </div>
                <div class="tm__item">
                    <div class="tm_img_wrapper">
                        <img src="/users/image/2007.png">
                    </div>
                    <h4 class="tm__title">Год</h4>
                    <small>основания</small>
                </div>
                <div class="tm__item">
                    <div class="tm_img_wrapper">
                        <img class="recycle" src="/users/image/recycle.png">
                    </div>
                    <h4 class="tm__title">Эксперты</h4>
                    <small>в недвижимости</small>
                </div>

            </div>
        </div>

        <div class="goldcontainer" style="padding-top: 100px;">
            <div class="crystalwrapper">
                <div class="twolines">
                    <div style="width: 100%; margin-left: auto; margin-right: auto; border: 1px solid #C1A771"></div>
                    <div
                        style="margin-top: 20px; width: 90%; margin-left: auto; margin-right: auto; border-bottom: 1px solid #C1A771">
                    </div>
                </div>
                <img class="imgcrystal" src="/users/image/sevencrystal.png">
            </div>
            <div class="contentwrapper" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                <div class="sevengoldbox infobox" style="">
                    <div class="infotitlebox">
                        <h3>
                            Миссия и ценности
                        </h3>
                    </div>
                    <div class="infocontent">
                        Мы Помогаем Людям Купить или Продать
                        Недвижимость!<br><br>

                        Главные критерии нашей работы - это доверие, качество и ответственность. Наша цель – умножать успех
                        и создавать комфорт нашим клиентам.
                    </div>
                </div>

                <div class="sevengoldbox infobox" style="">
                    <div class="infotitlebox">
                        <h3>
                            Качество
                        </h3>
                    </div>
                    <div class="infocontent">
                        Критерий нашей работы - это превосходное качество услуг, при этом, мы, как и Вы - наши клиенты,
                        заботимся о будущем, потому что нам важно превзойти Ваши ожидания. Мы управляем покупками, продажами
                        не только для Вас, но и для следующих поколений. Нашими идеями мы вдохновляем Вас, а Ваши идеи – это
                        тонус для наших сотрудников.
                    </div>
                </div>

                <div class="sevengoldbox infobox" style="">
                    <div class="infotitlebox">
                        <h3>
                            Доверие
                        </h3>
                    </div>
                    <div class="infocontent">
                        Мы верим в профессионализм, открытость, надежность и взаимоуважение, поэтому это крепкий базис наших
                        отношений с каждым партнером. Доверие формирует нашу команду и делает ее сильнее.
                    </div>
                </div>

                <div class="sevengoldbox infobox" style="">
                    <div class="infotitlebox">
                        <h3>
                            Ответственность
                        </h3>
                    </div>
                    <div class="infocontent">
                        Мы ответственны перед каждым клиентом. Мы четко представляем весь алгоритм проведения любой сделки и
                        внимательно контролируем его на каждом этапе. Работая с нами, вы находитесь в надежных руках и вам
                        ни о чем не нужно беспокоиться.
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="titlebox"
            satyle="text-transform: uppercase; background: transparent; white-space: nowrap; text-align: center">
            <h3>Помогаем людям</h3>
            <h4 style="text-transform: uppercase; white-space: nowrap">купить / продать недвижимость</h4>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
