    <div class="object-card-request row no-gutters">
        <div
            class="content-object-card-request content-object-card-request_position row justify-content-between no-gutters py-3 col-11 col-xl-12 no-gutters">
            <div class="content-object-card-request-lot text-center col-11 col-lg-2">
                <h3 class="content-object-card-request-lot__h3">Заявка</h3>
                <p class="content-object-card-request-lot__p no-gutters"><a href="#">Лот № {{ $item->id }}</a></p>
            </div>
            <div class="content-object-card-request-input col-11 col-md-5 col-lg-2 mx-auto mx-lg-0 py-3">
                <p class="content-object-card-request-input__p">Ваше имя:</p>
                <input class="content-object-card-request-input__input" type="text" name="name" id="name_form" value=""
                    placeholder="Андрей">
            </div>
            <div class="content-object-card-request-input col-11 col-md-5 col-lg-2 mx-auto mx-lg-0 py-3">
                <p class="content-object-card-request-input__p">Ваш номер телефона:</p>
                <input class="content-object-card-request-input__input mask" type="tel" name="phone" id="phone_form"
                    value="" placeholder="+7 977 194-73-51">
            </div>
            <div class="content-object-card-request-input col-11 col-md-5 col-lg-2 mx-auto mx-lg-0 py-3">
                <p class="content-object-card-request-input__p">Ваш e-mail:</p>
                <input class="content-object-card-request-input__input" type="email" name="email" id="email_form"
                    value="" placeholder="example@main.com">
            </div>

            <div class="content-object-card-request-button col-11 col-lg-2 mx-auto text-center mx-lg-0 py-3">
                <p class="pop-table-enter__p text-center" id="formOrderShowFormError" style="color: red;"></p>
                <button class="content-object-card-request-button__button btn_blue"
                    onclick="sendOrderShowForm({{ $item->id }})">Отправить</button>
            </div>
        </div>
    </div>
