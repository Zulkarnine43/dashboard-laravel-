@extends('admin.master');
@section('css')
    <style>
      img{
        height: 100px;
        width: 100px;
        border:1px solid rgb(35, 174, 209);
      }
    </style>
@endsection

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
                        Create Campaign
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="create-campaign" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Campaign Name</label>
                                <input type="text" class="form-control"   id="name" name="name">
                                <span style="color: red"> @error('name'){{"The name field is required."}}@enderror</span>
                            </div>

                            
                        </div> 

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label >Minimum Seller Discount</label>
                                <div className="controls">
                                    <input class="form-control" id="minDis" name="minDis" type="text" />
                                    <span style="color: red"> @error('minDis'){{"This field is required."}}@enderror</span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="xtitle">Campaign Registration Time</label>
                                <input type="date" id="datepicker" class="form-control" value="{{date('Y-m-d')}}" name="reg_time">
                                <span style="color: red"> @error('reg_time'){{"This field is required."}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="xtitle">Campaign Start Time </label>
                               
                                <input type="date" id="datepicker" class="form-control" value="{{date('Y-m-d')}}"  name="start_time">
                                <span style="color: red"> @error('start_time'){{"This field is required."}}@enderror</span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="xtitle">Campaign End Time </label>
                               
                                <input type="date" id="datepicker" class="form-control" value="{{date('Y-m-d')}}" name="end_time">
                                <span style="color: red"> @error('end_time'){{"This field is required."}}@enderror</span>
                            </div>
                            
                        </div>   
                                 
                            <div class="form-group">
                              <label >Image</label>
                              <div className="controls">
                               
                                <input type="file" id="file" class="form-control" name="file" onchange="preview_campaign();"/>
                                <span style="color: red"> @error('file'){{"The image field is required."}}@enderror</span>
                              </div>
                           </div>
                           <div id="image_preview"></div>
                         
                         
                            
                    </div>                  
                </div>
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Create</button>
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
  @endsection

  @section('js')
  <script>
    
    function preview_campaign()
    {
        $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[0])+"'>");
    }
    
  </script> 
  @endsection




  