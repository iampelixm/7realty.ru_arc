@extends('layouts.site')

@section('content')


    @if ($site_settings->mainpage_show_banner ?? '')
        <div class="container-fluid">
            <div class="px-3">
                <div id="" class="owl-carousel mainpage_slider" onclick="">
                    @foreach (App\Models\SiteSetting::firstOrCreate(['name' => 'mainpage_show_banner'])->getMedia('MainPageBanner') as $banner)
                        <div class="item">
                            {{ $banner->img()->attributes(['width' => '100%', 'height' => '']) }}
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
                            width="640" height="264"
                            data-setup='
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
    @if($site_settings->mainpage_show_special ?? '')
    @if ($specialItemCount > 0)
        <div class="content-specials content-specials_position">
            <div class="content-specials-info content-specials-info_position_center">
                <h2 class="content-specials-info__h2">Специальные предложения</h2>
            </div>
            @foreach ($list as $category)
                @if ($category->offerItems->count() > 0)
                    <div class="content-specials-list">
                        <div class="content-specials-list-div">
                            <h3 class="content-specials-list-div__h3">{{ $category->name }}</h3>
                        </div>
                        <div class="content-specials-list-link"><a class="content-specials-list-link__a" href="@if ($category->slug != null) {{ route('site.get_category_special', $category->slug) }} @endif">Все спецпредложения</a></div>
                    </div>
                    <div class="content-specials-list-slider">
                        {{-- <div class="content-specials-list-slider-left col-auto"><i class="fas fa-chevron-left"></i></div> --}}
                        <div class="slider-custom__three owl-carousel px-5">
                            @foreach ($category->offerItems->take(7) as $item)
                                <!-- 1 Block -->
                                <div class="content-specials-list-slider-info">
                                    <div class="slide-image-div">
                                        @foreach ($item->imagesActive->take(3) as $image)
                                            <div class="slide-image-div-image">
                                                <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}"
                                                    alt>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="content-specials-price">
                                        <p class="content-specials-price__p"><a href="@if ($item->slug
                                                != null) {{ route('site.item.get', $item->slug) }} @endif">{{ $item->name }}</a></p>
                                    </div>
                                    <div class="content-specials-adress">
                                        <div class="content-specials-pointer content-specials-pointer_position"><i
                                                class="fas fa-map-marker-alt"></i></div>
                                        <div>
                                            <p class="content-specials__p">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                    <div class="content-specials-pref">
                                        <div class="content-specials-pref-list">
                                            <div class="content-specials-pref-list-info">
                                                <div class="content-specials-pref-list-info__ico">
                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.1587 4.64981V1.91163H8.89426V2.90781L6.49997 1.06592L0 6.06627L1.3618 7.83646L2.02858 7.32351V11.934H5.87575V8.55593H7.27606V11.934H10.9715V7.32351L11.6383 7.83646L13 6.0663L11.1587 4.64981ZM10.2089 11.1714H8.03865V7.79332H5.11311V11.1714H2.79117V6.73684L6.5 3.88385L10.2088 6.73684V11.1714H10.2089ZM11.4988 6.76703L6.5 2.92152L1.50122 6.76703L1.06943 6.20574L6.5 2.02807L9.65689 4.45663V2.67424H10.3961V5.02531L11.9305 6.20574L11.4988 6.76703Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="content-specials-pref-list-info__text">{{ $item->square }} м²
                                                </div>
                                            </div>
                                            <div class="content-specials-pref-list-info">
                                                @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                                                    <div class="content-specials-pref-list-info__ico">
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.7833 7.3667H12.5667V6.7167C12.5661 6.28645 12.311 5.89732 11.9167 5.72523V2.38337C11.9166 2.29724 11.8656 2.21935 11.7867 2.1849C11.8712 2.04943 11.9162 1.89305 11.9167 1.73337C11.9167 1.25472 11.5286 0.866699 11.05 0.866699C10.5714 0.866699 10.1833 1.25472 10.1833 1.73337C10.1842 1.88595 10.2258 2.03553 10.3038 2.1667H2.6962C2.77417 2.03553 2.81577 1.88595 2.81667 1.73337C2.81667 1.25472 2.42864 0.866699 1.95 0.866699C1.47136 0.866699 1.08333 1.25472 1.08333 1.73337C1.08379 1.89305 1.12881 2.04943 1.21333 2.1849C1.13441 2.21935 1.08339 2.29724 1.08333 2.38337V5.72523C0.689 5.89732 0.433902 6.28645 0.433333 6.7167V7.3667H0.216667C0.0970125 7.3667 0 7.46371 0 7.58336V10.6167C0 10.7364 0.0970125 10.8334 0.216667 10.8334H0.433333V11.9167C0.433333 12.0364 0.530346 12.1334 0.65 12.1334H1.51667C1.63632 12.1334 1.73333 12.0364 1.73333 11.9167V10.8334H11.2667V11.9167C11.2667 12.0364 11.3637 12.1334 11.4833 12.1334H12.35C12.4697 12.1334 12.5667 12.0364 12.5667 11.9167V10.8334H12.7833C12.903 10.8334 13 10.7364 13 10.6167V7.58336C13 7.46371 12.903 7.3667 12.7833 7.3667ZM11.05 1.30003C11.2893 1.30003 11.4833 1.49403 11.4833 1.73337C11.4833 1.9727 11.2893 2.1667 11.05 2.1667C10.8107 2.1667 10.6167 1.9727 10.6167 1.73337C10.6167 1.49403 10.8107 1.30003 11.05 1.30003ZM1.95 1.30003C2.18934 1.30003 2.38333 1.49403 2.38333 1.73337C2.38333 1.9727 2.18934 2.1667 1.95 2.1667C1.71066 2.1667 1.51667 1.9727 1.51667 1.73337C1.51667 1.49403 1.71066 1.30003 1.95 1.30003ZM1.51667 2.60003H11.4833V5.63337H10.611C10.7544 5.44695 10.8325 5.21856 10.8333 4.98337V4.55003C10.8326 3.95203 10.348 3.4674 9.75 3.4667H8.01667C7.41867 3.4674 6.93404 3.95203 6.93333 4.55003V4.98337C6.93412 5.21856 7.01225 5.44695 7.15563 5.63337H5.84437C5.98775 5.44695 6.06588 5.21856 6.06667 4.98337V4.55003C6.06596 3.95203 5.58133 3.4674 4.98333 3.4667H3.25C2.652 3.4674 2.16737 3.95203 2.16667 4.55003V4.98337C2.16745 5.21856 2.24559 5.44695 2.38897 5.63337H1.51667V2.60003ZM10.4 4.55003V4.98337C10.4 5.34235 10.109 5.63337 9.75 5.63337H8.01667C7.65768 5.63337 7.36667 5.34235 7.36667 4.98337V4.55003C7.36667 4.19104 7.65768 3.90003 8.01667 3.90003H9.75C10.109 3.90003 10.4 4.19104 10.4 4.55003ZM5.63333 4.55003V4.98337C5.63333 5.34235 5.34232 5.63337 4.98333 5.63337H3.25C2.89101 5.63337 2.6 5.34235 2.6 4.98337V4.55003C2.6 4.19104 2.89101 3.90003 3.25 3.90003H4.98333C5.34232 3.90003 5.63333 4.19104 5.63333 4.55003ZM0.866667 6.7167C0.866667 6.35771 1.15768 6.0667 1.51667 6.0667H11.4833C11.8423 6.0667 12.1333 6.35771 12.1333 6.7167V7.3667H0.866667V6.7167ZM1.3 11.7H0.866667V10.8334H1.3V11.7ZM12.1333 11.7H11.7V10.8334H12.1333V11.7ZM12.5667 10.4H0.433333V7.80003H12.5667V10.4Z"
                                                                fill="black" />
                                                            <path
                                                                d="M1.95 9.53333H1.08334C0.963681 9.53333 0.866669 9.63034 0.866669 9.74999C0.866669 9.86964 0.963681 9.96666 1.08334 9.96666H1.95C2.06966 9.96666 2.16667 9.86964 2.16667 9.74999C2.16667 9.63034 2.06966 9.53333 1.95 9.53333Z"
                                                                fill="black" />
                                                            <path
                                                                d="M11.9167 9.53333H2.81667C2.69702 9.53333 2.60001 9.63034 2.60001 9.74999C2.60001 9.86964 2.69702 9.96666 2.81667 9.96666H11.9167C12.0363 9.96666 12.1333 9.86964 12.1333 9.74999C12.1333 9.63034 12.0363 9.53333 11.9167 9.53333Z"
                                                                fill="black" />
                                                        </svg>
                                                    </div>
                                                    <div class="content-specials-pref-list-info__text">
                                                        {{ trans_choice('site.bed_rooms', $item->bed_rooms, ['value' => $item->bed_rooms]) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content-specials-pref-list">
                                            <div class="content-specials-pref-list-info">
                                                @if ($item->all_rooms != null && $item->all_rooms > 0)
                                                    <div class="content-specials-pref-list-info__ico">
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8096 5.46856H11.9683C11.8631 5.46856 11.7779 5.55379 11.7779 5.65899V6.28969C11.7779 6.30066 11.7689 6.30957 11.758 6.30957H9.02383C8.91863 6.30957 8.8334 6.39481 8.8334 6.5V7.34129C8.8334 7.44649 8.91863 7.53172 9.02383 7.53172H10.0953V8.18256V11.127V11.7779H6.71031C6.69934 11.7779 6.69043 11.769 6.69043 11.758V9.86512C6.69043 9.75993 6.60519 9.67469 6.5 9.67469H5.65873C5.55354 9.67469 5.4683 9.75993 5.4683 9.86512V11.758C5.4683 11.769 5.45936 11.7779 5.4484 11.7779H5.2182V11.3302C5.2182 11.1793 5.13279 11.0482 5.00789 10.9822V10.4961C5.00789 10.0432 4.6394 9.67469 4.18648 9.67469C3.73356 9.67469 3.3651 10.0432 3.3651 10.4961V10.9822C3.2402 11.0482 3.15479 11.1793 3.15479 11.3302V11.7779H1.24203C1.23104 11.7779 1.22213 11.769 1.22213 11.758V9.63493H2.92459C3.14557 9.63493 3.32533 9.45516 3.32533 9.23419V7.53175H5.4484C5.45939 7.53175 5.4683 7.54069 5.4683 7.55163V8.18259C5.4683 8.28778 5.55354 8.37302 5.65873 8.37302H6.5C6.60519 8.37302 6.69043 8.28778 6.69043 8.18259V7.55163C6.69043 7.54066 6.69937 7.53175 6.71031 7.53175H7.34127C7.44646 7.53175 7.5317 7.44651 7.5317 7.34132V6.5C7.5317 6.39481 7.44646 6.30957 7.34127 6.30957H6.71031C6.69934 6.30957 6.69043 6.30063 6.69043 6.28969V5.65871C6.69043 5.55351 6.60519 5.46828 6.5 5.46828H5.65873C5.55354 5.46828 5.4683 5.55351 5.4683 5.65871V6.28969C5.4683 6.30066 5.45936 6.30957 5.4484 6.30957H5.18558C5.08038 6.30957 4.99515 6.39481 4.99515 6.5C4.99515 6.60519 5.08038 6.69043 5.18558 6.69043H5.4484C5.66937 6.69043 5.84916 6.51066 5.84916 6.28969V5.84914H6.30957V6.28969C6.30957 6.51066 6.48934 6.69043 6.71031 6.69043H7.15084V7.15086H6.71031C6.48934 7.15086 6.30957 7.33063 6.30957 7.5516V7.99213H5.84916V7.5516C5.84916 7.33063 5.66937 7.15086 5.4484 7.15086H1.24203C1.02106 7.15086 0.841268 7.33063 0.841268 7.5516V11.758C0.841268 11.9789 1.02106 12.1587 1.24203 12.1587H5.4484C5.66937 12.1587 5.84916 11.9789 5.84916 11.758V10.0555H6.30957V11.758C6.30957 11.9789 6.48934 12.1587 6.71031 12.1587H11.758C11.9789 12.1587 12.1587 11.9789 12.1587 11.758V7.5516C12.1587 7.33063 11.9789 7.15086 11.758 7.15086H9.21426V6.69043H11.758C11.9789 6.69043 12.1587 6.51066 12.1587 6.28969V5.84942H12.6191V12.5993C12.6191 12.6102 12.6102 12.6191 12.5993 12.6191H0.40074C0.389771 12.6191 0.380859 12.6102 0.380859 12.5993V0.40074C0.380859 0.389797 0.389797 0.380859 0.40074 0.380859H10.3255C10.4307 0.380859 10.516 0.295623 10.516 0.19043C10.516 0.0852363 10.4307 0 10.3255 0H0.40074C0.179766 0 0 0.179766 0 0.40074V12.5993C0 12.8202 0.179766 13 0.40074 13H12.5993C12.8202 13 13 12.8202 13 12.5993V5.65899C13 5.55379 12.9148 5.46856 12.8096 5.46856ZM1.24203 7.53172H1.89287V7.97225C1.89287 8.07744 1.97811 8.16268 2.0833 8.16268C2.18849 8.16268 2.27373 8.07744 2.27373 7.97225V7.53172H2.94447V9.23416C2.94447 9.24513 2.93554 9.25405 2.92459 9.25405H1.22213V7.5516C1.22213 7.54063 1.23104 7.53172 1.24203 7.53172ZM4.18648 10.0555C4.42939 10.0555 4.62704 10.2531 4.62704 10.4961V10.9366H3.74598V10.4961C3.74595 10.2531 3.94357 10.0555 4.18648 10.0555ZM3.53564 11.7779V11.3301C3.53564 11.3232 3.54136 11.3174 3.54834 11.3174H4.82465C4.83163 11.3174 4.83735 11.3232 4.83735 11.3301V11.7779H3.53564ZM11.7779 10.9366H10.4762V8.37299H11.7779V10.9366H11.7779ZM11.758 11.7779H10.4762V11.3174H11.7779V11.758C11.7779 11.769 11.769 11.7779 11.758 11.7779ZM11.7779 7.5516V7.99213H10.4762V7.53172H11.758C11.769 7.53172 11.7779 7.54063 11.7779 7.5516Z"
                                                                fill="black" />
                                                            <path
                                                                d="M12.5992 0H11.0872C10.982 0 10.8968 0.0852363 10.8968 0.19043C10.8968 0.295623 10.982 0.380859 11.0872 0.380859H12.5992C12.6102 0.380859 12.6191 0.389797 12.6191 0.40074V3.78615L12.1587 3.78617V1.24203C12.1587 1.02106 11.9789 0.841268 11.7579 0.841268H6.71029C6.48932 0.841268 6.30955 1.02106 6.30955 1.24203V3.78574H5.84914V1.24203C5.84914 1.02106 5.66935 0.841268 5.44838 0.841268H1.24201C1.02104 0.841268 0.841248 1.02106 0.841248 1.24203V6.28969C0.841248 6.51066 1.02104 6.69043 1.24201 6.69043H4.42387C4.52906 6.69043 4.61429 6.60519 4.61429 6.5C4.61429 6.39481 4.52906 6.30957 4.42387 6.30957H1.24201C1.23102 6.30957 1.22211 6.30063 1.22211 6.28969V1.24203C1.22211 1.23104 1.23104 1.22213 1.24201 1.22213H1.68254V5.03496C1.68254 5.25197 1.85908 5.42852 2.0761 5.42852H4.61432C4.83133 5.42852 5.00787 5.25197 5.00787 5.03496V1.22213H5.4484C5.4594 1.22213 5.46831 1.23106 5.46831 1.24203V3.97617C5.46831 4.08137 5.55354 4.1666 5.65874 4.1666H6.49998C6.60517 4.1666 6.69041 4.08137 6.69041 3.97617V1.24203C6.69041 1.23104 6.69935 1.22213 6.71029 1.22213H7.99209V1.66987C7.99209 1.88688 8.16863 2.06342 8.38564 2.06342H10.5032C10.7202 2.06342 10.8968 1.88688 10.8968 1.66987V1.22213H11.7579C11.7689 1.22213 11.7778 1.23106 11.7778 1.24203V3.9766C11.7778 4.02711 11.7979 4.07553 11.8336 4.11128C11.8693 4.14697 11.9177 4.16703 11.9683 4.16703L12.8095 4.16701C12.9147 4.16701 13 4.08175 13 3.97658V0.40074C13 0.179766 12.8202 0 12.5992 0V0ZM3.78572 1.22213V1.66987C3.78572 1.67685 3.78001 1.68256 3.77303 1.68256H2.91736C2.91038 1.68256 2.90467 1.67685 2.90467 1.66987V1.22213H3.78572ZM4.61429 5.04766H2.0761C2.06911 5.04766 2.0634 5.04194 2.0634 5.03496V2.90469H4.62702V5.03496C4.62699 5.04194 4.6213 5.04766 4.61429 5.04766ZM4.62699 2.52383H2.0634V1.22213H2.52381V1.66987C2.52381 1.88688 2.70035 2.06342 2.91736 2.06342H3.77303C3.99004 2.06342 4.16658 1.88688 4.16658 1.66987V1.22213H4.62702V2.52383H4.62699ZM10.5159 1.66987C10.5159 1.67685 10.5102 1.68256 10.5032 1.68256H8.38567C8.37868 1.68256 8.37297 1.67685 8.37297 1.66987V1.22213H10.5159V1.66987Z"
                                                                fill="black" />
                                                            <path
                                                                d="M11.127 9.31947C11.2322 9.31947 11.3175 9.23423 11.3175 9.12904V8.9187C11.3175 8.81351 11.2322 8.72827 11.127 8.72827C11.0218 8.72827 10.9366 8.81351 10.9366 8.9187V9.12904C10.9366 9.23423 11.0219 9.31947 11.127 9.31947Z"
                                                                fill="black" />
                                                            <path
                                                                d="M11.127 10.5813C11.2322 10.5813 11.3175 10.4961 11.3175 10.3909V10.1805C11.3175 10.0753 11.2322 9.99011 11.127 9.99011C11.0218 9.99011 10.9366 10.0753 10.9366 10.1805V10.3909C10.9366 10.4961 11.0219 10.5813 11.127 10.5813Z"
                                                                fill="black" />
                                                            <path
                                                                d="M10.9239 4.58723C11.1409 4.58723 11.3175 4.41068 11.3175 4.19367V2.91736C11.3175 2.70034 11.1409 2.5238 10.9239 2.5238H7.96506C7.74804 2.5238 7.5715 2.70034 7.5715 2.91736V4.19367C7.5715 4.41068 7.74804 4.58723 7.96506 4.58723H10.9239ZM10.0953 2.90466V3.35238C10.0953 3.35936 10.0896 3.36507 10.0826 3.36507H8.80632C8.79934 3.36507 8.79363 3.35936 8.79363 3.35238V2.90466H10.0953ZM7.95236 4.19367V2.91736C7.95236 2.91038 7.95807 2.90466 7.96506 2.90466H8.41277V3.35238C8.41277 3.56939 8.58931 3.74593 8.80632 3.74593H10.0826C10.2996 3.74593 10.4762 3.56939 10.4762 3.35238V2.90466H10.9239C10.9309 2.90466 10.9366 2.91038 10.9366 2.91736V4.19367C10.9366 4.20065 10.9309 4.20637 10.9239 4.20637H7.96506C7.95807 4.20637 7.95236 4.20065 7.95236 4.19367Z"
                                                                fill="black" />
                                                        </svg>
                                                    </div>
                                                    <div class="content-specials-pref-list-info__text">
                                                        {{ trans_choice('site.all_rooms', $item->all_rooms, ['value' => $item->all_rooms]) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="content-specials-pref-list-info">
                                                @if ($item->bath_rooms != null && $item->bath_rooms > 0)
                                                    <div class="content-specials-pref-list-info__ico">
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.7833 11.9167H9.68955L9.39922 11.0459C10.4422 11.0017 11.2654 10.144 11.2667 9.10002V8.01669H11.4833C11.8415 8.01737 12.1324 7.72758 12.133 7.36943C12.1336 7.09388 11.9599 6.8481 11.7 6.75656V6.06669C11.7 5.94704 11.603 5.85002 11.4833 5.85002H10.8333V0.866691C10.8333 0.747037 10.7363 0.650024 10.6167 0.650024H7.58333C7.46368 0.650024 7.36667 0.747037 7.36667 0.866691V1.96736C6.62114 2.07496 6.06756 2.71342 6.06667 3.46669V3.90002C6.06667 4.01968 6.16368 4.11669 6.28333 4.11669H8.88333C9.00299 4.11669 9.1 4.01968 9.1 3.90002V3.46669C9.09911 2.71342 8.54552 2.07496 7.8 1.96736V1.08336H10.4V5.85002H9.75C9.63035 5.85002 9.53333 5.94704 9.53333 6.06669V6.71669H1.51667C1.15768 6.71669 0.866667 7.0077 0.866667 7.36669C0.866667 7.72568 1.15768 8.01669 1.51667 8.01669H1.73333V9.10002C1.73461 10.144 2.55778 11.0017 3.60078 11.0459L3.31045 11.9167H0.216667C0.0970125 11.9167 0 12.0137 0 12.1334C0 12.253 0.0970125 12.35 0.216667 12.35H12.7833C12.903 12.35 13 12.253 13 12.1334C13 12.0137 12.903 11.9167 12.7833 11.9167ZM8.66667 3.46669V3.68336H6.5V3.46669C6.5 2.86839 6.98504 2.38336 7.58333 2.38336C8.18163 2.38336 8.66667 2.86839 8.66667 3.46669ZM10.8333 6.28336H11.2667V6.71669H10.8333V6.28336ZM9.96667 6.28336H10.4V6.71669H9.96667V6.28336ZM1.51667 7.58336C1.39701 7.58336 1.3 7.48635 1.3 7.36669C1.3 7.24704 1.39701 7.15002 1.51667 7.15002H11.4833C11.603 7.15002 11.7 7.24704 11.7 7.36669C11.7 7.48635 11.603 7.58336 11.4833 7.58336H1.51667ZM4.17712 11.9167H3.76718L4.05622 11.05H4.46615L4.17712 11.9167ZM4.63407 11.9167L4.92288 11.05H8.07712L8.36593 11.9167H4.63407ZM8.82288 11.9167L8.53385 11.05H8.94378L9.23282 11.9167H8.82288ZM3.68333 10.6167C2.84611 10.6157 2.16761 9.93725 2.16667 9.10002V8.01669H10.8333V9.10002C10.8324 9.93725 10.1539 10.6157 9.31667 10.6167H3.68333Z"
                                                                fill="black" />
                                                            <path
                                                                d="M3.25001 8.44995H2.81667C2.69702 8.44995 2.60001 8.54696 2.60001 8.66662C2.60001 8.78627 2.69702 8.88328 2.81667 8.88328H3.25001C3.36966 8.88328 3.46667 8.78627 3.46667 8.66662C3.46667 8.54696 3.36966 8.44995 3.25001 8.44995Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.41666 8.44995H4.11666C3.99701 8.44995 3.89999 8.54696 3.89999 8.66662C3.89999 8.78627 3.99701 8.88328 4.11666 8.88328H5.41666C5.53631 8.88328 5.63333 8.78627 5.63333 8.66662C5.63333 8.54696 5.53631 8.44995 5.41666 8.44995Z"
                                                                fill="black" />
                                                            <path
                                                                d="M6.28333 4.55005C6.16368 4.55005 6.06667 4.64706 6.06667 4.76672V5.41672C6.06667 5.53637 6.16368 5.63338 6.28333 5.63338C6.40299 5.63338 6.5 5.53637 6.5 5.41672V4.76672C6.5 4.64706 6.40299 4.55005 6.28333 4.55005Z"
                                                                fill="black" />
                                                            <path
                                                                d="M7.15 5.19995C7.03035 5.19995 6.93333 5.29696 6.93333 5.41662V6.06662C6.93333 6.18627 7.03035 6.28329 7.15 6.28329C7.26965 6.28329 7.36667 6.18627 7.36667 6.06662V5.41662C7.36667 5.29696 7.26965 5.19995 7.15 5.19995Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.01667 4.55005C7.89702 4.55005 7.8 4.64706 7.8 4.76672V5.41672C7.8 5.53637 7.89702 5.63338 8.01667 5.63338C8.13632 5.63338 8.23334 5.53637 8.23334 5.41672V4.76672C8.23334 4.64706 8.13632 4.55005 8.01667 4.55005Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.88334 5.19995C8.76368 5.19995 8.66667 5.29696 8.66667 5.41662V6.06662C8.66667 6.18627 8.76368 6.28329 8.88334 6.28329C9.00299 6.28329 9.1 6.18627 9.1 6.06662V5.41662C9.1 5.29696 9.00299 5.19995 8.88334 5.19995Z"
                                                                fill="black" />
                                                        </svg>
                                                    </div>
                                                    <div class="content-specials-pref-list-info__text">
                                                        {{ trans_choice('site.bath_rooms', $item->bath_rooms, ['value' => $item->bath_rooms]) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-specials-choice">
                                        <div>
                                            <div class="content-specials-price-info">
                                                <p class="content-specials-price-info__p">
                                                    {{ number_format($item->price, 0, ',', ' ') }} ₽</p>
                                            </div>
                                            <div class="content-specials-link"><button class="content-specials-link__button"
                                                    onclick="showModal({{ $item->id }})">Отправить запрос</button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="content-specials-heart"
                                            onclick="setFavorites({{ $item->id }})"><i class="@if (in_array($item->id, $massFav)) fas @else
                                                    far @endif fa-heart"></i>
                                                <!--<i class="fas fa-heart"></i>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>
                @endif
            @endforeach

        </div>
    @endif
    @endif
    <!-- Блок Спецпредложений КОНЕЦ-->
    <!-- Блок Партнеров -->
    <div class="content-partners content-partners_position content-partners_display_block">
        <div class="content-partners-title">
            <h2 class="content-partners-title__h2">Наши партнеры</h2>
        </div>
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
