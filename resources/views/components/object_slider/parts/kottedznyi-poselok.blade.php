<div class="col-lg-6 d-flex align-items-center" data-option="minimalnaya_ploshhad">
    <div class="content-specials-pref-list-info__ico" style="color: #C1A771">
        <x-icon name="minimalnaya_ploshhad" height="20" width="20" />
    </div>

    <div>
        <div class="content-specials-pref-list-info__text">
            От
            @if (isset($slider_item->options['minimalnaya_ploshhad']))
                {{ $slider_item->options['minimalnaya_ploshhad']->value }}
            @else
                -
            @endif
            м<sup>2</sup>
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="maksimalnaya_ploshhad">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="maksimalnaya_ploshhad" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            До
            @if (isset($slider_item->options['maksimalnaya_ploshhad']))
                {{ $slider_item->options['maksimalnaya_ploshhad']->value }}
            @else
                -
            @endif
            м<sup>2</sup>
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
                {{ $slider_item->options['do_morya']->value }}
            @else
                -
            @endif
            мин.
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="god_postroyki">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="god_postroyki" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['god_postroiki']))
                {{ $slider_item->options['god_postroiki']->value }}
            @else
                -
            @endif
            г.
        </div>
    </div>
</div>
