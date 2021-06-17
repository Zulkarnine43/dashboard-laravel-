@extends('admin.master');


@section('content');
   
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                      <div class="row">
                        <div class="col-10">
                            @if (isset($customer))
                                @foreach ($customer as $item)
                                    <h3 class="card-title">INVOICE- #{{$item->invoice}}</h3>
                                    <br>
                                    @php
                                        $date=date_format(date_create($item->ztime),'j F Y g:iA')
                                    @endphp
                                    <p>CREATED AT {{$date}}</p>
                            @endforeach
                            @endif
                        </div>
                        <div class="col-2 text-right">
                            <button class="btn btn-secondary"> <i class="fas fa-print"></i>
                                Print Invoice</button>
                        </div>
                      </div>
                    </div>  {{-- end invocie card header  --}}
                    
                    <div class="card-body">
                        <div class="row">
                            {{-- Customer card --}}
                            <div class="col-md-5">
                                <div class="card card-light">
                                    <div class="card-header">
                                        <h3 class="card-title">Customer</h3>
                                    </div>
                                    <div class="card-body">
                                        @if (isset($customer))
                                            @foreach ($customer as $item)
                                                
                                                <h3>{{$item->xname}}</h3>
                                                <div class="row">
                                                    <i class="fas fa-phone-alt fa-lg"></i> &nbsp<p>{{$item->xmobile}}</p>
                                                </div>
                                                <div class="row">  
                                                    <i class="far fa-envelope fa-2x"></i>&nbsp<h5>{{$item->xemail}}</h5>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <i class="fas fa-map-marker-alt fa-lg"></i> &nbsp<p>{{$item->xadd}}</p>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div> {{-- end customer card body --}}
                                </div>
                            </div>
                            {{-- end customer card --}}

                            {{-- Start Order Item card --}}
                            <div class="col-md-7">
                                <div class="card card-light">
                                    <div class="card-header">
                                        <h3 class="card-title">Order Items</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            @php
                                                $total=0;
                                            @endphp
                                            @if (isset($orderitems))
                                                @foreach ($orderitems as $item)
                                                    @php
                                                       $total=$total+$item->subtotal; 
                                                        $file_path=$item->file_path;
                                                        if(empty($file_path))
                                                            $img="../products/default.jpg";
                                                        else {
                                                            $n=strpos($file_path,",");
                                                            if($n)
                                                                $img="../".substr($file_path,0,$n);
                                                            else {
                                                                $img="../".$file_path;
                                                            }
                                                        } 
                                           
                                                    @endphp
                                                    <div class="row my-2">
                                                        <div class="col-1"> <p>{{$loop->iteration}}</p></div>
                                                        <div class="col-2"><img src="{{$img}}" alt="{{$item->xtitle}}" width="70" height="70"> </div>
                                                        <div class="col-5">
                                                            <p>{{$item->xtitle}} #{{$item->sku}}</P>
                                                        </div>
                                                        <div class="col-2"><p>&#2547; {{$item->unitsale}} X {{$item->xqty}} </p></div>
                                                        <div class="col-2"><p class="text-right pr-3">&#2547; {{$item->subtotal}}  </p></div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            

                                        
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-8 text-right ">
                                                <p>Total</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <p class="pr-3">&#2547; {{$total}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 text-right">
                                                <p>Paid</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <p class="pr-3">&#2547; {{$item->paidAmt}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 text-right">
                                                <p>Due</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <p class="pr-3">&#2547; {{$total-$item->paidAmt}}</p>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div> {{-- End order items card --}}
                            
                            {{-- Status Timeline card --}}
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Status Update</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label >Status</label>
                                                <div className="controls">
                                                    <select name='xcat' class="form-control">
                                                        <option value="">Pending</option>
                                                        <option value="">Confirmed</option>
                                                        <option value="">Process</option>
                                                        <option value="">Picked</option>
                                                        <option value="">Shipped</option>
                                                        <option value="">Delivered</option>
                                                        <option value="" hidden>Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="note">Note</label>
                                                <input type="text" class="form-control"   id="note" name="note" >
                                                <span style="color: red"> @error('note'){{"The note field is required."}}@enderror</span>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <br>
                                                <button type="submit" name="add" class="btn btn-primary form-control mt-2">SUBMIT</button>
                                            </div>
                                        </div>

                                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example1"
                                                        class="table table-bordered table-striped dataTable dtr-inline text-center"
                                                        role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting sorting_asc w-5" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-sort="ascending"
                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                    SI
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending">Date
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                    Status</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending">
                                                                   Note</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>2021-05-25</td>
                                                                <td>Pending</td>
                                                                <td>Testing</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>2021-05-26</td>
                                                                <td>Confirmed</td>
                                                                <td>Testing</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>2021-05-26</td>
                                                                <td>Processing</td>
                                                                <td>Testing</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>2021-05-27</td>
                                                                <td>Picked</td>
                                                                <td>Testing</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div> {{-- end customer card body --}}
                                </div>
                            </div>  {{-- End Status Timeline card --}}
                           
                            
                        </div> {{-- end card row invoie --}}
                    </div> {{-- end card invocie body--}}
                </div> {{-- end invoice card --}}
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div> <!-- /.content wrapper -->




  @endsection



  