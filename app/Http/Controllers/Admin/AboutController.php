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
        'name' => 'string|max:255',
        'email' => 'email|max:255',
        'phone' => 'string|max:20|regex:/^\+?[0-9\s\-]+$/',
        'address' => 'string|max:255',
        'description' => 'string',
        'summary' => 'string',
        'tagline' => 'string|max:255',
        'home_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv' => 'file|mimes:pdf|max:5120'
    ]);

    // Récupère le dernier enregistrement About
    $about = About::latest()->first();

    // Met à jour les champs standards
    $about->fill($validatedData);

   
    // Gestion de home_image
    if ($request->hasFile('home_image')) {
        $oldImagePath = $about->home_image ? public_path("storage/images/{$about->home_image}") : null;
        if ($oldImagePath && file_exists($oldImagePath)) {
            // Supprime un fichier  Similaire à la fonction Unix C unlink(). En cas d'échec, une alerte de niveau E_WARNING sera générée.
            unlink($oldImagePath);
        }
        $file = $request->file('home_image');
        $fileName = time() . '_home_image.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/images'), $fileName);
        $about->home_image = $fileName;
    }

// Gestion de banner_image
if ($request->hasFile('banner_image')) {
    $oldBannerPath = $about->banner_image ? public_path("storage/images/{$about->banner_image}") : null;
    if ($oldBannerPath && file_exists($oldBannerPath)) {
        unlink($oldBannerPath);
    }
    $file = $request->file('banner_image');
    $fileName = time() . '_banner_image.' . $file->getClientOriginalExtension();
    $file->move(public_path('storage/images'), $fileName);
    $about->banner_image = $fileName;
}

// Gestion du CV
if ($request->hasFile('cv')) {
    // Suppression de l'ancien fichier si présent
    $oldCvPath = $about->cv ? public_path("storage/cvs/{$about->cv}") : null;
    if ($oldCvPath && file_exists($oldCvPath)) {
        unlink($oldCvPath);
    }
    // Upload du nouveau fichier
    $file = $request->file('cv');
    $fileName = time() . '_cv.' . $file->getClientOriginalExtension();
    $file->move(public_path('storage/cvs'), $fileName);
    $about->cv = $fileName;
}

    // // Définir les champs de fichiers et leurs dossiers respectifs
    // $fileFields = [
    //     'home_image' => 'storage/images',
    //     'banner_image' => 'storage/images',
    //     'cv' => 'storage/cvs'
    // ];

    // foreach ($fileFields as $field => $folder) {
    //     if ($request->hasFile($field)) {
    //         // Suppression de l'ancien fichier si présent
    //         $oldFilePath = $about->$field ? public_path("{$folder}/{$about->$field}") : null;
    //         if ($oldFilePath && file_exists($oldFilePath)) {
    //             unlink($oldFilePath);
    //         }

    //         // Upload du nouveau fichier
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
