<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
   
// });

Route::get("/", [PageController::class,"index"])->name("pages.home-page.index-home");
Route::get("/admin/dashboard",[DashboardController::class,"index"])->name("dashboard.admin");
Route::get("/admin/abouts",[AboutController::class,"edit"])->name("about.edit");

Route::get('/{any}',function () {
    return view('notFoundPage');
})->where('any', '.*')->name('not-found-page');  
