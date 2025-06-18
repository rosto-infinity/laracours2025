<?php

use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [PageController::class, 'index'])->name('home-page');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');
Route::patch('/admin/abouts', [AboutController::class,'update'])->name('update-about');

// Routes pour les médias
Route::prefix('/admin/medias')->group(function () {
    Route::get('/', [MediaController::class, 'index'])->name('index-media'); // Liste
    Route::post('/', [MediaController::class, 'store'])->name('store-media'); // Traitement créationt modification
   Route::delete('/{id}', [MediaController::class, 'destroy'])->name('destroy-media'); // Suppression (corrigé "madiasdestroy")
});

// Routes pour les services (CRUD complet)
Route::prefix('/admin/services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index-service');
    Route::post('/', [ServiceController::class, 'store'])->name('store-service');
    Route::get('/service/{service}/edit', [ServiceController::class, 'edit'])->name('edit-service');
    Route::patch('/service/{service}/update', [ServiceController::class, 'update'])->name('update-service');
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy-service');
});
// Routes pour les services (CRUD complet)
Route::prefix('/admin/skills')->group(function () {
    Route::get('/', [SkillController::class, 'index'])->name('index-skill');
    Route::post('/', [SkillController::class, 'store'])->name('store-skill');
    Route::get('/skill/{skill}/edit', [SkillController::class, 'edit'])->name('edit-skill');
    Route::patch('/skill/{skill}/update', [SkillController::class, 'update'])->name('update-skill');
    Route::delete('/{id}', [SkillController::class, 'destroy'])->name('destroy-skill');
});


Route::get('/{any}', function () {
    return view('notFoundPage');
})->where('any', '.*')->name('not-found-page');
