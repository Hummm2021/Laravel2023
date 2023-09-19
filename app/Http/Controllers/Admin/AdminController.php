<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Ticket;

use App\Models\Demande;
use App\Models\Service;
use App\Models\Direction;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Models\SousDirection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $nombreDirections = Direction::count();
        $nombreSousDirection = SousDirection::count();
        $nombreUsers = User::where('profile', 'utilisateur')->count();
        $nombreTechnicien = User::where('profile', 'technicien')->count();
        return view('dashboard.admin.index', compact(['nombreDirections', 'nombreSousDirection', 'nombreUsers', 'nombreTechnicien']));        
    }
    
    public function login(){
        return view('dashboard.admin.login');
    }

    public function home(){
        $tickets = Ticket::all();
        $demandeEnvoyees = Demande::where('status', 'EN ATTENTE')->count();
        $demandeRepondues = Demande::where('status', 'ACCEPTE')->count();
        $demandeResolues = Demande::where('status', 'RESOLUE')->count();
        $totalDemandes = Demande::count();
        $interventions = Intervention::all();
        $intervenants = User::all();

        // infos graphiques des demandes par mois sur une année
        $janvier = Demande::whereMonth('created_at', '=', 1)->count();
        $janvierR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 1)->count();
        $fevrier = Demande::whereMonth('created_at', '=', 2)->count();
        $fevrierR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 2)->count();
        $mars = Demande::whereMonth('created_at', '=', 3)->count();
        $marsR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 3)->count();
        $avril = Demande::whereMonth('created_at', '=', 4)->count();
        $avrilR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 4)->count();
        $mai = Demande::whereMonth('created_at', '=', 5)->count();
        $maiR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 5)->count();
        $juin = Demande::whereMonth('created_at', '=', 6)->count();
        $juinR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 6)->count();
        $juillet = Demande::whereMonth('created_at', '=', 7)->count();
        $juilletR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 7)->count();
        $aout = Demande::whereMonth('created_at', '=', 8)->count();
        $aoutR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 8)->count();
        $septembre = Demande::whereMonth('created_at', '=', 9)->count();
        $septembreR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 9)->count();
        $octobre = Demande::whereMonth('created_at', '=', 10)->count();
        $octobreR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 10)->count();
        $novembre = Demande::whereMonth('created_at', '=', 11)->count();
        $novembreR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 11)->count();
        $decembre = Demande::whereMonth('created_at', '=', 12)->count();
        $decembreR = Demande::where('status', 'RESOLUE')->whereMonth('created_at', '=', 12)->count();
        // $intervenants = User::where('profile', 'utilisateur', )->get();
        $demandes = Demande::all();
        return view('dashboard.admin.home', compact(['tickets', 'demandeRepondues', 'demandeEnvoyees', 'demandeResolues', 'totalDemandes', 'interventions', 'intervenants', 'demandes', 'janvier', 'septembre', 'septembreR', 'fevrier', 'fevrierR', 'mars', 'marsR', 'avril', 'avrilR', 'mai', 'maiR', 'juin', 'juinR', 'juillet', 'juilletR', 'aout', 'aoutR', 'octobre', 'octobreR', 'novembre', 'novembreR', 'decembre', 'decembreR']));
    }

    public function ticket(){
        $tickets = Ticket::all();
        return view('dashboard.admin.ticket', compact('tickets'));
    }

    function check(Request $request){
        //validate input
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required',
        ], [
            'email.existe'=>'Cet email n\'est pas dans la BD'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Informations Incorrectes');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
