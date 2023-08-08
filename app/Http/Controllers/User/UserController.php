<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Mail\TestMail;

use App\Models\Ticket;
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
        $TypesDeDemandes = [
            'Problème de connexion réseau',
            'Problème d\'alimentation',
            'Problème de vitesse ou de performance',
            'Problème de logiciel',
            'Problème de matériel',
            'Problème de périphérique',
            'Problème de sécurité',
            'Problème de sauvegarde ou de récupération de données',
            'Problème de maintenance',
            'Problème de compatibilité',
            'Problème de configuration',
            'Problème d\'affichage'
        ]; 

        $tickets = Ticket::all();

        return view('dashboard.user.home', compact('tickets'));
    }
    
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $save = $user->save();
        Mail::to('2021housseiny555@gmail.com')->send(new WelcomeUserMail);

        if($save){
            return redirect()->back()->with('success', 'Vous êtes maintenant inscrit');
        }else{
            return redirect()->back()->with('fail','Une erreur s\'est produite' );
        }

    }

//     public function register(Request $request)
// {
//     // Créer un nouvel utilisateur
//     $user = User::create([
//         'name' => $request->input('name'),
//         'email' => $request->input('email'),
//         'password' => bcrypt($request->input('password')),
//     ]);

//     // Envoyer un email à l'administrateur
//     Mail::to('admin@example.com')->send(new NewUserNotification($user));

//     // Rediriger l'utilisateur vers une page de confirmation
//     return redirect()->route('confirmation')->with('success', 'Votre inscription est en attente de confirmation.');
// }

    function check(Request $request){
        //validate inputs
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ], [
            'email.existe'=>'Cet email n\'est pas dans la BD'
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
        return redirect('/login');
    }
    


}
