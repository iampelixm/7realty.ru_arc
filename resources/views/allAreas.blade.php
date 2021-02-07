@extends('admin.layouts.main')
@section('title', 'Районы')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="panel-heading">
				    	<div class="row">
				    		<div class="col-md-6 text-left">
				    		</div>
				    		<div class="col-md-6 text-right">
				    			<a class="btn btn-info btn-xs" href="{{ route('area-create') }}">Создать</a>
				    		</div>
				    	</div>
				    </div>
			<table class="table table-bordered">
				<tr>
					<td>Название</td>
					<td>Количество объектов</td>
					<td>Стоимость кв.м.(руб)</td>
					<td>Дата постройки</td>
					<td></td>
				</tr>
				@foreach($allAreas as $areas)
					<tr>
						<td>{{ $areas->name }}</td>
						<td>{{ $areas->objNum }}</td>
						<td>{{ $areas->price }}</td>
						<td>{{ $areas->add_data }}</td>
						<td><a href="{{ route('area-edit', ['areas' => $areas->id]) }}">Настройка</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection
