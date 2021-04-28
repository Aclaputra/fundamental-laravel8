<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is Home Page";
});

Route::get('/about ', function () {
    return view('about');
})->middleware('check');

Route::get('/contact-sdhsjah-sjd', [ContactController::class, 'index'])->name('con');

// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
// Soft Delete
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
// Restore
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
// Permanent Delete
Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

// For Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand']);
Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand']);
Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    $users = DB::table('users')->get();

    return view('dashboard',compact('users'));
})->name('dashboard');
