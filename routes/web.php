<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

//frontend routes
Route::get('/about', [HomeController::class, 'about'])->name('about');





//admin backend route
Route::get('/silder', [AdminController::class, 'silder'])->name('silder');
Route::post('/add/silder', [AdminController::class, 'storeSlider'])->name('StoreSlider');


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home',compact('brands'));
})->name('home');



//logout route
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



//dashboard route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();  //using qulecan ORM
    // $users = DB::table('users')->get();  //using query builder
    return view('admin.index');
})->name('dashboard');



//categorty routes
Route::get('/category', [CategoryController::class, 'show'])->name('category');
Route::post('/add/category', [CategoryController::class, 'store'])->name('StoreCategory');
Route::get('/category/edit/{id}', [CategoryController::class, 'editView']);
Route::post('/category/update/{id}', [CategoryController::class, 'edit'])->name('EditCategory');
Route::get('/category/delete/{id}', [CategoryController::class, 'softDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('/category/delete/permant/{id}', [CategoryController::class, 'permantDelete']);


//brand
Route::get('/brand', [BrandController::class, 'show'])->name('brand');
Route::post('/add/brand', [BrandController::class, 'store'])->name('StoreBrand');
Route::get('/brand/edit/{id}', [BrandController::class, 'editView']);
Route::post('/brand/update/{id}', [BrandController::class, 'edit']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);


//multi image
Route::get('/multi/images', [MultiImageController::class, 'show'])->name('multi_img');
Route::post('/add/multi/images', [MultiImageController::class, 'store'])->name('storeMultiImages');


//change password route
Route::get('user/password', [UserController::class, 'changePassword'])->name('change.password');
Route::post('update/password', [UserController::class, 'updatePassword'])->name('password.update');


//user profile route
Route::get('user/profile', [UserController::class, 'userProfile'])->name('user-profile.update');
Route::post('update/profile', [UserController::class, 'updateUserProfile'])->name('profile.update');
