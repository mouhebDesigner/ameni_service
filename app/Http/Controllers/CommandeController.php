<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CommandeVoiture;
use App\Http\Requests\CommandeRequest;
use App\Http\Requests\CommandeVoitureRequest;

class AppointmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($service_id){
        return view('commande', compact('service_id'));
    }
    public function voiture($service_id){
        return view('commande_voiture', compact('service_id'));
    }

    public function store(CommandeRequest $request){
        $commande = new Commande();

        $commande->espace = $request->espace;
        $commande->adresse = $request->adresse;
        $commande->num_etage = $request->num_etage;
        $commande->date = $request->date;
        $commande->user_id = Auth::user()->id;
        $commande->service_id = $request->service_id;

        $commande->save();

        return redirect('/home')->with('success', 'Votre commande a été envoyé avec succée');
    }

    public function storeVoiture(CommandeVoitureRequest $request){
        $commande = new CommandeVoiture();

        $commande->adresse = $request->adresse;
        $commande->date = $request->date;
        $commande->type_lavage = $request->type_lavage;
        $commande->type_voiture = $request->type_voiture;
        $commande->user_id = Auth::user()->id;
        $commande->service_id = $request->service_id;

        $commande->save();

        return redirect('/home')->with('success', 'Votre commande a été envoyé avec succée');
    }
}
