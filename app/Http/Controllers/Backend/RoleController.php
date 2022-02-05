<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('secure.roles.index');
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('secure.roles.create');
        $modules = Module::all();
        return view('backend.roles.form',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('secure.roles.create');
        $this->validate($request,[
            'name' => 'required | unique:roles',
            'permissions' => 'required | array',
            'permissions*' => 'integer',
        ]);


        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ])->permissions()->sync($request->input('permissions'),[]);

        notify()->success('New Role Created !','Success');

        return redirect()->route('secure.roles.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('secure.roles.edit');
        $modules = Module::all();
        return view('backend.roles.form',compact('modules','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        Gate::authorize('secure.roles.create');
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ]);
        $role->permissions()->sync($request->permissions);
        notify()->success('Role Updated !','Success');
        return redirect()->route('secure.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('secure.roles.destroy');
        if ($role->deletable == 1){
            $role->delete();
            notify()->success('Role Deleted !','Success');
        }else{
            notify()->error('You cannot edit system role','Error !');

        }

        return back();
    }
}
