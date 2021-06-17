@if(session()->has('id'))
<script>
    window.location = "/dashboard";
  </script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vShop || Login Vendor</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('css/vendorLogin.css')}}" rel="stylesheet" id="login-css">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
</head>
<body>
    <div id="login">
        {{-- <h3 class="text-center text-white pt-5">vShop Vendor Login</h3> --}}
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login" method="post">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" placeholder="admin@vshop.com" class="form-control">
                                <span style="color: red"> @error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" placeholder="12345678" class="form-control">
                                <span style="color: red"> @error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="forgate" class="text-info"><a href="{{ url('/lost-pass-form') }}" class="text-info">Lost Password?</a>  </label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            
                            
                            <div id="register-link" class="text-right">
                                <a href="{{ url('/register-vendor') }}" class="text-info">Register here</a>   
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
