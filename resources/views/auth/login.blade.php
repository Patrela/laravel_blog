@extends('layouts.base')
@section('styles')
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet" >
@endsection

@section('title', 'Login')

@section('content')

    <form method="POST" class="form" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2>
        <div class="content-login">
            <div class="input-content">
                <input type="text" name="email" placeholder="email"
                    value="{{ old('email') }}" autofocus>

                    @error('email')
                        <span class="text-danger">
                            <span> * {{ $message}}</span>
                        </span>
                    @enderror

            </div>

            <div class="input-content">
                <input type="password" name="password" placeholder="password" value="">

                @error('password')
                <span class="text-danger">
                    <span> * {{ $message}}</span>
                </span>
            @enderror


            </div>
        </div>

        <a href="{{ route('password.request')}}" class="password-reset">Forgot your password?</a>

        <input type="submit" value="login" class="button">
    </form>

    <p>¿Don't have an account? <a href="{{ route('register')}}" class="link">Register</a></p>

@endsection
