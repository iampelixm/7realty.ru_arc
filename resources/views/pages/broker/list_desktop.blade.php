@extends('layouts.site_desktop')


@section('content')
    <div class="page-broker">
        <div class="broker-department-nav">
            {{-- <div class="row justify-content-center inline-gold-nav py-4 mt-2 align-items-center"> --}}
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
            <a class="nav-item {{ request()->department == 'invest_ned' ? 'active' : '' }}" href="?department=invest_ned">
                Инвестиционная недвижимость
            </a>
            {{-- </div> --}}
        </div>
        <h2 class="title">Выберите брокера по душе</h2>

        <div class="brokers-list">
            @foreach ($brokers as $broker)
                @include('pages.broker.card')
            @endforeach
        </div>
    </div>
@endsection
