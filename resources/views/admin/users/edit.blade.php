@extends('adminlte::page')

@section('title', 'User Role')

@section('content_header')
<h1>Assign Roles</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <p>User Name:</p>
            <p class="form-control">{{$user->full_name}}</p>

            <h5>Roles</h5>
            <form action="{{route('users.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                @foreach($roles as $role)
                    <div>
                        <label>
                            <input type="radio" name="role" id="role" value="{{$role->id}}" {{$role->id == $user->roles->contains($role->id) ? 'checked' : ''}}
                             class="mr-1 mb-3">{{$role->name}}
                        </label>
                    </div>
                @endforeach
                <input type="submit" value="Assign" class="btn btn-primary">
            </form>
        </div>
    </div>
    @endsection

