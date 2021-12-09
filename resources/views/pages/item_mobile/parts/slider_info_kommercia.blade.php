<div class="item-options__price-wrapper">
    <div class="item-options__price-icon">
        <x-icon name="price-dom" height="35" width="30" />
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
    <div class="item-options__option" data-option="ploschad_uchastka">
        <div class="item-options__option-icon">
            <x-icon name="ploschad_uchastka" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Участок
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['ploschad_uchastka']))
                    {{ $item->options['ploschad_uchastka']->value }}
                @else
                    -
                @endif
                сот.
            </div>
        </div>
    </div>

    <div class="item-options__option" data-option="kategoria_uchastka">
        <div class="item-options__option-icon">
            <x-icon name="key" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Категория
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['kategoria_uchastka']))
                    {{ $item->options['kategoria_uchastka']->value }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

    <div class="item-options__option" data-option="kommunikacii">
        <div class="item-options__option-icon">
            <x-icon name="boiler" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Коммуникации
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['kommunikacii']))
                    {{ $item->options['kommunikacii']->value }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

    <div class="item-options__option" data-option="do_zd_vokzala">
        <div class="item-options__option-icon">
            <x-icon name="do_zd_vokzala" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                До Ж/Д вокзала
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['do_zd_vokzala']))
                    {{ $item->options['do_zd_vokzala']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>

    <div class="item-options__option" data-option="do_aeroporta">
        <div class="item-options__option-icon">
            <x-icon name="do_aeroporta" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                До аэропорта
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['do_aeroporta']))
                    {{ $item->options['do_aeroporta']->value }}
                @else
                    -
                @endif
                км.
            </div>
        </div>
    </div>

    <div class="item-options__option" data-option="do_centra_goroda">
        <div class="item-options__option-icon">
            <x-icon name="do_centra_goroda" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Центр города
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['do_centra_goroda']))
                    {{ $item->options['do_centra_goroda']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>
</div>
