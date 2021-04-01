<div class="col-lg-3 p-0 mt-4 brokercard" style="">
    <div class="imgcontainer">
        <div class="img">
            @if ($broker->getFirstMedia('avatar'))
                {{ $broker->getFirstMedia('avatar')->img()->attributes(['width' => '100%', 'height' => '']) }}
            @endif
        </div>
        <div class="overlay" style="">

            <h1 class="brokername">{{ $broker->name }}</h1>
            <h4 class="brokerposition">{{ $broker->position }}</h4>
            <a class="more-link border p-2 text-center text-white rounded-pill" href="{{ route('site.broker.page', $broker) }}">Подробнее</a>
        </div>
    </div>
</div>
