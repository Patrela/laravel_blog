@extends('layouts.base')
@section('styles')
    <link href="{{ asset('css/login/reset.css') }}" rel="stylesheet" >
@endsection

@section('title', 'Reset Email Password')

@section('content')
    <form method="POST" class="form" action="{{ route('password.email')}}">
        @csrf
        <h2 class="reset-title">Password reset email</h2>
        <p class="alert-send">Write your registered password</p>

        <div class="content-reset">
            <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}" required>

            @error('email')
            <span class="text-danger">
                *{{ $message }}
            </span>
            @enderror
        </div>
        <input type="submit" value="Send email" class="button">
        @if(session('status'))
            <div class="reminder">
                    <p class="alert-send">{{session('status')}}</p>
            </div>
        @endif
    </form>
@endsection
