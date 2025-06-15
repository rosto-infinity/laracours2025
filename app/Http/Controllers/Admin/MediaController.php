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
    // Validation des données
    $validatedData = $request->validate([
        'link' => 'required|url|max:255',
        'icon' => 'required|string|max:50',
    ], [
        'link.required' => 'Le lien est obligatoire',
        'link.url' => 'Le lien doit être une URL valide',
        'link.max' => 'Le lien ne doit pas dépasser 255 caractères',
        'icon.required' => 'L\'icône est obligatoire',
        'icon.max' => 'L\'icône ne doit pas dépasser 50 caractères',
    ]);

    // Création du média avec les données validées
    $media = new Media();
    $media->link = $validatedData['link'];
    $media->icon = $validatedData['icon'];
    $media->save();

    return redirect()->route('index-media')->with('success', 'Réseau social ajouté avec succès');
}
public function destroy($id)
{
    $media = Media::findOrFail($id);
    $media->delete();
    
    return redirect()->route('index-media')
        ->with('delete-success', 'Média supprimé avec succès');
}

}