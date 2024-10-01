@extends('layouts.base')
@section('styles')
    <link href="{{asset('css/user/profile.css')}}" rel="stylesheet">
    <link href="{{asset('css/user/profile_article.css')}}" rel="stylesheet">
@endsection
@section('title','Edit Profile')
@section('content')
    <div class="btn-article">
        <a href="{{ route('home.index')}}" class="btn-new-article">⬅</a>
    </div>

    <div class="main-content">
        <div class="title-page-admin">
            <h2>Edit Profile</h2>
        </div>
        <form method="POST" action="{{ route('profiles.update', $profile)}}" enctype="multipart/form-data" class="form-article">
            @csrf
            @method('PUT')
            <div class="content-create-article">

                <div class="input-content">
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" placeholder="Full Name"
                        value="{{ $profile->user->full_name }}" autofocus>

                    @error('full_name')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="input-content">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="email" value="{{ $profile->user->email }}"
                        autofocus>

                    @error('email')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="input-content">
                    <label for="profession">Occupation:</label>
                    <input type="text" name="profession" placeholder="Occupation or Profession"
                        value="{{ $profile->profession }}" autofocus>

                    @error('profession')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="input-content">
                    <label for="about">About:</label>
                    <input type="text" name="about" placeholder="About you"
                        value="{{ $profile->about }}" autofocus>

                    @error('about')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <h2>Social Networks</h2>
                <div class="input-content">
                    <label for="twitter">twitter X:</label>
                    <input type="text" name="twitter" placeholder="Twitter X Account"
                        value="{{ $profile->twitter }}" autofocus>

                    @error('twitter')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>
                <div class="input-content">
                    <label for="linkedin">linkedin:</label>
                    <input type="text" name="linkedin" placeholder="linkedin Account"
                        value="{{ $profile->linkedin }}" autofocus>

                    @error('linkedin')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>

                <div class="input-content">
                    <label for="facebook">facebook:</label>
                    <input type="text" name="facebook" placeholder="facebook Account"
                        value="{{ $profile->facebook }}" autofocus>

                    @error('facebook')
                        <span class="text-danger">
                            <span>* {{$message}}</span>
                        </span>
                    @enderror

                </div>
                <h2>Profile Photo</h2>
                <div class="input-content">
                    {{-- <label for="image">Profile Photo</label> <br> --}}
                    <input type="file" id="photo" accept="image/*" name="photo" class="form-input-file">
                    @if($profile->photo)
                        <label>Current Photo</label>
                        <div class="img-article">
                            <img src="{{asset('storage/' . $profile->photo)}}" class="img">
                        </div>

                        @error('image')
                            <span class="text-danger">
                                <span>* {{$message}}</span>
                            </span>
                        @enderror
                    @endif
                </div>

                <input type="submit" value="Save" class="button">
        </form>
    </div>
@endsection
