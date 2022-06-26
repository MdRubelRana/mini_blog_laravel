<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/',  [FrontendController::class, 'home'])->name('/');
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/post',  [FrontendController::class, 'post'])->name('post');

// Route::get('/', function () {
//     return view('website.index');
// }) -> name('/');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/category', function(){
//     return view('website.category');
// });
// Route::get('/post', function(){
//     return view('website.post');
// });



// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
});