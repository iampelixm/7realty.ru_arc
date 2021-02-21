          <div class="content-list-item content-list-item__modify " data-id="kv{{ $item->id }}" data-name="card">
              <div class="slide-image-div">
                  @foreach ($item->imagesActive as $image)
                      <div class="slide-image-div-image">
                          <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" alt>
                      </div>
                  @endforeach
              </div>
              <h3 class="residential-object__h3"><a href="@if ($item->slug != null) {{ route('site.item.get', $item->slug) }} @endif">{{ $item->name }}</a>
              </h3>
              <div class="residential-object-adress">
                  <div class="residential-object-adress-marker"><i class="fas fa-map-marker-alt"></i></div>
                  <div class="residential-object-adress-text">
                      <p>{{ $item->address }}</p>
                  </div>
              </div>
              <div class="content-specials-pref">
                  <div class="content-specials-pref-list">
                      <div class="content-specials-pref-list-info">
                          <div class="content-specials-pref-list-info__ico">
                              <!---->
                              @include('components.svg.square')
                          </div>
                          <div class="content-specials-pref-list-info__text">{{ $item->square }} м²</div>
                      </div>
                      <div class="content-specials-pref-list-info">
                          @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                              <div class="content-specials-pref-list-info__ico">
                                  @include('components.svg.bed_rooms')
                              </div>
                              <div class="content-specials-pref-list-info__text">
                                  {{ trans_choice('site.bed_rooms', $item->bed_rooms, ['value' => $item->bed_rooms]) }}
                              </div>
                          @endif
                      </div>
                  </div>
                  <div class="content-specials-pref-list">
                      <div class="content-specials-pref-list-info">
                          @if ($item->all_rooms != null && $item->all_rooms > 0)
                              <div class="content-specials-pref-list-info__ico">
                                  @include('components.svg.all_rooms')
                              </div>
                              <div class="content-specials-pref-list-info__text">
                                  {{ trans_choice('site.all_rooms', $item->all_rooms, ['value' => $item->all_rooms]) }}
                              </div>
                          @endif
                      </div>
                      <div class="content-specials-pref-list-info">
                          @if ($item->bath_rooms != null && $item->bath_rooms > 0)
                              <div class="content-specials-pref-list-info__ico">
                                  @include('components.svg.bath_rooms')
                              </div>
                              <div class="content-specials-pref-list-info__text">
                                  {{ trans_choice('site.bath_rooms', $item->bath_rooms, ['value' => $item->bath_rooms]) }}
                              </div>
                          @endif
                      </div>
                  </div>
              </div>
              <div class="residential-object-price">
                  <div class="content-specials-choice">
                      <div>
                          <div class="content-specials-price-info">
                              <p class="content-specials-price-info__p">{{ number_format($item->price, 0, ',', ' ') }}
                                  ₽</p>
                          </div>
                          <div class="content-specials-link"><button class="content-specials-link__button"
                                  onclick="showModal({{ $item->id }})">Отправить запрос</button></div>
                      </div>
                      <div>
                          <div class="content-specials-heart" onclick="setFavorites({{ $item->id }})"><i
                              class="@if (in_array($item->id, $massFav)) fas @else
                                  far @endif fa-heart"></i>
                              <!--<i class="fas fa-heart"></i>-->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
