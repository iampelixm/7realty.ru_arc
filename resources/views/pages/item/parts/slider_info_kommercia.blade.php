@extends('pages.item.parts.slider_info_common')

@section('price-icon')
    <x-icon name="price_dom" />
@endsection

@section('options')
    <div class="col-lg-6 d-flex" data-option="ploschad_uchastka">
        <div class="content-object-card-information-icon">
            <x-icon name="ploschad_uchastka" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Участок
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['ploschad_uchastka']))
                    {{ $item->options['ploschad_uchastka']->value_title }}
                @else
                    -
                @endif
                сот.
            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex" data-option="kategoria_uchastka">
        <div class="content-object-card-information-icon">
            <x-icon name="key" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Категория
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['kategoria_uchastka']))
                    {{ $item->options['kategoria_uchastka']->value_title }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex" data-option="kommunikacii">
        <div class="content-object-card-information-icon">
            <x-icon name="boiler" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Коммуникации
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['kommunikacii']))
                    {{ $item->options['kommunikacii']->value_title }}
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

    <div class="col-lg-6 d-flex" data-option="do_centra_goroda">
        <div class="content-object-card-information-icon">
            <x-icon name="do_centra_goroda" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Центр города
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['do_centra_goroda']))
                    {{ $item->options['do_centra_goroda']->value_title }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>

@endsection
