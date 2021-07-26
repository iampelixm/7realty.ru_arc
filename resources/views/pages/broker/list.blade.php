@extends('layouts.site')


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
            overflow: hidden;
        }

        .brokercard .imgcontainer {
            position: relative;
            padding-bottom: 100%;
            /* background-image: url(/users/image/kover.jpg); */
            background-position: center center;
            /* backdrop-filter: grayscale(100%);
            backdrop-filter: grayscale(100%);
            filter: grayscale(100%); */
            transition: all 200ms;
        }

        .brokercard .imgcontainer:hover {

            filter: none;
        }

        .brokercard .imgcontainer .img {
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 1;
        }

        .brokercard .imgcontainer .overlay {
            z-index: 2;
            width: 100%;
            height: 100%;
            position: absolute;
            color: #FFF;
            outline: 1px solid #C1A771;
            outline-offset: -15px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-content: flex-end;
            justify-content: flex-end;
            transition: all 300ms;
        }

        .brokercard .imgcontainer .overlay:hover {
            outline-offset: -5px;
            background: rgba(0,0,0,0.6);
        }

        .brokercard .imgcontainer .overlay .more-link{
            display: none;
        }

        .brokercard .imgcontainer .overlay:hover > .more-link{
            display: block;
        }

        .brokercard .imgcontainer .overlay .brokerlink{
            color: #FFF;
            text-decoration: none;
        }


        .brokercard .imgcontainer .overlay .brokername{
            font-size: 24px;
            text-align: center;
        }

        .brokercard .imgcontainer .overlay .brokerposition{
            font-size: 14px;
            text-align: center;
        }


    </style>
    <div class="container">
        <div class="container">
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

    <div class="container">
        <div class="row">
            @foreach ($brokers as $broker)
                @include('pages.broker.card')
            @endforeach
        </div>
    </div>

@endsection
