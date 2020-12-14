<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="/css/style.css" rel="stylesheet">

    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <title>@yield('title')</title>
  </head>
  <body style="background-color: #f7fbfe;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" >
        <a class="navbar-brand" href="#">
            <img src="{{url('img/LogoBroqu.png')}}" class="mx-auto img-fluid" style="width: 180px;">
        </a>
        @if (Auth::User()->jabatan == "Pemilik" )
        
        @elseif (Auth::User()->jabatan == "Pengawas" )
        <h4 class="border-left pl-3">Pengawas</h4>
        @else
        <h4 class="border-left pl-3">Pengelola</h4>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav ml-auto">
            @if (Auth::User()->jabatan == "Pemilik" )
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('petugas')}}">Petugas</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('ayam')}}">Ayam</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('kandang')}}">Kandang</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('pakan')}}">Pakan</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('telur')}}">Telur</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('transaksi')}}">Transaksi</a>
            </li>
            <li class="nav-item dropdown mr-3">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Pemasukan</a>
                <a class="dropdown-item" href="#">Pengeluaran</a>
                <a class="dropdown-item" href="#">Saldo</a>
              </div>
            </li>
            @elseif (Auth::User()->jabatan == "Pengawas" )
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('ayam')}}">Ayam</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('kandang')}}">Kandang</a>
            </li>
            <li class="nav-item dropdown mr-3">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pakan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('pakan')}}">Stok Pakan</a>
                <a class="dropdown-item" href="{{ route('hitungpakan')}}">Hitung Pakan</a>
              </div>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('telur')}}">Telur</a>
            </li>
            @else
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('ayam')}}">Ayam</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('telur')}}">Telur</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="{{ route('transaksi')}}">Transaksi</a>
            </li>
            <li class="nav-item dropdown mr-3">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#">Pemasukan</a>
                <a class="dropdown-item" href="#">Pengeluaran</a>
               <a class="dropdown-item" href="#">Saldo</a>
              </div>
            </li>
            @endif
            <div class="form-inline my-2 my-lg-0" href="#">
              <button class="btn nav-link btn-primary rounded-pill mr-2 pr-4 pl-4" id="Dropdown" type="submit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">@yield('title_nav')</button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Dropdown">
                  <a class="dropdown-item" href="{{ route('editprofile')}}">
                    {{ __('Edit Profile')}}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                  </a>
  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </div>
          </ul>
        </div>
      </nav>