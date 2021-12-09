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
    <div class="item-options__option" data-option="ploshhad">
        <div class="item-options__option-icon">
            <x-icon name="ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Площадь
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['ploshhad']))
                    {{ $item->options['ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="komnat">
        <div class="item-options__option-icon">
            <x-icon name="komnat" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Комнат
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['komnat']))
                    {{ $item->options['komnat']->value }}
                    {{ trans_choice('site.all_rooms', (int) $item->options['komnat']->value) }}
                @else
                    -
                @endif

            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="etaznost">
        <div class="item-options__option-icon">
            <x-icon name="etaznost" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Этажность
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['etaz']))
                    {{ $item->options['etaz']->value }}
                @else
                    -
                @endif
                из
                @if (isset($item->options['etaznost']))
                    {{ $item->options['etaznost']->value }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="spalen">
        <div class="item-options__option-icon">
            <x-icon name="spalen" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Спален
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['spalen']))
                    {{ $item->options['spalen']->value }}
                    {{ trans_choice('site.bed_rooms', (int) $item->options['spalen']->value) }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="vannyx_komnat">
        <div class="item-options__option-icon">
            <x-icon name="vannyx_komnat" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Ванных комнат
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['vannyx_komnat']))
                    {{ $item->options['vannyx_komnat']->value }}
                    {{ trans_choice('site.bath_rooms', (int) $item->options['vannyx_komnat']->value) }}
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
    <div class="item-options__option" data-option="do_morya">
        <div class="item-options__option-icon">
            <x-icon name="do_morya" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                До моря
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['do_morya']))
                    {{ $item->options['do_morya']->value }}
                @else
                    -
                @endif
                мин.
            </div>
        </div>
    </div>
</div>
