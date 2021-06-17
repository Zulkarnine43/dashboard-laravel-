@extends('admin.master');

@section('content');

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">
                        Add Product #
                        @if(isset($data))
                            @foreach ($data as $item)
                                {{$item->sku}}
                            @endforeach
                        @endif
                        in 
                        @if(isset($campaign))
                            @foreach ($campaign as $item)
                                {{$item->name}}
                            @endforeach
                        @endif
                        campaign
                        
                        
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../../add-product-to-campaign" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if(\Session::has('dis'))
                            <div class="alert alert-danger">
                                <p>{{\Session::get('dis')}}</p>
                            </div>
                        @endif
                        @if(isset($data))
                            @foreach ($data as $item)
                                <input type="hidden"  value="{{$item->xitemid}}"  name="xitemid">
                                <div class="form-group">
                                    <label for="xtitle">Product Name</label>
                                    <input type="text" class="form-control"  value="{{$item->xtitle}}" id="xtitle" name="xtitle" readonly>
                                    <span style="color: red"> @error('xtitle'){{"The title field is required."}}@enderror</span>
                                </div>
                            @endforeach
                        @endif
                      
                        <div class="row">
                            @if(isset($campaign))
                                @foreach ($campaign as $item)
                                    <input type="hidden"  value="{{$item->id}}"  name="campaign_id">
                                    <div class="form-group col-md-6">
                                        <label >Minimum Discount</label>
                                        <input type="text" class="form-control"  value="{{$item->minDis}}%" id="minDis" name="minDis" readonly>
                                    </div>
                                @endforeach
                            @endif
                            
                            <div class="form-group col-md-6">
                                <label >Discount Amount</label>
                                <div className="controls">
                                    <input class="form-control" id="disAmt" name="disAmt" type="text" />
                                    <span style="color: red"> @error('disAmt'){{"The discount amount field is required."}}@enderror</span>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label >MRP</label>
                                <div className="controls">
                                    <input class="form-control" name="xmrp" type="text" />
                                    <span style="color: red"> @error('xmrp'){{"The mrp field is required."}}@enderror</span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Stock</label>
                                <div className="controls">
                                    <input class="form-control" name="stock" type="text" />
                                    <span style="color: red"> @error('stock'){{"The stock field is required."}}@enderror</span>
                                </div>
                            </div>
                        </div>                            
                    </div>                  
                </div>
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Add To Campaign</button>
                    </div>
                  </form>
                </div>
            </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#disType').change(function () {
                var disType = $("#disType").val();
                if(disType=='None')
                {
                    $("#disAmt").attr('disabled','disabled');
                    $("#disAmt:text").val("");
                }
                else
                {
                    $("#disAmt").removeAttr('disabled');
                }
            });
            
        });
    </script>
  @endsection


  @endsection



  