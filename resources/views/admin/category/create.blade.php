@extends('admin.layouts.main')
@section('title', 'Создание типа квартиры')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.category_create') }}</h2>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">{{ __('admin.category_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.category_name') }}"
                    value="{{ old('name') ?? '' }}" required="">
            </div>



            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" checked value="1">
            </div>

            <div class="form-group">
                <label for="active">{{ __('admin.show-main') }}</label>
                <input type="hidden" name="show_main" value="0">
                <input type="checkbox" class="form-control" name="show_main" checked value="1">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item-type-select') }}</label>
                <select class="js-example-basic-multiple form-control" name="types[]" multiple="multiple">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="active">{{ __('admin.special-offer') }}</label>
                <select class="js-example-basic-multiple-type form-control" name="offer_index">
                    @for ($i = 0; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="main">{{ __('admin.category-main') }}</label>
                <input type="hidden" name="main" value="0">
                <input type="checkbox" class="form-control" name="main" onchange="setcategorytype()" checked id="main-type"
                    value="1">
            </div>
            <div id="category-block" style="display: none;">
                <div class="form-group">
                    <label for="">{{ __('admin.category-main-select') }}</label>
                    <select class="js-example-basic-multiple form-control" name="maincategories[]" multiple="multiple">
                        @foreach ($categorys as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div id="category-type-block" style="display: block;">
                <div class="form-group">
                    <label for="">{{ __('admin.category-type-select') }}</label>
                    <select class="form-control" name="type">
                        <option value="life">Для жизни</option>
                        <option value="bizness">Для бизнеса</option>
                    </select>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple-type').select2();
        });

        function setcategorytype() {
            var type = document.getElementById('main-type').checked;
            if (type) {
                document.getElementById('category-block').style.display = "none";
                document.getElementById('category-type-block').style.display = "block";
            } else {
                document.getElementById('category-type-block').style.display = "none";
                document.getElementById('category-block').style.display = "block";
            }

        }

    </script>


@endsection
