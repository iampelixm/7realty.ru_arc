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
            @if (view()->exists('pages.item_mobile.parts.slider_info_' . $item->type->slug))
                @include('pages.item_mobile.parts.slider_info_'.$item->type->slug)
            @else
                @include('pages.item_mobile.parts.slider_info_default')
            @endif
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
@endsection
