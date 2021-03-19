@extends('admin.layouts.main')
@section('title', 'Слайдер на главной')
@section('content')
    <div class="ibox-title">
        <h2>Слайдер на главной странице</h2>
        <div class="ibox-tools">
        </div>
    </div>

    <div class="ibox-content">
        <form action="{{ route('admin.sitesettings.mainpagebanner.upload') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Добавить изображение</label>
                <input class="form-control" type="file" accept="image/*" name="image" id="image">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Загрузить</button>
            </div>

        </form>
        @foreach ($items as $banner)
            {{ $banner->img()->attributes(['width' => '400px', 'height' => '']) }}
        @endforeach

        <div class="col-12 col-md-8 px-3 px-md-0">
            <div class="slider-content">
                <h3 class="big-slide-image-div__h3">asdasd</h3>
                <h2 class="big-slide-image-div__h2">asdasd</h2>
            </div>
            <div id="" class="owl-carousel slider1" onclick="">
                @foreach ($items as $banner)
                    <div class="item">
                        {{ $banner->img()->attributes(['width' => '100%', 'height' => '']) }}
                    </div>
                @endforeach

            </div>
            <div id="" class="owl-carousel thumbnails1">
                @foreach ($items as $banner)
                    <div class="item">
                        {{ $banner->img()->attributes(['width' => '100px', 'height' => '']) }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
