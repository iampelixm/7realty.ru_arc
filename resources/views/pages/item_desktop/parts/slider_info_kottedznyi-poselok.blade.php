@extends('pages.item_desktop.parts.slider_info_common')
@section('price')
    от
    {{ number_format(((int) ($item->options['minimalnaya_cena_za_kvm']->value ?? 0)) * ((int) ($item->options['minimalnaya_ploshhad']->value ?? 0)), 0, ',', ' ') }}
    ₽
@endsection

@section('options')
    <div class="col-lg-6 d-flex" data-option="minimalnaya_ploshhad">
        <div class="content-object-card-information-icon">
            <x-icon name="minimalnaya_ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Мин. площадь
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['minimalnaya_ploshhad']))
                    {{ $item->options['minimalnaya_ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="maksimalnaya_ploshhad">
        <div class="content-object-card-information-icon">
            <x-icon name="maksimalnaya_ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Макс. площадь
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['maksimalnaya_ploshhad']))
                    {{ $item->options['maksimalnaya_ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="minimalnaya_cena_za_kvm">
        <div class="content-object-card-information-icon">
            <x-icon name="price_dom" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Мин. цена за м<sup>2</sup>
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['minimalnaya_cena_za_kvm']))
                    {{ $item->options['minimalnaya_cena_za_kvm']->value }}
                @else
                    -
                @endif
                ₽
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="ploshhad_ucastka">
        <div class="content-object-card-information-icon">
            <x-icon name="ploschad_uchastka" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Участок
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['ploshhad_ucastka']))
                    {{ $item->options['ploshhad_ucastka']->value }}
                @else
                    -
                @endif
                сот.
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="do_zd_vokzala">
        <div class="content-object-card-information-icon">
            <x-icon name="do_zd_vokzala" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                До Ж/Д вокзала
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['do_zd_vokzala']))
                    {{ $item->options['do_zd_vokzala']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="do_aeroporta">
        <div class="content-object-card-information-icon">
            <x-icon name="do_aeroporta" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                До аэропорта
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['do_aeroporta']))
                    {{ $item->options['do_aeroporta']->value }}
                @else
                    -
                @endif
                км.
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="do_morya">
        <div class="content-object-card-information-icon">
            <x-icon name="do_morya" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                До моря
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['do_morya']))
                    {{ $item->options['do_morya']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex" data-option="god_postroiki">
        <div class="content-object-card-information-icon">
            <x-icon name="god_postroiki" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Год постройки
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['god_postroiki']))
                    {{ $item->options['god_postroiki']->value }}
                @else
                    -
                @endif
                г.
            </div>
        </div>
    </div>
@endsection
{{-- <h2 class="content-object-card-information-title">{{ $item->name }}</h2>
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
                                от
                                {{ number_format(((int) $item->options['minimalnaya_cena_za_kvm']->value ?? 0) * ((int) $item->options['minimalnaya_ploshhad']->value ?? 0), 0, ',', ' ') }}
                                ₽
                            </div>
                        </div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_square')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Площадь</div>
                            <div class="content-object-card-information-list-text-info">
                                от {{ $item->options['minimalnaya_ploshhad']->value ?? '--' }} м²
                                - до
                                {{ $item->options['maksimalnaya_ploshhad']->value ?? '--' }} м²
                            </div>
                        </div>
                    </div>
                    {{-- это убираем или заменяем на другое свойство
                    @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_square')
                            </div>
                            <div class="content-object-card-information-list-text">

                                <div class="content-object-card-information-list-text-tile">Максимальная площадь</div>
                                <div class="content-object-card-information-list-text-info">
                                    До
                                    {{ $item->options['maksimalnaya_ploshhad']['value'] ?? '--' }}
                                    м²
                                </div>
                            </div>
                        </div>
                    @endif --}}
{{-- <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_price')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Цена за м²</div>
                            <div class="content-object-card-information-list-text-info">
                                от
                                {{ number_format((int) $item->options['minimalnaya_cena_za_kvm']->value, 0, ',', ' ') ?? '--' }}
                                ₽
                            </div>
                        </div>
                    </div> --}}
