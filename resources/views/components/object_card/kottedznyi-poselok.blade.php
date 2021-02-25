          <div class="content-list-item content-list-item__modify" data-id="kv{{ $item->id }}" data-name="card">
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
                      <p>
                          {{ $item->address }}
                      </p>
                  </div>
              </div>
              <div class="content-specials-pref">
                  <div class="content-specials-pref-list">
                      <div class="content-specials-pref-list-info">
                          <div class="content-specials-pref-list-info__ico">
                              <!---->
                              @include('components.svg.square')
                          </div>
                          <div class="content-specials-pref-list-info__text">
                              От
                              {{ $item->options['minimalnaya_ploshhad']->value_title ?? '--' }}
                              м²
                          </div>
                      </div>
                      <div class="content-specials-pref-list-info">
                          @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                              <div class="content-specials-pref-list-info__ico">
                                  @include('components.svg.square')
                              </div>
                              <div class="content-specials-pref-list-info__text">
                                  До
                                  {{ $item->options['maksimalnaya_ploshhad']->value_title ?? '--' }}
                                  м²
                              </div>
                          @endif
                      </div>
                  </div>
                  <div class="content-specials-pref-list">
                      <div class="content-specials-pref-list-info">
                          @if ($item->all_rooms != null && $item->all_rooms > 0)
                              <div class="content-specials-pref-list-info__ico">
                                  @include('components.svg.res_item_price')
                              </div>
                              <div class="content-specials-pref-list-info__text">
                                  От
                                  {{ $item->options['minimalnaya_cena_za_kvm']->value_title ?? '--' }}
                                  м²
                              </div>
                          @endif
                      </div>
                      <div class="content-specials-pref-list-info d-none">

                      </div>
                  </div>
              </div>
              <div class="residential-object-price">
                  <div class="content-specials-choice">
                      <div>
                          <div class="content-specials-price-info">
                              <p class="content-specials-price-info__p">
                                  От
                                  {{ number_format(($item->options['minimalnaya_cena_za_kvm']->value_title ?? 0) * ($item->options['minimalnaya_ploshhad']->value_title ?? 0), 0, ',', ' ') ?? 0 }}
                                  ₽
                              </p>
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
