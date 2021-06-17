<!DOCTYPE html>
<html>
<head>
 
<link rel="stylesheet" media='all' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            {{-- start one side design --}}
            <div class="col-xs-6 col-sm-6">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">  
                        {{date('d/m/Y')}}   
                        <h2><b>vShop</b></h2>
                        <p >House #8, Road #14</p>
                        <p >Shantinagar,Dhaka</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="text-right">
                            {{date('h:i:s A')}}
                            <h2>INVOICE</h2>
                            <p>#VS2105251</p>
                            <P>Date: 2021-05-25 06:24PM</P>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">  
                        <p >Bill To</p>
                        <h3>Nafis Chonchol</h3>
                        <p>Mobile: 01641377742</p>
                        <p>Contact: 01742263748</p>
                        <p>Delivery Address: Dharat,Gharinda,Tangail Sadar,Tamgail</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="text-right">
                            <p>Bill Form</p>
                            <img src="https://scontent.fdac5-1.fna.fbcdn.net/v/t1.6435-9/154078063_100617435425312_1337631750012533268_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=FbzQiKANqXcAX9MVRTf&_nc_ht=scontent.fdac5-1.fna&oh=9b618f20b7966ce169d6c5656d12d05f&oe=60D1DEB4"  width="70" height="70"alt="shop name">
                            <p>Haymama Shop</p>
                            <p>Dhaka,Bangladesh</p>
                            <P>Mobile: 01745997212</P>
                        </div>
                    </div>
                </div>
            </div>
           
            {{-- end one side design --}}

            {{-- start second side design --}}
            <div class="col-xs-6 col-sm-6">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">  
                        {{date('d/m/Y')}}   
                        <h2><b>vShop</b></h2>
                        <p >House #8, Road #14</p>
                        <p >Shantinagar,Dhaka</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="text-right">
                            {{date('h:i:s A')}}
                            <h2>INVOICE</h2>
                            <p>#VS2105251</p>
                            <P>Date: 2021-05-25 06:24PM</P>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">  
                        <p >Bill To</p>
                        <h3>Nafis Chonchol</h3>
                        <p>Mobile: 01641377742</p>
                        <p>Contact: 01742263748</p>
                        <p>Delivery Address: Dharat,Gharinda,Tangail Sadar,Tamgail</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="text-right">
                            <p>Bill Form</p>
                            <img src="https://scontent.fdac5-1.fna.fbcdn.net/v/t1.6435-9/154078063_100617435425312_1337631750012533268_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=FbzQiKANqXcAX9MVRTf&_nc_ht=scontent.fdac5-1.fna&oh=9b618f20b7966ce169d6c5656d12d05f&oe=60D1DEB4"  width="70" height="70"alt="shop name">
                            <p>Haymama Shop</p>
                            <p>Dhaka,Bangladesh</p>
                            <P>Mobile: 01745997212</P>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end second side design --}}
        </div> {{-- end row --}}
        
        <div class="row">
             {{-- Start one Item card --}}
             <div class="col-xs-6 col-sm-6">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Order Items</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="row my-2">
                                <div class="col-xs-1 col-sm-1"> <p>1</p></div>
                                <div class="col-xs-2 col-sm-2"><img src="https://static-01.daraz.com.bd/p/19c3f264228cd415d64922c54c9a7e81.jpg" alt="image" width="70" height="70"> </div>
                                <div class="col-xs-5 col-sm-5">
                                    <p>Girls Pacek #mt01</P>
                                </div>
                                <div class="col-xs-2 col-sm-2"><p>&#2547; 1200 X 2 </p></div>
                                <div class="col-xs-2 col-sm-2"><p class="text-right pr-3">&#2547; 2400 </p></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right ">
                                <p>Total</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 2400</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Paid</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 00</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Due</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 2400</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div> {{-- Start one Item card --}}

            {{-- Start another Item card --}}
            <div class="col-xs-6 col-sm-6">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Order Items</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="row my-2">
                                <div class="col-xs-1 col-sm-1"> <p>1</p></div>
                                <div class="col-xs-2 col-sm-2"><img src="https://static-01.daraz.com.bd/p/19c3f264228cd415d64922c54c9a7e81.jpg" alt="image" width="70" height="70"> </div>
                                <div class="col-xs-5 col-sm-5">
                                    <p>Girls Pacek #mt01</P>
                                </div>
                                <div class="col-xs-2 col-sm-2"><p>&#2547; 1200 X 2 </p></div>
                                <div class="col-xs-2 col-sm-2"><p class="text-right pr-3">&#2547; 2400 </p></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right ">
                                <p>Total</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 2400</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Paid</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 00</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Due</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; 2400</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div> {{-- Start anotehr Item card --}}

        </div>
    </div>
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>