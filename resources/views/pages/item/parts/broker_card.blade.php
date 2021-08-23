<style>
    .hexagon-wrapper {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .hexagon-underlay {
        position: absolute;
        left: 0;
        top: 0;
        width: 230px;
        height: 258px;
        margin-left: 30px;
        margin-top: 25px;
        z-index: 0;
        /*  clip-path: inset(0 0 0 50%); */
    }

    .hexagon {
        z-index: 2;
        clip-path: polygon(0 25%, 50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%);
        width: 250px;
        height: 280px;
        background-image: url(/images/bg-for-business.jpg);
        background-size: cover;
        object-fit: cover;
    }

</style>
<div class="row">
    <div class="col-lg-3">
        <div class="hexagon-wrapper">
            <img class="hexagon-underlay" src="/images/goldpolygon.png">
            @if ($item->user && $item->user->getFirstMedia('avatar'))
                {{ $item->user->getFirstMedia('avatar')->img()->attributes(['class' => 'hexagon', 'width' => '250', 'height' => '']) }}
            @endif
        </div>

    </div>
    <div class="col-lg-9" style="padding-top: 32px; padding-bottom: 32px; padding-left: 50px; padding-right: 0;">
        <div class="row no-gutters overflow-hidden"
            style="height: 100%; border-top: 1px solid #C1A771; border-bottom: 1px solid #C1A771; border-right: 1px solid #C1A771; background: #FFF;">

            <div class="pl-4 col-lg-9 d-flex align-items-center">
                <div class="" style="">
                    <h2 style="font-size: 36px;">
                        {{ $item->user->name ?? 'Брокер' }}
                    </h2>
                    <h6 style="font-weight: 100;">
                        {{ $item->user->position ?? 'Брокер' }}
                    </h6>
                    <h1>
                        <a href="tel:+79857000077" style="text-decoration: none; font-weight: 700; color:#C1A771;">+7
                            985
                            700-00-77</a>
                    </h1>
                </div>
            </div>

        </div>
        <div class="broker-contact" style="z-index: 2; position: absolute; right: 50px; transform: translateY(-50%)">
            <a class="rounded-circle d-inline-block" href="mailto:{{ $item->user->email ?? 'info@7realty.ru' }}"
                style="border: 1px solid #C1A771; padding: 11px; background: #FFF">
                <x-icon name="envelope" />
            </a>
            <a class="ml-3 rounded-circle d-inline-block p-2" href="tel:+79857000077"
                style="border: 1px solid #C1A771; background: #FFF">
                <x-icon name="call" />
            </a>
        </div>
    </div>
</div>
