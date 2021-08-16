@if (isset($slider_item->options['minimalnaya_cena_za_kvm']) && isset($slider_item->options['minimalnaya_ploshhad']))
    От
    {{ number_format(((int) $slider_item->options['minimalnaya_cena_za_kvm']->value_title ?? 0) * ((int) $slider_item->options['minimalnaya_ploshhad']->value_title ?? 0), 0, ',', ' ') }}
    ₽
@else
    По запросу
@endif
