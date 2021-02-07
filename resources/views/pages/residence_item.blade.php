@extends('layouts.site')

@section('content')
<!-- main content -->
<!-- Блок Карточки объекта -->
<div class="object-card-title">
  <div class="object-card-title_position_absolute d-none d-md-block">Карточка</div>
</div>
<div class="object-card-big-slider">
  <div class="row no-gutters justify-content-between px-3">
    <div class="col-12 col-md-8">
      <div class="slider-content">
        <h3 class="big-slide-image-div__h3">{{ $residence->address ?? '' }}</h3>
        <h2 class="big-slide-image-div__h2">{{ $residence->area->name ?? '' }}</h2>

      </div>
      <div id="" class="owl-carousel slider1" >

        <!--  <h3 class="big-slide-image-div__h3">{{ $residence->name }}</h3>

            <h4 class="big-slide-image-div__h4"><i class="far fa-heart"></i></h4> -->
        <!--<i class="fas fa-heart"></i>-->


        @foreach($residence->imagesActive as $key => $image)
        <div class="item"><img src="{{ url('storage/residences/'.$residence->id.'/'.$image->file) }}" /></div>
        @endforeach

      </div>
      <div class="thumbnails1 owl-carousel">

        @foreach($residence->imagesActive as $key => $image)
        <div class="item"><img src="{{ url('storage/residences/'.$residence->id.'/'.$image->file) }}" /></div>
        @endforeach
      </div>
    </div>
    <div class="col-12 col-md-4 px-2 px-md-none">
      <div class="content-object-card-information">
        <h2 class="content-object-card-information-title">{{ $residence->name }}</h2>
        <div class="content-object-card-information-list">
          <div class="content-object-card-information-list-img">
            @include('components.svg.res_count_item')
          </div>
          <div class="content-object-card-information-list-text">
            <div class="content-object-card-information-list-text-tile">Количество квартир</div>
            <div class="content-object-card-information-list-text-info">{{ $residence->all_flats }}</div>
          </div>
        </div>
        <div class="content-object-card-information-list">
          <div class="content-object-card-information-list-img">
            @include('components.svg.res_min_square')
          </div>
          <div class="content-object-card-information-list-text">
            <div class="content-object-card-information-list-text-tile">Площадь</div>
            <div class="content-object-card-information-list-text-info">{{ $residence->minSquare }} м² -
              {{ $residence->maxSquare }} м²</div>
          </div>
        </div>
        <div class="content-object-card-information-list">
          <div class="content-object-card-information-list-img">
            @include('components.svg.res_price')
          </div>
          <div class="content-object-card-information-list-text">
            <div class="content-object-card-information-list-text-tile">Цена</div>
            <div class="content-object-card-information-list-text-info">
              {{ number_format($residence->minPrice, 0, ",", " ") }} ₽ -
              {{ number_format($residence->maxPrice, 0, ",", " ") }} ₽</div>
          </div>
        </div>
        <div class="content-object-card-information-list">
          <div class="content-object-card-information-list-img">
            @include('components.svg.res_year')
          </div>
          <div class="content-object-card-information-list-text">
            <div class="content-object-card-information-list-text-tile">Год постройки</div>
            <div class="content-object-card-information-list-text-info">{{ date('Y', strtotime($residence->build_at)) }}
            </div>
          </div>
        </div>
        <div class="content-object-card-information-list">
          <div class="content-object-card-information-list-img">
            @include('components.svg.res_item_sale')
          </div>
          <div class="content-object-card-information-list-text">
            <div class="content-object-card-information-list-text-tile">Квартир в продаже</div>
            <div class="content-object-card-information-list-text-info">{{ $residence->items->count() }}</div>
          </div>
        </div>
        <div class="row no-gutters">
          <div
            class="content-object-card-information-input-name col-12 col-sm-6 col-md-12 col-lg-6 pr-none pr-sm-1 pr-md-none pr-lg-1">
            <p>Ваше имя:</p><input class="content-object-card-information__input" type="text" name="name" id="name"
              value="" placeholder="Андрей">
          </div>
          <div class="content-object-card-information-input-name col-12 col-sm-6 col-md-12 col-lg-6">
            <p>Ваш номер телефона:</p><input class="content-object-card-information__input mask" type="tel" name="phone"
              id="phone" value="" placeholder="+7 977 194-73-51">
          </div>
        </div>
        <div class="content-object-card-information-input-name">
          <p>Ваш e-mail:</p><input class="content-object-card-information__input_email" type="email" name="name"
            id="email" value="" placeholder="example@main.com">
        </div>
        <p class="pop-table-enter__p text-center" id="formOrderShowError" style="color: red;"></p>
        <div class="content-object-card-information-buttons"><button class="content-object-card-information-button-show"
            onclick="sendOrderShow({{ $residence->id }}, 'ЖК')" style="     background: #0076C1;">Узнать
            подробнее</button></div>
        <div class="content-object-card-information-buttons"><button
            class="content-object-card-information-button-details " style="    background: #007882;">Назначить
            показ</button></div>
      </div>
    </div>
  </div>
  <div class="row no-gutters">
    <h2 class="content-object-card-around-title col-11 col-xl-12">Инфраструктура и окружение</h2>
    <div id="modal-map"></div>
    
  </div>
