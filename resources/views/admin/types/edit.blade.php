@extends('admin.layouts.main')
@section('title', 'Редактивароие типа квартиры')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.type_edit') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.type.update', $type->id) }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.type_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.type_name') }}"
                       value="{{ old('name') ?? $type->name ?? '' }}" required="">
            </div>
             <div class="form-group">
                <label for="">SLUG</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control"  placeholder="Slug"
                       value="{{  $type->slug ?? '' }}" disabled="">
                    </div>
                    <div class="col-lg-6">
                        Изменить url
                        <input type="checkbox" class="form-control" name="slug_change" > 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" name="active" @if ($type->active) checked @endif value="1"> 
            </div>

             <div class="form-group">
                <label for="show_menu">{{ __('admin.show_menu') }}</label>
                <input type="hidden" name="show_menu" value="0">
                <input type="checkbox" class="form-control" name="show_menu" @if ($type->show_menu) checked  @endif value="1"> 
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
