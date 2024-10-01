<div class="category-container">
    <ul>
        <li class="nav-item {{ request()->routeIs('home.index')? 'active' : ''}}"><a href="{{route('home.index')}}">Articles</a></li>
        @foreach ($navbar as $category)
            <li class="nav-item {!! Request::path() == 'categories/detail/' . $category->slug? 'active' : '' !!}">
                <a href="{{ route('categories.articlesByCategory', $category) }}"> {{ $category->name }}</a>
            </li>
        @endforeach

        <li class="nav-item {{ request()->routeIs('home.all')? 'active' : ''}}">
            <a href="{{route('home.all')}}">Categories</a>
        </li>

    </ul>
</div>
