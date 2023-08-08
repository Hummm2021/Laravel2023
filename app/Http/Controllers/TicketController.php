<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
// use Symfony\Component\VarDumper\Cloner\Data;

class TicketController extends Controller
{
    // public $elements = Ticket::all();
    public function index(){
        $tickets = Ticket::all();
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
        // $nbtickets = Ticket::where('author_email', Auth::guard('web')->user()->email);
        return view('dashboard.user.ticket', compact(['tickets','TypesDeDemandes']));
    }
    public function createTicket(){
        // collection de valeurs contenant des types de demandes aux hasard
                
        

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

        return view('dashboard.user.create-ticket', compact('TypesDeDemandes'));
    }    

    public function create(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
        ]);        

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        $ticket->author_name = $request->author_name;
        $ticket->author_email = $request->author_email;
        $save = $ticket->save();

        if($save){
            return redirect()->back()->with('success', 'Votre ticket a bien été créé.');
        }else{
            return redirect()->back()->with('fail','Une erreur s\'est produite.');
        }
    }

        public function showTicket(string $id)
    {
        $ticket = Ticket::find($id);
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
        return view('dashboard.user.show-ticket', compact(['ticket', 'TypesDeDemandes']));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
        ]);

        $ticket = Ticket::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email
        ]);

        // dd($ticket);

        // Mise à jour des informations
        // $utilisateurs = Utilisateurs::find(Auth::user()->id)->update([
        //     'nom' => $request->nom,
        //     'prenom' => $request->prenom,
        //     'genre' => $request->genre,
        //     'date_naissance' => $request->date_naissance,
        //     'email' => $request->email,
        //     'travail' => $request->travail,
        //     'photo' => $emplacement,
        //     'description' => $request->description,
        //     'numero' => $request->numero,
        // ]);

        // $ticket->title = $request->title;
        // $ticket->content = $request->content;
        // $ticket->update();

        // return redirect()->route('user.ticket')->with('success', 'Vos données ont été mises à jour avec succès.');

        // if($save){
        //     return redirect()->route('user.ticket')->with('success', 'Votre ticket a bien été créé.');
        // }else{
        //     return redirect()->route('user.ticket')->with('fail','Une erreur s\'est produite.');
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    // Récupérer l'élément à supprimer
    $ticket = Ticket::findOrFail($id);

    // Supprimer l'élément de la base de données
    $ticket->delete();

    // Rediriger ou retourner une réponse JSON selon vos besoins
    return redirect()->route('user.ticket')->with('success', 'L\'élément a été supprimé avec succès.');

    }

}
