@extends('admin.master')
@section('css')
    <style>
        /* a.Reject {
            pointer-events: none !important;
            cursor: default;
            color:Gray;
        } */
    </style>
@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content pt-2">
        <div class="container-fluid">
            
            <div class="card card-primary col-md-12">
                <div class="card-header row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="card-title pull-left" for="category-title">Shop Details</h3>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-9">
                                <table id="example1"
                                    class="table table-bordered table-striped dataTable dtr-inline text-center"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        @if (session('alert'))
                                            <div class="alert alert-danger">
                                                {{ session('alert') }}
                                            </div>
                                        @endif

                                        @if (isset($data))
                                            @php
                                                    
                                                $file_path=$data->file_path;
                                                if(empty($file_path))
                                                    $img="../products/default.jpg";
                                                else {
                                                    $img='../'.$file_path; 
                                                } 
                                                $logo_path=$data->logo_path;
                                                if(empty($logo_path))
                                                    $logo="../products/default.jpg";
                                                else {
                                                    $logo='../'.$logo_path; 
                                                } 
                                            @endphp

                                            <tr role="row">
                                                <th class=" col-md-2">Name</th>
                                                <th colspan=8 class="text-left">{{$data->name}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Shop Name</th>
                                                <td colspan=8 class="text-left">{{$data->shopname}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Created At</th>
                                                <td colspan=8 class="text-left">{{explode(" ", $data->ztime)[0]}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Contact No</th>
                                                <td colspan=8 class="text-left">{{$data->shop_contact_no}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Email</th>
                                                <td colspan=8 class="text-left">{{$data->email}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Status</th>
                                                <td colspan=8 class="text-left" id="zactive">{{$data->zactive}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Description</th>
                                                <td colspan=8 class="text-left">{{$data->shop_desc}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Update Status</th>
                                                <td  class="text-left">
                                                    <a class="btn btn-primary" id='Accept' href="{{ url('../update-shop-status/Accept/'.$data->id) }}"> Accept </a>
                                                </td>
                                                <td  class="text-left"> 
                                                    <a href="{{ url('../update-shop-status/Reject/'.$data->id) }}" id="Reject" class="Reject btn btn-danger">Reject</a>
                                                </td>
                                            </tr>
                                            
                                    @endif
                                       
                                    </thead>
                                    
                                </table>
                            </div>
                            <div class="col-sm-3">
                                <div class="logo text-center">
                                    <img src="{{$logo}}" alt="{{$data->shopname}}" class="mx-5 " width="170" height="150" >
                                    <small>Shop Logo</small>
                                </div>
                                <div class="document py-4 text-center">
                                    <img src="{{$img}}" alt="{{$data->shopname}}" width="300" height="250" >
                                    <small>Shop Document</small>
                                </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        
        var zactive=$("#zactive").text();
        
        if(zactive=='Reject')
        {
            $("#Reject").css("pointer-events", "none");
            $("#Reject").css("background", "Gray");
        }
        else if(zactive=='Accept')
        {
            $("#Accept").css("pointer-events", "none");
            $("#Accept").css("background", "Gray");

        }
    });
</script>
@endsection

