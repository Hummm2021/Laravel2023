<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();
        $nombreDirections = Direction::count();
        return view('dashboard.admin.direction.direction', compact(['directions', 'nombreDirections']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (auth()->guard('admin')->check()) {
            $request->validate([
                // 'status'         => 'required',
                'name'       => 'required',
                // 'initial'       => 'required',
            ]);        
    
            $direction = new Direction();
            $direction->name = $request->name;
            // $direction->initial = $request->initial;            
            $save = $direction->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre direction a bien été ajoutée.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->guard('admin')->check()) {
            $request->validate([
                // 'status'         => 'required',
                'name'       => 'required',
                // 'initial'       => 'required',
            ]);        
    
            $direction = new Direction();
            $direction->name = $request->name;
            // $direction->initial = $request->initial;            
            $save = $direction->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre direction a bien été ajoutée.');
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
        $ticket = Direction::findOrFail($id);
    
        // Supprimer l'élément de la base de données
        $ticket->delete();
    
        // Rediriger et retourner une réponse JSON
        return redirect()->route('admin.direction')->with('success', 'La direction a été rétiré avec succès.');
    
        }
    }
}
