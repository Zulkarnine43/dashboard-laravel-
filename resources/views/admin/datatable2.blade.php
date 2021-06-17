
@extends('admin.master')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    
@endsection

  
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Product</li>
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

        <div class="box">
          <div class="box-body" style="text-align: center;">
              <h3>Previous Order</h3>
              <div id="newOrderCustRatingDiv">
              </div>
          </div>
          <div class="box-body">
              <table id="prevOTable" class="display nowrap table table-hover table-striped table-bordered" style=" text-allign: center;">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Invoice</th>
                          <th>Date</th>
                          <th>Code</th>
                      </tr>
                  </thead>
                  <tbody class="tbody" >
                    <tr>
                      <td>Hello Sir</td>
                      <td>Hello Mam</td>
                      <td>Hello Mam</td>
                      <td>Hello Mam</td>

                    </tr>
                    <tr>
                      <td>Hello Mam</td>
                      <td>Hello Mam</td>
                      <td>Hello Mam</td>
                      <td>Hello Mam</td>
                      
                    </tr>
                  </tbody>
              </table>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function(){
     
      var dataTableInstant=$( '#prevOTable' ).DataTable({
       
    		'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
        	'info': false,
            'autoWidth': true,
            'pageLength': 5
        } );
    });
  </script>

      
@endsection

