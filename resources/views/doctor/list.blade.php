@extends('layouts.app')



@section('content')
    <div class="container">
        <div id="user-profiles">
            <h2>Our Doctor's</h2>
            <p class="heading-login">Please select a doctor to book an appointment</p>
            @foreach($doctors as $doctor)
                <div class="user-profile">
                    <a href="{{url("patient/$doctor->id/book-an-appointment-with-doctor")}}">
                        <h3>{{$doctor->name}} {{$doctor->middle_name}} {{$doctor->last_name}}</h3></a>
                    <p>{{$doctor->additional_details}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
