<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    function index(){
        $demandes = Demande::all();
        // $demande = Demande::find($id);
        // $userId = $demandes->user->id;

        
        return view('dashboard.demande.demande', compact('demandes'));
    }

    public function create(Request $request)
    {
        $request->validate([
            // 'status'         => 'required',
            'object'       => 'required',
            'description'       => 'required',
        ]);        

        $demande = new Demande();
        $demande->object = $request->object;
        $demande->description = $request->description;
        $save = $demande->save();

        if($save){
            return redirect()->back()->with('success', 'Votre demande a bien été créé.');
        }else{
            return redirect()->back()->with('fail','Une erreur s\'est produite.');
        }
    }

    public function destroy(string $id)
    {

    // Récupérer l'élément à supprimer
    $ticket = Demande::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger et retourner une réponse JSON
    return redirect()->route('user.demande')->with('success', 'L\'élément a été supprimé avec succès.');

    }
}
