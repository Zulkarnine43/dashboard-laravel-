@extends('admin.master');
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
@section('content');
    
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../update-category" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                      @endif
                      @if($data)
                      @foreach ($data as $item)
                      <input type="hidden" id="id" name="id" value="{{$item->id}}">

                      <div class="row">
                        <div class="form-group col-md-6">
                            <label >Category Name</label>
                            <input type="text" class="form-control" value={{$item->xname}} id="xname" name="xname" placeholder="Title Here">
                            <span style="color: red"> @error('xname'){{"The name field is required."}}@enderror</span>
                          </div>
                          <div class="form-group col-md-6">
                            <label >Slug</label>
                            <input type="text" class="form-control" value={{$item->slug}} id="slug" name="slug" placeholder="Slug Here">
                            <span style="color: red"> @error('slug'){{"The Slug field is required."}}@enderror</span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="xdesc" rows="3" placeholder="Write Description">{{$item->xdesc}}
                        
                        </textarea>
                        <span style="color: red"> @error('xdesc'){{"The Description field is required."}}@enderror</span>
                      </div>                      
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" name="add" class="btn btn-primary form-control">Update</button>
                    </div>
                        @endforeach
                    @endif
                  </form>
                </div>
            </div>
            {{-- Form end --}}

           
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
 


  