@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@endsection

@section('content')
    @if(session('success_message'))
        <div class="alert alert-info">
            {{session('success_message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('roles.create')}}">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id}}</td>
                            <td>{{ $role->name}}</td>

                            <td width="10px"><a href="{{route('roles.edit',$role)}}" class="btn btn-primary btn-sm mb-2">Edit</a></td>

                            <td width="10px">
                                <form action="{{route('roles.destroy',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
