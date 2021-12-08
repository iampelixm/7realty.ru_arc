    <!-- Отзывы -->
    <div class="object-card-feedback">
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Отзывы</h2>

            <div class="content-object-card-feedback-slider slider-custom__four owl-carousel px-5">

                <!-- 1 -->
                @php $colorArr = ['green', 'orange', 'violet', 'burgundy']; @endphp
                @foreach ($item->commentsActive as $key => $comment)
                    <div class="content-object-card-feedback-slider-info">
                        <div
                            class="content-object-card-feedback-slider-info-title content-object-card-feedback-slider-info-title--{{ $colorArr[$key % 4] }}">
                            <i class="far fa-user"></i>{{ $comment->name }}
                        </div>
                        <p class="content-object-card-feedback-slider-info-text">
                            {{ $comment->comments }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
