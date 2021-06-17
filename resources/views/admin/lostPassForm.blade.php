<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vShop || Reset Password</title>
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
                        <form class="form" action="request-reset-pass" method="post">
                            @csrf
                            <div class="pt-4 mt-4">
                                @if(\Session::has('wrong'))
                                    <div class="alert alert-danger">
                                        <p>{{\Session::get('wrong')}}</p>
                                    </div>
                                @endif
                                <h3 class="text-center text-info">Enter Mobile Number</h3>
                                <div class="form-group">
                                    
                                    <input type="text" name="xmobile" id="xmobile" placeholder="Enter your mobile number" class="form-control">
                                    <span style="color: red"> @error('xmobile'){{"The mobile field is required.
                                        "}}@enderror</span>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="submit" class="text-info">
                                    <input type="submit" name="submit" class="btn btn-danger form-control" value="Reset">
                                </div>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
