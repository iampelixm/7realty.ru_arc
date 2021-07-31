@extends('layouts.site')

@section('content')


    @if ($site_settings->mainpage_show_banner ?? '')
        <div class="container-fluid">
            <div class="px-3">
                <div id="" class="owl-carousel mainpage_slider" onclick="">
                    @foreach (App\Models\SiteSetting::firstOrCreate(['name' => 'mainpage_show_banner'])->getMedia('MainPageBanner') as $banner)
                        <div class="item">
                            {{ $banner->img()->attributes(['width' => '100%', 'height' => '566', 'sizes' => '100vw']) }}
                            {{-- $banner->img() --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($site_settings->mainpage_show_zhb ?? '')
        @include('partials.category_block')
    @endif
    @if ($site_settings->mainpage_show_category_image ?? '')
        <!--  Баннера категорий -->
        <div class="container-fluid px-4">
            <div class="row px-2">
                @foreach (\App\Models\Category::where(['show_main' => 1])->get() as $mainpage_category)
                    @if (!collect($mainpage_category->items)->isEmpty())
                        @if ($mainpage_category->getFirstMedia('image'))
                            <div class="col-md-6">
                                {{ $mainpage_category->getFirstMedia('image')->img()->attributes(['width' => '100%', 'height' => '']) }}
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    @if ($site_settings->mainpage_show_video ?? '')
        @if ($site_settings->mainpage_video ?? '')
            <div class="container-fluid text-center px-4">
                <div class="row px-2">
                    <div class="col">
                        <video id="mainpage_video" class="video-js vjs-default-skin vjs-fluid vjs-fill" controls autoplay
                            width="640" height="264" data-setup='
                                                    {
                                                        "techOrder": [
                                                        "youtube"
                                                        ],
                                                    "sources": [
                                                        {
                                                            "type": "video/youtube",
                                                            "src": "{{ $site_settings->mainpage_video }}"
                                                        }
                                                            ],
                                                            "youtube": {
                                                                "ytControls": 0,
                                                                "rel": 0,
                                                                "iv_load_policy": 3,
                                                                "showinfo": 0,
                                                                "modestbranding": 0
                                                            }
                                                    }'>
                        </video>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Блок Спецпредложений -->
    @if ($site_settings->mainpage_show_special ?? '')
        @if ($specialItemCount > 0)

            {{-- <div class="content-specials-info content-specials-info_position_center">
                    <h2 class="content-specials-info__h2">Специальные предложения</h2>
                </div> --}}
            @foreach ($list as $category)
                @if ($category->offerItems->count() > 0)
                    <div class="content-specials-list-outer">
                        <div class="content-specials-list">
                            <div class="content-specials-list-div">
                                <h3 class="content-specials-list-div__h3">{{ $category->name }}</h3>
                            </div>
                            <div class="content-specials-list-link">
                                <a class="content-specials-list-link__a" href="@if ($category->slug !=
                                    null) {{ route('site.get_category_special', $category->slug) }} @endif">
                                    Все спецпредложения
                                    <span style="margin-left: 16px">
                                        <x-icon name="chevron-right" />
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-specials content-specials_position">
                        <div class="content-specials-list-slider">
                            {{-- <div class="content-specials-list-slider-left col-auto"><i class="fas fa-chevron-left"></i></div> --}}
                            <div class="slider-custom__four owl-carousel px-5a">
                                @foreach ($category->offerItems->take(7) as $slider_item)
                                    @include('components.object_slider.default')
                                @endforeach

                            </div>

                        </div>
                    </div>
                @endif
            @endforeach


        @endif
    @endif
    <!-- Блок Спецпредложений КОНЕЦ-->
    <!-- Блок Партнеров -->
    <div class="content-specials-list-outer">
        <div class="content-specials-list">
            <div class="content-specials-list-div">
                <h3 class="content-specials-list-div__h3">Наши партнеры</h3>
            </div>
        </div>
    </div>
    <div class="content-partners content-partners_position content-partners_display_block">
        {{-- <div class="content-partners-title">
            <h2 class="content-partners-title__h2">Наши партнеры</h2>
        </div> --}}
        <div class="content-partners-logos">
            <div
                class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 align-items-center justify-content-center no-gutters px-2">
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p1.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p4.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p7.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center d-none d-md-block"><img
                        class="img-fluid img-fluid--partners" src="/users/image/partners/p10.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center d-none d-md-block"><img
                        class="img-fluid img-fluid--partners" src="/users/image/partners/p13.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center d-none d-md-block"><img
                        class="img-fluid img-fluid--partners" src="/users/image/partners/p2.png" alt="partner"></div>

            </div>
            <div class="content-partners-all">
                <button type="button" class="content-partners-all__button">Все партнеры</button>
            </div>
            <div class="d-none row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 justify-content-center w-100">
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p1.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p4.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p7.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p10.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p13.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p2.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p5.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p8.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p11.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p14.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p3.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p6.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p9.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p12.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p15.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p16.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p17.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p18.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p19.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p20.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p21.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p22.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p23.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p24.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p25.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p26.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p27.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p28.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p29.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p30.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p31.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p32.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p33.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p34.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p35.png" alt="partner"></div>
                <div class="col-12 col-sm-4 col-lg-2 text-center"><img class="img-fluid img-fluid--partners"
                        src="/users/image/partners/p36.png" alt="partner"></div>
            </div>
        </div>
    </div>
    <!-- Блок Партнеров КОНЕЦ -->
    <!-- end of main content -->

    <!-- Всплывающие окна -->
@endsection
