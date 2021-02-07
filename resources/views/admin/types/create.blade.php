@extends('admin.layouts.main')
@section('title', 'Создание типа квартиры')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.type_create') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.type.store') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">{{ __('admin.type_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.type_name') }}"
                       value="{{ old('name') ?? '' }}" required="">
            </div>
            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" checked required="" value="1"> 
            </div>
            <div class="form-group">
                <label for="show_menu">{{ __('admin.show_menu') }}</label>
                <input type="hidden" name="show_menu" value="0">
                <input type="checkbox" class="form-control" name="show_menu" checked value="1"> 
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
