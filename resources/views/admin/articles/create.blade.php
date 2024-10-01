@extends('adminlte::page')
@section('title', 'New Article')
@section('content-header')
    <h2>Create Article</h2>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" id="title" name='title'
                        placeholder="Ingrese el nombre del artículo" minlength="5" maxlength="255"
                        value="{{old('title')}}" oninput="slugify(this, 'slug')">
                    @error('title')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" id="slug" name='slug'
                        placeholder="Slug del artículo" readonly value="{{old('slug')}}">

                    @error('slug')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Introduction</label>
                    <input type="text" class="form-control" id="introduction" name='introduction'
                        placeholder="Ingrese la introducción del artículo" minlength="5" maxlength="255"
                        value="{{old('introduction')}}">

                        @error('introduction')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="">Load image</label>
                    <input type="file" class="form-control-file" id="image" name='image'>

                    @error('image')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror


                </div>

                <div class="form-group w-5">
                    <label for="">Article Body</label>
                    <textarea class="form-control" id="body" name="body"> {{old('body')}} </textarea>

                    @error('body')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <label for="">Status</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="">Private</label>
                        <input class="form-check-input ml-2" type="radio" name='status'
                        id="status" value="0" checked>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="">Public</label>
                        <input class="form-check-input ml-2" type="radio" name='status'
                        id="status" value="1">
                    </div>

                    @error('status')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id}}" {{ old('category_id')== $category->id ? "selected" : "" }}>{{ $category->name}}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <input type="submit" value="Add Article" class="btn btn-primary">
            </form>
        </div>
    </div>

@endsection

@section('js')
    <!-- Include the TinyMCE and Slugify functionality -->
    @include('components.editorTinyMCE')

    <script type="text/javascript" src="{{ asset('js/general.js') }}"></script>
@endsection