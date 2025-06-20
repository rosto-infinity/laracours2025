<?php

use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;

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
// Routes pour les educations (CRUD complet)
Route::prefix('/admin/educations')->group(function () {
    Route::get('/', [EducationController::class, 'index'])->name('index-education');
    Route::post('/', [EducationController::class, 'store'])->name('store-education');
    Route::get('/education/{education}/edit', [EducationController::class, 'edit'])->name('edit-education');
    Route::patch('/education/{education}/update', [EducationController::class, 'update'])->name('update-education');
    Route::delete('/{id}', [EducationController::class, 'destroy'])->name('destroy-education');
});
// Routes pour les experiences (CRUD complet)
Route::prefix('/admin/experiences')->group(function () {
    Route::get('/', [ExperienceController::class, 'index'])->name('index-experience');
    Route::post('/', [ExperienceController::class, 'store'])->name('store-experience');
    Route::get('/experience/{experience}/edit', [ExperienceController::class, 'edit'])->name('edit-experience');
    Route::patch('/experience/{experience}/update', [ExperienceController::class, 'update'])->name('update-experience');
    Route::delete('/{id}', [ExperienceController::class, 'destroy'])->name('destroy-experience');
});
// Routes pour les projets (CRUD complet)
Route::prefix('/admin/projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index-project');
    Route::post('/', [ProjectController::class, 'store'])->name('store-project');
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('edit-project');
    Route::patch('/project/{project}/update', [ProjectController::class, 'update'])->name('update-project');
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('destroy-project');
});
// Routes pour les testimonials (CRUD complet)
Route::prefix('/admin/testimonials')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('index-testimonial');
    Route::post('/', [TestimonialController::class, 'store'])->name('store-testimonial');
    Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('edit-testimonial');
    Route::patch('/testimonial/{testimonial}/update', [TestimonialController::class, 'update'])->name('update-testimonial');
    Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('destroy-testimonial');
});


Route::get('/{any}', function () {
    return view('notFoundPage');
})->where('any', '.*')->name('not-found-page');
