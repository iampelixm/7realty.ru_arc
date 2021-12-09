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
            {{ number_format(((int) ($item->options['minimalnaya_cena_za_kvm']->value ?? 0)) * ((int) ($item->options['minimalnaya_ploshhad']->value ?? 0)), 0, ',', ' ') }}
            ₽
        @endif
    </div>
</div>


<div class="item-options__wrapper" data-card="{{ $item->type->slug }}">
    <div class="item-options__option" data-option="minimalnaya_ploshhad">
        <div class="item-options__option-icon">
            <x-icon name="minimalnaya_ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Мин. площадь
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['minimalnaya_ploshhad']))
                    {{ $item->options['minimalnaya_ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="maksimalnaya_ploshhad">
        <div class="item-options__option-icon">
            <x-icon name="maksimalnaya_ploshhad" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Макс. площадь
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['maksimalnaya_ploshhad']))
                    {{ $item->options['maksimalnaya_ploshhad']->value }}
                @else
                    -
                @endif
                м<sup>2</sup>
            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="minimalnaya_cena_za_kvm">
        <div class="item-options__option-icon">
            <x-icon name="price_dom" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Мин. цена за м<sup>2</sup>
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['minimalnaya_cena_za_kvm']))
                    {{ $item->options['minimalnaya_cena_za_kvm']->value }}
                @else
                    -
                @endif
                ₽
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
                @if (isset($item->options['etaznost']))
                    {{ $item->options['etaznost']->value }}
                    {{ trans_choice('site.floor', $item->options['etaznost']->value) }}
                @else
                    -
                @endif

            </div>
        </div>
    </div>
    <div class="item-options__option" data-option="god_postroiki">
        <div class="item-options__option-icon">
            <x-icon name="god_postroiki" height="50" width="50" />
        </div>
        <div>
            <div class="item-options__option-title">
                Год постройки
            </div>
            <div class="item-options__option-value">
                @if (isset($item->options['god_postroiki']))
                    {{ $item->options['god_postroiki']->value }}
                @else
                    -
                @endif
                г.
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
