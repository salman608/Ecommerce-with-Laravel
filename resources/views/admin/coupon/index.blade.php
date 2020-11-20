@extends('admin.admin_master')
@section('coupon') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Coupon</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
      <div class="col-md-8">
        <div class="card pd-20 pd-sm-40">

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl</th>
                  <th class="wd-15p">Coupon Name</th>
                  <th class="wd-15p">Coupon Discount</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>

                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($coupons as $coupon)

                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$coupon->coupon_name}}</td>
                  <td>{{$coupon->coupon_discount}}</td>
                  <td>
                       @if($coupon->coupon_status == 1)
                       <span class="badge badge-success">Active</span>
                       @else
                       <span class="badge badge-warning">Inactive</span>
                       @endif
                  </td>
                  <td>
                    <a href="{{route('coupon.edit',$coupon->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> </a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                    @if($coupon->coupon_status==1)
                    <a href="{{route('coupon.inactive',$coupon->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i> </a>
                    @else
                    <a href="{{route('coupon.active',$coupon->id)}}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> </a>
                    @endif
                  </td>
                </tr>
             @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div>

      <div class="col-md-4">
          <div class="card">
              <div class="card-header bg-warning text-white">Add Coupon
              </div>

              <div class="card-body">
                  {{-- @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif --}}

            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                  <form action="{{route('coupon.store')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Coupon name</label>
                        <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter coupon Name">

                        @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Coupon Discount</label>
                        <input type="text" name="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter coupon Discount">

                        @error('coupon_discount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Add Coupon</button>
                    </form>

              </div>
          </div>

      </div>
        </div>
    </div>

</div>

@endsection
