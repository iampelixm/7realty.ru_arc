@extends('layouts.site')

@section('content')


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

    <div class="container no-gutters mx-auto px-0" style="max-width: 1360px;">
        <div class="row no-gutters align-content-stretch">
            <div class="col-lg-8  pt-4" style="min-height: 200px;">
                <div class="row no-gutters overflow-hidden"
                    style="height: 100%; outline: 1px solid #C1A771; background: #FFF; /*background-image: url(/users/image/kover.jpg)*/; background-repeat: no-repeat; background-position: left top;">
                    <div class="col-lg-3">
                        @if ($item->user && $item->user->getFirstMedia('avatar'))
                            {{ $item->user->getFirstMedia('avatar')->img()->attributes(['width' => '100%', 'height' => '']) }}
                        @endif
                    </div>
                    <div class="pl-4 col-lg-9">
                        <div style="transform: skewX(-7deg); background: #FFF; height: 100%">
                            <div class="pl-4 pt-4" style="transform: skewX(7deg); height: 100%">
                                <h2 style="font-size: 36px;">
                                    {{ $item->user->name ?? 'Брокер' }}
                                </h2>
                                <h6 style="font-weight: 100;">
                                    {{ $item->user->position ?? 'Брокер' }}
                                </h6>
                                <h1>
                                    <a href="tel:+79857000077"
                                        style="text-decoration: none; font-weight: 700; color:#C1A771;">+7 985 700-00-77</a>
                                </h1>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="broker-contact"
                    style="z-index: 2; position: absolute; right: 50px; transform: translateY(-50%)">
                    <a class="rounded-circle d-inline-block" href="mailto:{{ $item->user->email  ?? 'info@7realty.ru'}}"
                        style="border: 1px solid #C1A771; padding: 11px; background: #FFF">
                        <x-icon name="envelope" />
                    </a>
                    <a class="ml-3 rounded-circle d-inline-block p-2" href="tel:+79857000077"
                        style="border: 1px solid #C1A771; background: #FFF">
                        <x-icon name="call" />
                    </a>
                </div>
            </div>

            <div class="col-lg-4 pl-4 pt-4">
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
    <div class="container-fluid no-gutters p-0 mx-auto" style="max-width: 1360px; margin-top: 70px">
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

    @include('pages.item.parts.bottom_sliders')


@endsection
