<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PageController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

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
    // Affichage de la liste
    Route::get('/', [ServiceController::class, 'index'])->name('index-service');
    
    // Création
    Route::get('/create', [ServiceController::class, 'create'])->name('create-service');
    Route::post('/', [ServiceController::class, 'store'])->name('store-service');
    
    // Édition
    Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit-service');
    Route::put('/{id}', [ServiceController::class, 'update'])->name('update-service');
    
    // Suppression
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy-service');
    
    // Routes supplémentaires optionnelles
    Route::get('/{id}', [ServiceController::class, 'show'])->name('show-service'); // Détail d'un service
});


Route::get('/{any}', function () {
    return view('notFoundPage');
})->where('any', '.*')->name('not-found-page');
