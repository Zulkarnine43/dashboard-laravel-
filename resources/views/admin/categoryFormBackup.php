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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Add New Product</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
                    <h3 class="card-title">Create Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="create-category" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                      @endif
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label >Category Name</label>
                            <input type="text" class="form-control" id="xname" name="xname" placeholder="Title Here">
                            <span style="color: red"> @error('xname'){{"The name field is required."}}@enderror</span>
                          </div>
                          <div class="form-group col-md-6">
                            <label >Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug Here">
                            <span style="color: red"> @error('slug'){{"The Slug field is required."}}@enderror</span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="xdesc" rows="3" placeholder="Write Description"></textarea>
                      </div>                      
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" name="add" class="btn btn-primary form-control">Create</button>
                    </div>
                  </form>
                </div>
            </div>
            {{-- Form end --}}

            {{-- Table start --}}
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header ">
                  <h3 class="card-title ">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SI</th>
                      <th>Category</th>
                      <th>Test</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- <tr>
                      <td>1</td>
                      <td>Shirt</td>
                      <td class='btn btn-danger'>Edit</td>
                    </tr> --}}

                    @if($data)
                      
                      @foreach ($data as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->xname}}</td>
                          <td>{{$item->id}}</td>
                          <td class='btn btn-danger'><a href="{{ url('category-update-form/'.$item->id) }}">Edit</a></td>
                        </tr>
                      @endforeach
                    @endif
                    </tbody>
                  
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
            {{-- table end --}}

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
 
  @section('js')

  <!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

      
@endsection


  