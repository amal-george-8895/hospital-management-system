<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor_id = auth()->user()->id;
        $appointments['previous'] = Appointment::whereDate('date', '<', today()->subDays(0)->setTime(0, 0, 0)->toDateTimeString())->where('doctor_id',$doctor_id)->get();
        $appointments['upcoming'] = Appointment::whereDate('date', '>', today()->subDays(0)->setTime(0, 0, 0)->toDateTimeString())->where('doctor_id',$doctor_id)->get();
        $appointments['todays'] = Appointment::whereDate('date', '=', today()->subDays(0)->setTime(0, 0, 0)->toDateTimeString())->where('doctor_id',$doctor_id)->get();

        return view('doctor.home', compact('appointments'));
    }

    public function patientHistory($patientID)
    {
        $appointments = Appointment::where('patient_id', $patientID)->with('doctor')->get();

        return view('patient.home', compact('appointments'));
    }
    public function editAppointment(Request $request, $appointmentID)
    {

        if ($request->isMethod('post')) {
            $data = [
                'date'       => $request->date,
                'time'       => $request->time,
                'consulted'       => $request->consulted ? true : false,
                'notes'       => $request->notes,
                'prescriptions'       => $request->prescriptions,
            ];
             Appointment::find($appointmentID)->update($data);


             $patientID = $request->patient_id;
            return redirect("/doctor/$patientID/patient-history");

        }
        $appointments = Appointment::find($appointmentID);
        $doctor = Doctor::find($appointments->doctor_id);

        return view('patient.book-an-appointment-with-doctor', compact('appointments','doctor'));
    }
    public function edit()
    {
        $patient = User::find(auth()->user()->id);

        return view('auth.register', compact('patient'));
    }

}
