                    <h2 class="content-object-card-information-title">{{ $item->name }}</h2>
                    <div class="content-object-card-information-pdf">
                        <div class="content-object-card-information-pdf-image"><a
                                href="{{ route('site.item.getPdf', $item->slug) }}" target="_blank"><img
                                    src="{{ asset('users/image/pdf.jpg') }}" alt="pdf"></a></div>
                        <div class="content-object-card-information-pdf-info"><a
                                href="{{ route('site.item.getPdf', $item->slug) }}" target="_blank">Лот №
                                {{ $item->id }}</a></div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_price')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">
                                @if ($item->type_order == 'sale')
                                    Цена
                                @elseif ($item->type_order == 'orenda')
                                    Аренда в месяц
                                @endif
                            </div>
                            <div class="content-object-card-information-list-text-info">
                                {{ number_format($item->price, 0, ',', ' ') }} ₽</div>
                        </div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_square')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Площадь</div>
                            <div class="content-object-card-information-list-text-info">{{ $item->square }} м²</div>
                        </div>
                    </div>
                    @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_bed_rooms')
                            </div>
                            <div class="content-object-card-information-list-text">

                                <div class="content-object-card-information-list-text-tile">Количество спален</div>
                                <div class="content-object-card-information-list-text-info">{{ $item->bed_rooms }}</div>
                            </div>
                        </div>
                    @endif
                    @if ($item->bath_rooms != null && $item->bath_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_bath_rooms')
                            </div>
                            <div class="content-object-card-information-list-text">
                                <div class="content-object-card-information-list-text-tile">Количество ванных комнат</div>
                                <div class="content-object-card-information-list-text-info">{{ $item->bath_rooms }}</div>
                            </div>
                        </div>
                    @endif
