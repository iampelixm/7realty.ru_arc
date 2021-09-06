    <div style="background: #C1A771">
        {{-- 0E1216 --}}
        <div class="main-header-desktop-content topnav d-none d-lg-block" style="background: transparent; font-size: 14px; font-family: Geometria;  font-weight: 400; padding-top: 3px;">
            <nav class="navbar p-0">
                <div class="navbar-expand-sm w-100" id="">
                    <ul class="navbar-nav justify-content-between" >
                        @if(!request()->routeIs('home'))
                        <li class="nav-item" >
                            <a class="nav-link d-flex" href="{{ route('home') }}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="arrow-goback" width="16" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    На Главную
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>
                        @endif

                        <li class="nav-item" >
                            <a class="nav-link d-flex" href="{{ route('site.standalone.sobstvennikam') }}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="keys" width="16" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Для Собственников
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" href="{{ route('site.broker.list') }}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="heart-small" width="17" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Брокер для души
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" href="/invest" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="money-up" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Инвестиции
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" href="{{route('site.standalone.partneram')}}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="handshake" width="16" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Партнерам
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider d-none">
                            |
                        </li>

                        <li class="nav-item d-none">
                            <a class="nav-link d-flex" href="#{{--{{ route('site.pages.analytics') }}--}}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="tablet" width="16" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Аналитика
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" href="{{ route('site.pages.news') }}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="newspaper" width="16" style="amargin-bottom: 10px" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Новости
                                </div>
                            </a>
                        </li>

                        <li class="nav-divider">
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" href="#{{--{{ route('site.pages.webinars') }}--}}" style="color: #FFF">
                                <div class="nav-link-image">
                                    <x-icon name="webcam" width="20" />
                                </div>
                                <div class="nav-link-text ml-2">
                                    Вебинары
                                </div>
                            </a>
                        </li>

                        <li class="nav-item d-none">
                            <a class="nav-link d-flex" href="#" style="color: #FFF">
                                <div class="nav-link-image">
                                </div>
                                <div class="nav-link-text ml-2">
                                    Контакты
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
