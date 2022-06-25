<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('website.index');
}) -> name('/');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/category', function(){
    return view('website.category');
});
Route::get('/post', function(){
    return view('website.post');
});



// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    });
    // Route::get('category', 'App\Http\Controllers\CategoryController@index');
    // Route::get('category/create', 'App\Http\Controllers\CategoryController@create') -> name('category.create');
    // Route::get('category', [CategoryController::class, 'index']);


Route::resource('category', CategoryController::class);

// Route::get("category", [CategoryController::class, 'index']) -> name('category');
// Route::get("category/create", [CategoryController::class, 'create']) -> name('category.create');
// Route::post("/category/saved", [CategoryController::class, 'store']) -> name('category.saved');
// Route::post("/saved", [CategoryController::class, 'store']);
});