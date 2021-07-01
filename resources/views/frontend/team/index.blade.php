@extends('welcome')

@section('title')
Team | Covid Help
@endsection

@section('content')
<!-- <div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Team Section</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="border-radius:30px; background-color:#f6f6f6; border:1px solid lightgray !important">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<style>
    .circle {
        /* margin: 10px; */
        height: 35px;
        width: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px !important;
        border: 1px solid;
        /* color: #00BFA6; */
    }

    .circle:hover {
        background-color: #00BFA6;
        color: #ffffff;
    }

    .circle:hover a {
        color: #ffffff;
    }

    a {
        color: inherit;
    }
</style>
<section class="mt-5">
    <div class="founder">
        <div id="slider" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
            <h2 style="padding:10px; font-size: 22px !important;">Founders</h2>
        </div>

        <div id="cards" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
            <h2>Founders</h2>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div id="founder" class="owl-carousel owl-theme">
                    <!-- Card Vasu -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/vasu.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Vasu Naik</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Full Stack Developer</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/vasunaik_1999/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://github.com/vasunaik1999/">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.linkedin.com/in/vasu-naik-b6a9a7181">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Rushabh -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/rushabh.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Rushabh Wadkar</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Full Stack Developer</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/king_of_ishgar/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://github.com/Rushabh2499/">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.linkedin.com/in/wadkar-rushabh">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="team mt-5">
        <div id="slider" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
            <h2 style="padding:10px; font-size: 22px !important;">Team</h2>
        </div>

        <div id="cards" class="section-title align-items-center" style="display:block; margin:auto; padding:0;">
            <h2>Team</h2>
        </div>

        <div class="row my-5">
            <div class="col">
                <div id="team" class="owl-carousel owl-theme">
                    <!-- Card Adarsh -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/adarsh.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Adarsh Sinari</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Resource Head</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/adarshsinari">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://m.facebook.com/100008014747658/">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://mobile.twitter.com/adarshsinari?lang=en">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Sahil -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/sahil.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Sahil Lotlikar</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Resource Head</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://www.instagram.com/sahil_99_boii/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.facebook.com/SADELO33">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.linkedin.com/in/sahil-lotliker-614a8218b">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 my-md-5 ">
            <div class="col">
                <div id="admin" class="owl-carousel owl-theme">
                    <!-- Card vrajesh -->
                    <div class=" card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/vrajesh.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Vrajesh Natekar</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Admin</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/vrajesh_natekar_09">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="mailto:natsvr45@gmail.com">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.linkedin.com/in/vrajesh-natekar-78b6bb1aa">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Sejal -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/sejal.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Sejal Naik</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Admin</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://www.instagram.com/sejalnaik0231?r=nametag">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.facebook.com/Skavlekar31">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://twitter.com/Sejalnaik7?s=08">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Shravanil -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/shravani.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Shravani Satardekar</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Admin</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/_shravani_08?utm_medium=copy_link">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://m.facebook.com/100016206106025/">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="mailto:shravanisatardekar43854@gmail.com">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Nidhi -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/nidhi.jpg')}}" alt="" class="mx-auto" style="width: 250px; height:250px; border-radius:15px; border:2px solid grey;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="ml-1 mt-2 text-center" style="color:#00BFA6;"><strong>Nidhi Kamat</strong></h4>
                                    <p class="text-black ml-1 text-center text-middle">Admin</p>
                                </div>
                            </div>
                            <div class="row" style="display:flex; justify-content:center;">
                                <!-- <div class="col"> -->
                                <div class="circle mx-2">
                                    <a href="https://instagram.com/___kamat___/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://github.com/nkamat99/">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                                <div class="circle mx-2">
                                    <a href="https://www.linkedin.com/in/nidhi-r-kamat-3982571b3">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#founder, #team').owlCarousel({
            loop: true,
            margin: 10,
            width: 50,
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
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 2,
                    nav: false,
                    loop: true
                }
            }
        })

        // $(document).ready(function() {
        //     $('[data-toggle="tooltip"]').tooltip();
        // });
    });

    $(document).ready(function() {
        $('#admin').owlCarousel({
            loop: true,
            margin: 10,
            width: 50,
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
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
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