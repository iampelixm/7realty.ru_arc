@extends('admin.layouts.main')
@section('title', 'Создание обьекта')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.item_create') }}</h2>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.pages.update', $page->id) }}" enctype="multipart/form-data" method="POST"
            role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.page_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.page_name') }}" required=""
                    value="{{ $page->name }}">
            </div>

            <div class="form-group">
                <label for="section">{{ __('admin.page_section') }}</label>
                <select class="form-control" name="section" id="section">
                    <option value="top" {{ $page->section == 'top' ? 'selected' : '' }}>Основные</option>
                    <option value="news" {{ $page->section == 'news' ? 'selected' : '' }}>Новости</option>
                    <option value="analytics" {{ $page->section == 'analytics' ? 'selected' : '' }}>Аналитика</option>
                    <option value="webinars" {{ $page->section == 'webinars' ? 'selected' : '' }}>Вебинары</option>
                </select>
            </div>

            @if (view()->exists('admin.pages.params.' . $page->section))
                @include('admin.pages.params.' . $page->section)
            @endif

            <div class="form-group">
                <label for="">SLUG</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" placeholder="Slug" value="{{ $page->slug ?? '' }}"
                            disabled="">
                    </div>
                    <div class="col-lg-6">
                        Изменить url
                        <input type="checkbox" class="form-control" name="slug_change">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" @if ($page->active) checked @endif value="1">
            </div>
            <div class="container">
                <h4 class="title">Загруженные изображения</h4>
                <div class="row">
                    <div class="col">Картинка</div>
                    <div class="col">Управление</div>
                </div>
                @foreach ($page->getMedia('images') as $itemImage_i => $itemImage)
                    <div class="row">
                        <div class="col">
                            {{ $itemImage->img()->attributes(['width' => '150px', 'height' => '']) }}
                        </div>
                        <div class="col">
                            <b class="btn btn-info">Вставить</b>
                            <b class="btn btn-danger">Удалить</b>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="">{{ __('admin.item_description') }}</label>
                <textarea class="form-control summernote" name="text" id="summernote"
                    data-imageurl="{{ route('admin.api.page.image.upload', $page) }}">{!! $page->text !!}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

    <a href="{{route('admin.pages.replicate', $page)}}" class="btn btn-warning">REPLICATE</a>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>




@endsection
