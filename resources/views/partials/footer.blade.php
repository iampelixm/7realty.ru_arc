<!-- Footer -->
<footer class="main-footer main-footer_position">
    <!-- desktop-footer -->
    <div class="desktop-footer-content d-none d-md-block">
        <div class="main-footer-logo">
            <h2 class="main-footer-logo__h2 main-footer-logo-h2_position_center">Seven - Счастливое Число Вашей Сделки
            </h2>
            <div class="main-footer-logo__div main-footer-logo__div_position_center">
                <a href="{{ route('home') }}" class="d-flex justify-content-center">
                    <img class="logo logo__footer" src="/users/image/2000.png" alt="">
                </a>
            </div>
        </div>
        <div class="main-footer-info">
            <div class="">
                <div class="row no-gutters">
                    <div class="col text-left">
                        <h3 class="main-footer-info__h3">Офис в Москве</h3>
                        <p class="main-footer-info__p"><a href="#"><i class="fas fa-map-marker-alt"></i> Москва,
                                Знаменка д. 13,
                                стр. 3</a></p>
                    </div>
                    <div class="col text-center">
                        <h3 class="main-footer-info__h3">Офис в Сочи</h3>
                        <p class="main-footer-info__p"><a href="#"><i class="fas fa-map-marker-alt"></i> г. Сочи,
                                Горького 53, ЦУМ 4-й этаж</a></p>
                    </div>
                    <div class="col text-right">
                        <h3 class="main-footer-info__h3"><a href="email:info@7realty.ru">info@7realty.ru</a></h3>
                        <h4 class="main-footer-info__h4 text-nowrap"><a href="tel:+79857000077"><i
                                    class="fas fa-phone-alt"></i> + 7
                                (985) 700-00-77</a></h4>
                        <h5 class="main-footer-contacts-right__h5"><a href="#">заказать звонок</a></h5>
                    </div>
                </div>
            </div>
            <div class="split-div split-div_color_grey"></div>
            <div class="d-none">
                <div class="row no-gutters">
                    <div class="col">
                        <h2 class="footer-links-div__h2">Для жизни</h2>
                    </div>
                    <div class="col">
                        <h2 class="footer-links-div__h2">Для бизнеса</h2>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col">
                        @foreach ($category_life as $category)
                            <h3 class="footer-links-div__h3"><a href="@if ($category->slug !=
                                    null) {{ route('site.get_category', $category->slug) }} @endif"
                                    style="text-decoration: none; color: white;">{{ $category->name }}</a></h3>
                            @foreach ($category->children as $subcategory)
                                <p class="footer-links-div__p"><a href="@if ($category->slug !=
                                        null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a>
                                </p>
                            @endforeach

                        @endforeach
                    </div>
                    <div class="col mb-3">
                        @foreach ($category_bizness as $category)
                            <h3 class="footer-links-div__h3"><a href="@if ($category->slug !=
                                    null) {{ route('site.get_category', $category->slug) }} @endif"
                                    style="text-decoration: none; color: white;">{{ $category->name }}</a></h3>
                            @foreach ($category->children as $subcategory)
                                <p class="footer-links-div__p"><a href="@if ($category->slug !=
                                        null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a>
                                </p>
                            @endforeach

                        @endforeach
                    </div>
                    <div class="col">
                        <div class="row no-gutters">
                            <div class="col">
                                <h3 class="footer-links-div__h3">Компания</h3>
                                <p class="footer-links-div__p"><a href="/about">О
                                        компании</a></p>
                                <p class="footer-links-div__p"><a href="/work">Работа
                                        в Se7en</a></p>
                                <p class="footer-links-div__p"><a href="{{ route('site.get_page', 'clients') }}">Наши
                                        клиенты</a></p>
                                <p class="footer-links-div__p"><a href="{{ route('site.contacts') }}">Контакты</a>
                                </p>
                            </div>
                            <div class="col">
                                <h3 class="footer-links-div__h3">Услуги</h3>
                                <p class="footer-links-div__p"><a
                                        href="{{ route('site.get_service', 'agency') }}">Агентские услуги</a>
                                </p>
                                <p class="footer-links-div__p"><a
                                        href="{{ route('site.get_service', 'analitics') }}">Консалтинг и
                                        аналитика</a></p>
                                <p class="footer-links-div__p"><a
                                        href="{{ route('site.get_service', 'managment') }}">Управление
                                        продажами</a></p>
                                <p class="footer-links-div__p"><a
                                        href="{{ route('site.get_service', 'support') }}">Юридическое
                                        сопровождение</a></p>
                            </div>
                        </div>
                        <div class="row justify-content-end socials-fixed">
                            <!-- <div class="col-4 col-lg-3 social-liks__div text-center"> -->
                            <div class="social-liks__div text-center">
                                <a class="mx-auto my-3" href="#"><img class="fb-icon" src="/users/image/fb.png"
                                        alt="fb"></a>
                            </div>
                            <!-- <div class="col-4 col-lg-3 social-liks__div text-left"> -->
                            <div class="social-liks__div text-left ml-3">
                                <a class="mx-auto my-3" href="#"><img class="yt-icon" src="/users/image/yt.png"
                                        alt="yt"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© Seven 2007-2021</p>
        </div>
    </div>
    <!-- mobile-footer -->
    <div class="mobile-footer-content d-md-none">
        <div class="mobile-footer-content-info">
            <p class="mobile-footer-content-info__p">Seven - Счастливое Число Вашей Сделки</p>
        </div>
        <div class="mobile-footer-content-logo">
            <a href="index.html">
                <img class="logo logo__footer" src="/users/image/2000.png" alt="">
            </a>
            <div class="mobile-footer-content-logo__div_position_left"></div>
            <div class="mobile-footer-content-logo__div_position_right"></div>
        </div>
        <div class="mobile-footer-content-locations-info">
            <h3 class="mobile-footer-content-locations-info__h3">Офис в Москве</h3>
        </div>
        <div class="mobile-footer-content-locations-info-adress">
            <h4 class="mobile-footer-content-locations-info__h4">
                <a href="#"><i class="fas fa-map-marker-alt"></i> Москва, Знаменка д. 13, стр. 3</a>
            </h4>
        </div>
        <div class="mobile-footer-content-locations-info">
            <h3 class="mobile-footer-content-locations-info__h3">Офис в Сочи</h3>
        </div>
        <div class="mobile-footer-content-locations-info-adress">
            <h4 class="mobile-footer-content-locations-info__h4">
                <a href="#"><i class="fas fa-map-marker-alt"></i> г. Сочи, Горького 53, ЦУМ 4-й этаж</a>
            </h4>
        </div>
        <div class="mobile-footer-content-locations-contacts">
            <h3 class="mobile-footer-content-locations-contacts__h3">
                <a href="email:info@7realty.ru">info@7realty.ru</a>
            </h3>
        </div>
        <div class="mobile-footer-content-locations-contacts">
            <h2 class="mobile-footer-content-locations-contacts__h2">
                <a href="tel:+79857000077"><i class="fas fa-phone-alt"></i> + 7 (985) 700-00-77</a>
            </h2>
        </div>
        <div class="mobile-footer-content-locations-contacts">
            <h5 class="mobile-footer-content-locations-contacts__h5"><a href="#" class="text-white">заказать звонок</a>
            </h5>
        </div>
        <div class="mobile-footer-content-locations__div-border-bottom"></div>
        <div class="d-none">
            <div class="mobile-footer-content-for-life">
                <h2 class="mobile-footer-content-for-life__h2">Для жизни</h2>
            </div>
            @foreach ($category_life as $category)
                <div class="mobile-footer-content-for-life">
                    <p class="mobile-footer-content-for-life__p"><a href="@if ($category->slug !=
                            null) {{ route('site.get_category', $category->slug) }} @endif"
                            style="text-decoration: none; color: white;">{{ $category->name }}</a></p>
                </div>

                @foreach ($category->children as $subcategory)
                    <div class="mobile-footer-content-for-life">
                        <a class="mobile-footer-content-for-life__a" href="@if ($category->slug !=
                            null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a>
                    </div>
                @endforeach

            @endforeach

            <div class="mobile-footer-content-for-life">
                <h2 class="mobile-footer-content-for-life__h2">Для бизнеса</h2>
            </div>
            @foreach ($category_bizness as $category)
                <div class="mobile-footer-content-for-life">
                    <p class="mobile-footer-content-for-life__p"><a href="@if ($category->slug !=
                            null) {{ route('site.get_category', $category->slug) }} @endif"
                            style="text-decoration: none; color: white;">{{ $category->name }}</a></p>
                </div>

                @foreach ($category->children as $subcategory)
                    <div class="mobile-footer-content-for-life">
                        <a class="mobile-footer-content-for-life__a" href="@if ($category->slug !=
                            null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a>
                    </div>
                @endforeach

            @endforeach
            <div class="mobile-footer-content-for-life mobile-footer-content-for-life_display_flex">
                <div>
                    <div>
                        <p class="mobile-footer-content-for-life__p">Компания</p>
                    </div>
                    <div><a class="mobile-footer-content-for-life__a" href="/about">О компании</a>
                    </div>
                    <div><a class="mobile-footer-content-for-life__a" href="/work">Работа
                            в Se7en</a></div>
                    {{-- <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.aboutus') }}">Помему мы?</a></div> --}}
                    <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.clients') }}">Наши
                            клиенты</a>
                    </div>
                    <div><a class="mobile-footer-content-for-life__a"
                            href="{{ route('site.contacts') }}">Контакты</a>
                    </div>
                </div>
                <div>
                    <div>
                        <p class="mobile-footer-content-for-life__p">Услуги</p>
                    </div>
                    <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.agency') }}">Агентские
                            услуги</a></div>
                    <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.analitics') }}">Консалтинг
                            и
                            аналитика</a></div>
                    <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.managment') }}">Управление
                            продажами</a>
                    </div>
                    <div><a class="mobile-footer-content-for-life__a" href="{{ route('site.support') }}">Юридическое
                            сопровождение</a></div>
                </div>
            </div>
            <div class="mobile-footer-content-for-life mobile-footer-content-for-life_display_flex">
                <div class="mobile-footer-content__div-fb"><a href="#"><img src="/users/image/fb.png" alt="fb"></a>
                </div>
                <div class="mobile-footer-content__div-yt"><a href="#"><img src="/users/image/yt.png" alt="yt"></a>
                </div>
            </div>
<div class="mobile-footer-content__div_border_orange"></div>
        </div>

        <div class="mobile-footer-content-copyright">© Seven 2007-2021</div>
    </div>
</footer>
