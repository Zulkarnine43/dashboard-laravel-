@extends('admin.master');

@section('content');
    <style>
      img{
          width: 150px;
          height: 150px;
          border: 1px solid rgb(127, 173, 131);
          margin:2px;
      }
    </style>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Add New Product</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/products-list') }}">Product List</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Product Info</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../edit-product-info" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($data)
                            @foreach ($data as $item)
                              <input type="hidden" name="xitemid" value="{{$item->xitemid}}">
                                <div class="form-group">
                                    <label for="xtitle">Title</label>
                                    <input type="text" class="form-control" value="{{$item->xtitle}}" id="xtitle" name="xtitle">
                                    <span style="color: red"> @error('xtitle'){{"The title field is required."}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="xdesc">Product Details</label>
                                    <textarea class="form-control" name="xdesc" rows="2" >{{$item->xdesc}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                    <label >Seller SKU</label>
                                    <div className="controls">
                                        <input class="form-control" value="{{$item->sku}}" name="sku" type="text" />
                                    </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label >Meta Tag</label>
                                    <div className="controls">
                                        <input class="form-control" value="{{$item->tag}}" name="tag" type="text" placeholder="Separate with comma" />
                                        <span style="color: red"> @error('tag'){{$message}}@enderror</span>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                    <label >Brand</label>
                                    <div className="controls">
                                        <input class="form-control" value="{{$item->xbrand}}" name="xbrand" type="text" />
                                    </div>
                                    </div>
                                    {{-- have to work with category later --}}
                                    <div class="form-group col-md-6">
                                    <label >Category</label>
                                    <div className="controls">
                                        <select name='xcat' class="form-control">
                                            <option value="{{$item->xcat}}">{{$item->xcat}}</option>
                                        @if($category)
                                            @foreach ($category as $item)
                                            <option value="{{$item->xname}}">{{$item->xname}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label >Product Images</label>
                                    <div className="controls">
                                    
                                    <input type="file" id="upload_file" class="form-control"  name="upload_file[]" onchange="preview_image();" multiple/>
                                    <span style="color: red"> @error('upload_file'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                <div id="image_preview"></div>
                            @endforeach
                            @else
                                <script>window.location = "/dashboard";</script>
                            @endif
                        </div>
                                <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Edit Product</button>
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

  <script>
    function preview_image() 
    {
      var total_file=document.getElementById("upload_file").files.length;
      for(var i=0;i<total_file;i++)
      {
        $('#image_preview').append("<img  src='"+URL.createObjectURL(event.target.files[i])+"'>");
      }
    }
    
  </script>



  @endsection



  