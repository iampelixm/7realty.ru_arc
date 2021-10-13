<div class="col-6 d-flex align-items-center item__option" data-option="ploshhad">
    <div class="content-specials-pref-list-info__ico" style="color: #C1A771">
        <x-icon name="ploshhad" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            {{-- {{print_r($slider_item->options['ploshad']->value, true)}} --}}
            @if (isset($slider_item->options['ploshhad']))
                {{ $slider_item->options['ploshhad']->value }}
            @else
                {{ $slider_item->square ?? '-' }}
            @endif
            м<sup>2</sup>

        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="kategoria_uchastka">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="key" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['kategoria_uchastka']))
                {{ $slider_item->options['kategoria_uchastka']->value }}
            @else
                -
            @endif
        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="do_morya">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="do_morya" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['do_morya']))
            {{ $slider_item->options['do_morya']->value }}
        @else
            -
        @endif
        мин.
        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="do_centra_goroda">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="do_centra_goroda" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['do_centra_goroda']))
                {{ $slider_item->options['do_centra_goroda']->value }}
            @else
                -
            @endif
            мин.
        </div>
    </div>
</div>
