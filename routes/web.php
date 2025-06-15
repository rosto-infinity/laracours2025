<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [PageController::class, 'index'])->name('home-page');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');
Route::patch('/admin/abouts', [AboutController::class,'update'])->name('update-about');

Route::get('/admin/medias', [MediaController::class,'index'])->name('index-media');
Route::post('/admin/medias', [MediaController::class,'store'])->name('store-media');


Route::get('/{any}', function () {
    return view('notFoundPage');
})->where('any', '.*')->name('not-found-page');
