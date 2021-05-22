<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\appointmentVoiture;
use App\Models\Appointment;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(){
        

        $appointments = Appointment::paginate(10);

        return view('admin.appointments.index', compact('appointments'));
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
