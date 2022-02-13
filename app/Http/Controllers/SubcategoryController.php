<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use PhpOption\Option;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories'
        ]);

        Subcategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_name'=> $request->subcategory_name,
            'created_at'=> Carbon::now(),
        ]);
        notify()->success('New SubCategory Created !', 'Success');

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('backend.subcategory.create', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'subcategory_name' => 'required',
        ]);
        Subcategory::find($subcategory->id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'updated_at' => Carbon::now(),
        ]);

        notify()->success('SubCategory Updated!', 'Success');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        notify()->success('SubCategory Deleted!', 'Success');
        return back();
    }

    public function getsubcategory(Request $request)
    {
        $strsub = "<option value=''>- Select One -</option>";
        // <option>-se</option>
        $subcategories =  Subcategory::where([
            'category_id' => $request->category_id,
        ])->get();
        foreach($subcategories as $subcategory){
         $strsub .="<option value='$subcategory->id'>".$subcategory->subcategory_name."</option>";
        }
        echo $strsub;
    }

}
