<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seven - PDF</title>
    <style>
        .main-header_position {
            display: block;

            margin: 0 auto;
            background-color: #FFFFFF;
        }

        .header-logo-text_position {
            width: 100px;
            height: 100%;
            border-left: 1px solid;
        }

        .header-logo-text_position>p {
            font-family: DejaVu Sans;
            font-size: 8px;
            margin: 0 0 0 0;
        }

        .header-logo-text_position>p>a {
            color: #000000;
        }

        .header-logo-tel__p {
            font-family: DejaVu Sans;
            font-size: 20px;
            cursor: pointer;
            white-space: nowrap;
            margin: -4px 0 0 0;
        }

        .header-logo-tel__p>i {
            font-size: 15px;
            margin: 0 3px 0 3px;
        }

        .header-logo-tel__p:hover {
            color: #0076C1;
        }

        .header-logo-tel__p:hover>i {
            color: #0076C1;
        }

        /* content */
        .content-pdf {

            margin: 0 auto;
            background-color: #FFFFFF;
        }

        .content-pdf-image {
            height: 210px;
            max-width: 225px;
            border-radius: 6px;
        }

        .content-pdf__img {
            height: 100%x;
            width: 100%;
            border-radius: 6px;
            object-fit: cover;
        }

        .content-pdf__h2 {
            font-family: DejaVu Sans;
            font-weight: bold;
            font-size: 24px;
            color: #000000;
        }

        .content-pdf__h3 {
            font-family: DejaVu Sans;
            font-weight: 500;
            font-size: 16px;
            color: #777777;
        }

        .content-pdf__p {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        .content-pdf__p>a {
            text-decoration-line: underline;
            color: #777777;
        }

        .content-pdf-info>ul>li {
            font-family: DejaVu Sans;
            font-size: 16px;
            color: #000000;
        }

        .content-pdf__h4 {
            font-family: DejaVu Sans;
            font-size: 16px;
            line-height: 20px;
            text-indent: 14px;
            color: #000000;
        }

        .content-pdf-map {
            height: 340px;
        }

        .content-pdf__h4>a {
            color: #000000;
            text-decoration: underline;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <div class="main-header main-header_position">


    </div>
    <!-- Конец Header -->

    <div class="content-pdf">
        <table style="width: 80%;">
            <tr>
                <td width="15%">
                    <img src="{{ public_path('users/image/2000.png') }}" style="height: 75px;">
                </td>
                <td style="font-size: 10px; text-align: left; border-left: 1px solid black; padding-left: 10px;"
                    width="70%">
                    Счастливое число<br>твоей покупки
                </td>
                <td width="15%">
                    <p class="header-logo-tel__p"><i class="fas fa-phone-alt"></i>+7 985 700-00-77</p>
                </td>
            </tr>
        </table>
        <h2 class="content-pdf__h2 text-center" style="text-align: center;">{{ $item->name }}</h2>
        <h3 class="content-pdf__h2 text-center"
            style="font-family: DejaVu Sans; font-size: 15px; color:grey; text-align: center;">Лот № {{ $item->id }}
        </h3>
        <p class="content-pdf__p text-center" style="text-align: center;"><a href="#">
                @if ($item->slug) {{ route('site.item.get', $item->slug) }}
                @endif
            </a></p>
        <div class="row row-cols-2 no-gutters justify-content-between">
            <table>
                @php
                    $index = 0;
                @endphp
                @foreach ($item->imagesActive as $key => $image)


                    @if ($index % 2 == 0)
                        <tr>
                    @endif
                    <td style="padding: 10px; width: 48%;">
                        <div class="content-pdf-image col">
                            <img class="content-pdf__img"
                                src="{{ public_path('storage/items/' . $item->id . '/' . $image->file) }}" alt="info">
                        </div>
                    </td>
                    @php
                        $index = $key + 1;
                    @endphp
                    @if ($index % 2 == 0)
                        </tr>
                    @endif

                @endforeach
                @if ($index % 2 != 0)
                    <td></td>
                    </tr>
                @endif
            </table>

        </div>
        <h3 class="content-pdf__h2 text-center"
            style="font-family: DejaVu Sans;  font-size: 15px; color:grey; text-align: center;">Цена</h3>
        <h2 class="content-pdf__h2 text-center" style="text-align: center;">
            {{ number_format($item->price, 0, ',', ' ') }} руб.</h2>
        <h2 class="content-pdf__h2 text-center" style="text-align: center;">Характеристики</h2>
        <div class="content-pdf-info row no-gutters justify-content-between">
            @php
                if (count($itemoptions) >= 2) {
                    $chank_item_options = array_chunk($itemoptions, ceil(count($itemoptions) / 2));
                } else {
                    $chank_item_options = $itemoptions;
                }
            @endphp
            <table width="80%">
                <tr>
                    <td valign="top">
                        <ul class="row row-cols-2">
                            @if (isset($chank_item_options[0]))
                                @foreach ($chank_item_options[0] ?? [] as $key => $value)
                                    <li class="col-6 py-2" style="font-weight: normal;">{{ $value->option_title }} -
                                        {{ $value->value_title }}</li>
                                @endforeach
                            @endif

                        </ul>
                    </td>
                    <td valign="top">
                        <ul class="row row-cols-2">
                            @if (isset($chank_item_options[1]))
                                @foreach ($chank_item_options[1] ?? [] as $key => $value)
                                    <li class="col-6 py-2" style="font-weight: normal;">{{ $value->option_title }} -
                                        {{ $value->value_title }}</li>
                                @endforeach
                            @endif

                        </ul>
                    </td>
                </tr>
            </table>

        </div>
        <h2 class="content-pdf__h2 text-center" style="text-align: center;">Описание</h2>
        <h4 class="content-pdf__h4" style="font-weight: normal; text-align: justify; text-indent: 0px;">
            {{ $item->description }}
        </h4>
        <div style="text-align: center; margin-bottom: 40px;">
            @if (file_exists(public_path('/pdf/map_image' . $item->id . '.png')))
                <img src="{{ public_path('/pdf/map_image' . $item->id . '.png') }}" style="width: 700px;">
            @endif
        </div>


        <div class="content-pdf__h4 " style="font-weight: normal; text-align: justify; text-indent: 0px;">
            По вопросам получения дополнительной информации или уточнения информации, просим вас связаться с
            департаментом продаж компании <b>Seven</b> по телефону <a href="#">+7 985 700-00-77</a> или по email <a
                href="#"> info@7realty.ru</a>
        </div>
    </div>

    <!-- end of main content -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>
