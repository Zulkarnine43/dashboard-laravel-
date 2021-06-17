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
  <title>vShop || Register Vendor</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('css/vendorRegister.css')}}" rel="stylesheet" id="register-css">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
</head>
<body>
    <div id="register">
        {{-- <h3 class="text-center text-white pt-5">vShop Vendor register</h3> --}}
        <div class="container">
            <div id="register-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="register-form" class="form" action="register" method="post">
                            @csrf
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Your Name</label><br>
                                <input type="text" name="name" id="name" placeholder="Nafis Chonchol" class="form-control">
                                <span style="color: red"> @error('name'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="shopname" class="text-info">Shop Name</label><br>
                                <input type="text" name="shopname" id="shopname" placeholder="Hay Mama" class="form-control">
                                <span style="color: red"> @error('shopname'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="text-info">Mobile</label><br>
                                <input type="text" name="xmobile" id="xmobile" placeholder="016413XXXXX" class="form-control">
                                <span style="color: red"> @error('xmobile'){{"The mobile field is requered!"}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="email" name="email" id="email" placeholder="admin@vshop.com" class="form-control">
                                <span style="color: red"> @error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password" id="password" placeholder="12345678" class="form-control">
                                <span style="color: red"> @error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
                            </div>
                            <br>
                            <div id="login-link" class="text-right">
                                <a href="{{ url('/login-vendor') }}" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
