                    <div class="row no-gutters">
                        <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">
                        <div
                            class="content-object-card-information-input-name col-12 col-sm-6 col-md-12 col-lg-6 pr-none pr-sm-1 pr-md-none pr-lg-1">
                            <p>Ваше имя:</p><input class="content-object-card-information__input" type="text" name="name"
                                id="name" value="" placeholder="Андрей">
                        </div>
                        <div class="content-object-card-information-input-name col-12 col-sm-6 col-md-12 col-lg-6">
                            <p>Ваш номер телефона:</p><input class="content-object-card-information__input mask" type="tel"
                                name="name" id="phone" value="" placeholder="+7 977 194-73-51">
                        </div>
                    </div>
                    <div class="content-object-card-information-input-name">
                        <p>Ваш e-mail:</p><input class="content-object-card-information__input_email" type="email"
                            name="name" id="email" value="" placeholder="example@main.com">
                    </div>

                    <p class="pop-table-enter__p text-center" id="formOrderShowError" style="color: red;"></p>
                    <div class="content-object-card-information-buttons"><button
                            class="content-object-card-information-button-show"
                            onclick="sendOrderShow({{ $item->id }}, 'Объект')" style="     background: #0076C1;">Узнать
                            подробнее</button></div>
                    <div class="content-object-card-information-buttons"><button
                            class="content-object-card-information-button-show " style="    background: #007882;"
                            onclick="sendOrderShow({{ $item->id }}, 'Объект')">Назначить показ</button>
                    </div>
