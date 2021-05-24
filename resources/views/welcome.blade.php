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
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  

  <title>@yield('title')</title>
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <script src="{{ asset('js/welcome.js') }}" defer></script>

</head>

<body>

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
          <a class="text-white" href="#about">About</a>
        </li>
        <li class="nav-item ml-3">
          <a class="text-white" href="{{url('/requests')}}">Requests</a>
        </li>
        @if (Route::has('login'))
        @auth
        @if(Auth::user()->hasRole('user'))
        <!-- Authentication -->
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
 
				
  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

  <script src="assets/vendor/php-email-form/validate.js"></script>


  @yield('script')
</body>

</html>