@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1>Update Role</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('roles.update', $role)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Role Name</label>
                    <input type="text" class="form-control" id="name" name='name'
                            placeholder="Nombre del rol" value="{{$role->name}}">

                    @error('name')
                        <span class="text-danger">
                            <span>* {{ $message }}</span>
                        </span>
                    @enderror

                </div>
                <h3>Assign Permissions</h3>
                    @foreach($permissions as $permission)
                        <div>
                            <label>
                                <input type="checkbox" name="permissions[]" class="mr-1"
                                value="{{$permission->id}}" {{ $role->hasPermissionTo($permission->name)? 'checked' : ''}} >
                                {{$permission->description}}
                            </label>
                        </div>
                    @endforeach
                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
