<div class="col-lg-6 d-flex align-items-center" data-option="ploshhad">
    <div class="content-specials-pref-list-info__ico" style="color: #C1A771">
        <x-icon name="ploshhad" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            {{-- {{print_r($slider_item->options['ploshad']->value_title, true)}} --}}
            @if (isset($slider_item->options['ploshhad']))
                {{ $slider_item->options['ploshhad']->value_title }}
            @else
                {{ $slider_item->square ?? '-' }}
            @endif
            м<sup>2</sup>

        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="komnat">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="komnat" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['komnat']))
                {{ $slider_item->options['komnat']->value_title }}
            @else
                {{ $slider_item->all_rooms ?? '-' }}
            @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="etaz-etaznost">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="etaz" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">

            @if (isset($slider_item->options['etaz']))
                {{ $slider_item->options['etaz']->value_title }}
            @else
                -
            @endif

            из

            @if (isset($slider_item->options['etaznost']))
                {{ $slider_item->options['etaznost']->value_title }}
            @else
                -
            @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="do_morya">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="do_morya" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['do_morya']))
                {{ $slider_item->options['do_morya']->value_title }}
            @else
                -
            @endif
            мин.
        </div>
    </div>
</div>
