<div class="brokercard" style="">
    <a href="{{ route('site.broker.page', $broker) }}" class="hexagon-wrapper">
        <img class="hexagon-underlay" src="/images/goldpolygon.png">
        @if ($broker->getFirstMedia('avatar'))
            {{ $broker->getFirstMedia('avatar')->img()->attributes(['class' => 'hexagon']) }}
        @else
            <img class="hexagon" >
        @endif

    </a>
    <a href="{{ route('site.broker.page', $broker) }}">
        <h1 class="brokername">{{ $broker->name }}</h1>
    </a>
    <h4 class="brokerposition">{{ $broker->position }}</h4>
    <a class="more-link text-center rounded-pill mx-auto d-block"
        href="{{ route('site.broker.page', $broker) }}">Связаться</a>
</div>
