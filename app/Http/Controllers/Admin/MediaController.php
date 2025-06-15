<?php

namespace App\Http\Controllers\Admin;


use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return view('admin.medias.index-medias', compact('medias'));
    }
    

public function store(Request $request)
{
    $validatedData = $request->validate([
        'link' => 'required|url|max:255|active_url', // Validation renforcée
        'icon' => 'required|string|max:50|regex:/^[a-z0-9-]+$/i', // Format contrôlé
    ], [
        'link.required' => 'Le lien est obligatoire',
        'link.url' => 'Le lien doit être une URL valide (ex: https://...)',
        'link.active_url' => 'Le lien doit pointer vers un site actif',
        'link.max' => 'Le lien ne doit pas dépasser :max caractères',
        'icon.required' => 'Le code de l\'icône est obligatoire',
        'icon.regex' => 'Format d\'icône invalide (utilisez des lettres, chiffres ou tirets)',
        'icon.max' => 'Le code icône ne doit pas dépasser :max caractères',
    ]);

    Media::create($validatedData); // Utilisation de create() au lieu de new + save()

    return redirect()
        ->route('index-media')
        ->with('success', 'Réseau social ajouté avec succès');
}

public function destroy($id)
{
    $media = Media::findOrFail($id);
    $media->delete();
    
    return redirect()->route('index-media')
        ->with('delete-success', 'Média supprimé avec succès');
}

}