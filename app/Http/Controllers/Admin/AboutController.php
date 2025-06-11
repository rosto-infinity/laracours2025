<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AboutController extends Controller
{
    public function index()
    {
        
    }

    public function edit()
    {
       $about = About::latest()->first();
    //    dd($about);
        return view('admin.abouts.edit-about',
            [
                'about' => $about,
            ]
        );
    }
   public function update(Request $request)
{
    // Validation des champs
    $validatedData = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20|regex:/^\+?[0-9\s\-]+$/',
        'address' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'summary' => 'nullable|string',
        'tagline' => 'nullable|string|max:255',
        'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv' => 'nullable|file|mimes:pdf|max:5120'
    ]);

    // Récupère le dernier enregistrement About
    $about = About::latest()->first();

    // Met à jour les champs standards
    $about->fill($validatedData);

    // // Gestion des fichiers
    // $fileFields = [
    //     'home_image' => 'images',
    //     'banner_image' => 'images',
    //     'cv' => 'cvs'
    // ];

    // Gestion de home_image
if ($request->hasFile('home_image')) {
    if ($about->home_image) {
        $oldImagePath = public_path("images/{$about->home_image}");
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }
    $file = $request->file('home_image');
    $fileName = time() . '_home_image.' . $file->getClientOriginalExtension();
    $file->move(public_path('images'), $fileName);
    $about->home_image = $fileName;
}

// Gestion de banner_image
if ($request->hasFile('banner_image')) {
    if ($about->banner_image) {
        $oldBannerPath = public_path("images/{$about->banner_image}");
        if (file_exists($oldBannerPath)) {
            unlink($oldBannerPath);
        }
    }
    $file = $request->file('banner_image');
    $fileName = time() . '_banner_image.' . $file->getClientOriginalExtension();
    $file->move(public_path('images'), $fileName);
    $about->banner_image = $fileName;
}

// Gestion du CV
if ($request->hasFile('cv')) {
    if ($about->cv) {
        $oldCvPath = public_path("cvs/{$about->cv}");
        if (file_exists($oldCvPath)) {
            unlink($oldCvPath);
        }
    }
    $file = $request->file('cv');
    $fileName = time() . '_cv.' . $file->getClientOriginalExtension();
    $file->move(public_path('cvs'), $fileName);
    $about->cv = $fileName;
}

    // foreach ($fileFields as $field => $folder) {
    //     if ($request->hasFile($field)) {
    //         // Suppression de l'ancien fichier
    //         if ($about->$field) {
    //             $oldFilePath = public_path("{$folder}/{$about->$field}");
    //             if (file_exists($oldFilePath)) {
    //                 unlink($oldFilePath);
    //             }
    //         }

    //         // Traitement du nouveau fichier
    //         $file = $request->file($field);
    //         $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path($folder), $fileName);
    //         $about->$field = $fileName;
    //     }
    // }

    // Sauvegarde des modifications
    $about->save();

    return redirect()->route('edit-about')-> with('success', 'Profil mis à jour avec succès');
}

    
   
}
