@extends('admin.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col-6">
                        <h3 class="card-title pull-left" for="category-title">Top Deal Product List</h3>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <a href="{{ url('/show-products') }}">
                                <button type="button"
                                    class="btn btn-block btn-outline-success btn-sm">Add Top Deal
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
                                                Bank Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">Bank Branch
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Account Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Account Number</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Routing Number</th>
                                         
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Bank Detials</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data))
                                            @foreach ($data as $item)
                                              
                                                <tr class="odd">
                                                    
                                                    <td>{{$item->bank_name}}</td>
                                                    <td>{{$item->bank_branch}}</td>
                                                    <td>{{$item->bank_account_name}}</td>
                                                    <td>{{$item->bank_account_number}}</td>
                                                    <td>{{$item->bank_routing_number}}</td>
                                                    <td>
                                                        <a class="btn btn-outline-danger" href="{{ url('remove-topdeal/'.$item->id) }}"> Update </a>
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

