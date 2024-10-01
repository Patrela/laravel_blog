@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/manage_post/category.css')}}">
@endsection
@section('title', 'Categories')
@section('content')

    @include('layouts.navbar')
    <div class="text-primary">
        <h2>CATEGORIES</h2>
    </div>

    <div class="article-container">
        <!-- Listar categorías -->
        @foreach($categories as $category)
            <article class="article category">
                <img src="{{ asset('storage/' . $category->image )}}" class="img">
                <div class="card-body">
                    <a href="{{ route('categories.articlesByCategory', $category) }}">
                        <h2 class="title category fs-4">{{$category->name}} </h2>
                    </a>
                </div>
            </article>
        @endforeach

    </div>

    <div class="links-paginate">
        {{$categories->links()}}
    </div>
@endsection
