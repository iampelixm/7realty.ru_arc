@extends('pages.item.parts.slider_info_common')

@section('options')
    <div class="col-lg-6 d-flex" data-option="ploshhad">
        <div class="content-object-card-information-icon">
            <x-icon name="ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Площадь
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['ploshhad']))
                    {{ $item->options['ploshhad']->value_title }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="komnat">
        <div class="content-object-card-information-icon">
            <x-icon name="komnat" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Комнат
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['komnat']))
                    {{ $item->options['komnat']->value_title }}
                    {{ trans_choice('site.all_rooms', (int) $item->options['komnat']->value_title) }}
                @else
                    -
                @endif

            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="etaznost">
        <div class="content-object-card-information-icon">
            <x-icon name="etaznost" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Этажность
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['etaz']))
                    {{ $item->options['etaz']->value_title }}
                @else
                    -
                @endif
                из
                @if (isset($item->options['etaznost']))
                    {{ $item->options['etaznost']->value_title }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="spalen">
        <div class="content-object-card-information-icon">
            <x-icon name="spalen" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Спален
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['spalen']))
                    {{ $item->options['spalen']->value_title }}
                    {{ trans_choice('site.bed_rooms', (int) $item->options['spalen']->value_title) }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex" data-option="vannyx_komnat">
        <div class="content-object-card-information-icon">
            <x-icon name="vannyx_komnat" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Ванных комнат
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['vannyx_komnat']))
                    {{ $item->options['vannyx_komnat']->value_title }}
                    {{ trans_choice('site.bath_rooms', (int) $item->options['vannyx_komnat']->value_title) }}
                @else
                    -
                @endif
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
                    {{ $item->options['do_zd_vokzala']->value_title }}
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
                    {{ $item->options['do_aeroporta']->value_title }}
                @else
                    -
                @endif
                мин.
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
                    {{ $item->options['do_morya']->value_title }}
                @else
                    -
                @endif
                мин.
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
                                {{ number_format(((int) $item->options['minimalnaya_cena_za_kvm']->value_title ?? 0) * ((int) $item->options['minimalnaya_ploshhad']->value_title ?? 0), 0, ',', ' ') }}
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
                                от {{ $item->options['minimalnaya_ploshhad']->value_title ?? '--' }} м²
                                - до
                                {{ $item->options['maksimalnaya_ploshhad']->value_title ?? '--' }} м²
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
                                    {{ $item->options['maksimalnaya_ploshhad']['value_title'] ?? '--' }}
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
                                {{ number_format((int) $item->options['minimalnaya_cena_za_kvm']->value_title, 0, ',', ' ') ?? '--' }}
                                ₽
                            </div>
                        </div>
                    </div> --}}
