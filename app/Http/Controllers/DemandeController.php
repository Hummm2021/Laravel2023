<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DemandeController extends Controller
{
    public function index(){
        if (auth()->guard('web')->check()) {
            // $demandes = Demande::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            $demandes = DB::table('demandes')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            return view('dashboard.user.demande.demande', compact('demandes'));
        }
        elseif (auth()->guard('admin')->check()) {
            // $demandes = Demande::all();
            $demandes = DB::table('demandes')->orderBy('created_at', 'desc')->get();
            $demandeurs = DB::table('users')->orderBy('name', 'asc')->get();
            $demandeRepondues = Demande::count();
            return view('dashboard.admin.demande.demande', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }        
    }

    public function demandeResolues(){
        if(auth()->guard('web')->check()){
            $demandes = DB::table('demandes')->where('user_id', auth()->user()->id)->where('status', 'RESOLUE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.user.demande.demandeResolues', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
        elseif(auth()->guard('admin')->check()){
            $demandes = DB::table('demandes')->where('status', 'RESOLUE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.admin.demande.demandeResolues', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
    }

    public function demandeAcceptees(){
        if(auth()->guard('web')->check()){
            $demandes = DB::table('demandes')->where('status', 'ACCEPTE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.user.demande.demandeAcceptees', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
        elseif(auth()->guard('admin')->check()){
            $demandes = DB::table('demandes')->where('status', 'ACCEPTE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.admin.demande.demandeAcceptees', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
    }

    public function demandeEnattente(){
        if(auth()->guard('web')->check()){
            $demandes = DB::table('demandes')->where('status', 'EN ATTENTE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.user.demande.demandeEnattente', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
        elseif(auth()->guard('admin')->check()){
            $demandes = DB::table('demandes')->where('status', 'EN ATTENTE')->orderBy('created_at', 'desc')->get();
            $demandeurs = User::all();
            $demandeRepondues = Demande::count();
            return view('dashboard.admin.demande.demandeEnattente', compact(['demandes', 'demandeurs', 'demandeRepondues']));
        }
    }

    public function create(Request $request)
    {
        if (auth()->guard('web')->check()) {    
            $request->validate([
                // 'status'         => 'required',
                'object'       => 'required',
                'description'       => 'required',
            ]);        
     
            $demande = new Demande();
            $demande->object = $request->object;
            $demande->description = $request->description;
            $demande->user_id = auth()->user()->id;
            $save = $demande->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre demande a bien été créé.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        } elseif (auth()->guard('admin')->check()) {
            $request->validate([
                // 'status'         => 'required',
                'object'       => 'required',
                'description'       => 'required',
                'user_id'       => 'required',
            ]);        
    
            $demande = new Demande();
            $demande->object = $request->object;
            $demande->description = $request->description;
            // $demande->user_id = auth()->user()->id;
            $demande->user_id = $request->user_id;
            $save = $demande->save();
    
            if($save){
                return redirect()->back()->with('success', 'Votre demande a bien été créé.');
            }else{
                return redirect()->back()->with('fail','Une erreur s\'est produite.');
            }
        }
        
    }

    public function show($id)
    {        
        if(auth()->guard('web')->check()){
            $demande = Demande::find($id);
            $interventions = Intervention::where('demande_id', $id)->get();
            $intervenants = User::where('id', auth()->user()->id)->get();
            // $intervenants = User::where('profile', 'utilisateur', )->get();
            $demandes = Demande::all();
            return view('dashboard.user.demande.show-demande', compact(['demande', 'interventions', 'intervenants', 'demandes']));
        }
        elseif(auth()->guard('admin')->check()){
            $demande = Demande::findOrFail($id);        
            $interventions = Intervention::where('demande_id', $id)->get();
    
            $intervenants = User::all();
            // $intervenants = User::where('profile', 'utilisateur', )->get();
            $demandes = Demande::all();
    
            return view('dashboard.admin.demande.show-demande', compact(['demande', 'interventions', 'intervenants', 'demandes']));        
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->guard('web')->check()){
            $demande = Demande::find($id);
            // $demande->status = $request->status;
            $demande->object = $request->object;
            $demande->description = $request->description;
            $update = $demande->update();

            if ($update){
                return redirect()->back();
            }
        }
        elseif(auth()->guard('admin')->check()){
            $demande = Demande::find($id);
            $demande->status = $request->status;
            $demande->object = $request->object;
            $demande->description = $request->description;
            $update = $demande->update();

            if ($update){
                return redirect()->back();
            }
        }

    }

    public function destroy(string $id)
    {

    if (auth()->guard('web')->check()) {
        // Récupérer l'élément à supprimer
    $ticket = Demande::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger et retourner une réponse JSON
    return redirect()->route('user.demande')->with('success', 'La demande a été supprimé avec succès.');

    } elseif (auth()->guard('admin')->check()) {
        // Récupérer l'élément à supprimer
    $ticket = Demande::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger et retourner une réponse JSON
    return redirect()->route('admin.demande')->with('success', 'La demande a été supprimé avec succès.');

    }
    
    }
}
