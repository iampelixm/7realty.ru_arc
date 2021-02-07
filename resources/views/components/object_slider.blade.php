<div class="content-specials-list-slider-info">
            <div class="slide-image-div">

                @foreach($itemS->imagesActive as $key2 => $image)
                  <div class="slide-image-div-image">
                    <img src="{{ url('storage/items/'.$itemS->id.'/'.$image->file) }}">
                  </div>
                @endforeach
              
            </div>
            <div class="content-specials-price"><p class="content-specials-price__p"><a href="@if ($itemS->slug != null){{ route('site.item.get', $itemS->slug) }} @endif">{{ $itemS->name }}</a></p></div>
            <div class="content-specials-adress">
              <div class="content-specials-pointer content-specials-pointer_position"><i class="fas fa-map-marker-alt"></i></div>
              <div><p class="content-specials__p">{{ $itemS->address }}</p></div>
            </div>
            <div class="content-specials-pref">
              <div class="content-specials-pref-list">
                <div class="content-specials-pref-list-info">
                  <div class="content-specials-pref-list-info__ico">
                    @include('components.svg.square')
                    </div>
                    <div class="content-specials-pref-list-info__text">{{ $itemS->square }} м²</div>
                  </div>
                  <div class="content-specials-pref-list-info">
                    @if (($itemS->bed_rooms != null) && ($itemS->bed_rooms > 0))
                    <div class="content-specials-pref-list-info__ico">
                      @include('components.svg.bed_rooms')
                    </div>
                    <div class="content-specials-pref-list-info__text">{{ trans_choice('site.bed_rooms', $itemS->bed_rooms, ['value' => $itemS->bed_rooms])  }}</div>
                    @endif
                  </div>
                </div>
                <div class="content-specials-pref-list">
                  <div class="content-specials-pref-list-info">
                    @if (($itemS->all_rooms != null) && ($itemS->all_rooms > 0))
                    <div class="content-specials-pref-list-info__ico">
                      @include('components.svg.all_rooms')
                  </div>
                  <div class="content-specials-pref-list-info__text">{{ trans_choice('site.all_rooms', $itemS->all_rooms, ['value' => $itemS->all_rooms])  }}</div>
                  @endif
                </div>
                <div class="content-specials-pref-list-info">
                  @if (($itemS->bath_rooms != null) && ($itemS->bath_rooms > 0))
                  <div class="content-specials-pref-list-info__ico">
                    @include('components.svg.bath_rooms')
                  </div>
                  <div class="content-specials-pref-list-info__text">{{ trans_choice('site.bath_rooms', $itemS->bath_rooms, ['value' => $itemS->bath_rooms])  }}</div>
                  @endif
                </div>
              </div>
            </div>  
            <div class="content-specials-choice">
              <div>
                <div class="content-specials-price-info"><p class="content-specials-price-info__p">{{ number_format($itemS->price, 0, ",", " ") }} ₽</p></div>
                <div class="content-specials-link"><button class="content-specials-link__button" onclick="showModal({{ $itemS->id }})">Отправить запрос</button></div>
              </div>
              <div>
                  <div class="content-specials-heart"><i class="fa-heart @if(in_array($itemS->id, $massFav)) fas @else far @endif"></i></div>
              </div>
            </div>
          </div>