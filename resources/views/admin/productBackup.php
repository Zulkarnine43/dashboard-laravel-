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
            <div class="card">
                <div class="card-header row">
                    <div class="col-6">
                        <h3 class="card-title pull-left" for="category-title">Products Created</h3>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <a href="{{ url('/add-product') }}">
                                <button type="button"
                                    class="btn btn-block btn-outline-success btn-sm">Create
                                </button>
                            </a>
                        </div>
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
                                                aria-label="Browser: activate to sort column ascending">Photo
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Seller SKU</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Enlist/Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $item)
                                               @php
                                                
                                                    $file_path=$item->file_path;
                                                    if(empty($file_path))
                                                        $img="products/default.jpg";
                                                    else {
                                                        $n=strpos($file_path,",");
                                                        if($n)
                                                            $img=substr($file_path,0,$n);
                                                        else {
                                                            $img=$file_path;
                                                        }
                                                    }
                                                    
                                               @endphp
                                                <tr class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src={{$img}} alt="{{$item->xtitle}}" width="100" height="100" ></td>
                                                    <td>{{$item->xtitle}}</td>
                                                    <td>{{$item->sku}}</td>
                                                    <td>{{$item->xcat}}</td>
                                                    <td>{{$item->zactive}}</td>
                                                    
                                                    <td>
                                                        
                                                        @if($item->zactive=='Pending')
                                                            <a class="btn btn-outline-success" href="{{ url('edit-product/'.$item->xitemid) }}"> Edit </a>
                                                        @elseif($item->zactive=='Accepted')
                                                            <a class="btn btn-outline-warning" href="{{ url('enlist-form/'.$item->xitemid) }}"> Enlist </a>
                                                            
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="odd">
                                                <td>Don't have data for to be enlisted</td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal fade" id="modal-enlist-sku">
                    <div class="modal-dialog">
                        <div class="modal-content bg-light">
                            <div class="modal-header">
                                <h4 class="modal-title">Enlist-SKU</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Discount Type</label>
                                        <select class="form-control">
                                            <option>None</option>
                                            <option>Percentage</option>
                                            <option>Flat</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Discount Ammount</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Slug">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">MRP</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="Enter Category name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Stock</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="Enter Category name">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-success"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-success">Save
                                    changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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
