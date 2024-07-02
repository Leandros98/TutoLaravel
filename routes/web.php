<?php

use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Routing\RouteRegistrar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/new','create')->name('create');
    Route::post('/new','store');
    Route::get('/{post}/edit')->name('edit');
    Route::patch('/{post}/edit','update');
});

*/
$idRegex='[0-9]+';
$slugRegx='[0-9a-z\-]+';
Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/biens',[\App\Http\Controllers\PropertiController::class,'index'])->name('properti.index');
/*Route::get('/biens/{{slug}}-{{property}}',[\App\Http\Controllers\PropertiController::class,'show'])->name('properti.show')->where([
   'property'=>$idRegex,
   'slug'=>$slugRegx
]); */
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertiController::class, 'show'])
     ->name('properti.show')
     ->where([
         'property' => '[0-9]+',
         'slug' => '[a-zA-Z0-9-]+',
     ]);
     Route::get('/biens/{property}/contact', [\App\Http\Controllers\PropertiController::class, 'contact'])
     ->name('properti.contact')
     ->where([
         'property' => '[0-9]+'
     ]);
     Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('login');
     Route::post('/login',[\App\Http\Controllers\AuthController::class, 'doLogin']);
     Route::delete('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

     /* avec l'acces de tous les utilisateurs
     Route::prefix('/admin')->name('admin.')->group(function(){
    Route::resource('property',\App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option',\App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
*/
//avec authentification ajout middleware auth

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property',\App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option',\App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
