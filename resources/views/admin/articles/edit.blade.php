@extends('adminlte::page')

@section('title', 'Edit Article')

@section('content_header')
<h2>Update Article</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('articles.update', $article)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group"><input type="hidden" name="id" value="{{$article->id}}"></div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" id="title" name='title' minlength="5"
                    maxlength="255" value="{{$article->title}}" oninput="slugify(this, 'slug')">

                    @error('title')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" id="slug" name='slug'
                    placeholder="Slug del artículo" readonly value="{{$article->slug}}">
                </div>

                <div class="form-group">
                    <label>Introduction</label>
                    <input type="text" class="form-control" id="introduction" name='introduction'
                    minlength="5" maxlength="255" value="{{$article->introduction}}">

                    @error('introduction')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Change image</label>
                    <input type="file" class="form-control-file mb-2" id="image" name='image'>

                    <div class="rounded mx-auto d-block">
                        <img src="{{ asset('storage/'. $article->image)}}" style="width: 250px">
                    </div>

                    @error('image')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Article Body</label>
                    <textarea class="form-control" id="body" name="body">{{$article->body}}</textarea>

                    @error('body')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>

                <label>Status</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">Private</label>
                        <input class="form-check-input ml-2" type="radio" name='status' id="status" value="0" {{$article->status == 0? "checked": ""}}>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">Public</label>
                        <input class="form-check-input ml-2" type="radio" name='status' id="status" value="1" {{$article->status == 1? "checked": ""}}>
                    </div>

                    @error('status')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" id="category_id">
                        <option>Seleccione una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id}}" {{ $article->category_id == $category->id ? "selected" : "" }}>{{ $category->name}}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>
                <input type="submit" value="Modify Article" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

@section('js')
    <!-- Include the TinyMCE and Slugify functionality -->
    @include('components.editorTinyMCE')

    <script type="text/javascript" src="{{ asset('js/general.js') }}"></script>
@endsection
