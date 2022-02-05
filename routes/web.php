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
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('/secure/logo',\App\Http\Controllers\Backend\LogoController::class);


//socialite login
Route::get('/login/{provider}', [LoginController::class,'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [LoginController::class,'handleProviderCallback'])->name('login.callback');


Route::get('{slug}',[PageController::class,'index'])->name('page');
