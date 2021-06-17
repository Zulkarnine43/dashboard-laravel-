@extends('admin.master');

@section('content');

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">
                       Update Bank Info
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../update-bank-info" method="post">
                    @csrf
                    <div class="card-body">
                        
                        @if(isset($data))
                            @foreach ($data as $item)
                            <input type="hidden"  value="{{$item->id}}"  name="id">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="shopname">Shop Name</label>
                                        <input type="text" class="form-control"  value="{{$item->shopname}}" name="shopname" readonly>
                                        
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="bank_account_name">Account Name</label>
                                        <input type="text" class="form-control"  value="{{$item->bank_account_name}}" name="bank_account_name">
                                        <span style="color: red"> @error('bank_account_name'){{"The account name field is required."}}@enderror</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bank_name">Bank Name</label>
                                        <input type="text" class="form-control"  value="{{$item->bank_name}}" name="bank_name">
                                        <span style="color: red"> @error('bank_name'){{"The bank name field is required."}}@enderror</span>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="bank_account_number">Account Number</label>
                                        <input type="text" class="form-control"  value="{{$item->bank_account_number}}" name="bank_account_number">
                                        <span style="color: red"> @error('bank_account_number'){{"The account number field is required."}}@enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bank_routing_number">Routing Number</label>
                                        <input type="text" class="form-control"  value="{{$item->bank_routing_number}}" name="bank_routing_number">
                                        <span style="color: red"> @error('bank_routing_number'){{"The routing number field is required."}}@enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bank_branch">Branch Name</label>
                                        <input type="text" class="form-control"  value="{{$item->bank_branch}}" name="bank_branch">
                                        <span style="color: red"> @error('bank_branch'){{"The branch field is required."}}@enderror</span>
                                    </div>
                                </div>
                                
                            @endforeach
                        @endif
                                        
                </div>
    
                    <div class="card-footer">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary form-control">Update</button>
                    </div>
                  </form>
                </div>
            </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection



  