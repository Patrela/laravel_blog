@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
<h1>New Role</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('roles.store')}}"">
            @csrf
            @method('POST')
            <div class="form-group">
                <label>Role Name</label>
                <input type="text" class="form-control" id="name" name='name' placeholder="Role Name"
                    value="{{ old('name') }}">

                @error('name')
                    <span class="text-danger">
                        <span>* {{ $message }}</span>
                    </span>
                @enderror

            </div>
            <h3>Assign Permissions</h3>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        <input type="checkbox" name="permissions[]" id="" value="{{$permission->id}}" class="mr-1">{{$permission->description}}

                    </label>
                </div>
            @endforeach
            <input type="submit" value="Create" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
