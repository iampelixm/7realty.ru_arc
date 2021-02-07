@extends('admin.layouts.main')
@section('title', 'Объекты')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="panel-heading">
				    	<div class="row">
				    		<div class="col-md-6 text-left">
				    		</div>
				    		<div class="col-md-6 text-right">
				    			<a class="btn btn-info btn-xs" href="{{ route('object-create') }}">Создать</a>
				    		</div>
				    	</div>
				    </div>
			<table class="table table-bordered">
				<tr>
					<td>Название</td>
					<td>Тип</td>
					<td>Стоимость, руб</td>
					<td>Дата добавления</td>
					<td></td>
				</tr>
				@foreach($allObject as $objects)
					<tr>
						<td>{{ $objects->name }}</td>
						<td>@if($objects->type){{ $objects->type->name }}@else нету @endif</td>
						<td>{{ $objects->price }}</td>
						<td>{{ $objects->added_at }}</td>
						<td><a href="{{ route('object-edit', $objects->id) }}">Изменить</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection
