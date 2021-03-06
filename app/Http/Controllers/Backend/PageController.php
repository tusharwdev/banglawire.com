<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('secure.pages.index');
        $pages = Page::latest('id')->get();
        return view('backend.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('secure.pages.create');
        return view('backend.pages.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('secure.pages.create');
        $this->validate($request,[
           'title' => 'required|string|unique:pages',
           'body' => 'required|string',
           'image' => 'nullable|image',
        ]);
//store data
        $page = Page::create([
           'title' => $request->title,
           'slug' => Str::slug($request->title),
           'excrept' => $request->excerpt,
           'body' => $request->body,
           'meta_description' => $request->meta_description,
           'meta_keywords' => $request->meta_keywords,
           'status' => $request->filled('status')
        ]);

//        upload image

            if ($request->hasFile('image')){
                $page->addMedia($request->image)
                    ->toMediaCollection('image');
            }
            notify()->success('Page Added','Success');
            return redirect()->route('secure.pages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        Gate::authorize('secure.pages.edit');
        return view('backend.pages.form',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        Gate::authorize('secure.pages.edit');
        $this->validate($request,[
            'title' => 'required|string|unique:pages,title,'.$page->id,
            'body' => 'required|string',
            'image' => 'nullable|image',
        ]);
//update data
        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excrept' => $request->excerpt,
            'body' => $request->body,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->filled('status')
        ]);

//        upload image

        if ($request->hasFile('image')){
            $page->addMedia($request->image)
                ->toMediaCollection('image');
        }
        notify()->success('Page Updated','Success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        Gate::authorize('secure.pages.destroy');
        $page->delete();
        notify()->success('Page Deleted','Success');
        return back();
    }
}
