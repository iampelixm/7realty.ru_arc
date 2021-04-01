@extends('layouts.site')

@section('content')

    <div class="hero"
        style="background-image: url(/users/image/hero_webinars.jpg); background-position: center center; background-repeat: no-repeat;">
        <div style="background: linear-gradient(rgba(0,0,0,0) 10%, rgba(0,0,0,0.8))">
            <div class="container">
                <div class="row align-items-end" style="height: 400px; padding-bottom: 40px; ">
                    <div class="col-lg-4" style="height: 130px; border-right: 1px solid #eee">
                        <h1 class="title text-right" style="font-weight: 700; color: #C1A771">ВЕБИНАРЫ</h1>
                    </div>
                    <div class="col-lg-8" style="height: 130px; font-family: Geometria; color: #FFF">
                        <h2>{{ $pages->first()->name ?? '' }}</h2>
                        <p>
                            Дата проведения: {!! $pages->first()->params->date ?? '' !!}
                        </p>
                        <a style="color: #FFF; text-decoration: none"
                            href="{{ route('site.pages.webinars.page', $pages->first() ?? '') }}">
                            <svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M27.8172 3.11944C27.6541 2.51651 27.3358 1.96683 26.8941 1.52514C26.4525 1.08346 25.9028 0.765179 25.2999 0.602C23.0926 0 14.2088 0 14.2088 0C14.2088 0 5.32455 0.0182222 3.11722 0.620222C2.51428 0.783411 1.9646 1.10171 1.52294 1.54341C1.08127 1.98512 0.763022 2.53482 0.599887 3.13778C-0.0677799 7.05978 -0.32678 13.036 0.61822 16.8011C0.781373 17.4041 1.09963 17.9537 1.54129 18.3954C1.98296 18.8371 2.53262 19.1554 3.13555 19.3186C5.34289 19.9206 14.2269 19.9206 14.2269 19.9206C14.2269 19.9206 23.1108 19.9206 25.318 19.3186C25.921 19.1554 26.4706 18.8371 26.9123 18.3954C27.354 17.9538 27.6723 17.4041 27.8354 16.8011C28.5397 12.8736 28.7567 6.90111 27.8172 3.11956V3.11944Z"
                                        fill="#FF0000" />
                                    <path d="M11.3799 14.2289L18.7498 9.96019L11.38 5.69153L11.3799 14.2289Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="28.4453" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Смотреть
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="font-family: Geometria">
        <div class="row">
            @foreach ($pages->skip(1) as $page)
                <div class="col-lg-4 col-md-6 mt-4 mb-2">
                    <div class="inner" style="position: relative">
                        @if (!collect($page->getMedia('images'))->isEmpty())
                            {{ $page->getMedia('images')
    [$page->params->preview_image ?? 0]->img()->attributes(['width' => '100%', 'height' => '']) }}
                        @endif
                        <div class="overlay d-flex flex-column justify-content-between"
                            style="color: #FFF; transform: translateY(-100%); width: 100%; height: 100%; position: absolute; background: linear-gradient(180deg, rgba(0, 0, 0, 0.38) 0%, rgba(0, 0, 0, 0.95) 100%);">
                            <div class="row text-center pt-2 px-4" style="font-size: 14px;">
                                <div class="col">Дата проведения</div>
                                <div class="col">{{ $page->params->date ?? '' }}</div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('site.pages.webinars.page', $page) }}"
                                    style="text-decoration: none; color: #fff">
                                    <svg width="76" height="53" viewBox="0 0 76 53" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path
                                                d="M73.716 8.26653C73.2836 6.66874 72.4403 5.21209 71.2699 4.04163C70.0994 2.87116 68.6428 2.02772 67.0451 1.5953C61.1956 0 37.6536 0 37.6536 0C37.6536 0 14.1104 0.0482888 8.26098 1.64359C6.66317 2.07604 5.20654 2.91952 4.03612 4.09004C2.86571 5.26056 2.02235 6.71727 1.59004 8.31511C-0.179275 18.7084 -0.865625 34.5454 1.63863 44.5229C2.07098 46.1207 2.91435 47.5774 4.08477 48.7478C5.25518 49.9183 6.71179 50.7617 8.30956 51.1942C14.159 52.7895 37.7016 52.7895 37.7016 52.7895C37.7016 52.7895 61.2439 52.7895 67.093 51.1942C68.6909 50.7618 70.1476 49.9184 71.318 48.7479C72.4885 47.5774 73.3319 46.1208 73.7643 44.5229C75.6305 34.1149 76.2055 18.2879 73.716 8.26682V8.26653Z"
                                                fill="#FF0000" />
                                            <path d="M30.1572 37.7065L49.6874 26.3945L30.1575 15.0826L30.1572 37.7065Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="75.38" height="53" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                            <div class="text-center mb-2 px-2"
                                style="height: 50px; overflow: hidden; font-size: 16px; font-family: Geometria">
                                <a href="{{ route('site.pages.webinars.page', $page) }}"
                                    style="text-decoration: none; color: #fff">
                                    {{ $page->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $pages->links() }}
    </div>

@endsection
