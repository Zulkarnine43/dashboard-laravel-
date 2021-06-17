@extends('admin.master');
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
@section('content');
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        {{-- Card start --}}
        <div class="row">
        @if (isset($status))
          @foreach ($status as $item)  
            @php
                if($item->zactive=='Confirmed')
                {
                  $bg="bg-warning";
                  $or="order-2";
                }
                else if($item->zactive=='Pending')
                {
                  $bg="bg-secondary";
                  $or="order-1";
                }
                else if($item->zactive=='Processing')
                {
                  $bg="bg-dark";
                  $or="order-3";
                }
                else if($item->zactive=='Picked')
                {
                  $bg="bg-warning";
                  $or="order-4";
                }  
                else if($item->zactive=='Shipped')
                {
                  $bg="bg-info";
                  $or="order-5";
                }   
                else if($item->zactive=='Delivered')
                {
                  $bg="bg-success";
                  $or="order-6";
                } 
                else if($item->zactive=='Cancel')
                {
                  $bg="bg-danger";
                  $or="order-7";
                }
            @endphp
            <div class="col-lg-3 col-6 {{$or}}">
              {{-- <div class="small-box bg-warning"> --}}
              <div class="small-box {{$bg}}">
                <div class="inner">
                  <h3>{{$item->total}}</h3>
                  <p>{{$item->zactive}}</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @endforeach
        @endif

        </div>
        {{-- card end --}}


        
        <div class="row">
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="col-12">
                            <h3 class="card-title pull-left" for="category-title">Order List</h3>
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
                                                    aria-label="Browser: activate to sort column ascending">Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Invoice No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Seller SKU</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Order Ammount</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if (isset($data))  
                                            @foreach ($data as $item)
                                              <tr class="odd">
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$item->xdate}}</td>
                                                  <td>{{$item->invoice}}</td>
                                                  <td>{{$item->sku}}</td>
                                                  <td>{{$item->unitsale}}</td>
                                                  <td>{{$item->zactive}}</td>
                                                  <td>
                                                      <a class="btn btn-outline-primary" href="{{ url('order-details/'.$item->invoice) }}"> Details </a> 
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
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
    "buttons": ["copy", "csv", "pdf", "print"]
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

  