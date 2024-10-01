<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $this->authorize('view', $profile);
        return view('subscriber.profiles.edit', compact('profile'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $this->authorize('view', $profile);
        $articles = Article::where([['user_id', $profile->user_id],['status', '1']])
                ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        return view('subscriber.profiles.show', compact('profile', 'articles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile);
        $user= User::find(Auth::user()->id); //Auth::user();
        if($request->hasFile('photo') ){
            File::delete(public_path('/storage/profiles' .$request->photo));
            $photo = $request->photo->store('profiles');
        } else {
            $photo = $user->profile->photo;
        }
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->profile->photo= $photo;
        $user->profile->profession = $request->profession;
        $user->profile->about = $request->about;
        $user->profile->twitter = $request->twitter;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->facebook = $request->facebook;
        $user->save();
        $user->profile->save();
        return redirect()->route('profiles.edit',$user->profile->id );

    }

}
