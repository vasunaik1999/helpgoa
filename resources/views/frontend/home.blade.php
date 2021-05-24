@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<!-- ======= Header ======= -->
<header id="header" class="row">
    <div class="d-flex flex-column align-items-center col-lg-8 col-md-12 mb-5">
        <img style="max-height:70vh; width:60vw;" src="<?php echo asset('img/home.svg') ?>" alt="">
    </div>
    <div class="col-lg-4 col-md-12 mb-5">
        <h1>Covid Help</h1>
        <h2>Let's Help Goa Breathe!</h2>
        <br>
        <ul class="pb-2" style="line-height: 2;">
            <li>Use this platform to request for your needs.</li>
            <li>Use this platform to help those in need.</li>
            <li>Use this platform to volunteer and help those affected by covid.</li>
        </ul>
        <button type="button" class="btn text-white justify-content-center" style="background-color:#00BFA6; display:block; margin:auto;">Create Request</button>
    </div>

    <!-- Carousel -->
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
                <p>Illo velit quae dolorem voluptate pireda notila set. Corrupti voluptatum tempora iste ratione deleniti corrupti nostrum ut</p>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-briefcase"></i></div>
                    <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-bar-chart"></i></div>
                    <h4 class="title"><a href="">Dolor Sitema</a></h4>
                    <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-brightness-high"></i></div>
                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

</main><!-- End #main -->
@endsection

@section('script')

@endsection