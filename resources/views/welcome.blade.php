<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/af-2.3.6/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sp-1.2.2/datatables.min.css" />

  <title>@yield('title')</title>
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <script src="{{ asset('js/welcome.js') }}" defer></script>

  <style>
    a:link {
      text-decoration: none !important;
    }
  </style>
</head>

<body>

  <!-- Float button code begins here -->
  <a href="{{url('/request-create')}}" class="float" id="floatbtn">
    <i class="fa fa-plus my-float"></i>
  </a>

  <!-- #289672 -->
  <!-- #00BFA6 -->
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#00BFA6">
    <a class="navbar-brand text-white" href="{{url('/')}}">Covid Help</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active ml-3">
          <a class="text-white" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/resources')}}">Resources</a>
        </li>
        @if (Route::has('login'))
        @auth
        <!-- @if(Auth::user()->hasRole('user'))
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/profile')}}">Profile</a>
        </li>
        @endif -->
        @endauth
        @endif
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/requests')}}">Requests</a>
        </li>
        <!-- @if (\Route::current()->getName() == 'home')
        <li class="nav-item ml-3">
          <a class="text-white" href="#about">About</a>
        </li>
        @endif -->
        @if (Route::has('login'))
        @auth
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/myprofile')}}">My Profile</a>
        </li>
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/myrequests')}}">My Request</a>
        </li>
        @if(Auth::user()->hasRole('user'))
        <!-- Authentication -->
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/warrior-registration/'.Auth::user()->id)}}">Register as Warrior</a>
        </li>
        <form method="POST" style="right: 5%; position: absolute;" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')" class="text-white" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
        @else
        <!-- Dashboard -->
        <li class="nav-item ml-3">
          <a href="{{ url('/dashboard') }}" class="text-sm text-white">Dashboard</a>
        </li>
        <!-- Authentication -->
        <form method="POST" style="right: 2%; position: absolute;" action="{{ route('logout') }}">
          @csrf
          <!-- 
          <x-dropdown-link :href="route('logout')" class="text-white" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link> -->
          <a href="{{route('logout')}}" class="text-white" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
        </form>
        @endif
        @else
        <a href=" {{ route('login') }}" class="text-sm text-white align-text-center" style="right: 5%; position: absolute;">Log in</a>
        <!-- @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm" style="float: right;">Register</a>
            @endif -->
        @endauth
        @endif

      </ul>
    </div>
  </nav>


  <div class="container mt-5">
    @yield('content')
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- OwlCarousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- DataTable -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/af-2.3.6/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>




  <script>
    $(document).ready(function() {
      $('#table').DataTable({
        responsive: true,
        autoWidth: false,
        colReorder: true,
        "pageLength": 25,
        "paging": true,
        // rowReorder: true,
        language: {
          searchPlaceholder: "Search records"
        }

        //BUTTONS TO DOWNLOAD
        // dom: 'Bfrtip',
        // buttons: [
        //   'copy', 'csv', 'excel', 'pdf', 'print'
        // ]

      });

    });
  </script>
  @yield('script')

</body>

</html>