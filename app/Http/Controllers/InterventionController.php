<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterventionController extends Controller
{
    public function index(){
        if (auth()->guard('web')->check()) {
            $interventions = Intervention::all();
            // $interventions = Intervention::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();       
            $intervenants = User::where('id', auth()->user()->id)->get();
            $demandes = Demande::where('status', 'ACCEPTE')->orWhere('status','EN ATTENTE')->get();                 
            // $demandes = Demande::where('status', 'ACCEPTE')->orWhere('status','EN ATTENTE')->get();                 
            return view('dashboard.user.intervention.intervention', compact(['interventions', 'intervenants', 'demandes']));
        }
        elseif (auth()->guard('admin')->check()) {
            // $interventions = DB::table('interventions')->orderBy('id', 'desc')->get();
            $interventions = Intervention::all();
            $intervenants = User::all();
            // $intervenants = User::where('profile', 'utilisateur', )->get();
            $demandes = Demande::all();
            return view('dashboard.admin.intervention.intervention', compact(['interventions', 'intervenants', 'demandes']));
        }   
    }

    public function mesIntervention()
    {
        if (auth()->guard('web')->check()) {
            $interventions = Intervention::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();       
            $intervenants = User::where('id', auth()->user()->id)->get();
            // $intervenants = User::where('profile', 'utilisateur', )->get();
            $demandes = Demande::where('status', 'ACCEPTE')->orWhere('status','EN ATTENTE')->get();                 
            return view('dashboard.user.intervention.mesInterventions', compact(['interventions', 'intervenants', 'demandes']));
        }
        elseif (auth()->guard('admin')->check()) {
        }
    }

    public function create(Request $request)
    {
        if (auth()->guard('web')->check()) {
            # code...
        } 
        elseif (auth()->guard('admin')->check()) {
            $request->validate([
                // 'status'         => 'required',
                'type_depannage'       => 'required',
                'nature_probleme'       => 'required',
                'operation_effectuee'       => 'required',
                // 'date_depannage'       => 'required',
                'user_id'       => 'required',
                'demande_id'       => 'required',
            ]);        
    
            $intervention = new Intervention();
            $intervention->type_depannage = $request->type_depannage;
            $intervention->nature_probleme = $request->nature_probleme;
            $intervention->operation_effectuee = $request->operation_effectuee;
            // $intervention->date_depannage = $request->date_depannage;
            $intervention->user_id = auth()->user()->id;
            $intervention->demande_id = auth()->user()->id;
            $save = $intervention->save();
    
            if($save){
                // $demande = Demande::find($request->demande_id);
                // $demande->status = 'ACCEPTE';
                // $demande->update();
                return redirect()->back()->with('success', 'Votre intervention a bien été créé.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        }
        
    }

    public function createIntervention(Request $request)
    {
        if(auth()->guard('web')->check()){
            $request->validate([
                'type_depannage'       => 'required',
                'nature_probleme'       => 'required',
                'operation_effectuee'       => 'required',
                // 'date_depannage'       => 'required',
                'user_id'       => 'required',
                'demande_id'       => 'required',
            ]);
    
            $intervention = new Intervention();
            $intervention->type_depannage = $request->type_depannage;
            $intervention->nature_probleme = $request->nature_probleme;
            $intervention->operation_effectuee = $request->operation_effectuee;
            $intervention->date_depannage = auth()->user()->created_at;
            $intervention->user_id = $request->user_id;
            $intervention->demande_id = $request->demande_id;
            $save = $intervention->save();
        }
        elseif(auth()->guard('admin')->check()){
            $request->validate([
                'type_depannage'       => 'required',
                'nature_probleme'       => 'required',
                'operation_effectuee'       => 'required',
                // 'date_depannage'       => 'required',
                'user_id'       => 'required',
                'demande_id'       => 'required',
            ]);
    
            $intervention = new Intervention();
            $intervention->type_depannage = $request->type_depannage;
            $intervention->nature_probleme = $request->nature_probleme;
            $intervention->operation_effectuee = $request->operation_effectuee;
            $intervention->date_depannage = auth()->user()->created_at;
            $intervention->user_id = $request->user_id;
            $intervention->demande_id = $request->demande_id;
            $save = $intervention->save();
        }
        if($save){
            $demande = Demande::find($request->demande_id);
            $demande->status = 'ACCEPTE';
            $demande->update();            
            return redirect()->back()->with('success', 'Votre intervention a bien été créé.');
        }else{
            return redirect()->back()->with('fail','Une erreur s\'est produite.');
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->guard('web')->check()) {
            // if(auth()->user()->id == $id){
            $intervention = Intervention::find($id);
            $intervention->type_depannage = $request->type_depannage;
            $intervention->nature_probleme = $request->nature_probleme;
            $intervention->operation_effectuee = $request->operation_effectuee;
            // $intervention->date_depannage = $request->date_depannage;
            // $intervention->user_id = $request->user_id;
            // $intervention->demande_id = $request->demande_id;
            $intervention->status = $request->status;
            $save = $intervention->update();
             if($save){
                return redirect()->back()->with('success', 'Votre intervention a bien été créé.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        // }            
           
        } 
        elseif (auth()->guard('admin')->check()) {            

            $intervention = Intervention::find($id);
            $intervention->type_depannage = $request->type_depannage;
            $intervention->nature_probleme = $request->nature_probleme;
            $intervention->operation_effectuee = $request->operation_effectuee;
            // $intervention->date_depannage = $request->date_depannage;
            $intervention->user_id = $request->user_id;
            // $intervention->demande_id = $request->demande_id;
            $intervention->status = $request->status;
            $save = $intervention->update();
    
            if($save){
                return redirect()->back()->with('success', 'Votre intervention a bien été créé.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        }
    }

    public function destroy(string $id)
    {

    // Récupérer l'élément à supprimer
    $ticket = Intervention::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger et retourner une réponse JSON
    return redirect()->back()->with('success', 'L\'élément a été supprimé avec succès.');

    }
}
