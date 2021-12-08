@extends('layouts.site_mobile')
@section('meta_description')
    {{ $item->meta_description ?? '' }}
@endsection
@section('page_title')
    {{ $page_title }}
@endsection
@section('content')
    <div class="item-page">
        <div class="comtainer">
            <h1 class="item-title">
                {{ $item->page_title }}
            </h1>
        </div>
        @include('pages.item_mobile.parts.imageSlider')
        <div class="item-options">
            <div class="item-options__price-wrapper">
                <div class="item-options__price-icon">
                    <x-icon name="item-price" height="35" width="30" />
                </div>
                <div class="item-options__price">
                    @if (view()->exists('pages.item_mobile.parts.price_' . $item->type->slug))
                        @include('pages.item_mobile.parts.price_'.$item->type->slug)
                    @else
                        <div class="item-options__price-description">
                            Цена от
                        </div>
                        {{ number_format($item->price, 0, ',', ' ') }} ₽
                    @endif
                </div>
            </div>
            <div class="item-options__wrapper" data-card="{{ $item->type->slug }}">
                @if (view()->exists('pages.item_mobile.parts.slider_info_' . $item->type->slug))
                    @include('pages.item_mobile.parts.slider_info_'.$item->type->slug)
                @else
                    @include('pages.item_mobile.parts.slider_info_default')
                @endif
            </div>
        </div>

        <div class="broker-info">
            <div class="broker-info__avatar">
                <div class="broker-info__avatar-hexagon-wrapper">
                    <div class="broker-info__avatar-hexagon-underlay"></div>
                    <a href="{{ route('site.broker.page', $item->user) }}">
                        @if ($item->user && $item->user->getFirstMedia('avatar'))
                            {{ $item->user->getFirstMedia('avatar')->img()->attributes(['class' => 'broker-info__avatar-hexagon-image', 'width' => '', 'height' => '']) }}
                        @endif
                    </a>
                </div>
            </div>
            <div class="broker-info__data">
                <div class="broker-info__data-name">
                    {{ $item->user->name ?? 'Брокер' }}
                </div>
                <div class="broker-info__data-position">
                    {{ $item->user->position ?? 'Брокер' }}
                </div>
                <div class="broker-info__data-phone">
                    <a href="tel:+79857000077">+7 985 700-00-77</a>
                </div>
                <div class="broker-info__data-email">
                    <a href="mailto:{{ $item->user->email ?? 'info@7realty.ru' }}">
                        <x-icon name="envelope" /> {{ $item->user->email ?? 'info@7realty.ru' }}
                    </a>
                </div>
                <div class="broker-info__data-callback">
                    <x-icon name="phone-tube" /> Обратный звонок
                </div>
            </div>
        </div>

        <div class="button-wrapper">
            <div class="gold-button review">
                запишитесь на просмотр
            </div>
        </div>

        <form action="#" method="POST">
            <div class="form-container">
                @csrf
                <input type="text" name="name" id="name" placeholder="Ваше имя" required>
                <input type="tel" name="tel" id="tel" placeholder="Ваш номер телефона" required>
                <input type="email" name="email" id="email" placeholder="Ваш e-mail" required>
            </div>
            <div class="button-wrapper">
                <button class="gold-button">отправить заявку</button>
            </div>
        </form>

        <div class="description">
            <div class="title">
                {{ $item->name }}
            </div>
            <div class="text">
                {!! $item->description !!}
            </div>
        </div>

        @include('pages.item_mobile.parts.bottom_sliders')
    </div>


    {{-- <div class="object-card-big-slider" style="margin-top: 40px;">
        <div class="d-flex no-gutters">
        @section('image_slider')
            @include('pages.item_mobile.parts.imageSlider')
        @show
        <!-- SLIDER INFO -->
        <div class="item_card" data-card="{{ $item->type->slug }}">
            <div class="content-object-card-information">
                @section('item_card')
                    @if (view()->exists('pages.item_mobile.parts.slider_info_' . $item->type->slug))
                        @include('pages.item_mobile.parts.slider_info_'.$item->type->slug)
                    @else
                        @include('pages.item_mobile.parts.slider_info_default')
                    @endif
                @show
            </div>
        </div>
    </div>
</div>

<div class="container no-gutters mx-auto px-0" style="max-width: 1360px; margin-top: 40px">
    <div class="row no-gutters align-content-stretch">
        <div class="col-lg-8 " style="min-height: 237px;">
            @include('pages.item_mobile.parts.broker_card')
        </div>

        <div class="col-lg-4" style="padding-top: 32px; padding-bottom: 32px; padding-left: 40px;">
            <div class="row no-gutters px-2 pt-2 " style="outline: 1px solid #C1A771; height: 100%;">
                @include('pages.item_mobile.parts.contact_form')
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



<div class="item-map-links d-none"
    style="margin-top: 70px; padding-top: 70px; padding-bottom: 70px; background-color: #C1A771">
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

@include('pages.item_mobile.parts.bottom_sliders') --}}
@endsection
