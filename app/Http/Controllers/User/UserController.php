<?php

namespace App\Http\Controllers\User;

use App\Models\User;
// use App\Mail\TestMail;

use App\Models\Ticket;
use App\Models\Demande;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Mail\WelcomeUserMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(){
        return view('dashboard.user.register');
    }
    public function login(){
        return view('dashboard.user.login');
    }

    public function home(){
        $demandes = Demande::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $interventions = Intervention::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();       
        $intervenants = User::where('id', auth()->user()->id)->get();
        // $intervenants = User::where('profile', 'utilisateur', )->get();
        return view('dashboard.user.demande.demande', compact(['demandes', 'interventions', 'intervenants']));
}
    
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'],
            [
                'email.unique' => 'Email déja utilisé, veuillez utiliser un autre email.',
                'password.min' => 'Votre mot de passe doit avoir au moins 8 caractères.',
                'cpassword.same' => 'Entrez le même mot de passe SVP.',
                'email.required' => 'Email requis',
                'password.required' => 'Mot de passe requis',
                'cpassword.required' => 'Confirmation du mot de passe requis',
                'name.required' => 'Nom requis',
                'surname.required' => 'Prénoms requis'
            ] 
        );

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $save = $user->save();
        Mail::to('2021housseiny555@gmail.com')->send(new WelcomeUserMail);

        if($save){
            return redirect()->route('user.login')->with('success', 'Vous êtes inscrit maintenant.');
        }else{
            return redirect()->back()->with('fail','Une erreur s\'est produite.' );
        }

    }

    // public function profile($id){
    //     $user = User::find($id);
    //     return view('dashboard.user.profile', compact('user'));
    // }

    public function profile(){
        // $user = User::find($id);
        return view('dashboard.user.profile');
    }


    function check(Request $request){
        //validate inputs
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ], [
            'email.exists'=>'Veuillez entrer des informations correctes.',
            'email.required'=>'Email requis',
            'password.required'=>'Mot de passe requis'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail', 'Informations Incorrecte');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/user/login');
    }
    


}
