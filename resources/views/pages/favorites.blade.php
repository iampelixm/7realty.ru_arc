@extends('layouts.site')

@section('content')

<!-- Блок Формы для подбора объекта -->
<div class="content-residential-form d-md-block mt-4">
  <div class="row no-gutters px-3 px-xl-0">
    <div class="col-sm-12">
      <h2 class="content-residential-form__h2 ">Избраное </h2>
    </div>
  </div> 
      
<!-- Блок Формы для подбора объекта КОНЕЦ -->

<!-- Блок просмотра объекта -->
  <div class="content-residential mb-4">
    <div class="row">
      @php $index = 0 @endphp
        @foreach ($list as  $item)
          @include('components.object')
        
      @endforeach
    </div>
    <div class="content-residential-pag"></div>
  </div>
</div>
<!-- Блок просмотра объекта КОНЕЦ-->

@endsection