@extends('layouts.app')



@section('content')

    <section class="hero-sec">
        <div class="container">
            <div class="grid grid--2--cols">
                <div class="hero-text-container">
                    <h1 class="heading-l">Stay Safe,<br /><span>Stay Healthy</span></h1>
                    <p class="para-s">
                        With a commitment to excellence, A.G Hospital merges cutting-edge
                        technology with a team of highly skilled professionals, creating a
                        haven of healing where patients receive world-class treatment and
                        experience true comfort in their journey towards recovery.
                    </p>
                    <button class="btn btn-hero">Read More</button>
                </div>
                <div class="hero-img-container">
                    <div class="hero-img-wrap">
                        <img src="{{asset('assets/images/b2.jpg')}}" alt="" class="hero-img" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="timing-sec">
        <div class="container grid grid--3--cols">
            <div class="time-container">
                <h3 class="heading-s">Opening Hours</h3>
                <p class="para-m">Monday - Thursday <span>8.00 - 19.00</span></p>
                <p class="para-m">Friday <span>8.00 - 18.30</span></p>
                <p class="para-m">Saturday <span>9.30 - 17.00</span></p>
                <p class="para-m">Sunday <span>9.30 - 15.00</span></p>
            </div>
            <div class="time-container sp-time-container">
                <h3 class="heading-s">Emergency</h3>
                <button class="btn">
                    <a href="tel:+44 9615219578">+44 9615219578</a>
                </button>
                <p class="para-m">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem
                    provident animi odio dolorum excepturi blanditiis modi facere quas
                    vero quo numquam ipsam dicta, cumque quae dignissimos.
                </p>
            </div>
            <div class="time-container">
                <h3 class="heading-s">Enquiry</h3>
                <button class="btn">
                    <a href="tel:+44 9748806853">+44 9748806853</a>
                </button>
                <p class="para-m">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem
                    provident animi odio dolorum excepturi blanditiis modi facere quas
                    vero quo numquam ipsam dicta, cumque quae dignissimos.
                </p>
            </div>
        </div>
    </section>
    <section class="dept-sec">
        <div class="dept-container grid grid--3--cols">
            <h2 class="heading-l">Our Departments</h2>



            @foreach($departments as $department)
            <div class="dept-tile">
                <a href="{{"departments/$department->id/doctors-list"}}"><h3 class="heading-s">{{$department->name}}</h3></a>
                <p class="para-s">
                    {{$department->description}}
                </p>
            </div>
            @endforeach


        </div>
    </section>
    <section class="news-sec">
        <div class="container">
            <h1 class="heading-l">NEWS</h1>
            <div class="news-container grid grid--3--cols">
                <div class="news-tile">
                    <div class="news-img-wrap">
                        <img
                            src="{{asset('assets/images/b2.jpg')}}"
                            alt="news thumbnail"
                            class="news-img"
                        />
                    </div>
                    <h3 class="heading-s">News Title</h3>
                    <p class="para-s">
                        <b>12<sup>th</sup> January, 2024</b>
                    </p>
                    <p class="para-m news-spl-text">Dr. Naufal Nassar</p>
                    <p class="para-s">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                        esse laborum dolor consequuntur quos assumenda ab totam
                        perspiciatis rem magni! Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Voluptas, est? Exercitationem sit quibusdam
                        harum eligendi? Similique aliquid voluptates est tenetur!
                    </p>
                    <a href="#" class="news-link">Read More</a>
                </div>
                <div class="news-tile">
                    <div class="news-img-wrap">
                        <img
                            src="{{asset('assets/images/b2.jpg')}}"
                            alt="news thumbnail"
                            class="news-img"
                        />
                    </div>
                    <h3 class="heading-s">News Title</h3>
                    <p class="para-s">
                        <b>12<sup>th</sup> January, 2024</b>
                    </p>
                    <p class="para-m news-spl-text">Dr. Naufal Nassar</p>
                    <p class="para-s">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                        esse laborum dolor consequuntur quos assumenda ab totam
                        perspiciatis rem magni! Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Voluptas, est? Exercitationem sit quibusdam
                        harum eligendi? Similique aliquid voluptates est tenetur!
                    </p>
                    <a href="#" class="news-link">Read More</a>
                </div>
                <div class="news-tile">
                    <div class="news-img-wrap">
                        <img
                            src="{{asset('assets/images/b2.jpg')}}"
                            alt="news thumbnail"
                            class="news-img"
                        />
                    </div>
                    <h3 class="heading-s">News Title</h3>
                    <p class="para-s">
                        <b>12<sup>th</sup> January, 2024</b>
                    </p>
                    <p class="para-m news-spl-text">Dr. Naufal Nassar</p>
                    <p class="para-s">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                        esse laborum dolor consequuntur quos assumenda ab totam
                        perspiciatis rem magni! Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Voluptas, est? Exercitationem sit quibusdam
                        harum eligendi? Similique aliquid voluptates est tenetur!
                    </p>
                    <a href="#" class="news-link">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-sec">
        <div class="newsletter-container">
            <h2 class="heading-m">Subscribe to our newsletter</h2>
            <form action="" method="post" class="newsletter-form">
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="E-mail address"
                />
                <input type="submit" />
            </form>
        </div>

@endsection
