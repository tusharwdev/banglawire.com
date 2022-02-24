<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Post;
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
        $facategories_zero = Post::where('category_id',$fivecategories[0]->id)->take(6)->get();
        $facategories_one = Post::where('category_id',$fivecategories[1]->id)->take(6)->get();
        $facategories_two = Post::where('category_id',$fivecategories[2]->id)->take(2)->get();
        $facategories_three = Post::where('category_id',$fivecategories[3]->id)->paginate(6);

       return view('welcome', compact(
            'logo',
            'news',
            'posts',
            'post_randoms',
            'post_recents',
            'categories',
            'lfivepost',
            'fivecategories',
            'facategories_zero',
            'facategories_one',
            'facategories_two',
            'facategories_three',
        ));
   }


   public function getcategory($id){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('category_id',$id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();
        $subcategorie = Category::where('id', $id)->first();
    return view('post.category_posts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents','categories', 'subcategorie'));
   }

    public function getsubcategory($id)
    {
        // return
        // // // echo'hi';
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::where('subcategory_id', $id)->latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
        $post_recents = \App\Models\Post::latest()->take(10)->get();
        $categories = \App\Models\Category::all();
        $subcategories = Subcategory::where('id',$id)->first();


        return view('post.subcategory_posts', compact('logo', 'news', 'posts', 'post_randoms', 'post_recents', 'categories', 'subcategories'));
    }

    public function postsdetails($id){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(5)->get();
        $post_recents = \App\Models\Post::latest()->take(5)->get();
        $lfivepost = \App\Models\Post::latest()->take(5)->get();
        $post_info = \App\Models\Post::find($id);

        $categories = \App\Models\Category::inRandomOrder()->get();

        return view('news_details', compact(
            'logo',
            'news',
            'posts',
            'post_randoms',
            'post_recents',
            'categories',
            'post_info',

        ));
        // return $id;

    }

    public function newsdetails($id){
        $logo = \App\Models\Logo::get()->first();
        $news = \App\Models\News::get()->first();
        $posts = \App\Models\Post::latest()->paginate(18);
        $post_randoms = \App\Models\Post::inRandomOrder()->take(5)->get();
        $post_recents = \App\Models\Post::latest()->take(5)->get();
        $lfivepost = \App\Models\Post::latest()->take(5)->get();
        $post_info = \App\Models\News::find($id);

        $categories = \App\Models\Category::inRandomOrder()->get();

        return view('one_news_details', compact(
            'logo',
            'news',
            'posts',
            'post_randoms',
            'post_recents',
            'categories',
            'post_info',

        ));
    }
}
