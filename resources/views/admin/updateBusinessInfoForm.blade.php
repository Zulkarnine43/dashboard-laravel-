@extends('admin.master');

@section('css')

<style>
    img{
        width: 150px;
        height: 150px;
        border: 1px solid rgb(127, 173, 131);
        margin:2px;
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
                       Update Business Info
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../update-business-info" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        @if(isset($data))
                            @foreach ($data as $item)
                            <input type="hidden"  value="{{$item->id}}"  name="id">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="shopname">Shop Name</label>
                                        <input type="text" class="form-control"  value="{{$item->shopname}}" name="shopname" readonly>
                                        
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="shop_contact_no">Shop Contact Number</label>
                                        <input type="text" class="form-control"  value="{{$item->shop_contact_no}}" name="shop_contact_no">
                                        <span style="color: red"> @error('shop_contact_no'){{"The shop contact field is required."}}@enderror</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="shop_desc">Short Description</label>
                                       
                                        <textarea class="form-control" name="shop_desc">{{$item->shop_desc}}</textarea>
                                        <span style="color: red"> @error('shop_desc'){{"The description field is required."}}@enderror</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label >Shop Document Photo</label>
                                        <div className="controls">
                                          <input type="file" id="file_path" class="form-control" name="file_path" onchange="preview_image();"/>
                                          <span style="color: red"> @error('file_path'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Shop Logo</label>
                                        <div className="controls">
                                         
                                          <input type="file" id="logo_path" class="form-control" name="logo_path" onchange="preview_logo();"/>
                                          <span style="color: red"> @error('logo_path'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- preview images here --}}
                                <div class="row">
                                    <div class="col-6">
                                        <div id="image_preview"></div>
                                    </div>
                                    <div class="col-6">
                                        <div id="logo_preview"></div>
                                    </div>
                                </div>
                                 
                                
                            @endforeach
                        @endif
                                        
                </div>
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Update</button>
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
    function preview_image() 
    {
      
        $('#image_preview').append("<img  src='"+URL.createObjectURL(event.target.files[0])+"'>");
      
    }
    function preview_logo()
    {
        $('#logo_preview').append("<img  src='"+URL.createObjectURL(event.target.files[0])+"'>");
    }
    
  </script> 
  @endsection



  