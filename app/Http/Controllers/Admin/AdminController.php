<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // var $tickets = Ticket::all();
    
    public function login(){
        return view('dashboard.admin.login');
    }

    public function home(){
        $tickets = Ticket::all();
        return view('dashboard.admin.home', compact('tickets'));
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
        return redirect('/');
    }
}
