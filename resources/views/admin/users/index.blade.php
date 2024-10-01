@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h1>Users and Roles</h1>
@endsection

@section('content')
    @if(session('success_message'))
        <div class="alert alert-info">
            {{session('success_message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col" colspan="2">Role Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{count($user->roles) >0? $user->roles->first()->name : ""}}</td>


                            <td width="10px"><a href="{{route('users.edit', $user)}}" class="btn btn-primary btn-sm mb-2">Assign</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('users.destroy', $user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-3">
                {{$users->links()}}
            </div>

        </div>
    </div>
@endsection



