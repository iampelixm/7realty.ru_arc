@extends('admin.layouts.main')
@section('title', 'Создание опции')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.option_create') }}</h2>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.options.store') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">{{ __('admin.option_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.option_name') }}"
                    value="{{ old('name') ?? '' }}" required="">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.option_slug') }}</label>
                <input type="text" class="form-control" name="slug" placeholder="{{ __('admin.option_slug') }}"
                    value="{{ old('slug') ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="checkbox" class="form-control" name="active" checked required="">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.method-input') }}</label>
                <select class="form-control" name="method_input">
                    <option value="select" selected>{{ __('admin.method-input-select') }}</option>
                    <option value="hand">{{ __('admin.method-input-hand') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item-type-select') }}</label>
                <select class="js-example-basic-multiple form-control" name="types[]" multiple="multiple">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="ibox ">
                <div class="ibox-title">
                    <h2><i class="fa fa-cubes" aria-hidden="true"></i> Значение характиристики</h2>
                </div>
                <div class="ibox-content">
                    <table class="table" id="valuetable" style="font-size: 10px;">
                        <thead>
                            <tr>
                                <th>
                                    №
                                </th>
                                <th>
                                    Значений
                                </th>
                                <th>
                                    Управление
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-3">
                            <button class="btn btn-primary btn-outline " type="button" onclick="addvalue()"><i
                                    class="fa fa-plus"></i>&nbsp;Добавить значение</button>
                        </div>

                    </div>

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
        var indexvalue = 0;

        function addvalue() {
            var inputprocent = "<input name=\"value[" + indexvalue + "]\"  id=\"inpval" + indexvalue +
                "\" type=\"text\"  class=\"form-control form-control-sm\" style=\"width:400px; background: #e4dbdb;\" required>";
            var delbutton =
                "<button type=\"button\" class=\"btn btn-outline btn-danger\" onclick=\"deleterow('valuerow', " +
                indexvalue + ")\">Удалить</button>"
            var str = "<tr id=\"valuerow" + indexvalue + "\"><td>" + indexvalue + "</td><td>" + inputprocent + "</td><td>" +
                delbutton + "</td></tr>";
            $("#valuetable").append(str);
            indexvalue = indexvalue + 1;
        }

        function deleterow(name, index) {
            var rowname = "#" + name + index;
            $(rowname).remove();
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
@endsection
