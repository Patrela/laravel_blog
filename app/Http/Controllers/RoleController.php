<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create','store');
        $this->middleware('can:roles.edit')->only('edit','update');
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    public function index()
    {
        $roles=Role::simplePaginate(env('APP_RECORDS_BY_PAGE'));
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        //request validation without file Request
        $request->validate(['name' => 'required']);
        $role = Role::create(['name' => $request->name]);
        //store permissions from array
        $permissions = $request->permissions;
        //Log::info( $permissions);
        $role->permissions()->sync( $permissions);
        return redirect()->action([RoleController::class, 'index'])->with(['success_message' => 'role created successfully']);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required']);
        // $role->name = $request->name;
        // $role->save();
        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);
        return redirect()->action([RoleController::class, 'index'])->with('success_message', 'role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete(); //includes permissions deletion. Doesn't need $role->syncPermissions([]);
        return redirect()->action([RoleController::class, 'index'])->with(['success_message' => 'role deleted successfully']);
    }
}
