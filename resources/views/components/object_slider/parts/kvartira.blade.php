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

<div class="col-6 d-flex align-items-center item__option" data-option="komnat">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="komnat" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['komnat']))
                {{ $slider_item->options['komnat']->value }}
                {{trans_choice('site.all_rooms', $slider_item->options['komnat']->value)}}
            @else
                {{ $slider_item->all_rooms ?? '-' }}
            @endif
        </div>
    </div>
</div>

<div class="col-6 d-flex align-items-center item__option" data-option="etaz-etaznost">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="etaz" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">

            @if (isset($slider_item->options['etaz']))
            {{-- {{dd($slider_item->options)}} --}}
                {{ $slider_item->options['etaz']->value }}
            @else
                -
            @endif

            из

            @if (isset($slider_item->options['etaznost']))
                {{ $slider_item->options['etaznost']->value }}
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
