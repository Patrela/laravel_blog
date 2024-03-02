<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @include('layouts.navbar', ['navbar' => $navbar])
    <x-slot name="slot">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{__('Dashboard')}}
                    </div>
                    <div class="slogan">
                        <div class="column1">
                            <h2>BLOG</h2>
                        </div>
                        <div class="column2">
                            <p>Hemos ayudado a más de 1 millon de personas a crecer
                               profesionalmente. Estos artículos comparten concejos
                               para la búsqueda de empleo, la productividad y el éxito
                               laboral en diferentes áreas del conocimiento.</p>
                        </div>
                    </div>

                    <div class="article-container">
                        <!-- Listar artículos -->
                        <article class="article">
                            <img src="" class="img">
                            <div class="card-body">
                                <a href="#">
                                    <h2 class="title"></h2>
                                </a>
                                <p class="introduction"></p>
                            </div>
                        </article>
                    </div>
                    <div class="links-paginate">
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                        <pre>
                            {{ var_dump($navbar)}}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
