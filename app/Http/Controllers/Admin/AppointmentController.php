<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plumber;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\appointmentVoiture;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(){
        

        $appointments = Appointment::paginate(10);

        return view('admin.appointments.index', compact('appointments'));
    }

    public function plumbers($appointment_id){

        $plumbers = Plumber::where('statut', 'active')->get();

        return view('admin.appointments.plumber', compact('plumbers', 'appointment_id'));
    }

    public function affect_plumber(Request $request){
        $appointment = Appointment::find($request->appointment_id);

        $appointment->plumber_id = $request->plumber_id;

        $appointment->save();

        return redirect('admin/appointments')->with('added', 'Plumber affected successfully');
    }
  
    
    public function accepter($appointment_id){
        $appointment = Appointment::find($appointment_id);

        $appointment->approuver = 'oui';

        $appointment->save();

        return redirect('admin/appointments')->with('accepted', 'The appointment is accepted successfully');
    }
    public function refuser($appointment_id){
        $appointment = Appointment::find($appointment_id);

        $appointment->approuver = 'non';

        $appointment->save();

        return redirect('admin/appointments')->with('accepted', 'The appointment is refused successfully');
    }
   
}
