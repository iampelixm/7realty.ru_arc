@extends('pages.item_mobile.parts.slider_info_common')

@section('price-icon')
    <x-icon name="price_dom" />
@endsection

@section('options')
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
                    {{ $item->options['kategoria_uchastka']->value }}
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
                    {{ $item->options['kommunikacii']->value }}
                @else
                    -
                @endif
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
                    {{ $item->options['do_centra_goroda']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>

@endsection
