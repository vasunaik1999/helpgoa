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
        <a type="button" class="btn text-white justify-content-center" href="{{url('/request-create')}}" style="background-color:#00BFA6; display:block; margin:auto;">Create Request</a>
    </div>

    
    <!-- Carousel -->
    <div id="slider" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
        <h2 style="margin:20px; padding:10px;">Crucial Information</h2>
    </div>
    <div id="slider" class="carousel slide" data-ride="carousel" style="background: color #000; display:block; margin:auto;">
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner align-items-center">
            <div class="carousel-item active">
                <div class="card border-secondary text-center " style="width: 18rem; height: 18rem;">
                    <img src="<?php echo asset('img/oxy.png') ?>" alt="">
                </div>
            </div>
            <div class="carousel-item ">
                <div class="card border-secondary text-center " style="width: 18rem; height: 18rem;">
                    <img src="<?php echo asset('img/oxy.png') ?>" alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="card border-secondary text-center " style="width: 18rem; height: 18rem;">
                    <img src="<?php echo asset('img/oxy.png') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End #header -->
    <div id="cards" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
        <h2>Crucial Information</h2>
    </div>
    <div id="cards" class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card border-secondary mb-5 text-center " style="width: 18rem; height: 18rem;">
                <img src="<?php echo asset('img/oxy.png') ?>" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card border-secondary mb-5 text-center " style="width: 18rem; height: 18rem;">
                <img src="<?php echo asset('img/oxy.png') ?>" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card border-secondary mb-5 text-center " style="width: 18rem; height: 18rem;">
                <img src="<?php echo asset('img/oxy.png') ?>" alt="">
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
                <br>While our doctors are on the frontlines fighting 24x7 to save our lives, we thought of starting this initiative to help those in need. We have been blessed with a community full of volunteers, helping people get access to meals, groceries and medical support as and when needed. This is a Request and Response portal to facilitate our Volunteer-Warriors help the community in the best way possible. </p>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="">Need help?</a></h4>
                    <p class="description">One who is in need of help can reach out to the volunteers through our portal. Verified volunteers will view and reach out to you via your registered Contact Information. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="">Want to Volunteer?</a></h4>
                    <p class="description">Through all these tough times, we have witnessed warriors from our community come forth and be pillars of support to us. Use the "Register as Warrior" feature and use this portal to reach out to those in need. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="">Want to join hands in this endeavour?</a></h4>
                    <p class="description">We would be glad to collaborate with folks who wish to contribute in helping the society! Please reach out to us at <a href="mailto:help.goa.breathe@gmail.com" >help.goa.breathe@gmail.com</a> !! </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

</main><!-- End #main -->
@endsection

@section('script')

@endsection