<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('secure.menus.index');
        $menus = Menu::latest('id')->get();
        return view('backend.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('secure.menus.create');
        return view('backend.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('secure.menus.create');
        $this->validate($request,[
            'name' => 'required|string|unique:menus',
            'description' => 'nullable|string',
        ]);

        Menu::create([
            'name' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'deleteable' => true
        ]);
        notify()->success('Menu Added','Success');
        return redirect()->route('secure.menus.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        Gate::authorize('secure.menus.edit');
        return view('backend.menus.form',compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        Gate::authorize('secure.menus.create');
        $this->validate($request,[
            'name' => 'required|string|unique:menus,name,'.$menu->id,
            'description' => 'nullable|string',
        ]);

        $menu->update([
            'name' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'deleteable' => true
        ]);
        notify()->success('Menu Updated','Success');
        return redirect()->route('secure.menus.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Gate::authorize('secure.menus.destroy');
        if ($menu->deleteable == true){
            $menu->delete();
            notify()->success('Menu Deleted','success');
        }else{
            notify()->error("Sorry you Can't Delete System Menu",'Error');
        }
        return back();
    }
}
