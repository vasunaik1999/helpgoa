@extends('welcome')

@section('title')
My Profile | Covid Help
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
        align-items:center;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px !important;
        border: 1px solid;
        /* color: #00BFA6; */
    }

    .circle:hover {
        background-color:#00BFA6;
        color:#ffffff;
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

        <div class="row">
            <div class="col">
                <div id="team" class="owl-carousel owl-theme my-5">
                    <!-- Card 1 -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/vasu.jpg')}}" alt="" class="mx-auto" style="width: 250px; border-radius:25px;">
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
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                    <div class="circle mx-2">
                                        <i class="fab fa-github"></i>
                                    </div>
                                    <div class="circle mx-2">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card mx-auto shadow-sm" style="width: 300px; border-radius:25px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('/img/team/vasu.jpg')}}" alt="" class="mx-auto" style="width: 250px; border-radius:25px;">
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
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                    <div class="circle mx-2">
                                        <i class="fab fa-github"></i>
                                    </div>
                                    <div class="circle mx-2">
                                        <i class="fab fa-linkedin-in"></i>
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
        $('#team').owlCarousel({
            loop: true,
            margin: 10,
            width: 50,
            // autoplay: true,
            // autoplayTimeout: 3500,
            // autoplayHoverPause: true,
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
</script>
@endsection