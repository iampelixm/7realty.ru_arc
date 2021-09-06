@extends('layouts.site')
@section('categories_menu')
@endsection

@section('content')
    <style>
        .broker-info {
            font-family: Geometria;
            max-width: 1360px;
            margin: 0 auto;
            margin-top: 40px;
            padding-bottom: 70px;
        }

        .broker-info .additional-label {
            color: #C1A771;
            font-size: 18px;
        }

        .broker-info .additional-value {
            color: #000;
            font-size: 24px;

        }

        .additional-image {
            vertical-align: middle;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .additional {
            margin-top: 40px;
            /* position: absolute; */
            /* bottom: 0; */
        }

        .broker-info .broker-description {
            color: #777;
        }

        .broker-info .description-label {
            color: #C1A771;
            font-size: 24px;
        }

        .broker-info .avatar-container {
            border-radius: 50px 0 0 0;
            /* overflow: hidden; */
            background-image: url(/images/bg-for-business.jpg);
            position: relative;
            background-size: cover;
            max-height: 325px;
        }

        .broker-info .broker-avatar {
            margin: 0 auto;
            display: block;
        }

        .broker-info .broker-buttons {
            position: absolute;
            margin-left: 50%;
            transform: translateX(-50%) translateY(-50%);
            border: 1px solid #C1A771;
            background-color: #FFF;
            padding: 4px 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 25px;

        }

        .broker-info .broker-buttons a {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            text-decoration: none;
            text-transform: capitalize;
        }

    </style>

    <div class="broker-info">
        <div class="row">
            <div class="col-lg-4 p-0 avatar-container">
                @if ($broker->getFirstMedia('avatar'))
                    {{ $broker->getFirstMedia('avatar')->img()->attributes(['class' => 'broker-avatar', 'width' => 'auto', 'height' => '100%']) }}
                @endif
                <div class="broker-buttons">
                    <a href="tel:+79857000077">
                        <span style="margin-right: 10px; color:#C1A771">
                            <x-icon name="call" width="20" />
                        </span>
                        Позвонить
                    </a>

                    <span style="color:#C1A771; padding:0px 40px;">|</span>

                    <a href="mailto:{{ $broker->email }}">
                        <span style="margin-right: 10px; color:#C1A771">
                            <x-icon name="envelope" width="20" />
                        </span>
                        Написать
                    </a>
                </div>
            </div>

            <div class="col-lg-8 pl-5 pt-4">
                <h1>{{ $broker->name }}</h1>
                <h6 style="color: #333; font-weight: 300">{{ $broker->position }}</h6>

                <div style="font-size: 48px; font-weight: 700; color: #C1A771; margin-top: 40px;">
                    <a href="tel:+79857000077" style="color: #C1A771; text-decoration: none; ">+7 985 700-00-77</a>
                </div>
                <div style="font-size: 14px;">
                    <a style="color: #C1A771; text-decoration: none; "
                        href="mailto:{{ $broker->email }}">{{ $broker->email }}</a>
                </div>

                <div class="row additional">
                    <div class="d-flex">
                        <div class="additional-image">
                            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M46.5834 8.66675H41.8889V11.5556H46.2223V43.3334H5.77781V11.5556H10.1111V8.66675H5.4167C5.07904 8.67239 4.7458 8.7445 4.43602 8.87895C4.12623 9.0134 3.84597 9.20756 3.61123 9.45035C3.3765 9.69313 3.19189 9.97978 3.06795 10.2939C2.94402 10.6081 2.88318 10.9435 2.88892 11.2812V43.6079C2.88318 43.9455 2.94402 44.281 3.06795 44.5951C3.19189 44.9093 3.3765 45.1959 3.61123 45.4387C3.84597 45.6815 4.12623 45.8757 4.43602 46.0101C4.7458 46.1446 5.07904 46.2167 5.4167 46.2223H46.5834C46.921 46.2167 47.2543 46.1446 47.564 46.0101C47.8738 45.8757 48.1541 45.6815 48.3888 45.4387C48.6236 45.1959 48.8082 44.9093 48.9321 44.5951C49.056 44.281 49.1169 43.9455 49.1111 43.6079V11.2812C49.1169 10.9435 49.056 10.6081 48.9321 10.2939C48.8082 9.97978 48.6236 9.69313 48.3888 9.45035C48.1541 9.20756 47.8738 9.0134 47.564 8.87895C47.2543 8.7445 46.921 8.67239 46.5834 8.66675Z"
                                    fill="#C1A771" />
                                <path d="M11.5555 20.2222H14.4444V23.1111H11.5555V20.2222Z" fill="#C1A771" />
                                <path d="M20.2222 20.2222H23.1111V23.1111H20.2222V20.2222Z" fill="#C1A771" />
                                <path d="M28.8889 20.2222H31.7778V23.1111H28.8889V20.2222Z" fill="#C1A771" />
                                <path d="M37.5555 20.2222H40.4444V23.1111H37.5555V20.2222Z" fill="#C1A771" />
                                <path d="M11.5555 27.4443H14.4444V30.3332H11.5555V27.4443Z" fill="#C1A771" />
                                <path d="M20.2222 27.4443H23.1111V30.3332H20.2222V27.4443Z" fill="#C1A771" />
                                <path d="M28.8889 27.4443H31.7778V30.3332H28.8889V27.4443Z" fill="#C1A771" />
                                <path d="M37.5555 27.4443H40.4444V30.3332H37.5555V27.4443Z" fill="#C1A771" />
                                <path d="M11.5555 34.6667H14.4444V37.5556H11.5555V34.6667Z" fill="#C1A771" />
                                <path d="M20.2222 34.6667H23.1111V37.5556H20.2222V34.6667Z" fill="#C1A771" />
                                <path d="M28.8889 34.6667H31.7778V37.5556H28.8889V34.6667Z" fill="#C1A771" />
                                <path d="M37.5555 34.6667H40.4444V37.5556H37.5555V34.6667Z" fill="#C1A771" />
                                <path
                                    d="M14.4444 14.4445C14.8275 14.4445 15.1949 14.2923 15.4658 14.0214C15.7367 13.7505 15.8889 13.3831 15.8889 13V4.33336C15.8889 3.95027 15.7367 3.58287 15.4658 3.31198C15.1949 3.0411 14.8275 2.88892 14.4444 2.88892C14.0614 2.88892 13.694 3.0411 13.4231 3.31198C13.1522 3.58287 13 3.95027 13 4.33336V13C13 13.3831 13.1522 13.7505 13.4231 14.0214C13.694 14.2923 14.0614 14.4445 14.4444 14.4445Z"
                                    fill="#C1A771" />
                                <path
                                    d="M37.5555 14.4445C37.9386 14.4445 38.306 14.2923 38.5769 14.0214C38.8478 13.7505 39 13.3831 39 13V4.33336C39 3.95027 38.8478 3.58287 38.5769 3.31198C38.306 3.0411 37.9386 2.88892 37.5555 2.88892C37.1724 2.88892 36.805 3.0411 36.5342 3.31198C36.2633 3.58287 36.1111 3.95027 36.1111 4.33336V13C36.1111 13.3831 36.2633 13.7505 36.5342 14.0214C36.805 14.2923 37.1724 14.4445 37.5555 14.4445Z"
                                    fill="#C1A771" />
                                <path d="M18.7778 8.66675H33.2223V11.5556H18.7778V8.66675Z" fill="#C1A771" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="additional-label">Стаж в компании</h4>
                            <h2 class="additional-value">{{ $broker->additional->stazh ?? '7' }} лет</h2>
                        </div>
                    </div>
                    <div class="d-flex ml-lg-4">
                        <div class="additional-image">
                            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M44.2 43.94V37.44C44.2 35.62 43.94 33.8 42.9 31.98C41.86 30.16 40.56 28.6 38.74 27.56C36.92 26.26 33.02 26 31.2 26L27.04 30.42L28.6 33.8V41.6L26 44.46L23.4 41.6V33.8L25.22 30.42L20.8 26C18.72 26 14.82 26.26 13 27.56C11.18 28.6 10.14 30.16 9.10005 31.98C8.06005 33.8 7.80005 35.36 7.80005 37.44V43.94C7.80005 43.94 14.56 46.8 26 46.8C37.44 46.8 44.2 43.94 44.2 43.94Z"
                                    fill="#C1A771" />
                                <path
                                    d="M25.9999 5.45996C21.0599 5.45996 18.1999 10.14 18.9799 15.34C19.7599 20.54 22.3599 24.18 25.9999 24.18C29.6399 24.18 32.2399 20.54 33.0199 15.34C33.7999 9.87996 30.9399 5.45996 25.9999 5.45996Z"
                                    fill="#C1A771" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="additional-label">Количество успешных сделок</h4>
                            <h2 class="additional-value">{{ $broker->additional->sdelok ?? '7' }} </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row broker-description mt-5">

            @if ($broker->additional->obrazovanie ?? '')
                <div>
                    <h2 class="description-label">Образование</h2>
                    <p>
                        {!! $broker->additional->obrazovanie !!}
                    </p>
                </div>
            @endif
            @if ($broker->additional->opit ?? '')
                <div>
                    <h2 class="description-label">Опыт работы</h2>
                    <p>
                        {!! $broker->additional->opit !!}
                    </p>
                </div>
            @endif

            @if ($broker->additional->lichno ?? '')
                <div>
                    <h2 class="description-label">Лично от себя</h2>
                    <p>
                        {!! $broker->additional->lichno !!}
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
