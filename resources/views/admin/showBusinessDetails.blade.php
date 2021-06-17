@extends('admin.master')

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
                                <h3 class="card-title pull-left" for="category-title">Business Details</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-danger" href="{{ url('update-business-info-form/'.$data->id) }}"> Update </a>
                            </div>
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
                                        @if (session('alert'))
                                            <div class="alert alert-danger">
                                                {{ session('alert') }}
                                            </div>
                                        @endif

                                        @if (isset($data))
                                        @php
                                                
                                            $file_path=$data->file_path;
                                            if(empty($file_path))
                                                $img="products/default.jpg";
                                            else {
                                                $img=$file_path; 
                                            } 
                                            $logo_path=$data->logo_path;
                                            if(empty($logo_path))
                                                $logo="products/default.jpg";
                                            else {
                                                $logo=$logo_path; 
                                            } 
                                        @endphp

                                            <tr role="row">
                                                <th class=" col-md-2">Shop Name</th>
                                                <th colspan=8 class="text-left">{{$data->shopname}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Shop Contact No</th>
                                                <td colspan=8 class="text-left">{{$data->shop_contact_no}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Short Description</th>
                                                <td colspan=8 class="text-left">{{$data->shop_desc}}</td>
                                            </tr>
                                            
                                            <tr role="row">
                                                <th class=" col-md-2">Shop Logo</th>
                                                <th><img src="{{$logo}}" alt="{{$data->shopname}}" width="150" height="150" ></th>
                                              
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-2">Shop Document Photo</th>
                                                <th colspam=8><img src="{{$img}}" alt="{{$data->shopname}}" width="150" height="150" ></th>
                                                
                                            </tr>
                                    @endif
                                       
                                    </thead>
                                    
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

