@extends('layouts.site')

@section('content')
    <style>
        .hoverline a {
            color: $FFF;
        }

    </style>

    <!-- main content -->
    <!-- Блок Карточки объекта -->
    <div class="object-card-big-slider" style="margin-top: 40px;">
        <div class="d-flex no-gutters">

            @include('pages.item.parts.imageSlider')

            <div class="item_card">
                <div class="content-object-card-information">
                    @include('pages.item.parts.slider_info_default')
                </div>
            </div>
        </div>
    </div>

    <div class="container no-gutters mx-auto px-0" style="max-width: 1360px; margin-top: 40px">
        <div class="row no-gutters align-content-stretch">
            <div class="col-lg-8 " style="min-height: 237px;">
                @include('pages.item.parts.broker_card')
            </div>

            <div class="col-lg-4" style="padding-top: 32px; padding-bottom: 32px; padding-left: 40px;">
                <div class="row no-gutters px-2 pt-2 " style="outline: 1px solid #C1A771; height: 100%;">
                    <form class="item-leadform w-100 align-self-center" action="#" method="POST"
                        enctype="application/x-www-form-urlencoded">
                        <input style="border: none; border-bottom: 1px solid #C1A771" type="text" name="name" id="name"
                            class="form-control mt-1" placeholder="Ваше имя" required>
                        <input style="border: none; border-bottom: 1px solid #C1A771" type="tel" name="phone" id="phone"
                            class="form-control mt-1" placeholder="Ваш номер телефона" required>
                        <input style="border: none; border-bottom: 1px solid #C1A771" type="email" name="email" id="email"
                            class="form-control mt-1" placeholder="Ваш e-mail" required>
                        <div class="d-flex justify-content-center" style="transform: translateY(50%);">
                            <button class="rounded-pill px-5 py-2 mx-auto"
                                style="border: 1px solid #C1A771; background: #FFF">ОТПРАВИТЬ
                                ЗАЯВКУ</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Описание -->
    <div class="container-fluid no-gutters p-0 mx-auto" style="max-width: 1360px; margin-top: 50px">
        <div style="border: 1px solid #C1A771; ">
            <h2 style="color: #C1A771; transform: translateY(-50%); background: #FFF;" class="ml-4 px-4 d-inline-block">
                {{ $item->name }}
            </h2>
            <div class="row no-gutters px-4 pb-4">

                <p>
                    {!! $item->description !!}
                </p>
            </div>
        </div>
    </div>



    <div class="item-map-links" style="margin-top: 70px; padding-top: 70px; padding-bottom: 70px; background-color: #C1A771">
        <div class="d-flex" style="margin: 0 auto; max-width: 1360px;">

            <a href="#" class="map-link col text-center hoverline">
                <div>
                    <x-icon name="markered-map" />
                </div>
                <div>
                    <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">КАРТА</h4>
                    Открыть на карте
                </div>
                <div class="goldline mx-auto mt-3">&nbsp;</div>
            </a>

            <a href="#" class="map-link col text-center hoverline">
                <div>
                    <x-icon name="street-view" />
                </div>
                <div>
                    <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">УЛИЦА</h4>
                    Просмотре улицы в 3D
                </div>
                <div class="goldline mx-auto mt-3">&nbsp;</div>
            </a>

            <a href="#" class="map-link col text-center hoverline">
                <div>
                    <x-icon name="school" />
                </div>
                <div>
                    <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">ШКОЛЫ</h4>
                    Куда будет ходить ребенок
                </div>
                <div class="goldline mx-auto mt-3">&nbsp;</div>
            </a>

            <a href="#" class="map-link col text-center hoverline">
                <div>
                    <x-icon name="tree" />
                </div>
                <div>
                    <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">ПАРКИ И БОЛЬНИЦЫ</h4>
                    Для вашего здоровья
                </div>
                <div class="goldline mx-auto mt-3">&nbsp;</div>
            </a>

            <a href="#" class="map-link col text-center hoverline">
                <div>
                    <x-icon name="bar" />
                </div>
                <div>
                    <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">РЕСТОРАНЫ И БАРЫ</h4>
                    Развлечения поблизости
                </div>
                <div class="goldline mx-auto mt-3">&nbsp;</div>
            </a>
        </div>
    </div>

    @include('pages.item.parts.bottom_sliders')


@endsection
