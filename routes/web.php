<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    $logo = \App\Models\Logo::get()->first();
    $news = \App\Models\News::get()->first();
    $posts = \App\Models\Post::latest()->paginate(18);
    $post_randoms = \App\Models\Post::inRandomOrder()->take(10)->get();
    $post_recents = \App\Models\Post::latest()->take(10)->get();
    return view('welcome',compact('logo','news','posts','post_randoms','post_recents'));
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/secure/logo',\App\Http\Controllers\Backend\LogoController::class);
Route::get('/about',[\App\Http\Controllers\AboutController::class,'index'])->name('about');
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'index'])->name('contact');


//socialite login
Route::get('/login/{provider}', [LoginController::class,'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [LoginController::class,'handleProviderCallback'])->name('login.callback');


Route::get('{slug}',[PageController::class,'index'])->name('page');
