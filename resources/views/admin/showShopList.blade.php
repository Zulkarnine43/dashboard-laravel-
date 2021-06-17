@extends('admin.master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="card card-primary col-md-12">
                <div class="card-header row">
                    <div class="col-12">
                        <h3 class="card-title pull-left" for="category-title">Shop List</h3>
                    </div>
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
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
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Shop Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Contact No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data))
                                            @foreach ($data as $item)
                                               
                                                <tr class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->shopname}}</td>
                                                    <td>{{$item->shop_contact_no}}</td>
                                                    <td>{{$item->zactive}}</td>
                                                    
                                                    <td>
                                                            <a class="btn btn-outline-info" href="{{ url('shop-details/'.$item->id) }}"> Details </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                       
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            
        </div>
        <!-- /.container-fluid -->
    </section>
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
