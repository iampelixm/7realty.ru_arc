<!-- Блок для кого -->
    <div class="content-for-who d-none d-md-block content-specials_position" style="margin-top: 26px;">
      <div class="row row-cols-1 row-cols-md-2 no-gutters">
        <div class="content-for-life col">
        <h2 class="content-for-life__h2">Для жизни</h2>
          <div class="content-for-life-hover content-for-life-hover_position">
            <h2 class="content-for-life-hover__h2">Для жизни</h2>
             @foreach($category_life as $category)
                      <p class="content-for-life-hover__p"><a href="@if($category->slug != null){{ route('site.get_category', $category->slug) }}@endif">{{ $category->name }}</a></p>
                      <div class="content-for-life-hover__div">
                        @foreach($category->children as $subcategory)
                        <a class="content-for-life-hover__a" href="@if($category->slug != null){{ route('site.get_category', $subcategory->slug) }}@endif">{{ $subcategory->name }}</a><span> | </span>
                        @endforeach
                      </div>
                      @endforeach
            <button class="content-for-life-hover__button">Подать заявку</button>
          </div>
        </div>
        <div class="content-for-business col">
          <h2 class="content-for-life__h2">Для бизнеса</h2>
          <div class="content-for-business-hover content-for-business-hover_position">
            <h2 class="content-for-life-hover__h2">Для бизнеса</h2>
           @foreach($category_bizness as $category)
                            <p class="content-for-life-hover__p"><a href="@if($category->slug != null){{ route('site.get_category', $category->slug) }}@endif">{{ $category->name }}</a></p>
                            <div class="content-for-life-hover__div">
                        @foreach($category->children as $subcategory)
                                <a class="content-for-life-hover__a" href="@if($subcategory->slug != null){{ route('site.get_category', $subcategory->slug) }}@endif">{{ $subcategory->name }}</a><span> | </span>
                        @endforeach
                            </div>
                      @endforeach
            <button class="content-for-life-hover__button">Подать заявку</button>
          </div>
        </div>
      </div>
    </div>
    <div class="content-for-who-mobile d-block d-md-none">
      <div class="content-for-life-mobile">
        <div class="content-for-life-mobile-hover">
          <h2 class="content-for-life-mobile__h2">Для жизни</h2>

           @foreach($category_life as $category)
                      <p class="content-for-life-mobile__p"><a href="@if($category->slug != null){{ route('site.get_category', $category->slug) }}@endif">{{ $category->name }}</a></p>
                      <div class="content-for-life-mobile__div">
                        @foreach($category->children as $subcategory)
                        <a class="content-for-life-mobile__a" href="@if($category->slug != null){{ route('site.get_category', $subcategory->slug) }}@endif">{{ $subcategory->name }}</a><span> | </span>
                        @endforeach
                      </div>
                      @endforeach

          <div class="content-for-life-mobile__div">
            <button class="content-for-life-mobile__button">Подать заявку</button>
          </div>
        </div>
      </div>
      <div class="content-for-business-mobile">
        <div class="content-for-life-mobile-hover">
          <h2 class="content-for-life-mobile__h2">Для бизнеса</h2>
             @foreach($category_bizness as $category)
                            <p class="content-for-life-mobile__p"><a href="@if($category->slug != null){{ route('site.get_category', $category->slug) }}@endif">{{ $category->name }}</a></p>
                            <div class="content-for-life-mobile__div">
                        @foreach($category->children as $subcategory)
                                <a class="content-for-life-mobile__a" href="@if($subcategory->slug != null){{ route('site.get_category', $subcategory->slug) }}@endif">{{ $subcategory->name }}</a><span> | </span>
                        @endforeach
                            </div>
                      @endforeach
            <div class="content-for-life-mobile__div">
              <button class="content-for-life-mobile__button">Подать заявку</button>
            </div>
        </div>
      </div>
    </div>
    <!-- Блок для кого Конец -->
