<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Direction;
use Illuminate\Http\Request;
use App\Models\SousDirection;

class SousDirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sousDirections = SousDirection::all();
        $nombreSousDirections = SousDirection::count();
        $directions = Direction::all();
        $sousDirecteurs = User::all();
        return view('dashboard.admin.sousDirection.sousDirection', compact(['sousDirections', 'sousDirecteurs', 'directions', 'nombreSousDirections']));
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
                'initial'       => 'required',
                'direction_id'       => 'required',
                'user_id'       => 'required',
            ]);        
    
            $SousDirection = new SousDirection();
            $SousDirection->name = $request->name;
            $SousDirection->initial = $request->initial;
            $SousDirection->direction_id = $request->direction_id;
            $SousDirection->user_id = $request->user_id;            
            $save = $SousDirection->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre SousDirection a bien été ajoutée.');
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
                'initial'       => 'required',
                'direction_id'       => 'required',
                'user_id'       => 'required',
            ]);        
    
            $SousDirection = new SousDirection();
            $SousDirection->name = $request->name;
            $SousDirection->initial = $request->initial;
            $SousDirection->direction_id = $request->direction_id;
            $SousDirection->user_id = $request->user_id;            
            $save = $SousDirection->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre SousDirection a bien été ajoutée.');
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
        $ticket = SousDirection::findOrFail($id);
    
        // Supprimer l'élément de la base de données
        $ticket->delete();
    
        // Rediriger et retourner une réponse JSON
        return redirect()->route('admin.SousDirection')->with('success', 'La SousDirection a été rétiré avec succès.');
    
        }
    }
}
