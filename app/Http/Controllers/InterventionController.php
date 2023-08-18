<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    function index(){
        $demandes = Intervention::all();
        // $demande = Demande::find($id);
        // $userId = $demandes->user->id;

        
        return view('dashboard.demande.demande', compact('demandes'));
    }

    public function create(Request $request)
    {
        $request->validate([
            // 'status'         => 'required',
            'type_depannage'       => 'required',
            'nature_probleme'       => 'required',
            'operation_effectuee'       => 'required',
            'date_depannage'       => 'required',
        ]);        

        $demande = new Intervention();
        $demande->type_depannage = $request->type_depannage;
        $demande->nature_probleme = $request->nature_probleme;
        $demande->operation_effectuee = $request->operation_effectuee;
        $demande->date_depannage = $request->date_depannage;
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
    $ticket = Intervention::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger et retourner une réponse JSON
    return redirect()->route('user.demande')->with('success', 'L\'élément a été supprimé avec succès.');

    }
}
