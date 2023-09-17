@extends('layouts.app')



@section('content')

    <h2 class="heading-login">Patient Record</h2>


    <div class="container">


        @if(auth()->user()->type == 'patient')
        <a href="{{url('patient/doctors-list')}}" class="btn btn-close btn-danger float-right">Book an appointment</a>
        @endif
        <br>
        @if(count($appointments))
        <table class="w3-table ws-table-all w3-bordered w3-striped w3-border test w3-hoverable" style="color:#000">
            <tr class="w3-green">
                <th>SL</th>
                <th>Consulted Date & Time</th>
                <th>Doctor's Name</th>
                <th>Notes</th>
                <th>Prescriptions</th>
                <th>Consulted</th>
                @if(auth()->user()->type != 'patient')
                <th>Actions</th>
                @endif

            </tr>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{ date("d.m.Y", strtotime($appointment->date))}} {{ date("h:i A", strtotime($appointment->time))}}</td>
                <td> {{$appointment->doctor->name}} {{$appointment->doctor->middle_name}} {{$appointment->doctor->last_name}}</td>
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

        <h3>No previous records</h3>
        @endif
        <br>
        <br>
        <br>



    </div>


@endsection
