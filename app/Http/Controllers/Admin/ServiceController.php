<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index-services', compact('services'));
    }


    /**
     * Stocke un nouveau service
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'nullable|string|max:500'
        ], [
            'name.required' => 'Le nom du service est obligatoire',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'icon.required' => 'L\'icône est obligatoire',
            'icon.max' => 'L\'icône ne doit pas dépasser 50 caractères',
        ]);

// https://laravel.com/docs/12.x/eloquent

    $service = new Service($validatedData);
    $service->save();

        return redirect()->route('index-service')
            ->with('success', 'Service créé avec succès');
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit-service', compact('service'));
    }

    /**
     * Met à jour un service existant
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        $service = Service::findOrFail($id);
        $service->update($validatedData);

        return redirect()->route('index-service')
            ->with('success', 'Service mis à jour avec succès');
    }

    /**
     * Supprime un service
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('index-service')
            ->with('delete-success', 'Service supprimé avec succès');
    }
}
