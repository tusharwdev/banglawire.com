<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

// Route::get('/', function () {
//     $logo = \App\Models\Logo::get()->first();
//     $news = \App\Models\News::get()->first();
//     $posts = \App\Models\Post::latest()->paginate(18);
//     $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
//     $post_recents = \App\Models\Post::latest()->take(10)->get();
//     $categories = \App\Models\Category::all();
//     return view('welcome',compact('logo','news','posts','post_randoms','post_recents', 'categories'));
// })->name('welcome');

//home page
Route::get('/',[HomeController::class,'welcome'])->name('welcome');
Route::post('/get/home/subcategory',[HomeController::class, 'gethomesubcategory']);
Route::get('/get/category/{category_id}',[HomeController::class, 'getcategory'])->name('get.category');
Route::get('/get/subcategory/{subcategory_id}',[HomeController::class, 'getsubcategory'])->name('get.subcategory');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/secure/logo',\App\Http\Controllers\Backend\LogoController::class);
Route::get('/about',[\App\Http\Controllers\AboutController::class,'index'])->name('about');
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'index'])->name('contact');

//Catrgory
Route::resource('secure/category',CategoryController::class);

//SubCatrgory
Route::resource('secure/subcategory',SubcategoryController::class);
Route::post('/get/subcategory', [SubcategoryController::class, 'getsubcategory']);


//socialite login
Route::get('/login/{provider}', [LoginController::class,'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [LoginController::class,'handleProviderCallback'])->name('login.callback');


Route::get('{slug}',[PageController::class,'index'])->name('page');


