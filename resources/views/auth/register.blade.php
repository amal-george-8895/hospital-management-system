@extends('layouts.app')

@section('content')

    <h2 class="heading-login">Enter your details to @isset($patient) update @else register @endisset  account.</h2>
    <div class="login-container">

        <form method="POST" action="@isset($patient) {{url(auth()->user()->type."/update")}}  @else {{ route('register') }} @endisset " class="login-form">
                @csrf
            <div class="name">
                <label for="name">First Name:  </label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}@isset($patient) {{$patient->name}} @endisset" required autocomplete="name" autofocus>
                @error('name') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong> </span>  @enderror
                <label for="middle_name">Middle Name:</label>
                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}@isset($patient) {{$patient->middle_name}} @endisset" required autocomplete="middle_name" autofocus>
                @error('middle_name') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong> </span>  @enderror
                <label for="last_name">Last Name:</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name')}}@isset($patient){{$patient->last_name}}@endisset" required autocomplete="last_name" autofocus>
                @error('last_name') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong> </span>  @enderror
            </div>
            <div class="dob">
                <label for="date_of_birth">Date of Birth:</label>
                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{old('date_of_birth')}}@isset($patient){{$patient->date_of_birth}}@endisset" required autocomplete="date_of_birth" autofocus>
                @error('date_of_birth') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong> </span>  @enderror
                <br><br>
            </div>
            <div class="gender">
                <label for="gender">Gender:</label>
                <input checked="checked" type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other" required>
                <label for="other">Other</label><br><br>
            </div>
            <div class="add">
                <div class="city">
                    <label for="street">Street Address:</label>
                    <input type="text" id="street" name="street" required value="@isset($patient) {{$patient->street}} @endisset"><br><br>
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required value="@isset($patient) {{$patient->city}} @endisset"><br><br>
                </div>
                <div class="state">
                    <label for="postal_code">Postal Code:</label>
                    <input value="@isset($patient) {{$patient->postal_code}} @endisset"  type="text" id="postal_code" name="postal_code" required >
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" required value="@isset($patient) {{$patient->state}} @endisset"><br><br>
                </div>
            </div>
            <div class="email">
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}@isset($patient) {{$patient->email}} @endisset" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="pass">
                <label for="password">Password:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label for="password-confirm">Retype Password:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <label for="additional_details">Any Additional Details:</label><br>
            <textarea id="additional_details" name="additional_details" rows="10" cols="100">@isset($patient) {{$patient->additional_details}} @endisset</textarea><br><br>
            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>




@endsection
