<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // $services = Service::latest()->get(); // Tri par date récente

        //Utilisation de la méthode filter du modèle  Service
        $servicesQuery = Service::filter($request);       
        $services = $servicesQuery->paginate(14); // Tri par date récente

        return view('admin.services.index-services', compact('services'));
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'icon' => 'required|string|max:50',
    'description' => 'required|string|max:500'
], [
    'name.required' => 'Le nom est requis.',
    'name.string' => 'Le nom doit être une chaîne de caractères.',
    'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
    
    'icon.required' => 'L\'icône est requise.',
    'icon.string' => 'L\'icône doit être une chaîne de caractères.',
    'icon.max' => 'L\'icône ne peut pas dépasser 50 caractères.',
    
    'description.required' => 'La description est requise.',
    'description.string' => 'La description doit être une chaîne de caractères.',
    'description.max' => 'La description ne peut pas dépasser 500 caractères.',
]);

        Service::create($validatedData);

        return redirect()->route('index-service')
            ->with('success', 'Service créé avec succès');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit-services', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'nullable|string|max:500'
        ]);

        $service->update($validatedData);

        return redirect()->route('index-service')
            ->with('success', 'Service mis à jour avec succès');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('index-service')
            ->with('delete-success', 'Service supprimé avec succès');
    }
}
