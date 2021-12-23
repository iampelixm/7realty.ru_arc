<div>
    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/novostroiki">
            Новостройки
        </a>
    </p>

    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/kottedznye-posyolki">
            Коттеджные поселки
        </a>
    </p>

    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/zemelnye-ucastki">
            Участки
        </a>
    </p>

    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/doma">
            Дома
        </a>
    </p>

    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/kvartiry">
            Квартиры
        </a>
    </p>

    <p class="drop-down-menu__p">
        <a class="drop-down-menu__a" href="/category/pentxausy">
            Пентхаусы
        </a>
    </p>
    {{-- @foreach ($category_menu as $cat)
@if($category->children->isEmpty())
                                <p class="drop-down-menu__p">
                                    <a class="drop-down-menu__a" href="{{ route('site.get_category', $cat->slug) }}">
    {{ $cat->name }}
    </a>
    </p>
    @endif

    @endforeach--}}

</div>
