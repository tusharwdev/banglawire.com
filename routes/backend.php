<?php


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

Route::group(['as'=>'secure.','prefix'=>'secure','namespace'=>'\App\Http\Controllers\Backend','middleware' => ['auth']],function(){
    Route::get('/dashboard',DashboardController::class)->name('dashborad');

//    Logo

//    Roles and Users
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

//    Profile

    Route::get('profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile.index');
    Route::put('profile',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');

//  Security

    Route::get('profile/security',[\App\Http\Controllers\ProfileController::class,'changePassword'])->name('profile.password.change');
    Route::put('profile/security',[\App\Http\Controllers\ProfileController::class,'updatePassword'])->name('profile.password.update');

//    Backups
    Route::resource('backups',BackupController::class)->only(['index','store','destroy']);
    Route::get('backups/{file_name}',[\App\Http\Controllers\Backend\BackupController::class ,'download'])->name('backups.download');
    Route::delete('backup',[\App\Http\Controllers\Backend\BackupController::class ,'clean'])->name('backups.clean');
//Pages

    Route::resource('pages',PageController::class);

//Menu
    Route::resource('menus',MenuController::class)->except(['show']);

//Menu Builder Controller
    Route::group(['as' => 'menus.','prefix' => 'menus/{id}'],function (){
        Route::post('order',[\App\Http\Controllers\Backend\MenuBuilderController::class,'order'])->name('order');
        Route::get('builder',[\App\Http\Controllers\Backend\MenuBuilderController::class,'index'])->name('builder');

        Route::get('item/create',[\App\Http\Controllers\Backend\MenuBuilderController::class,'itemCreate'])->name('item.create');
        Route::post('item/create',[\App\Http\Controllers\Backend\MenuBuilderController::class,'itemStore'])->name('item.store');

        Route::get('item/{itemId}/edit',[\App\Http\Controllers\Backend\MenuBuilderController::class,'itemEdit'])->name('item.edit');

        Route::put('item/{itemId}/update',[\App\Http\Controllers\Backend\MenuBuilderController::class,'itemUpdate'])->name('item.update');
        Route::delete('item/{itemId}/destroy',[\App\Http\Controllers\Backend\MenuBuilderController::class,'itemDestroy'])->name('item.destroy');
    });

//    Setting

    Route::group(['as' => 'settings.','prefix' => 'settings'],function (){
        Route::get('general',[\App\Http\Controllers\Backend\SettingController::class,'general'])->name('general');
        Route::put('general',[\App\Http\Controllers\Backend\SettingController::class,'generalUpdate'])->name('general.update');

        Route::get('appearance',[\App\Http\Controllers\Backend\SettingController::class,'appearance'])->name('appearance');
        Route::put('appearance',[\App\Http\Controllers\Backend\SettingController::class,'appearanceUpdate'])->name('appearance.update');

        Route::get('mail',[\App\Http\Controllers\Backend\SettingController::class,'mail'])->name('mail');
        Route::put('mail',[\App\Http\Controllers\Backend\SettingController::class,'mailUpdate'])->name('mail.update');

        Route::get('socialite',[\App\Http\Controllers\Backend\SettingController::class,'socialite'])->name('socialite');
        Route::put('socialite',[\App\Http\Controllers\Backend\SettingController::class,'socialiteUpdate'])->name('socialite.update');
    });
});


