@extends('adminlte::page')

@section('title', 'Modificar categoría')

@section('content_header')
<h2>Modificar Categoría</h2>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="#" enctype="multipart/form-data">

            <div class="form-group"><input type="hidden" name="id" value=""></div>

            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="name" name='name' placeholder="Nombre de la categoría" value="">

                @error('name')
                <span class="text-danger">
                    <span>*{{ $message }}</span>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" id="slug" name='slug' placeholder="Nombre de la categoría" value="" readonly>

                @error('slug')
                <span class="text-danger">
                    <span>*{{ $message }}</span>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Cambiar imagen</label>
                <input type="file" class="form-control-file mb-2" id="image" name='image'>

                <div class="rounded mx-auto d-block">
                    <img src="" style="width: 250px">
                </div>

                @error('image')
                <span class="text-danger">
                    <span>*{{ $message }}</span>
                </span>
                @enderror
            </div>


            <label for="">Estado</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="">Privado</label>
                    <input class="form-check-input ml-2" type="radio" name='status' id="status" value="0">
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="">Público</label>
                    <input class="form-check-input ml-2" type="radio" name='status' id="status" value="1">
                </div>

                @error('status')
                <span class="text-danger">
                    <span>*{{ $message }}</span>
                </span>
                @enderror
            </div>

            <label for="">Destacado</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">No</label>
                    <input class="form-check-input ml-2" type="radio" name='is_featured' id="is_featured" value="0">
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">Si</label>
                    <input class="form-check-input ml-2" type="radio" name='is_featured' id="is_featured" value="1">
                </div>

                @error('is_featured')
                <span class="text-danger">
                    <span>*{{ $message }}</span>
                </span>
                @enderror
            </div>
            @can('category-edit')
                <input type="submit" value="Modificar categoría" class="btn btn-primary">
            @endcan
        </form>

    </div>
</div>
@endsection

