@extends('admin.layouts.main')
@section('title', 'Подкатегории')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="panel-heading">
				    	<div class="row">
				    		<div class="col-md-6 text-left">
				    		</div>
				    		<div class="col-md-6 text-right">
				    			<a class="btn btn-info btn-xs" href="{{ route('subcategories-create') }}">Создать</a>
				    		</div>
				    	</div>
				    </div>
			<table class="table table-bordered">
				<tr>
					<td>Название</td>
					<td></td>
				</tr>
				@foreach($allSubCateg as $subcateg)
					<tr>
						<td>{{ $subcateg->name }}</td>
						<td><a href="{{ route('subcategories-edit', ['subcateg' => $subcateg->id]) }}">Настройка</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection