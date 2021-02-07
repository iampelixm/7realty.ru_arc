@extends('admin.layouts.main')
@section('title', 'ЖК')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="panel-heading">
				    	<div class="row">
				    		<div class="col-md-6 text-left">
				    		</div>
				    		<div class="col-md-6 text-right">
				    			<a class="btn btn-info btn-xs" href="{{ route('residentialComplex-create') }}">Создать</a>
				    		</div>
				    	</div>
				    </div>
			<table class="table table-bordered">
				<tr>
					<td>Название</td>
					<td>Дата постройки</td>
					<td></td>
				</tr>
				@foreach($allResComplex as $rc)
					<tr>
						<td>{{ $rc->name }}</td>
						<td>{{ $rc->add_data }}</td>
						<td><a href="{{ route('residentialComplex-edit', ['rc' => $rc->id]) }}">Настройка</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection