@extends('admin.master');
@section('content')
    

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col-6">
                        <h3 class="card-title pull-left" for="category-title">Category Table</h3>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <button type="button" class="btn btn-block btn-outline-secondary btn-sm">All
                                Category</button>
                        </div>
                        <div class="float-right mx-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm"
                                data-toggle="modal" data-target="#modal-add-category">ADD</button>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-block btn-outline-success btn-sm"
                                data-toggle="modal" data-target="#modal-create-category">Create</button>
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
                                                NO
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">Category
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Sub Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Products</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Live Product</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td>1</td>
                                            <td></td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                            <td>Edit Button</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- model create category --}}
                    <div class="modal fade" id="modal-create-category">
                        <div class="modal-dialog">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    
                                    <div class="row">
                                        
                                        <div class="form-group col-6">
                                            <label >Category Name</label>
                                            <input type="text" name="xname" class="form-control" id=""
                                                placeholder="Enter Category name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label >Slug</label>
                                            <input type="text" name="slug" class="form-control" id=""
                                                placeholder="Enter Slug">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Description</label>
                                            <textarea class="form-control" name="xdesc" rows="3"
                                                placeholder="Write Description"></textarea>
                                        </div>
                                        
                                        <div class="form-group col-6">
                                           
                                            <button type="button" name="submit" class="btn btn-outline-success">Save changes</button>
                                            
                                        </div>
                                    
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end model create category --}}

                    {{-- model add category --}}
                    <div class="modal fade" id="modal-add-category">
                        <div class="modal-dialog">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-12">
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary">Save changes</button>
                                </div>
                            </div>
                            #modal-add-category
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>
            <!-- /.content -->
    </div>
</div>
    <!-- /.content-wrapper -->

    @endsection