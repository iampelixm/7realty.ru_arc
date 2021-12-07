@extends('layouts.site')
@section('categories_menu')
@show
@section('categories_menu_mobile')
@show
@section('content')
    <div class="office-content py-5 d-none d-md-block">
        <div class="row row-cols-3 no-gutters">
            <div class="col">
                <h2 class="office-content__h2 p-3">Офис Сочи</h2>
                <a href="tel:+79857000077" class="office-content__p p-3"><i class="fas fa-phone-alt"></i> +7 985
                    700-00-77</a>
                <a href="mailto:info@7realty.ru" class="office-content__p p-3"><i class="fas fa-mail-bulk"></i>
                    info@7realty.ru</a>
                <p class="office-content__p p-3">г. Сочи, Горького 53, ЦУМ 4-й этаж</p>
            </div>
            <div class="col">
                <img class="office-content__img img-fluid" src="/users/image/contacts/city.jpg" alt="moscow">
            </div>
            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.789544898569!2d39.72408981549581!3d43.59009977912349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f5cbda9d00d883%3A0xd35a1151541a4eac!2z0YPQuy4g0JPQvtGA0YzQutC-0LPQviwgNTMsINCh0L7Rh9C4LCDQmtGA0LDRgdC90L7QtNCw0YDRgdC60LjQuSDQutGA0LDQuSwg0KDQvtGB0ZbRjywgMzU0MDAw!5e0!3m2!1sru!2sru!4v1604319025831!5m2!1sru!2sru"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>

            </div>
        </div>
    </div>
    <div class="office-content py-5 d-none d-md-block">
        <div class="row row-cols-3 no-gutters">
            <div class="col">
                <h2 class="office-content__h2 p-3">Офис Москва</h2>
                <a href="tel:+79857000077" class="office-content__p p-3"><i class="fas fa-phone-alt"></i> +7 985
                    700-00-77</a>
                <a href="mailto:info@7realty.ru" class="office-content__p p-3"><i class="fas fa-mail-bulk"></i>
                    info@7realty.ru</a>
                <p class="office-content__p p-3">г. Москва, Знаменка д. 13, стр. 3 </p>
            </div>
            <div class="col">
                <img class="office-content__img img-fluid" src="/users/image/contacts/moscow.jpg" alt="moscow">
            </div>
            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d287520.4779147746!2d37.38609385146485!3d55.73672023576093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1601409719372!5m2!1sru!2sru"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Блок Расположения офисов КОНЕЦ -->
    <!-- Блок Расположения офисов МОБИЛЬНАЯ -->

    <div class="office-content-mobile d-md-none">
        <div class="row row-cols-1 no-gutters">
            <div class="col text-center">
                <h2 class="office-content__h2 p-3">Офис Москва</h2>
                <a href="tel:+79857000077" class="office-content__p p-3"><i class="fas fa-phone-alt"></i> +7 985
                    700-00-77</a>
                <a href="mailto:info@7realty.ru" class="office-content__p p-3"><i class="fas fa-mail-bulk"></i>
                    info@7realty.ru</a>
                <p class="office-content__p p-3">г. Москва, Знаменка д. 13, стр. 3 </p>
            </div>
            <div class="col-11 mx-auto text-center">
                <img class="office-content__img img-fluid" src="/users/image/contacts/moscow.jpg" alt="moscow">
            </div>
            <div class="office-content-mobile-map col-11 mx-auto text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d287520.4779147746!2d37.38609385146485!3d55.73672023576093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1601409719372!5m2!1sru!2sru"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
        <div class="row row-cols-1 no-gutters">
            <div class="col text-center">
                <h2 class="office-content__h2 p-3">Офис Сочи</h2>
                <a href="tel:+79857000077" class="office-content__p p-3"><i class="fas fa-phone-alt"></i> +7 985
                    700-00-77</a>
                <a href="mailto:info@7realty.ru" class="office-content__p p-3"><i class="fas fa-mail-bulk"></i>
                    info@7realty.ru</a>
                <p class="office-content__p p-3">г. Сочи, Горького 53, ЦУМ 4-й этаж</p>
            </div>
            <div class="col-11 mx-auto text-center">
                <img class="office-content__img img-fluid" src="/users/image/contacts/city.jpg" alt="moscow">
            </div>
            <div class="office-content-mobile-map col-11 mx-auto text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d287520.4779147746!2d37.38609385146485!3d55.73672023576093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1601409719372!5m2!1sru!2sru"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Блок Расположения офисов МОБИЛЬНАЯ КОНЕЦ-->
    <!-- Блок Заявки  -->
    <div class="d-none">
        <div class="application-content my-5 d-none d-md-block">
            <h2 class="application-content__h2 text-center py-2">Оставить заявку</h2>
            <h3 class="application-content__h3 text-center py-2">Оставьте заявку и мы свяжемся с вами в ближайшее время!
            </h3>
            <div class="application-content__form row row-cols-4 no-gutters justify-content-between">
                <!--  <form action="{{ route('site.send_order') }}" method="POST"> -->

                <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                    <div class="col-8 pl-3"><label for="take">Снять</label></div>
                    <div class="col-4 text-center"><input type="checkbox" name="take" id="take"></div>
                </div>
                <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                    <div class="col-8 pl-3"><label for="hand">Сдать</label></div>
                    <div class="col-4 text-center"><input type="checkbox" name="hand" id="hand"></div>
                </div>
                <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                    <div class="col-8 pl-3"><label for="buy">Купить</label></div>
                    <div class="col-4 text-center"><input type="checkbox" name="buy" id="buy"></div>
                </div>
                <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                    <div class="col-8 pl-3"><label for="sell">Продать</label></div>
                    <div class="col-4 text-center"><input type="checkbox" name="sell" id="sell"></div>
                </div>
            </div>
            <div class="application-content-select-div row my-3">
                <select name="type_object" id="type_object">
                    <option selected value="">Тип объекта</option>
                    <option value="0">Квартира</option>
                    <option value="1">Жилой комплекс/Новостройка</option>
                    <option value="2">Дом</option>
                    <option value="3">Земельный участок</option>
                    <option value="4">Коммерческая недвижимость</option>
                </select>
            </div>
            <div class="application-content-select-div row my-3">
                <select name="price" id="price">
                    <option selected value="">Цена</option>
                    <option value="2">от 2 000 000 до 4 000 000</option>
                    <option value="2">от 4 000 000 до 6 000 000</option>
                    <option value="2">от 6 000 000 до 10 000 000</option>
                    <option value="2">от 10 000 000</option>
                </select>
            </div>
            <div class="application-content-input-div row my-3 no-gutters">
                <div class="col-12 py-2">
                    <p class="application-content-input-div__p">Ваше имя:</p>
                    <input class="application-content-input-div__input" type="text" name="name" id="name" value=""
                        placeholder="Андрей">
                </div>
                <div class="col-12 row no-gutters">
                    <div class="col py-2 pr-2">
                        <p class="application-content-input-div__p">Ваш номер телефона:</p>
                        <input class="application-content-input-div__input mask" type="tel" name="phone" id="phone" value=""
                            placeholder="+7 977 194-73-51">
                    </div>
                    <div class="col py-2 pl-2">
                        <p class="application-content-input-div__p">Ваш e-mail:</p>
                        <input class="application-content-input-div__input" type="email" name="email" id="email" value=""
                            placeholder="example@main.com">
                    </div>
                </div>
            </div>
            <p class="pop-table-enter__p text-center" id="formError" style="color: red;"></p>
            <div class="application-content-button-div text-center">

                <button onclick="sendOrder()">Отправить</button>

            </div>
            <div class="application-content-check-div py-3">
                <div class="row no-gutters align-items-center">
                    <div class="col-2"><input type="checkbox" name="check" id="check"></div>
                    <div class="col-10"><label class="application-content-check-div__label" for="check">Вы соглашаетесь с
                            условиями обработки персональных данных (<a href="#">ознакомиться</a>)</label></div>
                </div>
                <!--  </form> -->
            </div>
            <div class="application-content-supp-div text-center">
                <p><span>*</span> Поля обязательны для заполнения</p>
            </div>

        </div>
        <!-- Блок Заявки КОНЕЦ -->



        <!-- Блок Заявки МОБИЛЬНАЯ -->
        <div class="application-content-mobile my-5 d-md-none">
            <div class="application-content-mobile-form col-11 mx-auto">
                <h2 class="application-content__h2 text-center py-2">Оставить заявку</h2>
                <h3 class="application-content__h3 text-center py-2">Оставьте заявку и мы свяжемся с вами в ближайшее время!
                </h3>
                <div class="application-content__form row row-cols-2 no-gutters justify-content-around py-2">
                    <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                        <div class="col-8 pl-3"><label for="takem">Снять</label></div>
                        <div class="col-4 text-center"><input type="checkbox" name="takem" id="takem"></div>
                    </div>
                    <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                        <div class="col-8 pl-3"><label for="handm">Сдать</label></div>
                        <div class="col-4 text-center"><input type="checkbox" name="handm" id="handm"></div>
                    </div>
                </div>
                <div class="application-content__form row row-cols-2 no-gutters justify-content-around py-2">
                    <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                        <div class="col-8 pl-3"><label for="buym">Купить</label></div>
                        <div class="col-4 text-center"><input type="checkbox" name="buym" id="buym"></div>
                    </div>
                    <div class="application-content-checkbox-div col row row-cols-2 no-gutters align-items-center">
                        <div class="col-8 pl-3"><label for="sellm">Продать</label></div>
                        <div class="col-4 text-center"><input type="checkbox" name="sellm" id="sellm"></div>
                    </div>
                </div>
                <div class="application-content-select-div row my-3">
                    <select>
                        <option selected value="0">Тип объекта</option>
                        <option value="">Квартиры</option>
                        <option value="2">Жилые комплексы</option>
                        <option value="2">Дома</option>
                        <option value="2">Земли</option>
                        <option value="2">Коммерческая недвижимость</option>
                    </select>
                </div>
                <div class="application-content-select-div row my-3">
                    <select name="price" id="price">
                        <option selected value="">Цена</option>
                        <option value="2">от 2 000 000 до 4 000 000</option>
                        <option value="2">от 4 000 000 до 6 000 000</option>
                        <option value="2">от 6 000 000 до 10 000 000</option>
                        <option value="2">от 10 000 000</option>
                    </select>
                </div>
                <div class="col py-2">
                    <p class="application-content-input-div__p">Ваше имя:</p>
                    <input class="application-content-input-div__input" type="text" name="name" value=""
                        placeholder="Андрей">
                </div>
                <div class="col py-2">
                    <p class="application-content-input-div__p">Ваш номер телефона:</p>
                    <input class="application-content-input-div__input mask" type="tel" name="phone" value=""
                        placeholder="+7 977 194-73-51">
                </div>
                <div class="col py-2">
                    <p class="application-content-input-div__p">Ваш e-mail:</p>
                    <input class="application-content-input-div__input" type="text" name="email" value=""
                        placeholder="example@main.com">
                </div>
                <p class="pop-table-enter__p" id="formError" style="color: red;"></p>
                <div class="application-content-button-div text-center">
                    <button>Отправить</button>
                </div>
                <div class="application-content-check-div py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col-2"><input type="checkbox" name="checkm" id="checkm"></div>
                        <div class="col-10"><label class="application-content-check-div__label" for="checkm">Вы соглашаетесь
                                с
                                условиями обработки персональных данных (<a href="#">ознакомиться</a>)</label></div>
                    </div>
                </div>
                <div class="application-content-supp-div text-center">
                    <p><span>*</span> Поля обязательны для заполнения</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Блок Заявки МОБИЛЬНАЯ КОНЕЦ -->
    <!-- end of main content -->

@endsection
