<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function welcome(){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(5)->get();
        $post_recents = \App\Models\Post::latest()->take(5)->get();
        $lfivepost = \App\Models\Post::latest()->take(5)->get();

        $categories = \App\Models\Category::inRandomOrder()->get();
        $fivecategories = \App\Models\Category::all()->take(5);

       return view('welcome', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories','lfivepost','fivecategories'));
   }


   public function getcategory($id){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('category_id',$id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();
        $subcategorie = Category::where('id', $id)->first();


    return view('post.posts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents','categories', 'subcategorie'));
   }

    public function getsubcategory($id)
    {
        // echo'hi';
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('subcategory_id', $id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();
        // $subcategorie = Subcategory::where('id',$id)->first();

        return view('post.subposts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories'));
    }
}
