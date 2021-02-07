@extends('layouts.site')

@section('content')
<!-- main content -->
  	<!-- Блок Контактов  -->
    
     <div class="office-content py-5 d-none d-md-block">
      <div class="row row-cols-1 no-gutters">
        <div class="col-sm-12">
          <h2 class="content-residential-form__h2 ">{{ $page->name }}</h2>
        </div>
        <div class="col text-left">
          {!! $page->text !!}
        </div>
        
      </div>
    </div>

@endsection