<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
