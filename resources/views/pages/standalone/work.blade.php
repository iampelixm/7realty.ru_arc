@extends('layouts.site')

        @section('categories_menu')
        @endsection

        @section('categories_menu_mobile')
        @endsection

@section('content')
    <style>
        @media (min-width: 576px) {}

        @media (min-width: 768px) {}

        @media (min-width: 992px) {
            .thelogo {
                margin-left: 50%;
                width: 220px;
                transform: translateX(-50%) translateY(-50%);
                margin-top: -5px;
                border: 1px solid #C1A771;
                outline: 1px solid #C1A771;
                outline-offset: -10px;
                background: white;
            }
        }

        @media (min-width: 1200px) {
            .thelogo {
                width: 280px;
            }

        }

        .sevenp {
            display: block;
            margin: 0 auto;
            width: 40%;
            text-align: center;
            margin-bottom: 30px;
        }

        .seventitle {
            font-family: Geometria;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 25px;
            margin-top: 17px;
        }

        .seventitle__image {
            margin-right: 15px;
        }

        .seventext {
            font-family: Geometria;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 18px;
            color: #333;
            margin-top: 17px;
        }

        .text__sevengold {
            color: #C1A771;
        }

        .sevenboxtitle {
            color: #C1A771;
            background: white;
            padding-left: 20px;
            padding-right: 20px;
            margin-left: 50%;
            transform: translate(-50%) translateY(-50%);
            display: inline-block;
            margin-top: 0;
        }

        .sevengoldbox {
            border: 1px solid #C1A771;
            padding-left: 12px;
            padding-right: 12px;
            padding-bottom: 20px;
            margin-top: 20px;
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

        .border-gold {
            border: 1px solid #C1A771;
        }

    </style>

    <div class="container d-none d-lg-block sevengoldbox" style="margin-top: 150px;">
        <img class="thelogo" src="/users/image/2000.png" />
        @include('pages.standalone.worksvg_large')
        <div class="sevengoldbox" style="margin-top: 50px; margin-left: 70px; margin-right: 70px;">
            <h3 class="sevenboxtitle">Seven Realty</h3>
            <div class="infoinner" style="padding: 70px; text-align: justify;">
                <p>Компания <span class="text__sevengold">Seven</span> – это группа экспертов, работающая на
                    рынке недвижимости с 2007 года. Наша компания предлагает комплексный подход в области недвижимости,
                    включая
                    покупку и продажу, как жилой, так и коммерческой недвижимости, а также доходное инвестирование.
                </p>
                <p>
                    Деятельность компании охватывает все стадии реализации объектов от купли-продажи до сдачи в аренду,
                    работы с
                    коммерческой недвижимостью и реализации инвестиционных сделок.
                </p>
                <p>
                    Наши клиенты – это наши постоянные гости. Мы были неоднократно признаны профессионалами в сфере операций
                    с
                    недвижимостью, мы придерживаемся высочайшего уровня сервиса и стандартов качества услуг.
                </p>
                <p>
                    О наших продажах и сделках говорят в кулуарах конкуренты, а застройщики отмечают наградами.
                </p>
                <p>
                    Мы платим честные проценты от сделки, не вычитаем и не хитрим при начислении. Честность и четкость -
                    важные
                    слова в <span class="text__sevengold">Seven.</span>
                </p>
            </div>
        </div>

        <a href="https://sochi.hh.ru/employer/5137663" class="sevenboxtitle"
            style="text-decration: none; border: 1px solid #C1A771; border-radius: 25px">НАШИ ВАКАНСИИ</a>
    </div>

    <div class="container d-block d-lg-none">
        <img class="sevenp" src="/users/image/7p.png">
        <h3 class="seventitle text__sevengold"><img class="seventitle__image" src="/users/image/razvitie.png">Развитие</h3>
        <p class="seventext">Профессионализм – это то, благодаря чему мы стали известны, а обучение – это то, что движет нас
            вперед. Наши
            сотрудники постоянно обучаются, чтобы соответствовать требованиям рынка и быть на шаг впереди.
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image"
                src="/users/image/individualnost.png">Индивидуальность</h3>
        <p class="seventext">Мы верим в индивидуальность, поэтому мы даем возможность реализоваться и ценим вклад в развитие
            <span class="text__sevengold">Seven Realty.</span>
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image" src="/users/image/chestnost.png">Честность
        </h3>
        <p class="seventext">Делать бизнес честно - это выгодно!<br>
            Мы за честные отношения с сотрудниками, клиентами и партнерами. Для наших клиентов мы продаем и покупаем только
            то, что купили бы сами! У нас прозрачная система, сотрудникам и партнерам мы осуществляем своевременные выплаты
            комиссионных
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image" src="/users/image/uslovia.png">Условия
        </h3>
        <p class="seventext">Работа в самом сердце города Сочи, большой и стильный офис с видом на пальмы. Служебное авто
            для показа объектов, удобный график работы, корпоративная связь, юридическая и рекламная поддержка. Высокая
            оплата труда. И, конечно же, дружный коллектив.
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image" src="/users/image/stil.png">Стиль
        </h3>
        <p class="seventext">Стиль работы наших сотрудников - это их отношение к жизни и к бизнесу. Мы очень любим свое
            дело, дорожим репутацией и оказываем только первоклассный сервис.
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image"
                src="/users/image/vozmozhnosti.png">Возможности
        </h3>
        <p class="seventext">В нашей компании уровень дохода не имеет верхней планки. Мы поддерживаем амбициозные планы
            наших сотрудников и верим в то, что возможности любого человека безграничны!
        </p>

        <h3 class="seventitle text__sevengold"><img class="seventitle__image" src="/users/image/vozmozhnosti.png">Доверие
        </h3>
        <p class="seventext">Более 10 лет на рынке недвижимости. Наши сотрудники – это наша ценность, мы налаживаем
            длительные отношения, как с нашими сотрудниками, так и с клиентами, потому что верим, что длительные
            доверительные отношения – это залог успеха.
        </p>

        <div class="sevengoldbox">
            <h3 class="seventitle text__sevengold sevenboxtitle" style="white-space: nowrap">Seven Realty</h3>
            <p>
                Компания <span class="text__sevengold">Seven</span> – это группа экспертов, работающая на рынке недвижимости
                с 2007 года. Наша компания
                предлагает комплексный подход в области недвижимости, включая покупку и продажу, как жилой, так и
                коммерческой недвижимости, а также доходное инвестирование.
            </p>
            <p>
                Деятельность компании охватывает все стадии реализации объектов от купли-продажи до сдачи в аренду, работы с
                коммерческой недвижимостью и реализации инвестиционных сделок.
            </p>
            <p>
                Наши клиенты – это наши постоянные гости. Мы были неоднократно признаны профессионалами в сфере операций с
                недвижимостью, мы придерживаемся высочайшего уровня сервиса и стандартов качества услуг.
            </p>
            <p>
                О наших продажах и сделках говорят в кулуарах конкуренты, а застройщики отмечают наградами.
            </p>
            <p>
                Мы платим честные проценты от сделки, не вычитаем и не хитрим при начислении. Честность и четкость - важные
                слова в <span class="text__sevengold">Seven.</span>
            </p>

        </div>

        <a href="https://sochi.hh.ru/employer/5137663" class="sevenboxtitle"
            style="text-decration: none; border: 1px solid #C1A771; border-radius: 25px; white-space: nowrap">НАШИ
            ВАКАНСИИ</a>
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
@endsection
