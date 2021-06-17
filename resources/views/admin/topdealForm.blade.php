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
                        @if(isset($data))
                            @foreach ($data as $item)
                                {{$item->sku}}
                            @endforeach
                        @endif
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../add-topdeal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        @if(isset($data))
                            @foreach ($data as $item)
                            <input type="hidden"  value="{{$item->xitemid}}"  name="xitemid">
                                <div class="form-group">
                                    <label for="xtitle">Title</label>
                                    <input type="text" class="form-control"  value="{{$item->xtitle}}" id="xtitle" name="xtitle" readonly>
                                    <span style="color: red"> @error('xtitle'){{"The title field is required."}}@enderror</span>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label >Discount Type</label>
                                <div className="controls">
                                    <select name='disType' id="disType" class="form-control">
                                        <option value="Percentage">Percentage</option>
                                        <option value="Flat">Flat</option>
                                        <option value="None">None</option>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Discount Ammount</label>
                                <div className="controls">
                                    <input class="form-control" id="disAmt" name="disAmt" type="text" />
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label >MRP</label>
                                <div className="controls">
                                    <input class="form-control" name="xmrp" type="text" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Stock</label>
                                <div className="controls">
                                    <input class="form-control" name="stock" type="text" />
                                </div>
                            </div>
                        </div>                            
                    </div>                  
                </div>
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Top Deal</button>
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



  