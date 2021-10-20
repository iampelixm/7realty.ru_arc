@extends('layouts.site_mobile')

@section('content')
    <div class="page-broker-info">
        @if ($broker->getFirstMedia('avatar'))
            <div class="avatar-container">
                {{ $broker->getFirstMedia('avatar')->img()->attributes(['class' => 'broker-avatar']) }}
            </div>
            <div class="broker-buttons-wrapper">
                <a class="broker-button" href="tel:{{ $broker->additional->phone ?? '+79857000077' }}">
                    <span class="broker-button__icon">
                        <x-icon name="call" />
                    </span>
                    Позвонить
                </a>

                <span class="color-gold">|</span>

                <a class="broker-button" href="mailto:{{ $broker->email }}">
                    <span class="broker-button__icon">
                        <x-icon name="envelope" />
                    </span>
                    Написать
                </a>
            </div>
        @endif
        <div class="container">
            <h1 class="broker-title">{{ $broker->name }}</h1>
            <h6 class="broker-position">{{ $broker->position }}</h6>
            <a class="broker-phone" href="tel:{{ $broker->additional->phone ?? '+79857000077' }}">
                {{ $broker->additional->phone ?? '+7 985 700-00-77' }}
            </a>
            <a class="broker-email" href="mailto:{{ $broker->email }}">
                {{ $broker->email }}
            </a>

            <div class="broker-info-wrapper">
                <div class="broker-info">
                    <div class="broker-info__icon">
                        <x-icon name="calendar" />
                    </div>
                    <div class="broker-info__content">
                        <div class="broker-info__title">
                            Стаж в компании
                        </div>
                        <div class="broker-info__value">
                            {{ $broker->additional->stazh ?? '-' }}
                            {{ trans_choice('site.years', $broker->additional->stazh ?? '1') }}
                        </div>
                    </div>
                </div>

                <div class="broker-info">
                    <div class="broker-info__icon">
                        <x-icon name="businessman" />
                    </div>
                    <div class="broker-info__content">
                        <div class="broker-info__title">
                            Количество успешных сделок
                        </div>
                        <div class="broker-info__value">
                            {{ $broker->additional->sdelok ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="broker-description-wrapper">
                @if ($broker->additional->obrazovanie ?? '')
                    <div class="broker-description">
                        <h2 class="broker-description__title">
                            Образование
                        </h2>
                        <p class="broker-description__text">
                            {!! $broker->additional->obrazovanie !!}
                        </p>
                    </div>
                @endif

                @if ($broker->additional->opit ?? '')
                    <div class="broker-description">
                        <h2 class="broker-description__title">
                            Опыт работы
                        </h2>
                        <p class="broker-description__text">
                            {!! $broker->additional->opit !!}
                        </p>
                    </div>
                @endif

                @if ($broker->additional->lichno ?? '')
                    <div class="broker-description">
                        <h2 class="broker-description__title">
                            Лично от себя
                        </h2>
                        <p class="broker-description__text">
                            {!! $broker->additional->lichno !!}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
