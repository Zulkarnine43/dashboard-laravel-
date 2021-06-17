<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vShop || Set Otp</title>
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
                        <form id="otp-form" class="form" action="check-otp-pass" method="post">
                            @csrf
                            <div class="pt-4 mt-4">
                                @if(\Session::has('wrong'))
                                    <div class="alert alert-danger">
                                        <p>{{\Session::get('wrong')}}</p>
                                    </div>
                                @endif
                                
                                <h3 class="text-center text-info">Reset Password</h3>
                                <div class="form-group">
                                    <label for="otp" class="text-info">Otp</label><br>
                                    <input type="text" name="otp" id="otp" placeholder="A message sent to your mobile with an otp " class="form-control">
                                    <span style="color: red"> @error('otp'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Password</label><br>
                                    <input type="password" name="password" id="password" placeholder="12345678" class="form-control">
                                    <span style="color: red"> @error('password'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="submit" class="text-info">
                                    <input type="submit" name="submit" class="btn btn-info form-control" value="Reset">
                                </div>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
