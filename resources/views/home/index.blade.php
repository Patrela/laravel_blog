@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/manage_post/category.css')}}">
@endsection
@section('title', 'blog')
@section('content')

    @include('layouts.navbar')

    {{-- <div class="slogan">
        <div class="column1">
            <h2>BLOG PHP</h2>
        </div>
        <div class="column2">
            <p>Thanks to Edutin Academy for the <a href="https://edutin.com/curso-de-laravel" target="_blank" rel="noopener noreferrer">Laravel Course</a>.</p>
            <h4>These articles give tools to create Laravel Sites</h4>
        </div>
    </div> --}}

    <div class="article-container">
        @foreach ($articles as $article)
            <article class="article">
                <img src="{{ asset('storage/' . $article->image)}}" class="img">
                <div class="card-body">
                    <a href="{{ route('articles.show', $article) }}"> {{--<a href="{{ route('articles.show', $article->slug) }}">  --}}
                        <h2 class="title">{{ Str::limit($article->title, 60, '...')}}</h2>
                    </a>
                    <p class="introduction">{{ Str::limit($article->introduction, 100, '...')}}</p>
                </div>
            </article>
        @endforeach

    </div>
    <div class="links-paginate">
        {{ $articles->links()}}
    </div>
@endsection
