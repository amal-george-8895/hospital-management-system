<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/csscss/all.min.css')}}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>


    {{--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
--}}

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
    />
    <title>A.G. Hospitals</title>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="{{url('/')}}">A.G. Hospitals</a>
    </div>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a href="{{url('/')}}" class="main-nav-link">Home</a></li>
            <li><a href="{{url('/')}}" class="main-nav-link">Services</a></li>
            <li><a href="{{url('/')}}" class="main-nav-link">About</a></li>
            <li><a href="{{url('/')}}" class="main-nav-link">Contact</a></li>
            @if (!Auth::check())
                <li>
                    <a href="{{ route('login') }}" class="main-nav-btn btn">Login / Register</a>
                </li>

            @else
            <li>
                <a class="main-nav-btn btn" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endif
    </nav>
</header>
<main class="login-body">

    @if (Auth::check())
        <br>

    <a style="-webkit-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
-moz-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);" class="main-nav-btn btn" href=" {{ url()->previous() }}" >

        BACK
    </a>
        <a style="-webkit-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
-moz-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);" class="main-nav-btn btn" href="@if(auth()->user()->type == 'patient') {{url('/patient')}}  @else {{url('/doctor')}}  @endif" >

            Dashboard
        </a>

        <a style="-webkit-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
-moz-box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);
box-shadow: 3px 3px 19px 4px rgba(0,0,0,0.4);" class="main-nav-btn btn" href="@if(auth()->user()->type == 'patient') {{url('/patient/edit')}}  @else {{url('/doctor/edit')}}  @endif" >

            Edit Profile {{ucfirst(auth()->user()->type)}}
        </a>

        <br><br><br>
        <div class="container">

            <h2  style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; height: 50px; padding: 5px; text-decoration: none !important;">Hi, {{auth()->user()->middle_name}} {{auth()->user()->last_name}} {{auth()->user()->name}}</h2>

        </div>

    @endif

    @yield('content')


</main>
<footer class="footer">
    <div class="footer-container grid grid--3--cols">
        <div class="footer-child">
            <div class="logo">
                <a href="{{url('/')}}">A.G. Hospitals</a>
            </div>
            <p class="para-s">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                explicabo neque commodi corrupti blanditiis modi Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Repudiandae, provident.
            </p>
        </div>
        <div class="footer-child">
            <p class="para-m">Contact</p>
            <p class="para-s">
                A.G Hospitals, <br/>East Rd, Cambridge CB1 1PT, <br/>United
                Kingdom
            </p>
            <a href="mailto:support@aghospitals.com" class="footer-link"
            >email: support@aghospitals.com</a
            >
            <a href="tel:+123456789012" class="footer-link"
            >Phone: +12 345 6789012</a
            >
        </div>
        <div class="footer-child">
            <p class="para-m">Quick Links</p>
            <div class="grid grid--2--cols">
                <div>
                    <a href="{{url('/')}}" class="quick-link">Home</a>
                    <a href="{{url('/')}}" class="quick-link">Services</a>
                    <a href="{{url('/')}}" class="quick-link">About</a>
                </div>
                <div>
                    <a href="{{url('/')}}" class="quick-link">Contact</a>
                    @if (!Auth::check())
                        <a href="{{ route('login') }}" class="quick-link">Login/Register</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>
