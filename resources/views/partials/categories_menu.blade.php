<div class="desktop-content main-header-categories-menu">
    <nav class="navbar navbar-expand-sm p-0">
        <ul class="navbar-nav d-flex justify-content-between w-100">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle city-select" href="#" id="citySelectDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="main-header-categories-menu__city-select-icon color-gold">
                        <x-icon name="map-marker" />
                    </span>

                    {{ $current_city_title }}
                </a>
                <div class="dropdown-menu" aria-labelledby="citySelectDropdown">
                    @foreach ($cities as $city)
                        <a class="dropdown-item" href="{{ route('site.change_city', $city->id) }}">
                            {{ $city->name }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-divider">
                |
            </li>
            @foreach ($category_menu as $category)
                @if ($category->children->isEmpty())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.get_category', $category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    <li class="nav-divider">
                        |
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categorySub_{{ $category->id }}"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categorySub_{{ $category->id }}">
                            @foreach ($category->children as $subcategory)
                                <a class="dropdown-item" href="{{ route('site.get_category', $subcategory->slug) }}">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-divider">
                        |
                    </li>
                @endif
            @endforeach

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="companyMenuDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Компания
                </a>
                <div class="dropdown-menu" aria-labelledby="companyMenuDropdown">
                        <a class="dropdown-item" href="/about">
                            О компании
                        </a>
                        <a class="dropdown-item" href="/work">
                            Работа в Seven
                        </a>
                </div>
            </li>
            <li class="nav-divider">
                |
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.standalone.contacts') }}">
                    Контакты
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-header-desktop-content main-header-categories-menu d-none">

    <div class="row" style="">
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
                    @if (!$category->children->isEmpty())
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
                                <p class="drop-down-menu__p"><a class="drop-down-menu__a"
                                        href="@if ($subcategory->slug != null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a></p>
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
            <p class="main-header-navi__p"><a href="{{ route('site.standalone.contacts') }}">Контакты</a></p>
        </div>
    </div>
</div>
