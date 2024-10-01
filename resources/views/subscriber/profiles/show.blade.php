@extends('layouts.base')
@section('styles')
    <link href="{{asset('css/user/profile.css')}}" rel="stylesheet">
    <link href="{{asset('css/user/profile_article.css')}}" rel="stylesheet">
@endsection
@section('title','Perfil')
@section('content')
    <div class="description-profile">

        <div class="image-profile">
            <img src="{{ $profile->photo ? asset('storage/' . $profile->photo) : asset('img/user-default.png') }}" alt="{{$profile->user->full_name}}">
        </div>

        <div class="body-description-profile">
            <p>Nombre: {{$profile->user->full_name}}</p>
            <p>Profesion: {{$profile->profession}} </p>
            <p>Sobre mi: {{$profile->about}}</p>
            <div class="extra">
                <!-- Enlaces de las redes sociales -->
                <a href="{{$profile->facebook}}" target="_blank" class="social">Facebook</a>
                <a href="{{$profile->twitter}}" target="_blank" class="social">Twitter X</a>
                <a href="{{$profile->linkedin}}" target="_blank" class="social">Linkedin</a>
            </div>
        </div>

        @if ($profile->user_id == Auth::user()->id )
            <div class="edit-profile-view">
                <a href="{{route('profiles.edit', $profile)}}">Editar Perfil</a>
            </div>
        @endif
    </div>

    @if( count($articles) > 0)

        <div class="text-article">
            <h2 class="mb-5">Artículos publicados</h2>
        </div>

        <!-- Listar artículos -->
        @foreach ($articles as $article)
            <div class="article-container">

                <article class="article">
                    <img src="{{asset('storage/' . $article->image)}}" class="img">
                    <div class="card-body">
                        <a href="{{route('articles.show',$article)}}">
                            <h2 class="title">{{Str::limit($article->title, 70, '...') }}</h2>
                        </a>
                    </div>
                </article>

            </div>
        @endforeach
        <div class="links-paginate-profile">
            {{ $articles->links()}}
        </div>

    @endif
@endsection
