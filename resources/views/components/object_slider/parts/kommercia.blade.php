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

<div class="col-6 d-flex align-items-center item__option" data-option="etaz">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="etaz" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['etaz']))
                {{ $slider_item->options['etaz']->value }}
                {{trans_choice('site.floor', $slider_item->options['etaznost']->value)}}
            @else
                -
            @endif
        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="do-morya">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="do-morya" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['do-morya']))
            {{ $slider_item->options['do-morya']->value }}
        @else
            -
        @endif
        мин.
        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="centr_goroda">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="centr_goroda" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['centr_goroda']))
                {{ $slider_item->options['centr_goroda']->value }}
            @else
            -
            @endif
            мин.
        </div>
    </div>
</div>
