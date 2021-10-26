@extends('layouts.site_desktop')

@section('header')
    <div class="page-partners">
        @parent
    </div>
@endsection

@section('categories_menu')
@show

@section('content')
    <div class="page-partners">
        <section class="section-offer">
            <div class="section-offer__title">
                Заработайте
                <span class="section-offer__title-number">
                    <x-icon name="50percent" />
                </span>
                от комиссии
            </div>
            <div class="section-offer__descriptor">
                Приведите клиента и получите до <span class="color-gold">50%</span> от комиссии компании
            </div>
            <div class="section-offer__title2">
                Работаем <span class="color-gold">Вместе:</span>
            </div>
            <div class="section-offer__bullets-wrapper">
                <div class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="map-marker" />
                    </div>
                    <div class="section-offer__bullet-description">
                        Брокер<br>
                        из любого<br>
                        региона России
                    </div>
                </div>

                <div class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="handshake" />
                    </div>
                    <div class="section-offer__bullet-description">
                        Вы персональный <br>
                        ассистент руководителя<br>
                        и помогаете ему<br>
                        с поиском<br>
                        недвижимости
                    </div>
                </div>

                <div class="section-offer__bullet">
                    <div class="section-offer__bullet-icon">
                        <x-icon name="monitor-house" />
                    </div>
                    <div class="section-offer__bullet-description">
                        Вы знакомы с человеком,<br>
                        который планирует купить <br>
                        или арендовать элитную<br>
                        недвижимость
                    </div>
                </div>
            </div>
            <div class="section-offer__button-wrapper">
                <a href="#" class="section-offer__button">
                    хочу зарабатывать вместе
                </a>
            </div>
        </section>

        <section class="section-bullets">
            <div class="section-bullets__title">
                Почему с нами выгодно?
            </div>
            <div class="container">
                <div class="section-bullets__bullets-wrapper">
                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                ВЫСОКОЕ ВОЗНАГРАЖДЕНИЕ
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Вы получаете от 30 до 70% от комиссии компании за сделку
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="money-stack" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <div class="section-bullets__bullet-right-title">
                                70 МЛН РУБЛЕЙ
                            </div>
                            <div class="section-bullets__bullet-right-description">
                                заработали партнеры за последний год
                            </div>
                        </div>
                    </div>

                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                ПРОЗРАЧНАЯ СТАТИСТИКА
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Вносите данные о клиентах в crm и следите за статусом сделки
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="chart-up-look" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <div class="section-bullets__bullet-right-title">
                                Более 60
                            </div>
                            <div class="section-bullets__bullet-right-description">
                                партнерских сделок за 2020 год
                            </div>
                        </div>
                    </div>

                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                УДОБНЫЕ ВЫПЛАТЫ
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Получите заработанные средства удобным вам способом
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="wallet" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <div class="section-bullets__bullet-right-title">
                                7 млн рублей
                            </div>
                            <div class="section-bullets__bullet-right-description">
                                максимальная комиссия в этом году по партнерской программе
                            </div>
                        </div>
                    </div>

                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                100% ГАРАНТИЯ
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Все сроки выплат и суммы зафиксированы в договоре. Вы получите свое вознаграждение в полном
                                объеме в оговоренный срок
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="shield-check" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <div class="section-bullets__bullet-right-title">
                                более 200
                            </div>
                            <div class="section-bullets__bullet-right-description">
                                партнеров присоединились к нашей программе
                            </div>
                        </div>
                    </div>

                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                24/7 ПОДДЕРЖКА
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Персональный брокер сопровождает на всех этапах работы и поможет решить вопросы с клиентами
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="support-agent" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <div class="section-bullets__bullet-right-title">
                                20+ лет
                            </div>
                            <div class="section-bullets__bullet-right-description">
                                экспертиза на рынке элитной недвижимости
                            </div>
                        </div>
                    </div>

                    <div class="section-bullets__bullet">
                        <div class="section-bullets__bullet-left">
                            <div class="section-bullets__bullet-left-title">
                                КОНФИДЕНЦИАЛЬНОСТЬ
                            </div>
                            <div class="section-bullets__bullet-left-description">
                                Гарантируем полную конфиденциальность информации
                                о сделке и о клиенте
                            </div>
                        </div>
                        <div class="section-bullets__bullet-center">
                            <x-icon name="microphone-mute" />
                        </div>
                        <div class="section-bullets__bullet-right">
                            <a href="#" class="section-bullets__button">Стать партнером</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-form">
            <div class="container">
                <div class="section-form__container">
                    <div class="section-form__hexagon-wrapper">
                        <div class="section-form__hexagon-container">
                            <div class="hexagon-underlay"></div>
                            <img class="hexagon" src="/users/image/girla.png">
                        </div>
                    </div>
                    <div class="section-form__form-wrapper">
                        <div class="section-form__form-title">
                            Работаем вместе!
                        </div>
                        <form action="#" class="section-form__form">
                            <input class="section-form__form-input" name="name" id="name" type="text" required
                                placeholder="Ваше имя">
                            <input class="section-form__form-input" name="phone" id="phone" type="tel" required
                                placeholder="Ваш номер телефона">
                            <input class="section-form__form-input" name="email" id="email" type="email" required
                                placeholder="Ваш e-mail">
                            <button class="section-form__form-button">Стать партнером</button>
                            <div class="section-form__disclaimer">
                                Нажимая на кнопку Вы соглашаетесь на обработку данных.
                                <a href="{{ route('site.standalone.politika') }}">Политика
                                    конфиденциальности.
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
