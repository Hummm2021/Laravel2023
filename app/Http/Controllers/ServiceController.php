<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Direction;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();
        $services = Service::all();
        return view('dashboard.admin.service.service', compact(['services', 'directions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->guard('admin')->check()) {
            $request->validate([
                'name'       => 'required',
                // 'initial'       => 'required',
                'direction_id' => 'required',
            ]);        
    
            $service = new Service();
            $service->name = $request->name;
            // $service->initial = $request->initial; 
            $service->direction_id = $request->direction_id;           
            $save = $service->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre service a bien été ajoutée.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->guard('admin')->check()) {
            // Récupérer l'élément à supprimer
        $ticket = Service::findOrFail($id);
    
        // Supprimer l'élément de la base de données
        $ticket->delete();
    
        // Rediriger et retourner une réponse JSON
        return redirect()->route('admin.service')->with('success', 'La service a été supprimé avec succès.');
    
        }
    }
}
