<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body style="background-color: #f7fbfe;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <a class="navbar-brand" href="/">
            <img src="{{url('img/LogoBroqu.png')}}" class="mx-auto img-fluid" style="width: 150px;">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button type="submit" class="btn btn-primary rounded-pill mr-2 pr-4 pl-4">LOGIN</button>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3 m-auto" style="top: 10vh;">
                <div class="card-body" style="background-color: white;">
                    <div class="card-title text-center mt-3 mb-5">
                        <img src="{{url('img/LogoBroqu.png')}}" class="mx-auto img-fluid" style="width: 180px;">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="username" name="login"  class="form-control border-0 {{ $errors->has('username') ? 'is-invalid' : ''}}"  id="email" value="{{ old('email') }}" placeholder="Username atau Email" style="background-color: #f8f8f8;">
                            @if ($errors->has('username'))
                                <div class="invalid-feedback">
                                    {{$errors->first('username')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="password" class="form-control border-0 {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password"  placeholder="Password" style="background-color: #f8f8f8;">
                            
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                        {{-- <div class="form-group form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-block" style="background-color: #2a58ad;">Login</button>
                        <div>
                            <p class="text-center mt-3">
                                @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}" style="color: grey; font-size: 13px;">Forgot Password?</a>
                                @endif
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>