<div class="category-container">
    <ul>
        <li class="nav-item {{-- $request->routeIs('home.index')? 'active' : '' --}}"><a href="#">Todo</a></li>
        @foreach ($navbar as $category)
            <li class="nav-item {{!!(Request::path()) == 'category/'.$category->slug ? 'active' : '' !!}}">
                <a href="{{route('categories.detail', $category->slug)}}">$category->name </a>
            </li>
        @endforeach
        <li class="nav-item ">
            <a href="#">Todas las categorias</a>
        </li>

    </ul>
</div>
