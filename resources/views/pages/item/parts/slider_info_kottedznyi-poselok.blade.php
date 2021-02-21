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
                                от
                                {{ number_format(($item->options['minimalnaya_cena_za_kvm']->value_title ?? 0) * ($item->options['minimalnaya_ploshhad']->value_title ?? 0), 0, ',', ' ') }}
                                ₽
                            </div>
                        </div>
                    </div>
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_square')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Площадь </div>
                            <div class="content-object-card-information-list-text-info">
                                от {{ $item->options['minimalnaya_ploshhad']->value_title ?? '--' }} м²
                                - до
                                {{ $item->options['maksimalnaya_ploshhad']->value_title ?? '--' }} м²
                            </div>
                        </div>
                    </div>
                    {{-- это убираем или заменяем на другое свойство
                    @if ($item->bed_rooms != null && $item->bed_rooms > 0)
                        <div class="content-object-card-information-list">
                            <div class="content-object-card-information-list-img">
                                @include('components.svg.item_square')
                            </div>
                            <div class="content-object-card-information-list-text">

                                <div class="content-object-card-information-list-text-tile">Максимальная площадь</div>
                                <div class="content-object-card-information-list-text-info">
                                    До
                                    {{ $item->options['maksimalnaya_ploshhad']['value_title'] ?? '--' }}
                                    м²
                                </div>
                            </div>
                        </div>
                    @endif --}}
                    <div class="content-object-card-information-list">
                        <div class="content-object-card-information-list-img">
                            @include('components.svg.item_price')
                        </div>
                        <div class="content-object-card-information-list-text">
                            <div class="content-object-card-information-list-text-tile">Цена за м²</div>
                            <div class="content-object-card-information-list-text-info">
                                от
                                {{ number_format($item->options['minimalnaya_cena_za_kvm']->value_title, 0, ',', ' ') ?? '--' }}
                                ₽
                            </div>
                        </div>
                    </div>
