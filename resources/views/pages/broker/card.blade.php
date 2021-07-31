<div class="brokercard" style="">
    <div class="hexagon-wrapper">

        <img class="hexagon-underlay" src="/images/goldpolygon.png">
        @if ($broker->getFirstMedia('avatar'))
            {{ $broker->getFirstMedia('avatar')->img()->attributes(['class' => 'hexagon', 'width' => '250', 'height' => '']) }}
        @endif

    </div>

    <h1 class="brokername">{{ $broker->name }}</h1>
    <h4 class="brokerposition">{{ $broker->position }}</h4>
    <a class="more-link p-2 text-center rounded-pill mx-auto d-block"
        href="{{ route('site.broker.page', $broker) }}">Связаться</a>
</div>
