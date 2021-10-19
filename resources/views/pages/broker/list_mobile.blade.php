@extends('layouts.site_mobile')
@section('content')
    <div class="page-broker">

        <div class="broker-department-select-wrapper">
            <a class="broker-department-select dropdown-toggle" href="#" role="button" id="departmentDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if ($department)
                    @if (isset($broker_departments[$department]))
                        {{ $broker_departments[$department] }}
                    @else
                        Все
                    @endif
                @else
                    Все
                @endif
            </a>
            <div class="dropdown-menu" aria-labelledby="departmentDropdown">
                @foreach ($broker_departments as $department_name => $department)
                <a class="dropdown-item" href="?department={{$department_name}}">{{$department}}</a>
                @endforeach
              </div>
        </div>
        <div class="broker-department-nav d-none">
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
