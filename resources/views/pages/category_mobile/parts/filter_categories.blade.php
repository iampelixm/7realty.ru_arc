{{-- <select name="categories" onchange="window.location.pathname= $(this).val();">
<option value="/category/novostroiki" {{($category->slug == 'novostroiki') ? 'selected' : ''}}>Новостройки</option>
<option value="/category/kottedznye-posyolki" {{($category->slug == 'kottedznye-posyolki') ? 'selected' : ''}}>Коттеджные поселки</option>
</select> --}}
<div class="dropdown">
    <div class="dropdown-toggle" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        {{ $category->name }}
    </div>
    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
        <a class="dropdown-item" href="/category/novostroiki">Новостройки</a>
        <a class="dropdown-item" href="/category/kottedznye-posyolki">Коттеджные поселки</a>
        <a class="dropdown-item" href="/category/zemelnye-ucastki">Участки</a>
        <a class="dropdown-item" href="/category/doma">Дома</a>
        <a class="dropdown-item" href="/category/kvartiry">Квартиры</a>
        <a class="dropdown-item" href="/category/pentxausy">Пентхаусы</a>
    </div>
</div>
{{-- <div class="show-drop-down">
    <span id="filter_category_text">
        {{ $category->name }}
        <i class="fas fa-chevron-down fa-chevron-down_position"></i>
        <div class="drop-down-menu drop-down-menu___col_1">
            <div>
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
                </div>
            </div>
        </div>
</div> --}}
