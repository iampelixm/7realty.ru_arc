@extends('admin.layouts.main')
@section('title', 'Категории')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="panel-heading">
				    	<div class="row">
				    		<div class="col-md-6 text-left">
				    		</div>
				    		<div class="col-md-6 text-right">
				    			<a class="btn btn-info btn-xs" href="{{ route('categories-create') }}">Создать</a>
				    		</div>
				    	</div>
				    </div>
			<table class="table table-bordered">
				<tr>
					<td>Название</td>
					<td></td>
				</tr>
				@foreach($allCateg as $categ)
					<tr>
						<td>{{ $categ->name }}</td>
						<td><a href="{{ route('categories-edit', ['categ' => $categ->id]) }}">Настройка</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection
