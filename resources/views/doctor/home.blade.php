@extends('layouts.app')



@section('content')




    <div class="container">



        <br>
        @foreach($appointments as $key => $app)
            <h2 class="heading-login">{{ucfirst($key)}} Appointments</h2>
        @if(count($app))


        <table class="w3-table ws-table-all w3-bordered w3-striped w3-border test w3-hoverable" style="color:#000">
            <tr class="w3-green">
                <th>SL</th>
                <th>Consulted Date & Time</th>
                <th>Patients's Name</th>
                <th>Notes</th>
                <th>Prescriptions</th>
                <th>Consulted</th>
                <th>Actions</th>

            </tr>
            @foreach($app as $appointment)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{ date("d.m.Y", strtotime($appointment->date))}} {{ date("h:i A", strtotime($appointment->time))}}</td>
                <td><a href="{{url('/doctor/'.$appointment->patient->id.'/patient-history')}}">{{$appointment->patient->name}} {{$appointment->patient->middle_name}} {{$appointment->patient->last_name}}</a> </td>
                <td>{{$appointment->notes}} </td>
                <td>{{$appointment->prescriptions}} </td>
                <td>@if($appointment->consulted) Yes @else No @endif  </td>
                @if(auth()->user()->type != 'patient')
                    <td>

                        <a href="/doctor/{{$appointment->id}}/edit">Edit</a>

                    </td>
                @endif
            </tr>
            @endforeach
        </table>
        @else

        <h3>No {{$key}} Appointment records</h3>
        @endif
        @endforeach
        <br>
        <br>
        <br>



    </div>


@endsection
