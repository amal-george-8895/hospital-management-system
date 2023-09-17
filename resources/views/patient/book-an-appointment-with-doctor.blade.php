@extends('layouts.app')



@section('content')
    <h2 class="heading-login">Book an Appointment now</h2>
    <div class="login-container">


            <form method="POST" action="" class="login-form">
                <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">
                @csrf

                                <div class="name">
                    <label for="docname">Doctor Name:</label>
                    <input class="login-email form-control " type="text" id="name" name="name" readonly  value="{{$doctor->name}} {{$doctor->middle_name}} {{$doctor->last_name}}" />

                </div>

                <div class="name">
                    <label for="docname">About Doctor</label>
                    <input class="login-email form-control " type="text" id="name" name="name" readonly  value="{{$doctor->additional_details}}" />

                </div>



                <hr>
                <br>

                <div class="dob">
                    <label for="date">Appoinment Date</label>
                    <input value="@isset($appointments){{$appointments->date}}@endisset" type="date" id="date" name="date" required /><br /><br />
                </div>
                <div class="time">
                    <label for="time">Appoinment Time</label>
                    <input value="@isset($appointments){{$appointments->time}}@endisset" type="time" id="time" name="time" required /><br /><br />
                </div>

                @isset($appointments)
                <label for="notes">Notes:</label><br>
                <textarea id="notes" name="notes" rows="10" cols="100">{{$appointments->notes}}</textarea><br><br>

                <label for="prescriptions">Prescriptions:</label><br>
                <textarea id="prescriptions" name="prescriptions" rows="10" cols="100">{{$appointments->prescriptions}}</textarea><br><br>



                    <label class="form-check-label" for="consulted">
                     Mark as consulted
                    </label>
                    <input class="" type="checkbox" name="consulted" id="consulted" />

                    <input type="hidden" name="patient_id" id="patient_id" value="{{$appointments->patient_id}}">


                @endisset


                <input type="submit" value="Submit" class="submit-btn">
            </form>
        </div>
    </div>
@endsection
