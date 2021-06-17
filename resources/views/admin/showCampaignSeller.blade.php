@extends('admin.master');

@section('content');

  <!-- Content Wrapper-->
  <div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary col-md-12">
                <div class="card-header row">
                    <div class="col-12">
                        <h3 class="card-title pull-left" for="category-title">Campaigns</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">

        {{-- Card start --}}
        <div class="row">

            @isset($data)
                @foreach ($data as $item)

                    @php
                        if($item->isReg=='Not registered')
                            $txt="text-dark";
                        else {
                            $txt='text-secondary';
                        }
                    @endphp
                    <div class="col-lg-4 col-6 ">
                        {{-- <div class="small-box bg-warning"> --}}

                        <div class="small-box bg-info">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{$item->name}}</p>
                                    </div>
                                    <div class="col-6 text-lg font-weight-bold text-right {{$txt}}">
                                        <p>{{$item->isReg}}</p>
                                    </div>

                                </div>
                                <p class="text-warning text-lg font-weight-bold"">{{$item->reg_time}}</p>
                            </div>
                            <a href="{{ url('campaign-reg/'.$item->id) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>

                    </div>

                @endforeach
            @endisset


        </div>
        {{-- card end --}}


      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  @endsection

