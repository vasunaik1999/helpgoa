@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')

<!-- ======= Header ======= -->
<header id="header" class="row">
    @if (session('bannedMessage'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('bannedMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="d-flex flex-column align-items-center col-lg-8 col-md-12 mb-5">
        <img style="max-height:70vh; width:60vw;" src="<?php echo asset('img/home.svg') ?>" alt="">
    </div>
    <div class="col-lg-4 col-md-12 mb-5">
        <h1>Covid Help</h1>
        <h2>Let's Help Goa Breathe!</h2>
        <br>
        <ul class="fa-ul pb-2" style="line-height:2;">
            <li><span class="fa-li" style="color:#00BFA6;"><i class="fas fa-medkit"></i></span>Use this platform to request for your needs.</li>
            <li><span class="fa-li" style="color:#00BFA6;"><i class="fas fa-medkit"></i></span>Use this platform to help those in need.</li>
            <li><span class="fa-li" style="color:#00BFA6;"><i class="fas fa-medkit"></i></span>Use this platform to volunteer and help those affected by covid.</li>
        </ul>

        <a type="button" class="btn justify-content-center createreqbtn" href="{{url('/resources')}}">Covid Resources</a>

        <!--LOCKED FEATURE <a type="button" class="btn justify-content-center createreqbtn" href="{{url('/request-create')}}">Create Request</a> -->
        <!-- <a type="button" class="btn justify-content-center createreqbtn text-white locked" data-toggle="tooltip" data-placement="bottom" title="Create Request is Locked">Create Request</a> -->

        @if (Route::has('login'))
        @auth
        @if(Auth::user()->hasRole('user'))
        <a type="button" id="registerbtn" class="btn mt-2 justify-content-center registerbtn" href="{{ url('/warrior-registration/'.Auth::user()->id) }}">Register as Warrior</a>
        @else
        <a type="button" id="registerbtn" class="btn mt-2 justify-content-center registerbtn" href="{{ url('/dashboard') }}">View Dashboard</a>
        @endif
        @else
        <a type="button" id="registerbtn" class="btn mt-2 justify-content-center registerbtn" href=" {{ route('login') }}">Register as Warrior</a>
        @endauth
        @endif

    </div>
</header>
<!-- End #header -->


<!-- Blog Section -->
<!-- <section>
    <div class="section-title">
        <h2 class="h1-responsive font-weight-bold">Doctor's Thoughts</h2>
        <p class="dark-grey-text w-responsive mx-auto mb-5">Today, information is spread through multiple channels. And unfortunately, most of this information is unverified and might be misleading.<br>So let us educate ourselves and hear from the experts regarding the most common queries most of us have. </p>
    </div>

    <div class="row" style="display:block; margin:auto;">

    <div class="col-lg-4 col-md-6 mb-md-0 mb-4">

        <div class="view overlay rounded z-depth-2 mb-4">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/81.jpg" alt="Sample image">
        <a>
            <div class="mask rgba-white-slight"></div>
        </a>
        </div>

        <a href="#!" class="pink-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-map pr-2"></i>Adventure</h6>
        </a>

        <h4 class="font-weight-bold mb-3"><strong>Title of the new article</strong></h4>

        <p>by <a class="font-weight-bold">Billy Forester</a>, 15/07/2018</p>

        <p class="dark-grey-text">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit
        quo minus id quod maxime placeat facere possimus voluptas.</p>

        <a class="btn text-light" style="background-color:#00BFA6;">Read more</a>

    </div>


    </div>

</section> -->
<!-- Blog Section -->

<div id="slider" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
    <h2 style="padding:10px; font-size: 22px !important;">Crucial Information</h2>
</div>

<div id="cards" class="section-title align-items-center" style="display:block; margin:auto; padding:30px 0 0 0;">
    <h2>Crucial Information</h2>
</div>
<div id="crucial-info-carousel" class="owl-carousel owl-theme my-5">
    <div>
        <div class="card">
            <div class="card-body"><img src="{{asset('/img/home-carousel/oxygen_level.png')}}" alt=""></div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-body"><img src="{{asset('/img/home-carousel/pulse_rate.png')}}" alt=""></div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-body"><img src="{{asset('/img/home-carousel/temperature.png')}}" alt=""></div>
        </div>
    </div>
</div>

</div>


<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>About Us</h2>
                <p>This is an initiative by two engineering students to help those affected by Covid-19.
                    <br>While our doctors are on the frontlines fighting 24x7 to save our lives, we thought of starting this initiative to help those in need. We have been blessed with a community full of volunteers, helping people get access to meals, groceries and medical support as and when needed. This is a Request and Response portal to facilitate our Volunteer-Warriors help the community in the best way possible.
                </p>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="{{url('/request-create')}}">Need help?</a></h4>
                    <p class="description">One who is in need of help can reach out to the volunteers through our portal. Verified volunteers will view and reach out to you via your registered Contact Information. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title">
                        @if (Route::has('login'))
                        @auth
                        @if(Auth::user()->hasRole('user'))
                        <a href="{{url('/warrior-registration/'.Auth::user()->id)}}">
                            @else
                            <a href="{{ url('/dashboard') }}">
                                @endif
                                @else
                                <a href=" {{ route('login') }}">
                                    @endauth
                                    @endif
                                    Want to Volunteer?
                                </a>
                    </h4>
                    <p class="description">Through all these tough times, we have witnessed warriors from our community come forth and be pillars of support to us. Use the "Register as Warrior" feature and use this portal to reach out to those in need. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="mailto:help.goa.breathe@gmail.com">Want to join hands in this endeavour?</a></h4>
                    <p class="description">We would be glad to collaborate with folks who wish to contribute in helping the society! Please reach out to us at <a href="mailto:help.goa.breathe@gmail.com">help.goa.breathe@gmail.com</a> !! </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <section id="contactform">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
            </div>

            <div class="row mt-2">
                <div class="col">
                    @if (session('contactmessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('contactmessage') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="post" action="{{route('contactform.store')}}">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" @auth value="{{Auth::user()->id}}" @endauth>
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" @auth value="{{Auth::user()->name}}" @endauth>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone" @auth value="{{Auth::user()->phone}}" @endauth>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="category">Category</label>
                                        <select required class="form-control" id="category" name="category">
                                            <option value="General">General</option>
                                            <option value="Request">Request</option>
                                            <option value="Request">Resource</option>
                                            <option value="Warrior">Warrior</option>
                                            <option value="Account">Account</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <label for="message">Message</label>
                                        <textarea required name="message" class="form-control" id="message" rows="4" placeholder="Enter you message"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn text-white mt-3" style="background-color:#00BFA6">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#crucial-info-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                769: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 3,
                    margin: 20,
                    nav: false,
                    loop: true
                }
            }
        })

        // $(document).ready(function() {
        //     $('[data-toggle="tooltip"]').tooltip();
        // });
    });
</script>
@endsection