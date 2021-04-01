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
        <table width="100%">
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Управление</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $banner_id => $banner)
                    <tr data-image="{{ $banner->id }}">
                        <td>
                            {{ $banner->img()->attributes(['width' => '150px', 'height' => '']) }}
                        </td>
                        <td class="buttons__">
                            <a class="btn btn-delete delete-alert"
                                data-action="{{ route('admin.sitesettings.mainpagebanner.delete', ['item' => $banner_id]) }}"
                                data-title="{{ __('admin.modal_delete_title') }}"
                                data-text="{{ __('admin.modal_delete_text') }}"
                                data-success="{{ __('admin.modal_delete_success') }}"
                                data-error-title="{{ __('admin.modal_error_title') }}"
                                data-error="{{ __('admin.modal_error') }}" href="#">
                                <i class="fa fa-trash fa-lg"></i>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="col-12 col-md-8 px-3 px-md-0">
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
        </div> --}}
    </div>
@endsection

@section('script')
    <script>
        appjs = document.getElementById('appjs');
        appjs.addEventListener('load', function(e) {
            $("tbody").sortable({
                items: "> tr",
                appendTo: "parent",
                helper: "clone",
                update: function(event, ui) {
                    var images;
                    images = $(this).find('tr').map(function(i, el) {
                        return $(el).data('image');
                    }).toArray();
                    console.log(images);
                    $.post(
                        '{{ route('admin.sitesettings.mainpagebanner.setorder') }}', {
                            '_token': '{{ csrf_token() }}',
                            'images': images
                        },
                        function(response) {
                            console.log(response);
                        }
                    )
                }
            });
        }, false);

    </script>
@endsection
