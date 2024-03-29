@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
<h2>Administra tus categorías</h2>
@endsection

@section('content')

<div class="card">

    <div class="card-header">
        @can('category-create')
            <a class="btn btn-primary" href="#">Crear categoría</a>
        @endcan
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Destacado</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td></td>
                    <td>
                        <input type="checkbox" name="status" id="status" class="form-check-input ml-3"
                            disabled>
                    </td>
                    <td>
                        <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input ml-4"
                            disabled>
                    </td>


                    <td width="10px"><a href="#"
                            class="btn btn-primary btn-sm mb-2">Editar</a>
                            @can('category-edit')
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                            @endcan
                    </td>

                    <td width="10px">
                        <form action="#" method="POST">
                            @can('category-delete')
                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                            @endcan
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>

        <div class="text-center mt-3">

        </div>
    </div>
</div>
@endsection
