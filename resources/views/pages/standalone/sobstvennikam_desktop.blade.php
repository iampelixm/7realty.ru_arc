@extends('layouts.site_desktop')
@section('categories_menu')
@show

@section('content')
    <div class="page-sobstvennikam">
        <section class="section-offer">
            <div class="container">
                <div class="section-offer__title-wrapper">
                    <h1 class="section-offer__title">
                        <span class="color-gold">Круглосуточный</span> сервис<br>
                        по продаже недвижимости
                    </h1>
                </div>
                <div class="section-offer__people">
                    <div class="section-offer__button">
                        я продаю
                    </div>
                </div>
            </div>
            <div class="section-offer__form-containerr">
                <div class="section-offer__form-wrapper">
                    <form action="#" method="POST" enctype="application/x-www-form-urlencoded" class="section-offer__form">
                        <div class="section-offer__form-input-wrapper" style="width: 240px">
                            <input class="section-offer__form-input" type="text" name="address" id="address"
                                placeholder="Населенный пункт, улица, дом">
                        </div>

                        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

                        <div class="section-offer__form-input-wrapper">
                            <input type="text" name="rooms" id="rooms" placeholder="Комнат"
                                class="section-offer__form-input">
                        </div>

                        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

                        <div class="section-offer__form-input-wrapper">
                            <input type="text" name="square" id="square" placeholder="Площадь"
                                class="section-offer__form-input">
                        </div>

                        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

                        <div class="section-offer__form-input-wrapper">
                            <input type="text" name="etaz" id="etaz" placeholder="Этаж" class="section-offer__form-input">
                        </div>

                        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

                        <div class="section-offer__form-input-wrapper">
                            <input type="text" name="phone" id="phone" placeholder="Номер телефона"
                                class="section-offer__form-input">
                        </div>

                        <div class="section-offer__form-input-wrapper bg-gold">
                            <input type="submit" class="section-offer__form-input bg-gold" value="Подать заявку">
                        </div>
                </div>
            </div>
            <p class="section-offer__form-disclaimer" style="font-size: 9px">
                Нажимая на кнопку “Отправить заявку” Вы соглашаетесь на обработку данных.
                <a href="{{ route('site.standalone.politika') }}">Политика конфиденциальности.</a>
            </p>
            </form>
        </section>
        <section class="section-bullets">
            <div class="container">
                <div class="section-bullets__title-wrapper">
                    <div class="section-bullets__title">
                        Почему продавать с нами
                        <span class="color-gold">быстро</span> и
                        <span class="color-gold">выгодно</span>:
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="section-bullets__bullets-wrapper">
                    <a href="#section_ocenka" class="section-bullets__bullet">
                        <div class="section-bullets__bullet-icon">
                            <x-icon name="house-rubble" />
                        </div>
                        <div class="section-bullets__bullet-text">
                            ОЦЕНКА<br> НЕДВИЖИМОСТИ
                        </div>
                        <div class="section-bullets__line">
                        </div>
                        <div class="section-bullets__bullet-description">
                            Поможет назначить выгодную цену и аргументировать стоимость продажи или аренды
                        </div>
                    </a>

                    <a href="#section_personal_broker" class="section-bullets__bullet">
                        <div class="section-bullets__bullet-icon">
                            <x-icon name="heart" />
                        </div>
                        <div class="section-bullets__bullet-text">
                            ПЕРСОНАЛЬНЫЙ<br> БРОКЕР
                        </div>
                        <div class="section-bullets__line">
                        </div>
                        <div class="section-bullets__bullet-description">
                            От первого обращения до продажи брокер является вашим эксклюзивным представителем
                        </div>
                    </a>

                    <a href="#section_marketing" class="section-bullets__bullet">
                        <div class="section-bullets__bullet-icon">
                            <x-icon name="tech" />
                        </div>
                        <div class="section-bullets__bullet-text">
                            МАРКЕТИНГОВЫЕ<br> ТЕХНОЛОГИИ
                        </div>
                        <div class="section-bullets__line">
                        </div>
                        <div class="section-bullets__bullet-description">
                            Команда маркетинга разработает конкретную программу продажи вашей собственности
                        </div>
                    </a>

                    <a href="#section_jursoprovod" class="section-bullets__bullet">
                        <div class="section-bullets__bullet-icon">
                            <x-icon name="law2" />
                        </div>
                        <div class="section-bullets__bullet-text">
                            ЮРИДИЧЕСКОЕ<br> СОПРОВОЖДЕНИЕ
                        </div>
                        <div class="section-bullets__line">
                        </div>
                        <div class="section-bullets__bullet-description">
                            Seven Realty окажет полный спектр юридических услуг по сопровождению сделок
                        </div>
                    </a>

                    <a href="#section_kontrol_kachestva" class="section-bullets__bullet">
                        <div class="section-bullets__bullet-icon">
                            <x-icon name="shield-doublecheck" />
                        </div>
                        <div class="section-bullets__bullet-text">
                            КОНТРОЛЬ<br>КАЧЕСТВА
                        </div>
                        <div class="section-bullets__line">
                        </div>
                        <div class="section-bullets__bullet-description">
                            Следите online как продаётся или сдаётся в аренду ваша недвижимость
                        </div>

                    </a>
                </div>
            </div>
            <div class="section-bullets__buttons-container">
                <div class="container">
                    <div class="section-bullets__buttons-wrapper">
                        <a href="#section_ocenka" class="section-bullets__button">
                            ОЦЕНИТЬ
                        </a>
                        <a href="#" class="section-bullets__button">
                            Получить помощь
                        </a>
                        <a href="#section_marketing" class="section-bullets__button">
                            ознакомиться
                        </a>
                        <a href="#" class="section-bullets__button">
                            узнать больше
                        </a>
                        <a href="#" class="section-bullets__button">
                            продать
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-ocenka" id="section_ocenka">
            <div class="container">
                <div class="section-ocenka__title">
                    Оценка Недвижимости
                </div>
                <div class="section-ocenka__text-wrapper">
                    <p>
                        Наш эксперт сравнит сделки с аналогичными параметрами за последние полгода и даст точное заключение
                        по рыночной стоимости объекта недвижимости.
                    </p>
                    <p>
                        Оцените недвижимость с помощью нашего онлайн-калькулятора или оставьте заявку эксперту
                    </p>
                </div>
            </div>
            <div class="section-ocenka__button-container">
                <div class="container">
                    <a href="#" class="section-ocenka__button">
                        ОСТАВИТЬ ЗАЯВКУ ЭКСПЕРТУ
                    </a>
                </div>
            </div>
        </section>
        <section class="section-marketing" id="section-marketing">
            <div class="container">
                <div class="section-marketing__title">
                    Маркетинговые Технологии
                </div>
                <div class="section-marketing__text-wrapper">
                    <p>
                        Никаких начальных затрат пока ваш объект не будет продан
                    </p>
                    <p>
                        Мы не берем комиссию для покрытия затрат за консультации,
                        создание презентационных материалов, рекламное продвижение
                    </p>
                </div>
                <div class="section-marketing__bullets-wrapper">
                    <div class="section-marketing__bullet">
                        <div class="section-marketing__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-marketing__bullet-title">
                            ＞ 40 ТЫСЯЧ ПОСЕТИТЕЛЕЙ
                            В МЕСЯЦ
                        </div>
                        <div class="section-marketing__bullet-description">
                            ваши потенциальные покупатели
                        </div>
                    </div>

                    <div class="section-marketing__bullet">
                        <div class="section-marketing__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-marketing__bullet-title">
                            4 ТОПОВЫЕ
                            РЕКЛАМНЫЕ
                            ПЛОЩАДКИ
                        </div>
                        <div class="section-marketing__bullet-description">
                            ЦИАН, Яндекс.Недвижимость, ДомКлик и Авито для размещения премиум-объявления об объекте
                        </div>
                    </div>

                    <div class="section-marketing__bullet">
                        <div class="section-marketing__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-marketing__bullet-title">
                            ЦИФРОВЫЕ
                            МАРКЕТИНГОВЫЕ
                            ИНСТРУМЕНТЫ
                        </div>
                        <div class="section-marketing__bullet-description">
                            от Facebook до Google, создание сайта объекта, реклама по собственным алгоритмам
                        </div>
                    </div>

                    <div class="section-marketing__bullet">
                        <div class="section-marketing__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-marketing__bullet-title">
                            КАЧЕСТВЕННЫЕ РЕКЛАМНЫЕ МАТЕРИАЛЫ
                        </div>
                        <div class="section-marketing__bullet-description">
                            наружная реклама, фотосъемка,
                            3D-моделирование
                        </div>
                    </div>

                    <div class="section-marketing__bullet">
                        <div class="section-marketing__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-marketing__bullet-title">
                            >70 ТЫСЯЧ КЛИЕНТОВ, ВКЛЮЧАЯ FORBES
                        </div>
                        <div class="section-marketing__bullet-description">
                            получат электронные, SMS и Whatsapp-рассылки о вашем объекте
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-broker">
            <div class="container">
                <div class="section-broker__title">
                    Персональный Брокер
                </div>
                <div class="section-broker__content-wrapper">
                    <div class="section-broker__left-wrapper">
                        <div class="section-broker__bullets-row">
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ОЦЕНИТ НЕДВИЖИМОСТЬ
                                </div>
                                <div class="section-broker__bullet-description">
                                    проведёт сравнительный анализ, даст экспертное заключение по цене и сроках продажи
                                </div>
                            </div>
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ПОДГОТОВИТ КВАРТИРУ
                                    К ПРОДАЖЕ
                                </div>
                                <div class="section-broker__bullet-description">
                                    организует выезд дизайнера и технических служб для устранения неполадок
                                </div>
                            </div>
                        </div>

                        <div class="section-broker__bullets-row">
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ПРОФЕССИОНАЛЬНО ПРЕЗЕНТУЕТ ОБЪЕКТ
                                </div>
                                <div class="section-broker__bullet-description">
                                    оганизует показы и профессионально отработает возражения покупателя
                                </div>
                            </div>
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ОКАЖЕТ СОДЕЙСТВИЕ В ПЕРЕГОВОРАХ
                                </div>
                                <div class="section-broker__bullet-description">
                                    аргументирует стоимость, ответит на вопросы о собственности
                                </div>
                            </div>
                        </div>

                        <div class="section-broker__bullets-row">
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ПОДГОТОВИТ ДОКУМЕНТЫ
                                </div>
                                <div class="section-broker__bullet-description">
                                    проведет аудит и подготовит пакет документов для сделки
                                </div>
                            </div>
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ДЕЙСТВУЕТ КАК ДОВЕРЕННОЕ ЛИЦО
                                </div>
                                <div class="section-broker__bullet-description">
                                    остается на связи 24/7, гарантирует конфиденциальность
                                </div>
                            </div>
                        </div>

                        <div class="section-broker__bullets-row">
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ПРЕДЛОЖИТ АЛЬТЕРНАТИВНЫЕ СПОСОБЫ ПРОДАЖИ
                                </div>
                                <div class="section-broker__bullet-description">
                                    через аукцион или бартер
                                </div>
                            </div>
                            <div class="section-broker__bullet">
                                <div class="section-broker__bullet-icon">
                                    <x-icon name="double-check" />
                                </div>
                                <div class="section-broker__bullet-title">
                                    ОКАЖЕТ ПОМОЩЬ В ПЕРЕЕЗДЕ И ПОДБОРЕ ПЕРСОНАЛА
                                </div>
                                <div class="section-broker__bullet-description">
                                    наши проверенные партнеры помогут с решением задач на высоком уровне
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-broker__right-wrapper">
                        <div class="section-broker__description">
                            <p>
                                На всех этапах брокер является вашим эксклюзивным представителем и возьмет на себя все
                                заботы,
                                связанные с продажей недвижимости:
                            </p>
                        </div>
                        <div class="section-broker__words">
                            30% сделок недвижимости не заключаются после принятия решения о покупке.

                            Вот почему мы поддерживаем постоянный диалог с покупателем, юристами, ипотечными брокерами
                            дизайнерами, изучаем потребности и реализуем решение

                            Елена Александрова,
                            брокер АН Seven Realty
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-podgotovka" id="section_podgotovka">
            <div class="section-podgotovka__darkner"></div>
            <div class="container">
                <div class="section-podgotovka__title">
                    Подготовка к Продаже
                </div>
                <div class="section-podgotovka__description">
                    <p>
                        Упакуем вашу квартиру в лучшем виде, чтобы исключить не аргументированный торг
                    </p>
                </div>
                <div class="section-podgotovka__bullets-wrapper">
                    <div class="section-podgotovka__bullet">
                        <div class="section-podgotovka__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-podgotovka__bullet-title">
                            ПРОВЕДЕМ
                            ПРОФЕССИОНАЛЬНУЮ ФОТОСЪЕМКУ
                        </div>
                    </div>

                    <div class="section-podgotovka__bullet">
                        <div class="section-podgotovka__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-podgotovka__bullet-title">
                            СОЗДАДИМ
                            3D -ТУР ПО ОБЪЕКТУ
                        </div>
                    </div>

                    <div class="section-podgotovka__bullet">
                        <div class="section-podgotovka__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-podgotovka__bullet-title">
                            ОТРИСУЕМ
                            ПЛАНИРОВКИ
                        </div>
                    </div>

                    <div class="section-podgotovka__bullet">
                        <div class="section-podgotovka__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-podgotovka__bullet-title">
                            СОЗДАДИМ
                            ПРОДАЮЩЕЕ ПОРТФОЛИО
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-staging">
            <div class="container">
                <div class="section-staging__descrition">
                    Предпродажная подготовка объекта
                </div>
                <div class="section-staging__title">
                    STAGING
                </div>
                <div class="section-staging__offer">
                    <span class="section-staging__offer-oversize-text">1%</span>
                    ИНВЕСТИРОВАННЫЙ В STAGING ПОВЫШАЕТ СТОИМОСТЬ НЕДВИЖИМОСТИ
                    НА <span class="section-staging__offer-oversize-text">10-15%</span>
                </div>
            </div>
            <div class="section-staging__button-wrapper">
                <a href="#" class="section-staging__button">
                    ОСТАВИТЬ ЗАЯВКУ
                </a>
            </div>
        </section>
        <section class="section-jur">
            <img src="/users/image/page-sobstvennikam-section-jur-img1.png" alt="" class="section-jur__overimage">
            <div class="container">
                <div class="section-jur__title">
                    Юридическое сопровождение
                </div>
                <div class="section-jur__description">
                    <p>
                        Юридическая служба Seven Realty окажет полный спектр профессиональных юридических услуг по
                        сопровождению сделок
                    </p>
                </div>
                <div class="section-jur__bullets-wrapper">
                    <div class="section-jur__bullet">
                        <div class="section-jur__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-jur__bullet-title">
                            ПРОРАБОТКА ФИНАНСОВО-ПРАВОВЫХ СТРУКТУР
                        </div>
                        <div class="section-jur__bullet-description">
                            реализации и приобретения объектов недвижимости
                        </div>
                    </div>
                    <div class="section-jur__bullet">
                        <div class="section-jur__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-jur__bullet-title">
                            ПОДГОТОВКА ВСЕХ НЕОБХОДИМЫХ ПРОЕКТОВ ДОКУМЕНТОВ
                        </div>
                        <div class="section-jur__bullet-description">
                            в соответствии со структурой сделок
                        </div>
                    </div>
                    <div class="section-jur__bullet">
                        <div class="section-jur__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-jur__bullet-title">
                            ОРГАНИЗАЦИЯ ГОСУДАРСТВЕННОЙ РЕГИСТРАЦИИ
                        </div>
                        <div class="section-jur__bullet-description">
                            перехода прав на объекты недвижимости
                        </div>
                    </div>
                    <div class="section-jur__bullet">
                        <div class="section-jur__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-jur__bullet-title">
                            НАЛОГОВЫЙ АНАЛИЗ И МОДЕЛИРОВАНИЕ ПОСЛЕДСТВИЙ
                        </div>
                        <div class="section-jur__bullet-description">
                            оценка рисков и структурирование сделок с учетом налоговых обязательств
                        </div>
                    </div>
                </div>
                <div class="section-jur__dogovor-wrapper">
                    <img src="/users/image/page-sobstvennikam-section-jur-dogovor-img.png" alt=""
                        class="section-jur__dogovor-overimage">
                    <div class="section-jur__dogovor-container">
                        <div class="section-jur__dogovor-title">
                            Эксклюзивный договор
                        </div>
                        <div class="section-jur__dogovor-text1">
                            Более 20 лет собственники элитной недвижимости доверяют нам эксклюзивную
                            продажу своих домов и квартир.
                        </div>
                        <div class="section-jur__dogovor-text2">
                            Эксклюзивный договор гарантирует ускоренную продажу объекта недвижимости за максимальную цену
                        </div>
                        <div class="section-jur__dogovor-buttons-wrapper">
                            <a href="#" class="section-jur__dogovor-button">
                                ознакомиться с договором
                            </a>
                            <a href="#" class="section-jur__dogovor-button">
                                заключить договор
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-kontrol">
            <div class="section-kontrol__darkner"></div>
            <div class="container">
                <div class="section-kontrol__title">
                    Контроль качества
                </div>
                <div class="section-kontrol__subtitle1">
                    В личном кабинете вы всегда будете в курсе того, как продается ваш объект
                </div>
                <div class="section-kontrol__subtitle2">
                    Мы еженедельно анализируем количество обращений по объекту. На основании фактических данных мы
                    осуществляем продвижение или корректируем стратегию.
                </div>
                <div class="section-kontrol__bullets-wrapper">
                    <div class="section-kontrol__bullet">
                        <div class="section-kontrol__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-kontrol__bullet-title">
                            КОЛИЧЕСТВО ПРОСМОТРОВ
                            НА САЙТЕ
                        </div>
                    </div>

                    <div class="section-kontrol__bullet">
                        <div class="section-kontrol__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-kontrol__bullet-title">
                            КОЛИЧЕСТВО ОБРАЩЕНИЙ
                            И ЗАЯВОК
                        </div>
                    </div>

                    <div class="section-kontrol__bullet">
                        <div class="section-kontrol__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-kontrol__bullet-title">
                            КОЛИЧЕСТВО
                            ПОКАЗОВ
                        </div>
                    </div>

                    <div class="section-kontrol__bullet">
                        <div class="section-kontrol__bullet-icon">
                            <x-icon name="double-check" />
                        </div>
                        <div class="section-kontrol__bullet-title">
                            ПРОГНОЗЫ О СРОКАХ ПРОДАЖИ, ОСНОВАННЫЕ НА ДАННЫХ О ПРОДАЖЕ АНАЛОГИЧНОГО ОБЪЕКТА
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-kontrol__button-wrapper">
                <a href="#" class="section-kontrol__button">
                    подать заявку
                </a>
            </div>
        </section>
        <section class="section-form">
            <div class="section-form__left-side">
                <img src="/users/image/page-sobstvennikam-section-form-leftimg.png" class="section-form__left-side-img">
            </div>
            <div class="section-form__right-side">
                <div class="section-form__title-wrapper">
                    <div class="section-form__title">
                        Заполните форму<br>
                        и получите <span class="section-form__title-highlited">персональный сервис</span>
                        продажи недвижимости
                    </div>
                </div>
                <div class="section-form__form-wrapper">
                    <form action="" class="section-form__form" id="form-sobstvennikam">
                        <input type="name" class="section-form__input" name="name" id="name" required
                            placeholder="Ваше имя">
                        <input type="text" class="section-form__input" name="ned-object" id="ned-object" required
                            placeholder="Объект недвижимости">
                        <input type="tel" class="section-form__input" name="phone" id="phone" required
                            placeholder="Ваш номер телефона">
                        <textarea class="section-form__input" name="comment" id="comment"
                            placeholder="Комментарий" rows="3"></textarea>
                    </form>
                </div>
                <div class="section-form__button-wrapper">
                    <button class="section-form__button" onclick="$('#form-sobstvennikam').submit()">
                        ОСТАВЬТЕ ЗАЯВКУ ЭКСПЕРТУ
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
