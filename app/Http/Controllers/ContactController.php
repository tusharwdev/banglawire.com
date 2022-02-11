<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $logo = Logo::get()->first();
        $pages = Page::all();
        return view('contact_us',compact('logo','pages'));
    }
}
