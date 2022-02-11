<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $logo = \App\Models\Logo::get()->first();
        $pages = Page::all();
        return view('about',compact('logo','pages'));
    }
}
