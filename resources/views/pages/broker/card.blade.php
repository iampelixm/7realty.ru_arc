<div class="brokercard" style="">
    <div class="hexagon-wrapper">
        <a href="{{ route('site.broker.page', $broker) }}">
            <img class="hexagon-underlay" src="/images/goldpolygon.png">
            @if ($broker->getFirstMedia('avatar'))
                {{ $broker->getFirstMedia('avatar')->img()->attributes(['class' => 'hexagon', 'width' => '250', 'height' => '']) }}
            @endif
        </a>

    </div>
    <a href="{{ route('site.broker.page', $broker) }}">
        <h1 class="brokername">{{ $broker->name }}</h1>
    </a>
    <h4 class="brokerposition">{{ $broker->position }}</h4>
    <a class="more-link text-center rounded-pill mx-auto d-block"
        href="{{ route('site.broker.page', $broker) }}">Связаться</a>
</div>
