<div class="main-header-mobile-content-active d-none d-md-none">
    <div class="mx-auto text-center py-2">
        <h2 class="main-header-mobile-content-active__h2">
            <a href="#" class="mobile-up-menu-adress"><i class="fas fa-map-marker-alt fa-map-marker-alt_position"></i>
                {{ $current_city_title }} </a>
            <i class="fas fa-chevron-down fa-chevron-down_position"></i>
        </h2>

        <div class="d-none">
            @foreach ($cities as $city)
                <p class="main-header-mobile-content-active__p"><a href="{{ route('site.change_city', $city->id) }}"
                        class="mobile-d-menu-adress">{{ $city->name }}</a></p>
            @endforeach

        </div>
    </div>

    <div class="mx-auto text-center py-2">
        <h2 class="main-header-mobile-content-active__h2">
            <a href="#" class="mobile-up-menu-residentials">Жилые комплексы </a>
            <i class="fas fa-chevron-down fa-chevron-down_position"></i>
        </h2>
        <div class="d-none">
            <p class="main-header-mobile-content-active__p py-1"><a href="{{ route('site.res.residences', 'all') }}"
                    class="mobile-d-menu-residentials">Все
                    комплексы</a></p>
            <p class="main-header-mobile-content-active__p py-1"><a href="{{ route('site.res.residences', 'all') }}"
                    class="mobile-d-menu-residentials">Элитный</a></p>
            <p class="main-header-mobile-content-active__p py-1"><a href="{{ route('site.res.residences', 'all') }}"
                    class="mobile-d-menu-residentials">Бизнес-класс</a></p>
            @foreach ($current_areas as $resArea)
                @if (in_array($resArea->id, $residenceArea))
                    <p class="main-header-mobile-content-active__p py-1"><a class="mobile-d-menu-residentials"
                            href="{{ route('site.res.residences', 'all') }}?area={{ $resArea->id }}">{{ $resArea->name }}</a>
                    </p>
                @endif

            @endforeach

        </div>
    </div>

    @foreach ($category_menu as $category)
        <div class="mx-auto text-center py-2">

            <h2 class="main-header-mobile-content-active__h2">
                <a href="#" class="mobile-up-menu-houses">{{ $category->name }} </a>
                <i class="fas fa-chevron-down fa-chevron-down_position"></i>
            </h2>
            <div class="d-none">
                <div>
                    <div>
                        @foreach ($category->children as $subcategory)
                            <p class="main-header-mobile-content-active__p"><a class="mobile-d-menu-houses"
                                    href="@if ($subcategory->slug != null) {{ route('site.get_category', $subcategory->slug) }} @endif">{{ $subcategory->name }}</a></p>
                        @endforeach

                    </div>
                    <div>
                        @foreach ($current_areas as $resArea)
                            @if (in_array($resArea->id, $areaMas[$category->id]))
                                <p class="main-header-mobile-content-active__p"><a class="mobile-d-menu-houses"
                                        href="@if ($category->slug != null) {{ route('site.get_category', $category->slug) }}?area={{ $resArea->id }} @endif">{{ $resArea->name }}</a></p>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    @endforeach



    <div class="mx-auto text-center py-2">
        <h2 class="main-header-mobile-content-active__h2">
            <a href="{{ route('site.get_page', 'about_us') }}">Компания</a>
        </h2 class="main-header-mobile-content-active__h2">
    </div>
    <div class="mx-auto text-center py-2">
        <h2 class="main-header-mobile-content-active__h2">
            <a href="{{ route('site.contacts') }}">Контакты</a>
        </h2>
    </div>
    <div class="mx-auto text-center py-2 d-flex">
        @guest
            <div class="header-logo-body-img header-logo-body-img_position d-block" style="margin: auto;">
                <div class="header-logo-body-img header-logo-body-img_position text-right">
                    <i class="fas fa-user-alt"></i>
                </div>
            </div>
        @endguest

        @auth
            <div class="header-logo-body-img-auth header-logo-body-img_position d-block" style="margin: auto;">
                <!-- Логин С входом -->
                <div
                    class="user-login row row-cols-2 align-items-center justify-content-between text-center no-gutters py-2">
                    <div class="col user-login-bnt">
                        @php
                            $colorArr = ['#007882', '#0076c1'];
                            $rand_keys = array_rand($colorArr, 1);
                        @endphp
                        <a href="{{ route('site.favorites') }}"
                            style="background-color: {{ $colorArr[$rand_keys] }};">{{ auth()->user()->name['0'] ?? '' }}
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M17.5217 10.1739C17.8337 10.1739 18.087 9.92067 18.087 9.60867V2.82607C18.0869 1.26835 16.8197 0 15.2609 0H2.82607C1.26723 0 0 1.26835 0 2.82607V23.1739C0 24.7316 1.26723 25.9999 2.82607 25.9999H15.2609C16.8197 25.9999 18.0869 24.7316 18.0869 23.1739V16.3913C18.0869 16.0793 17.8337 15.826 17.5217 15.826C17.2097 15.826 16.9565 16.0793 16.9565 16.3913V23.1739C16.9565 24.1088 16.1957 24.8695 15.2609 24.8695H2.82607C1.89118 24.8695 1.13042 24.1088 1.13042 23.1739V2.82607C1.13042 1.89118 1.89118 1.13042 2.82607 1.13042H15.2609C16.1957 1.13042 16.9565 1.89118 16.9565 2.82607V9.60867C16.9565 9.92067 17.2097 10.1739 17.5217 10.1739Z"
                                        fill="black" />
                                    <path
                                        d="M25.4347 12.4348H7.34783C7.03583 12.4348 6.78259 12.688 6.78259 13C6.78259 13.312 7.03583 13.5652 7.34783 13.5652H25.4347C25.7467 13.5652 26 13.312 26 13C26 12.688 25.7467 12.4348 25.4347 12.4348Z"
                                        fill="black" />
                                    <path
                                        d="M25.8338 12.602L22.4425 9.21074C22.222 8.9903 21.8637 8.9903 21.6432 9.21074C21.4228 9.43117 21.4228 9.78954 21.6432 10.01L24.6344 13.0011L21.6432 15.9922C21.4228 16.2127 21.4228 16.571 21.6432 16.7915C21.754 16.9011 21.8987 16.9565 22.0434 16.9565C22.1881 16.9565 22.3328 16.9011 22.4425 16.7926L25.8338 13.4013C26.0542 13.1808 26.0542 12.8225 25.8338 12.602Z"
                                        fill="black" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="26" height="26" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>


                    </div>
                </div>
            </div>
        @endauth
    </div>
</div>
