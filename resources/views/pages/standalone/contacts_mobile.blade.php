@extends('layouts.site_desktop')

@section('header')
    <div class="page-contacts">
        @parent
    </div>
@endsection

@section('content')
    <div class="page-contacts city_sochi">
        <div class="sochi">
            <div id="banner" class="owl-carousel banner slidethis" onclick="" data-items="1">
                <div class="item">
                    <img src="/users/image/contacts/banner_sochi.jpg" sizes="100vw">
                </div>
            </div>
            <div class="city-select-wrapper">
                <div class="city-select-button active"
                    onclick="$('.page-contacts').removeClass('city_moscow').removeClass('city_sochi').addClass('city_sochi')">
                    СОЧИ</div>
                <div class="city-select-button"
                    onclick="$('.page-contacts').removeClass('city_moscow').removeClass('city_sochi').addClass('city_moscow')">
                    МОСКВА</div>
            </div>
            <div class="contacts-wrapper">
                <div class="contact-item address">
                    <x-icon name="map-marker" />
                    <div class="address__street">
                        ул. Горького, 53
                    </div>
                    <div class="address__location">
                        (ЦУМ, 4-й этаж)
                    </div>
                </div>

                <div class="contact-item phone">
                    <x-icon name="phone-tube" />
                    <a href="tel:+79857000077" class="">+7 985 700-00-77</a>
                </div>

                <div class="contact-item  email">
                    <x-icon name="envelope" />
                    <a href="mailto:info@7realty.ru">info@7realty.ru</a>
                </div>
            </div>

            <div class="map">
                <div style="position:relative;overflow:hidden;"><a
                        href="https://yandex.ru/maps/239/sochi/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0px;">Сочи</a><a
                        href="https://yandex.ru/maps/239/sochi/house/ulitsa_gorkogo_53/Z0AYcQVmS0cDQFppfXl5eHVkZQ==/?ll=39.726550%2C43.589771&source=wizgeo&utm_medium=mapframe&utm_source=maps&z=18.27"
                        style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Горького, 53 на карте Сочи —
                        Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUuvFux1A" width="100%" height="400"
                        frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </div>

        <div class="moscow">
            <div id="banner" class="owl-carousel banner slidethis" onclick="" data-items="1">
                <div class="item">
                    <img src="/users/image/contacts/banner_moscow.jpg" sizes="100vw">
                </div>
            </div>
            <div class="city-select-wrapper">
                <div class="city-select-button"
                    onclick="$('.page-contacts').removeClass('city_moscow').removeClass('city_sochi').addClass('city_sochi')">
                    СОЧИ</div>
                <div class="city-select-button active">
                    МОСКВА</div>
            </div>
            <div class="contacts-wrapper">
                <div class="contact-item address">
                    <x-icon name="map-marker" />
                    <div class="address__street">
                        Знаменка д. 13, стр. 3
                    </div>
                    <div class="address__location">
                        (м. Боровицкая)
                    </div>
                </div>

                <div class="contact-item phone">
                    <x-icon name="phone-tube" />
                    <a href="tel:+79857000077" class="">+7 985 700-00-77</a>
                </div>

                <div class="contact-item  email">
                    <x-icon name="envelope" />
                    <a href="mailto:info@7realty.ru">info@7realty.ru</a>
                </div>
            </div>

            <div class="map">
                <div style="position:relative;overflow:hidden;"><a
                        href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a
                        href="https://yandex.ru/maps/213/moscow/house/ulitsa_znamenka_13s3/Z04YcAdlTUwHQFtvfXt1eHljYg==/?display-text=%D0%B7%D0%BD%D0%B0%D0%BC%D0%B5%D0%BD%D0%BA%D0%B0%20%D0%B4%2013%20%D1%81%D1%82%D1%80%203&from=tabbar&ll=37.605490%2C55.749507&mode=search&sctx=ZAAAAAgAEAAaKAoSCXx9rUuN3ENAEcX%2BsnvyykVAEhIJAAAAAICN3z8RAMJHZmenzD8iBgABAgMEBSgKOABA7wFIAWIobWlkZGxlX3dpemV4dHJhPXBwb19jaGFpbl9maXhsaXN0X29iczg9MmIrbWlkZGxlX3dpemV4dHJhPXBwb19jaGFpbl9maXhsaXN0X3ZlcnNpb249MmIbbWlkZGxlX3dpemV4dHJhPW9sZF9kcnVncz0xYjNyZWFycj1zY2hlbWVfTG9jYWwvR2VvL0NoYWluRml4bGlzdFJ1bGVzVmVydGljYWxzPTBqAnJ1nQHNzEw9oAEAqAEAvQE5I1FRwgEZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOoBAPIBAPgBAIICH9C30L3QsNC80LXQvdC60LAg0LQgMTMg0YHRgtGAIDOKAgCSAgA%3D&sll=37.605490%2C55.749507&source=serp_navig&sspn=0.013136%2C0.004628&text=%D0%B7%D0%BD%D0%B0%D0%BC%D0%B5%D0%BD%D0%BA%D0%B0%20%D0%B4%2013%20%D1%81%D1%82%D1%80%203&utm_medium=mapframe&utm_source=maps&z=17.23"
                        style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Знаменка, 13с3 —
                        Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUuzQtzxD" width="100%" height="400"
                        frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </div>

        <div class="container">
            <div class="form-wrapper">
                <h1 class="title">
                    Оставьте заявку
                </h1>
                <h6 class="subtitle">
                    Оставьте заявку и мы свяжемся с вами в ближайшее время!
                </h6>
                <form action="#" class="form" method="POST">
                    @csrf
                    <div class="radoigroup">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="a1" value="снять">
                            <label class="form-check-label" for="a1">
                                Снять
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="a2" value="сдать">
                            <label class="form-check-label" for="a2">
                                Сдать
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="a3" value="купить" checked>
                            <label class="form-check-label" for="a3">
                                Купить
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="a4" value="продать">
                            <label class="form-check-label" for="a4">
                                Продать
                            </label>
                        </div>
                    </div>

                    <div class="radoigroup">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="what" id="b1" value="квартиру">
                            <label class="form-check-label" for="b1">
                                Квартиру
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="what" id="b2" value="дом">
                            <label class="form-check-label" for="b2">
                                Дом
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="what" id="b3" value="землю" checked>
                            <label class="form-check-label" for="b3">
                                Земельный участок
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="what" id="b4" value="коммерцию">
                            <label class="form-check-label" for="b4">
                                Коммерческую недвижимость
                            </label>
                        </div>
                    </div>

                    <div class="radoigroup">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" id="c1" value="2">
                            <label class="form-check-label" for="c1">
                                2 млн
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" id="c2" value="4">
                            <label class="form-check-label" for="c2">
                                4 млн
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" id="c3" value="8" checked>
                            <label class="form-check-label" for="c3">
                                8 млн
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" id="c4" value="10">
                            <label class="form-check-label" for="c4">
                                10 млн
                            </label>
                        </div>
                        <div class="form-divider">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" id="c5" value="12">
                            <label class="form-check-label" for="c5">
                                12+ млн
                            </label>
                        </div>
                    </div>

                    <div class="radoigroup">
                        <input type="text" name="name" placeholder="Ваше имя">
                        <div class="form-divider">
                        </div>
                        <input type="text" name="tel" placeholder="Номер телефона">
                        <div class="form-divider">
                        </div>
                        <input type="text" name="email" placeholder="Ваше почта">
                    </div>

                    <div class="disclaimer">
                        Нажимая на кнопку “Оставить заявку” Вы соглашаетесь на обработку данных. Политика
                        конфиденциальности.
                    </div>
                    <div style="margin-top: 40px; padding-bottom: 40px">
                    <button class="form-button" style="color: #333;
                    background-color: #FFF;
                    text-transform: uppercase;
                    font-weight: normal;
                    font-size: 18px;
                    text-align: center;
                    padding: 14px 40px 10px 40px;
                    border-radius: 50em;
                    border: 1px solid #C1A771;
                    display: block;
                    margin: 0 auto;">ОТПРАВИТЬ ЗАЯВКУ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
