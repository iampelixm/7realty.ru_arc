@extends('admin.layouts.main')
@section('title', 'Настройки для сайта')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.site_settings') }}</h2>
        <div class="ibox-tools">
            <a class="btn btn-danger text-dark" href="{{ route('admin.sitesettings.create') }}">
                <i class="fa fa-plus"></i> Создать
            </a>
        </div>
    </div>

    <div class="ibox-content">
        @foreach ($settings as $setting)
            <div class="row py-2">
                <div class="col">
                    <a href="{{ route('admin.sitesettings.edit', $setting) }}">
                        {{ $setting->caption }}
                    </a>
                </div>
                <div class="col">
                    {{ $setting->value }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
