@extends('admin.layouts.main')
@section('title', 'Список обьектов')
@section('content')
    <div class="ibox-title">
        <h2>Настройка {{ $setting->caption ?? 'создать' }}</h2>
        <a class="btn btn-info" href="{{ route('admin.sitesettings.index') }}">Все</a>
        <div class="ibox-tools">

            @if ($setting->id)
                <form action="{{ route('admin.sitesettings.destroy', $setting->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button class="btn btn-danger text-dark">
                        <i class="fa fa-minus"></i> Удалить
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="ibox-content">

        <form
            action="{{ $setting->id ? route('admin.sitesettings.update', $setting) : route('admin.sitesettings.store') }}"
            role="form" method="POST">
            @csrf
            @if ($setting->id)
                {{ method_field('PATCH') }}
            @endif

            <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
            <div class="form-group">
                <label for="name">Ключ</label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name') ?? ($setting->name ?? '') }}">
            </div>

            <div class="form-group">
                <label for="caption">Назначение</label>
                <input class="form-control" type="text" name="caption" id="caption"
                    value="{{ old('caption') ?? ($setting->caption ?? '') }}">
            </div>

            <div class="form-group">
                <label for="caption">Значение</label>
                <input class="form-control" type="text" name="value" id="value"
                    value="{{ old('value') ?? ($setting->value ?? '') }}">
            </div>

            <div class="form-group">
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
