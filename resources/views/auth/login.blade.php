@extends('layouts.app')

@section('content')

    <h2 class="heading-login">Enter Your Login In Details.</h2>
    <div class="login-box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input id="email" type="email" class="login-email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <label for="password">Password:</label>
            <input id="password" type="password" class="login-pass form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror


            <input type="submit" value="Login" class="submit-btn"><br>
            <p class="para-s">
                Not a Registered User? Click here to
                <a href="{{ route('register') }}">Register.</a>
            </p>
        </form>
    </div>
@endsection
