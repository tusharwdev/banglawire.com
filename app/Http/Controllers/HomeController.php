<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function welcome(){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();
       return view('welcome', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories'));
   }

   public function gethomesubcategory(Request $request){
        $strsub = "";
        // <option>-se</option>
        $subcategories =  Subcategory::where([
            'category_id' => $request->category_id,
        ])->get();
        foreach ($subcategories as $subcategory) {

            $url = route('get.subcategory', $subcategory->id);
            $strsub .= "<li><a class='dropdown-item' href='$url'>" . $subcategory->subcategory_name . "</a></li>";

        }
        echo $strsub;
   }

   public function getcategory($id){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('category_id',$id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();

    return view('post.posts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories'));
   }

    public function getsubcategory($id)
    {

        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('subcategory_id', $id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();

        return view('post.posts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories'));
    }
}
