<!DOCTYPE html>
<html>
<head>
 
<link rel="stylesheet" media='all' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
{{-- <link rel="stylesheet" media='all' href="{{}}">  --}}
{{-- <link rel="stylesheet" media="all" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}

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
                            @if (isset($customer))
                                @foreach ($customer as $item)
                                    <p>#{{$item->invoice}}</p>
                                    <P>Date: {{$item->ztime}}</P>
                                @endforeach    
                            @endif
                        
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-7 col-xs-7">  
                        <p >Bill To</p>
                        @if (isset($customer))
                           @foreach ($customer as $item)
                            <h3>{{$item->xname}}</h3>
                            <p>Mobile: {{$item->xmobile}}</p>
                            <p>Email: {{$item->xemail}}</p>
                            <p>Delivery Address: {{$item->xadd}}</p>
                           @endforeach 
                        @endif
                        
                    </div>
                    <div class="col-sm-5 col-xs-5">
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
                            @if (isset($customer))
                                @foreach ($customer as $item)
                                    <p>#{{$item->invoice}}</p>
                                    <P>Date: {{$item->ztime}}</P>
                                @endforeach    
                            @endif
                        
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-7 col-xs-7">  
                        <p >Bill To</p>
                        @if (isset($customer))
                           @foreach ($customer as $item)
                            <h3>{{$item->xname}}</h3>
                            <p>Mobile: {{$item->xmobile}}</p>
                            <p>Email: {{$item->xemail}}</p>
                            <p>Delivery Address: {{$item->xadd}}</p>
                           @endforeach 
                        @endif
                        
                    </div>
                    <div class="col-sm-5 col-xs-5">
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
             {{-- Start one order Item card --}}
             <div class="col-xs-6 col-sm-6">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Order Items</h3>
                    </div>
                    <div class="card-body">
                        {{-- Order items body --}}
                        <div>
                            @php
                                $total=0;
                                $paidAmt=0;
                            @endphp
                            @if (isset($orderitems))
                            @foreach ($orderitems as $item)
                                @php
                                    $total=$total+$item->subtotal;
                                    $paidAmt=$item->paidAmt;
                                    $file_path=$item->file_path;
                                    if(empty($file_path))
                                        $img="/products/default.jpg";
                                    else {
                                        $n=strpos($file_path,",");
                                        if($n)
                                            $img="/".substr($file_path,0,$n);
                                        else {
                                            $img="/".$file_path;
                                        }
                                    } 
                        
                                @endphp
                                <br>
                                <div class="row">
                                    <div class="col-xs-1 col-sm-1"> <p>{{$loop->iteration}}</p></div>
                                    <div class="col-xs-2 col-sm-2"><img src="{{$img}}" alt="image" width="70" height="70"> </div>
                                    <div class="col-xs-4 col-sm-5">
                                        <p>{{$item->xtitle}} # {{$item->sku}}</P>
                                    </div>
                                    <div class="col-xs-3 col-sm-2"><p>&#2547; {{$item->unitsale}} X {{$item->xqty}} </p></div>
                                    <div class="col-xs-2 col-sm-2"><p class="text-right pr-3">&#2547; {{$item->subtotal}} </p></div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                       
                        <hr>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right ">
                                <p>Total</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$total}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Paid</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$paidAmt}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Due</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$total-$paidAmt}}</p>
                            </div>
                        </div>        
                        

                    </div>{{-- Order items body end --}}
                </div>
            </div> {{-- end one Item card --}}


            {{-- Start another order Item card --}}
            <div class="col-xs-6 col-sm-6">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Order Items</h3>
                    </div>
                    <div class="card-body">
                        {{-- Order items body --}}
                        <div>
                            @php
                                $total=0;
                                $paidAmt=0;
                            @endphp
                            @if (isset($orderitems))
                            @foreach ($orderitems as $item)
                                @php
                                    $total=$total+$item->subtotal;
                                    $paidAmt=$item->paidAmt;
                                    $file_path=$item->file_path;
                                    if(empty($file_path))
                                        $img="/products/default.jpg";
                                    else {
                                        $n=strpos($file_path,",");
                                        if($n)
                                            $img="/".substr($file_path,0,$n);
                                        else {
                                            $img="/".$file_path;
                                        }
                                    } 
                        
                                @endphp
                                <br>
                                <div class="row">
                                    <div class="col-xs-1 col-sm-1"> <p>{{$loop->iteration}}</p></div>
                                    <div class="col-xs-2 col-sm-2"><img src="{{$img}}" alt="image" width="70" height="70"> </div>
                                    <div class="col-xs-4 col-sm-5">
                                        <p>{{$item->xtitle}} # {{$item->sku}}</P>
                                    </div>
                                    <div class="col-xs-3 col-sm-2"><p>&#2547; {{$item->unitsale}} X {{$item->xqty}} </p></div>
                                    <div class="col-xs-2 col-sm-2"><p class="text-right pr-3">&#2547; {{$item->subtotal}} </p></div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                       
                        <hr>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right ">
                                <p>Total</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$total}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Paid</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$paidAmt}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 text-right">
                                <p>Due</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 text-right">
                                <p class="pr-3">&#2547; {{$total-$paidAmt}}</p>
                            </div>
                        </div>        
                    </div>{{-- Order items body end --}}
                </div>
            </div> {{-- Start anotehr Item card --}}

        </div>
    </div>
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>