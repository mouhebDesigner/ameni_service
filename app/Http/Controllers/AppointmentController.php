<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Invoice;
use App\Models\Commande;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\CommandeVoiture;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $appointments = Appointment::where('user_id', Auth::id())->get();
        
        return view('appointments.index', compact('appointments'));
    }
    public function create($service_id){
        return view('appointments.create', compact('service_id'));
    }


    public function store(AppointmentRequest $request){
        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->address = $request->address;
        $appointment->phone_number = $request->phone_number;
        $appointment->date = $request->date;
        $appointment->user_id = Auth::user()->id;
        $appointment->service_id = $request->service_id;

        $appointment->save();

        $invoice = new Invoice();

        $invoice->appointment_id = $appointment->id;
        $invoice->user_id = Auth::user()->id;

        $invoice->save();


        return redirect('/home')->with('success', 'Your appointment request has sent to the admin');
    }

   
}
