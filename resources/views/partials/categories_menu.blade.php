
<div class="main-header-desktop-content acontainer d-none d-md-block" style="margin-top: 26px;">

    <div class="row" style="margin-top: 16px;">
        <div class="main-header-navi main-header-navi_position show-drop-down">
            <p class="main-header-navi__p">
                <i class="fas fa-map-marker-alt fa-map-marker-alt_position"></i> {{ $current_city_title }}<i
                    class="fas fa-chevron-down fa-chevron-down_position"></i>
            </p>
            <div class="drop-down-menu drop-down-menu___col_1">
                <div>
                    @foreach ($cities as $city)
                        <p class="drop-down-menu__p"><a class="drop-down-menu__a"
                                href="{{ route('site.change_city', $city->id) }}">{{ $city->name }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
        @foreach ($category_menu as $category)
            <div class="main-header-navi main-header-navi_position show-drop-down">
                <p class="main-header-navi__p">
                    @if(!$category->children->isEmpty())
                    <a>
                        {{ $category->name }}
                    </a>
                    <i class="fas fa-chevron-down fa-chevron-down_position"></i>
                    @else
                    <a href="@if ($category->slug) {{ route('site.get_category', $category->slug) }} @endif">
                        {{ $category->name }}
                    </a>
                    @endif
                </p>
                <div class="drop-down-menu drop-down-menu___col_1">
                    <div>
                        <div>
                            @foreach ($category->children as $subcategory)
                                <p class="drop-down-menu__p"><a class="drop-down-menu__a" href="@if ($subcategory->slug != null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a></p>
                            @endforeach

                        </div>
                        {{-- <div>
                            @foreach ($current_areas as $resArea)
                                @if (in_array($resArea->id, $areaMas[$category->id]))
                                    <p class="drop-down-menu__p"><a class="drop-down-menu__a" href="@if ($category->slug != null) {{ route('site.get_category', $category->slug) }}?area={{ $resArea->id }} @endif">{{ $resArea->name }}</a></p>
                                @endif
                            @endforeach

                        </div> --}}
                    </div>
                </div>
            </div>

        @endforeach



        <div class="main-header-navi main-header-navi_position show-drop-down">
            <p class="main-header-navi__p">
                Компания
                <i class="fas fa-chevron-down fa-chevron-down_position"></i>
            </p>
            <div class="drop-down-menu drop-down-menu___col_1">
                <div>
                    <p class="drop-down-menu__p">
                        <a class="drop-down-menu__a" href="/about">
                            О компании
                        </a>
                    </p>

                    <p class="drop-down-menu__p">
                        <a class="drop-down-menu__a" href="/work">
                            Работа в SeVen
                        </a>
                    </p>
                </div>
            </div>
            <!--<p class="main-header-navi__p"><a href="{{ route('site.get_page', 'about_us') }}">Компания</a></p> -->
        </div>
        <div class="main-header-navi main-header-navi_position">
            <p class="main-header-navi__p"><a href="{{ route('site.contacts') }}">Контакты</a></p>
        </div>
    </div>
</div>
