<nav class="navbar p-0">
    <div class="w-100">
        <ul class="navbar-nav">
            @if (!request()->routeIs('home'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="nav-link-text">
                            На Главную
                        </div>
                        <div class="nav-link-image">
                            <x-icon name="arrow-goback" width="16" />
                        </div>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.standalone.sobstvennikam') }}">
                    <div class="nav-link-text">
                        Для Собственников
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="keys" width="16" />
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.broker.list') }}">
                    <div class="nav-link-text">
                        Брокер для души
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="heart-small" width="17" />
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/invest">
                    <div class="nav-link-text">
                        Инвестиции
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="money-up" />
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.standalone.partneram') }}">
                    <div class="nav-link-text">
                        Партнерам
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="handshake" width="16" />
                    </div>
                </a>
            </li>

            <li class="nav-item d-none">
                <a class="nav-link" href="#{{-- {{ route('site.pages.analytics') }} --}}">
                    <div class="nav-link-text">
                        Аналитика
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="tablet" width="16" />
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.pages.news') }}">
                    <div class="nav-link-text">
                        Новости
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="newspaper" width="16" style="amargin-bottom: 10px" />
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#{{-- {{ route('site.pages.webinars') }} --}}">
                    <div class="nav-link-text">
                        Вебинары
                    </div>
                    <div class="nav-link-image">
                        <x-icon name="webcam" width="20" />
                    </div>
                </a>
            </li>

            <li class="nav-item d-none">
                <a class="nav-link" href="#">
                    <div class="nav-link-image">
                    </div>
                    <div class="nav-link-text">
                        Контакты
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
