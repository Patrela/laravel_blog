<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit','update');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::simplePaginate(env('APP_RECORDS_BY_PAGE')); // all()->
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //associate the role to the user and delete previous roles
        $user->roles()->sync($request->role);
        //return redirect()->route('users.edit', $user)->with('success_message', 'user role assigned successfully');
        return redirect()->action([UserController::class,'index'])->with('success_message', 'user role assigned successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // foreach($user->roles() as $role)
        // {
        //     //$role->delete();
        //     $user->roles()->detach($role->id);
        // }
        $user->roles()->detach();
        return redirect()->action([UserController::class,'index'])->with('success_message', 'user roles deleted successfully');
    }
}
