@extends('layouts.base')
@section('styles')
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet" >
@endsection

@section('title', 'Register')

@section('content')
    <form method="POST" class="form" action="{{ route('register')}}" novalidate>
        @csrf
        <h2>Register</h2>
        <div class="content-login">
            <div class="input-content">
                <input type="text" name="name" placeholder="Name"
                    value="{{ old('name') }}"
                    autofocus>

                    @error('full_name')
                        <span class="text-danger">
                            <span> * {{ $message}}</span>
                        </span>
                    @enderror
            </div>

            <div class="input-content">
                <input type="text" name="full_name" placeholder="Full Name"
                    value="{{ old('full_name') }}"
                    autofocus>

                    @error('full_name')
                        <span class="text-danger">
                            <span> * {{ $message}}</span>
                        </span>
                    @enderror
            </div>

            <div class="input-content">
                <input type="text" name="email" placeholder="Email"
                    value="{{ old('email') }}"
                    autofocus>

                    @error('email')
                        <span class="text-danger">
                            <span> * {{ $message}}</span>
                        </span>
                    @enderror
            </div>

            <div class="input-content">
                <input type="password" name="password" placeholder="Password">

                @error('password')
                <span class="text-danger">
                    <span> * {{ $message}}</span>
                </span>
            @enderror

            </div>

            <div class="input-content">
                <input type="password" name="password_confirmation" placeholder="Confirm password">
            </div>
        </div>

        <input type="submit" value="Create Account" class="button">
        <p>¿Just have an account? <a href="{{ route('login') }}" class="link">Login</a></p>
    </form>
@endsection
