@extends('layouts.site')

@section('content')


    <!-- main content -->
    <!-- Блок Карточки объекта -->
    <div class="object-card-title">
        <div class="object-card-title_position_absolute d-none d-md-block">Карточка</div>
    </div>


    <div class="object-card-big-slider">
        <div class="row no-gutters justify-content-between px-3">
            <div class="col-12 col-md-8 px-3 px-md-0">
                <div class="slider-content">
                    <h3 class="big-slide-image-div__h3">{{ $item->address ?? '' }}</h3>
                    <h2 class="big-slide-image-div__h2">{{ $item->area->name ?? '' }}</h2>
                    <h4 class="big-slide-image-div__h4" onclick="setFavorites({{ $item->id }})"><i class="@if (in_array($item->id, $massFav)) fas @else far @endif
                            fa-heart"></i></h4>
                </div>
                <div id="" class="owl-carousel slider1" onclick="showModal({{ $item->id }})">
                    @foreach ($item->imagesActive as $key => $image)
                        <div class="item">

                            <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" />
                        </div>
                    @endforeach

                </div>
                <div id="" class="owl-carousel thumbnails1">

                    @foreach ($item->imagesActive as $key => $image)
                        <div class="item"><img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" /></div>
                    @endforeach
                </div>

            </div>

            <div class="col-12 col-md-4 px-2 px-md-none">
                <div class="content-object-card-information">
                    <h2 class="content-object-card-information-title">{{ $item->name }}</h2>
                    <div class="content-object-card-information-pdf">
                        <div class="content-object-card-information-pdf-image"><a
                                href="{{ route('site.item.getPdf', $item->slug) }}" target="_blank"><img
                                    src="{{ asset('users/image/pdf.jpg') }}" alt="pdf"></a></div>
                        <div class="content-object-card-information-pdf-info"><a
                                href="{{ route('site.item.getPdf', $item->slug) }}" target="_blank">Лот №
                                {{ $item->id }}</a></div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_price')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">
                                @if ($item->type_order == 'sale')
                                    Цена
                                @elseif ($item->type_order == 'orenda')
                                    Аренда в месяц
                                @endif
                            </div>
                            <div class="content-object-card-information-list-text-info">
                                От
                                {{ number_format(($item->options['minimalnaya_cena_za_kvm']['value_title'] ?? 0) * ($item->options['minimalnaya_ploshhad']['value_title'] ?? 0), 0, ',', ' ') }}
                                ₽
                            </div>
                        </div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_square')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Минимальная площадь</div>
                            <div class="content-object-card-information-list-text-info">
                                От
                                {{ $item->options['minimalnaya_ploshhad']['value_title'] ?? '--' }}
                                м²
                            </div>
                        </div>
                    </div>
                    @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_square')
                            </div>
                            <div class="content-object-card-information-list-text">

                                <div class="content-object-card-information-list-text-tile">Максимальная площадь</div>
                                <div class="content-object-card-information-list-text-info">
                                    До
                                    {{ $item->options['maksimalnaya_ploshhad']['value_title'] ?? '--' }}
                                    м²
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($item->bath_rooms != null && $item->bath_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_price')
                            </div>
                            <div class="content-object-card-information-list-text">
                                <div class="content-object-card-information-list-text-tile">Минимальная цена за кв.м.</div>
                                <div class="content-object-card-information-list-text-info">
                                    От
                                    {{ number_format($item->options['minimalnaya_cena_za_kvm']['value_title'], 0, ',', ' ') ?? '--' }}
                                    м²
                                </div>
                            </div>
                        </div>
                    @endif
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
                            onclick="sendOrderShow({{ $item->id }}, 'Объект')">Назначить показ</button></div>

                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Инфраструктура и окружение</h2>
            <div id="modal-map"></div>

        </div>
    </div>
    <!-- Описание -->
    <div class="object-card-info">
        <div class="row no-gutters">
            <h2 class="content-object-card-info-title col-11 col-xl-12">Описание</h2>
            <p class="content-object-card-info__p col-11 col-xl-12">
                {!! $item->description !!}
            </p>
        </div>
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Характеристики</h2>
            <div class="content-object-card-parametr-list col-11 col-xl-12">
                <ul class="content-object-card-parametr-list__ul row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @foreach ($itemoptions ?? [] as $key => $value)
                        @if ($key < 10)
                            <li class="content-object-card-parametr-li col">{{ $value->option_title }} -
                                {{ $value->value_title }}</li>
                        @endif
                    @endforeach

                </ul>
            </div>
            @if (count($itemoptions ?? []) > 10)
                <p class="content-object-card-parametr-list_more col-11 col-xl-12">Далее</p>
                <div class="content-object-card-parametr-list col-11 col-xl-12 d-none">
                    <ul class="content-object-card-parametr-list__ul row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        @foreach ($itemoptions ?? [] as $key => $value)
                            <li class="content-object-card-parametr-li col">{{ $value->option_title }} -
                                {{ $value->value_title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content-object-card-parametr-list__button col-12 text-center col-md-11 text-md-left">
                <button
                    class="content-object-card-information-button-details content-object-card-parametr-list__button-info btn_info">Узнать
                    подробнее</button>
            </div>

            <div class="content-object-card-parametr-list__button col-12 text-center col-md-11 text-md-left">
                @if ($item->video_url)
                    <a href="{{ $item->video_url }}" target="_blank">
                        <button
                            class="content-object-card-parametr-list__button-info content-object-card-parametr-list__button-info--video btn_show">Видеотур</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <!-- Отзывы -->
    <div class="object-card-feedback">
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Отзывы</h2>

            <div class="content-object-card-feedback-slider slider-custom__four owl-carousel px-5">

                <!-- 1 -->
                @php $colorArr = ['green', 'orange', 'violet', 'burgundy']; @endphp
                @foreach ($item->commentsActive as $key => $comment)
                    <div class="content-object-card-feedback-slider-info">
                        <div
                            class="content-object-card-feedback-slider-info-title content-object-card-feedback-slider-info-title--{{ $colorArr[$key % 4] }}">
                            <i class="far fa-user"></i>{{ $comment->name }}
                        </div>
                        <p class="content-object-card-feedback-slider-info-text">
                            {{ $comment->comments }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
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
                <input class="content-object-card-request-input__input" type="email" name="email" id="email_form" value=""
                    placeholder="example@main.com">
            </div>

            <div class="content-object-card-request-button col-11 col-lg-2 mx-auto text-center mx-lg-0 py-3">
                <p class="pop-table-enter__p text-center" id="formOrderShowFormError" style="color: red;"></p>
                <button class="content-object-card-request-button__button btn_blue"
                    onclick="sendOrderShowForm({{ $item->id }})">Отправить</button>
            </div>
        </div>
    </div>
    <!-- слайдер похожие объекты -->
    <div class="object-card-sliders">
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Похожие объекты</h2>
            <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                @foreach ($similarItems as $key => $itemS)
                    <!-- 5 Block - Размножаем этот блок -->
                    @include('components.object_slider')
                @endforeach

            </div>
        </div>
    </div>

    <!-- слайдер  новинки -->
    <div class="object-card-sliders mb-5">
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Новинки</h2>
            <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                @foreach ($newItems as $key => $itemS)
                    <!-- 5 Block - Размножаем этот блок -->

                    @include('components.object_slider')

                @endforeach

            </div>
        </div>
    </div>
    <!-- Блок Карточки объекта КОНЕЦ -->
    <!-- end of main content -->

@endsection

@section('scripts')

    <script type="text/javascript">



    </script>
@endsection