</div>
<!-- Описание -->
<div class="object-card-info">
  <div class="row row-cols-1 no-gutters">
    <h2 class="content-object-card-info-title col-11 col-xl-12">Описание</h2>
    <p class="content-object-card-info__p col-11 col-xl-12">
      {!! $residence->description !!} </p>
  </div>

  <!-- Отзывы -->
  <div class="object-card-feedback">
    <div class="row no-gutters">
      <h2 class="content-object-card-around-title col-11 col-xl-12">Отзывы</h2>

      <div class="content-object-card-feedback-slider slider-custom__four owl-carousel px-5">

        <!-- 1 -->
        @php $colorArr = ['green', 'orange', 'violet', 'burgundy']; @endphp
        @foreach($residence->commentsActive as $key => $comment)
        <div class="content-object-card-feedback-slider-info">
          <div
            class="content-object-card-feedback-slider-info-title content-object-card-feedback-slider-info-title--{{ $colorArr[$key % 4] }}">
            <i class="far fa-user"></i>{{ $comment->name }}</div>
          <p class="content-object-card-feedback-slider-info-text">
            {{ $comment->comments }}
          </p>
        </div>
        @endforeach

      </div>
    </div>
  </div>

    <!-- Блок Формы для подбора объекта -->
    <div class="content-residential-form d-md-block mt-4">
      <div class="row no-gutters px-3 px-xl-0">
        <div class="col-sm-12">
          <h2 class="content-object-card-around-title col-11 col-xl-12" id="residence_items">Список обьектов</h2>
          
        </div>
        
       
       
      </div> 
      <div class="row no-gutters px-3 px-xl-0 m-3">
        @php 

      $newurl = $fullurl;
      if (strpos($newurl, 'orderprice=asc')> 0) {
      $newurl = str_replace('orderprice=asc', 'orderprice=desc',$newurl);
      }elseif (strpos($newurl, 'orderprice=desc')> 0) {
      $newurl = str_replace('orderprice=desc', 'orderprice=asc',$newurl);
      }elseif (strpos($newurl, '?')> 0) {
      $newurl = $newurl."&orderprice=asc";

      } else {
      $newurl = $newurl."?orderprice=asc";
      }

      @endphp
      <div class="content-residential-form-sort col-12 text-right">сортировать по: <a href="{{ $newurl }}">цене
          @if(isset($filter['orderprice']) && ($filter['orderprice'] == 'desc'))
          <i class="fas fa-sort-amount-down"></i>
          @elseif(isset($filter['orderprice']) && ($filter['orderprice'] == 'asc'))
          <i class="fas fa-sort-amount-up-alt"></i>
          @else
          <i class="fas fa-sort-amount-down"></i>
          @endif
        </a>
      </div>
      <!--  -->
    </div>
  </div>

  <div class="content-residential mb-4 d-flex flex-wrap">
      <div class="d-flex flex-wrap w-100">
        @php $index = 0 @endphp
              @foreach ($list as  $item)
                @include('components.object')
              @endforeach
      </div>
  <div class="content-residential-pag w-100%">
    {{ $list->links() }}
  </div>
</div>
</div>
   

  <!-- Блок Избранное КОНЕЦ-->
  <!-- end of main content -->
  @endsection