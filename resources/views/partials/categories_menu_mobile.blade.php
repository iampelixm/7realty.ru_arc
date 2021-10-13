<nav class="navbar">
    <div class="collapse  navbar-collapse show" id="categoriesnav">
        <ul class="navbar-nav">
            @foreach ($category_menu as $category)
                @if ($category->children->isEmpty())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.get_category', $category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categorySub_{{ $category->id }}"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categorySub_{{ $category->id }}">
                            @foreach ($category->children as $subcategory)
                                <a class="dropdown-item" href="{{ route('site.get_category', $subcategory->slug) }}">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
