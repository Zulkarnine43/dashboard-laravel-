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
                                <h3 class="card-title pull-left" for="category-title">Campaign Registration</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-warning" href="{{ url('../save-reg-campaign/'.$data->id) }}"> Register </a>
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
                                            <tr role="row">
                                                <th class=" col-md-3 text-left">Campaign Name</th>
                                                <td colspan=8 class="text-left">{{$data->name}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-3 text-left">Registration Time</th>
                                                <td colspan=8 class="text-left">{{$data->reg_time}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-3 text-left">Start Time</th>
                                                <td colspan=8 class="text-left">{{$data->start_time}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-3 text-left">End Time</th>
                                                <td colspan=8 class="text-left">{{$data->end_time}}</td>
                                            </tr>
                                            <tr role="row">
                                                <th class=" col-md-3 text-left">Minimum Discount</th>
                                                <td colspan=8 class="text-left">{{$data->minDis}}%</td>
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

