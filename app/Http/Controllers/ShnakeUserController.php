<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    Public function index(){
        return view('login');
    }

    public function store(Request $request){
        User::create([
            'user' => $request->user,
            'password' => $request->password
        ]);

        dd('User créé avec succès');
        // dd($request->content); 
    }
}
