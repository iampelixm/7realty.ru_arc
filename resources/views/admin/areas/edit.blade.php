@extends('admin.layouts.main')
@section('title', 'Редактивароие района')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.areas_edit') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.areas.update', $area->id) }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.areas_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.areas_name') }}"
                       value="{{ old('name') ?? $area->name ?? '' }}" required="">
            </div>

             <div class="form-group">
                <label for="">SLUG</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control"  placeholder="Slug"
                       value="{{  $area->slug ?? '' }}" disabled="">
                    </div>
                    <div class="col-lg-6">
                        Изменить url
                        <input type="checkbox" class="form-control" name="slug" > 
                    </div>
                </div>
            </div>

             <div class="form-group">
                <label for="">{{ __('admin.item-city-select') }}</label>
                <select class="js-example-basic-multiple-city form-control" name="city_id" >
                    <option selected disabled="" >Выбрать</option>
                    @foreach($cities as $rez)
                        <option value="{{ $rez->id }}" @if($area->city_id == $rez->id) selected @endif>{{ $rez->name }}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" @if ($area->active) checked @endif value="1"> 
            </div>
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><i class="fa fa-cubes" aria-hidden="true"></i> Укажите координати</h5>
                </div>
                <div class="ibox-content">
                    <table class="table" id="valuetable" style="font-size: 10px;">
                        <thead>
                        <tr>
                            <th>
                                №
                            </th>
                            <th>
                                Широта
                            </th>
                            <th>
                                Долгота
                            </th>
                            <th>
                                Название
                            </th>
                            <th>
                               Управление
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $indexvalue = 0; @endphp
                            @if ($area->coordinates != null)
                                @foreach($area->coordinates as $item)
                                    <tr>
                                        <td>{{ $indexvalue }}</td>
                                        <td>
                                            <input type="number" step="0.000001" required class="form-control" id="latitude{{ $indexvalue }}" name="coordinates[{{ $indexvalue }}][latitude]" value="{{ $item['latitude'] }}">
                                        </td>
                                        <td>
                                             <input type="number" step="0.000001" required class="form-control" id="longitude{{ $indexvalue }}" name="coordinates[{{ $indexvalue }}][longitude]" value="{{ $item['longitude'] }}">
                                        </td>
                                         <td>
                                            <input type="text" required class="form-control" id="name{{ $indexvalue }}" name="coordinates[{{ $indexvalue }}][name]" value="{{ $item['name'] }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', {{ $indexvalue }})">Удалить</button>
                                        </td>
                                    </tr>
                                @php $indexvalue++; @endphp  
                                @endforeach
                            @endif        
                        </tbody>
                    </table>
                     <div class="row">
                        <div class="col-lg-3">
                             <button class="btn btn-primary btn-outline " type="button" onclick="addvalue()"><i class="fa fa-plus"></i>&nbsp;Добавить значение</button>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple-city').select2();
        });


    </script>

 <script type="text/javascript">

    var indexvalue = {{ $indexvalue }}; 

    function addvalue(){

        var inputname = "<input type=\"text\" value=\"\" class=\"form-control\" id=\"latitude"+indexvalue+"\" name=\"coordinates["+indexvalue+"][name]\">";

        var inputlatitude = "<input type=\"number\" step=\"0.000001\" required class=\"form-control\" id=\"latitude"+indexvalue+"\" name=\"coordinates["+indexvalue+"][latitude]\">";

        var inputlongitude = "<input type=\"number\" step=\"0.000001\" required class=\"form-control\" id=\"longitude"+indexvalue+"\" name=\"coordinates["+indexvalue+"][longitude]\">";
       
        var delbutton    = "<button type=\"button\" class=\"btn btn-outline btn-danger\" onclick=\"deleterow('valuerow', "+indexvalue+")\">Удалить</button>";

        var str = "<tr id=\"valuerow"+indexvalue+"\"><td>"+indexvalue+"</td><td>"+inputlatitude+"</td><td>"+inputlongitude+"</td><td>"+inputname+"</td><td>"+delbutton+"</td></tr>";

        $("#valuetable").append(str);

        indexvalue = indexvalue+1;
    }


    function deleterow(name, index){
        var rowname = "#"+name+index;
        $(rowname).remove();
    }
</script>



@endsection
