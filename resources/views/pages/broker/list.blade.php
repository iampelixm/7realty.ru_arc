@extends('layouts.site')
@section('categories_menu')
@endsection

@section('content')
    <style>
        .inline-gold-nav .nav-item:first-child {
            border-radius: 40px 0 0 40px;
            border-left: 1px solid #C1A771;
        }

        .inline-gold-nav .nav-item:last-child {
            border-radius: 0 40px 40px 0;
            border-right: 1px solid #C1A771;
        }

        .inline-gold-nav .nav-item:last-child:after {
            content: '';
        }

        .inline-gold-nav .nav-item.active::after {
            content: '';
        }

        .inline-gold-nav .nav-item:hover::after {
            opacity: 0;
        }

        .inline-gold-nav .nav-item {
            font-family: Geometria;
            font-size: 14px;
            color: #333;
            padding-top: 15px;
            padding-bottom: 13px;
            background: #EEE;
            padding-left: 20px;
            padding-right: 20px;
            border-top: 1px solid #C1A771;
            border-bottom: 1px solid #C1A771;
            transition: all 200ms;
        }

        .inline-gold-nav .nav-item::after {
            content: '|';
            margin-left: 20px;
            position: absolute;
            color: #C1A771;
            transition: all 100ms;
        }

        .inline-gold-nav .nav-item.active {
            background: #C1A771;
        }

        .inline-gold-nav .nav-item:hover {
            background: #C1A771;
            text-decoration: none;
        }

        .card {
            font-family: Geometria;
            font-size: 14px;
        }

        .brokercard {
            position: relative;
            width: 25%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 70px;
        }


        .brokercard .more-link {
            color: #333333;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-family: Geometria;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 23px;
            width:300px;
            border: 1px solid #C1A771;
            padding: 20px 70px 16px;
        }


        .brokercard .brokername {

            font-family: Geometria;
            font-style: normal;
            font-weight: bold;
            font-size: 36px;
            line-height: 45px;
            text-align: center;
            text-transform: uppercase;
            color: #C1A771;

        }

        .brokercard .brokerposition {
            font-family: Geometria;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            color: #333333;
            padding-left: 20px;
            padding-right: 20px;
        }

    </style>
    <div class="container-fluid">
        <div>
            <div class="row justify-content-center inline-gold-nav py-4 mt-2 align-items-center">
                <a class="nav-item {{ request()->department == '' ? 'active' : '' }}" href="?department=">
                    Все
                </a>
                <a class="nav-item {{ request()->department == 'town_ned' ? 'active' : '' }}" href="?department=town_ned">
                    Городская недвижимость
                </a>
                <a class="nav-item {{ request()->department == 'zagorod_ned' ? 'active' : '' }}"
                    href="?department=zagorod_ned">
                    Загородная недвижимость
                </a>
                <a class="nav-item {{ request()->department == 'commercial_ned' ? 'active' : '' }}"
                    href="?department=commercial_ned">
                    Коммерческая недвижимость
                </a>
                <a class="nav-item {{ request()->department == 'invest_ned' ? 'active' : '' }}"
                    href="?department=invest_ned">
                    Инвестиционная недвижимость
                </a>
            </div>
        </div>
        <h2 style="text-align: center">Выберите брокера по душе</h2>
    </div>
    <style>
        .hexagon-wrapper {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }

        .hexagon-underlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 230px;
            height: 258px;
            /* margin-left: 30px; */
            margin-left: calc(50% + 20px);
            transform: translateX(-50%);
            margin-top: 25px;
            z-index: 0;
            /*  clip-path: inset(0 0 0 50%); */
        }

        .hexagon {
            z-index: 2;
            clip-path: polygon(0 25%, 50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%);
            width: 250px;
            height: 280px;
            background-image: url(/images/bg-for-business.jpg);
            object-fit: cover;
            margin-left: 50%;
            transform: translateX(-50%);
        }

    </style>
    <div style="max-width: 1360px; margin: 0 auto; display: flex; flex-wrap: wrap; padding-bottom: 70px;">
        @foreach ($brokers as $broker)
            @include('pages.broker.card')
        @endforeach
    </div>

@endsection
