@extends('admin.layouts.main')
@section('title', 'Создание обьекта')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.rescategory_create') }}</h2>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.rescategories.store') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">{{ __('admin.rescategory_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.rescategory_name') }}"
                    required="" value="{{ old('name') ?? '' }}">
            </div>

            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" checked value="1">
            </div>



            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
