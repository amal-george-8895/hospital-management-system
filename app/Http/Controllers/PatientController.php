<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('patient_id', auth()->user()->id)->with('doctor')->get();

        return view('patient.home', compact('appointments'));
    }

    public function doctorsList()
    {
        $doctors = Doctor::where('type', 3)->get();

        return view('doctor.list', compact('doctors'));
    }

    public function bookAnAppointmentWithDoctor(Request $request, $doctorID)
    {
        if ($request->isMethod('post')) {
            //todo validation
            $data = [
                'patient_id' => auth()->user()->id,
                'doctor_id'  => $request->doctor_id,
                'date'       => $request->date,
                'time'       => $request->time,
            ];
            Appointment::create($data);

            return redirect('patient');
        }
        $doctor = Doctor::find($doctorID);

        return view('patient.book-an-appointment-with-doctor', compact('doctor'));
    }


    public function edit()
    {
        $patient = User::find(auth()->user()->id);


        return view('auth.register', compact('patient'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::find(auth()->user()->id)->update(
            [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),

                'middle_name'        => $request->middle_name,
                'last_name'          => $request->last_name,
                'date_of_birth'      => $request->date_of_birth,
                'street'             => $request->street,
                'city'               => $request->city,
                'state'              => $request->state,
                'postal_code'        => $request->postal_code,
                'gender'             => $request->gender,
                'additional_details' => $request->city,
                'type'               => auth()->user()->type == 'patient' ? 2 : 3,
            ]);

        return redirect(auth()->user()->type);
    }

    public function destroy(string $id)
    {
        //
    }
}
