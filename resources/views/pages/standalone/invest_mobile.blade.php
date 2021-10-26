@extends('layouts.site_mobile')

@section('header')
    <div class="page-invest">
        @parent
    </div>
@endsection

@section('content')
    <div class="page-invest">
        <section class="section-title">
            <div class="container">
                <h1 class="section-title__title">
                    Инвестиции в недвижимость
                </h1>
                <div class="section-title__words-wrapper">
                    <div class="section-title__words">
                        Инвестиции в недвижимость – это, пожалуй, один из самых надежных вариантов накопления капитала и
                        создания денежного потока. Вы не задумывались, почему в списке Forbes так много миллиардеров,
                        которые занимаются именно ею? Вложение денег в недвижимость – это не игра, не Forex и не торги на
                        бирже, доход от недвижимости предсказуем.
                    </div>
                    <div class="section-title__words">
                        А благодаря инфляции стоимость зданий растет, даже не смотря на небольшие просадки во время кризиса,
                        которые всегда отыгрываются. Эксперты компании Seven помогут Вам подобрать оптимальный вариант для
                        вложений Вашего капитала. Заполните форму ниже и начните свой путь успешного инвестора в
                        недвижимость.
                    </div>
                </div>
            </div>
        </section>

        <section class="section-lead">
            <div class="container">
                <div class="section-lead__title-wrapper">
                    <h2 class="section-lead__title">
                        Подберем для Вас лучшие
                        <span class="color-gold">инвестиционные</span> варианты
                    </h2>
                </div>
                <div class="section-lead__description">
                    Оставьте контакты, отправим подборку Вам на почту
                </div>
                <div class="section-lead__form-wrapper">
                    <form action="#" class="section-lead__form">
                        <input type="text" name="name" class="section-lead__form-input" placeholder="Ваше имя" required>

                        <input type="tel" name="phone" class="section-lead__form-input" placeholder="Номер телефона"
                            required>


                        <input type="email" name="email" class="section-lead__form-input" placeholder="Электронная почта"
                            required>

                        <button class="section-lead__form-button">
                            Получить варианты
                        </button>
                    </form>
                </div>

                <div class="section-lead__form-disclaimer">
                    Нажимая на кнопку “Получить варианты” Вы соглашаетесь на обработку данных.
                    <a href={{ route('site.standalone.politika') }}>Политика конфиденциальности.</a>
                </div>
            </div>
        </section>

        <section class="section-offer">
            <div class="container">
                <div class="section-offer__title">
                    Что мы предлагаем
                </div>
                <div class="section-offer__description">
                    Приобретение недвижимости до официального объявления старта продаж – удел избранных. <br>
                    Выгода от покупки в закрытых продажах в среднем составляет <span class="text-white">20%</span> от
                    стартовой цены.
                </div>
            </div>
            <div class="section-offer__bullets-wrapper slidethis owl-carousel" data-items="1" data-autoplay="false"
                data-margin="0">
                <div href="#hidden_sales" class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="lock" />
                    </div>
                    <div class="section-offer__bullet-title">
                        ЗАКРЫТЫЕ<br>
                        ПРОДАЖИ
                    </div>
                    <div class="section-offer__buttons-wrapper">
                        <a href="#hidden_sales" class="section-offer__button">
                            Смотреть варианты
                        </a>
                    </div>
                </div>

                <div href="#presale_sales" class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="house-refill" />
                    </div>
                    <div class="section-offer__bullet-title">
                        СТРОЯЩИЕСЯ<br>
                        ОБЪЕКТЫ
                    </div>
                    <div class="section-offer__buttons-wrapper">
                        <a href="#presale_sales" class="section-offer__button">
                            Смотреть варианты
                        </a>
                    </div>
                </div>

                <div href="#rent_sales" class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="house-moneysun" />
                    </div>
                    <div class="section-offer__bullet-title">
                        СТРОЯЩИЕСЯ<br>
                        ОБЪЕКТЫ
                    </div>
                    <div class="section-offer__buttons-wrapper">
                        <a href="#rent_sales" class="section-offer__button">
                            Смотреть варианты
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-sales">
            <div class="container">
                <div class="section-sales__title">
                    Закрытые продажи
                </div>
                <div class="section-sales__description">
                    ИНВЕСТИЦИИ ОТ 60% ГОДОВЫХ! ИНВЕСТИРУЙ НАДЕЖНО И ВЫГОДНО!
                </div>
                <div class="items-block">
                    <div class="items-block__items-container two-col">
                        @foreach ($hidden_items->slice(0, 4)->all() as $key => $slider_item)
                            @include('components.object_slider.default_mobile')
                        @endforeach
                    </div>
                </div>
                <div class="section-sales__text">
                    Приобретение недвижимости до официального объявления старта продаж – удел избранных. Выгода от покупки в
                    закрытых продажах в среднем составляет 20% от стартовой цены, с которой объект выйдет на открытый рынок.
                    Еще одним из поводов - ограниченное количество лотов. Вы можете выбрать лучшие варианты из
                    представленных. Объекты, находящиеся в закрытых продажах доступны лишь через ограниченный пул брокеров,
                    самостоятельно подобные предложения не найти. Более того, профессиональный брокер сможет помочь в выборе
                    наиболее привлекательного с точки зрения инвестиций лота. И только брокер, имеющий опыт и глубокую
                    экспертизу рынка может реалистично оценить потенциал будущей покупки.
                </div>
            </div>
            <div class="section-sales__button-wrapper">
                <a href="{{ route('site.get_category', $hidden_group->slug) }}" class="section-sales__button">
                    Смотреть варианты
                </a>
            </div>
        </section>

        <section class="section-sales">
            <div class="container">
                <div class="section-sales__title">
                    Строящиеся объекты
                </div>

                <div class="section-sales__description">
                    ИНВЕСТИЦИИ ОТ 40% ГОДОВЫХ! КВАЛИФИЦИРОВАННЫЙ БРОКЕР - ГАРАНТИЯ УСПЕХА.
                </div>
                <div class="items-block">
                    <div class="items-block__items-container two-col">
                        @foreach ($hidden_items->slice(0, 4)->all() as $key => $slider_item)
                            @include('components.object_slider.default_mobile')
                        @endforeach
                    </div>
                </div>
                <div class="section-sales__text">
                    Приобретение недвижимости до официального объявления старта продаж – удел избранных. Выгода от покупки в
                    закрытых продажах в среднем составляет 20% от стартовой цены, с которой объект выйдет на открытый рынок.
                    Еще одним из поводов - ограниченное количество лотов. Вы можете выбрать лучшие варианты из
                    представленных. Объекты, находящиеся в закрытых продажах доступны лишь через ограниченный пул брокеров,
                    самостоятельно подобные предложения не найти. Более того, профессиональный брокер сможет помочь в выборе
                    наиболее привлекательного с точки зрения инвестиций лота. И только брокер, имеющий опыт и глубокую
                    экспертизу рынка может реалистично оценить потенциал будущей покупки.
                </div>
            </div>`
            <div class="section-sales__button-wrapper">
                <a href="{{ route('site.get_category', $presale_group->slug) }}" class="section-sales__button">
                    Смотреть варианты
                </a>
            </div>
        </section>

        <section class="section-sales">
            <div class="container">
                <div class="section-sales__title">
                    Арендный бизнес
                </div>

                <div class="section-sales__description">
                    ИНВЕСТИЦИИ ОТ 20% ГОДОВЫХ!
                </div>
                <div class="items-block">
                    <div class="items-block__items-container two-col">
                        @foreach ($hidden_items->slice(0, 4)->all() as $key => $slider_item)
                            @include('components.object_slider.default_mobile')
                        @endforeach
                    </div>
                </div>
                <div class="section-sales__text">
                    Лучшие варианты недвижимости для сдачи в аренду. Не зная города и рынка аренды недвижимости очень сложно
                    сделать правильны выбор объекта. Может получится так, что два дома рядом стоящих будут существенно
                    отличатся в стоимости аренда. Но мало угадать с домом, нужно еще правильно выбрать район. Это касается
                    не только аренды, но и собственного отдыха, где Вам будет комфортно отдыхать. Для этого и необходим
                    квалифицированный специалист по недвижимости, а не дилетант - риелтор.
                </div>
            </div>`
            <div class="section-sales__button-wrapper">
                <a href="{{ route('site.get_category', $rent_group->slug) }}" class="section-sales__button">
                    Смотреть варианты
                </a>
            </div>
        </section>

        <section class="section-form">
            <div class="container">
                <div class="section-form__form-wrapper">
                    <form class="section-form__form" action="#" id="invest_form">
                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Ваше имя
                            </div>
                            <input class="section-form__input" type="text" name="name" id="name" required placeholder="">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Ваш номер телефона
                            </div>
                            <input class="section-form__input" type="tel" name="phone" id="phone" required placeholder="">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Ваш e-mail
                            </div>
                            <input class="section-form__input" type="email" name="email" id="email" required placeholder="">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Интересующий вид
                                недвижимости
                            </div>
                            <input class="section-form__input" type="text" name="ned_type" id="ned_type" required
                                placeholder="жилая, коммерческая, загородная, земля, строительство">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Ожидаемая доходность
                            </div>
                            <input class="section-form__input" type="text" name="roi" id="roi" required
                                placeholder="10%, 20%, 30%, 40%... годовых">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Сумма инвестирования
                            </div>
                            <input class="section-form__input" type="text" name="ihavemoney" id="ihavemoney" required
                                placeholder="1 000 000, 3 000 000, 5 000 000, 10 000 000...">
                        </div>

                        <div class="section-form__form-row">
                            <div class="section-form__input-title">
                                Когда Вы планируете
                                инвестировать
                            </div>
                            <input class="section-form__input" type="text" name="when" id="when" required
                                placeholder="выбираю варианты, в ближайшие 1/3/6/ месяцев, интересуюсь">
                        </div>
                    </form>
                </div>
            </div>
            <div class="section-form__button-wrapper">
                <button class="section-form__button" onclick="$('#ivest_form').submit()">
                    Отправить
                </button>
            </div>
            <div class="container">
                <div class="section-form__form-disclaimer">
                    Нажимая на кнопку “Отпарвить” Вы соглашаетесь на обработку данных.
                    <a href="{{ route('site.standalone.politika') }}" class="section-form__form-disclaimer-link">Политика
                        конфиденциальности.</a>
                </div>
            </div>
        </section>
    </div>
@endsection
