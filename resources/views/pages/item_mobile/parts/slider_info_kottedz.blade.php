@extends('pages.item.parts.slider_info_common')

@section('price-icon')
    <x-icon name="price_dom" />
@endsection

@section('options')
    <div class="col-lg-6 d-flex" data-option="ploshhad">
        <div class="content-object-card-information-icon">
            <x-icon name="ploschad_dom" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Мин. площадь
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['ploshhad']))
                    {{ $item->options['ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
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
                @if (isset($item->options['etaznost']))
                    {{ $item->options['etaznost']->value }}
                    {{trans_choice('site.floor', $item->options['etaznost']->value)}}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex" data-option="komnat">
        <div class="content-object-card-information-icon">
            <x-icon name="komnat" height="50" width="50" />
        </div>
        <div>
            <div class="content-object-card-information-list-text-tile">
                Кол-во комнат
            </div>
            <div class="content-object-card-information-list-text-info">
                @if (isset($item->options['komnat']))
                    {{ $item->options['komnat']->value }}
                    {{trans_choice('site.all_rooms', $item->options['komnat']->value)}}
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
                    {{ $item->options['spalen']->value }}
                    {{trans_choice('site.deb_rooms', $item->options['spalen']->value)}}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

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
                    {{ $item->options['ploschad_uchastka']->value }}
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

@endsection
