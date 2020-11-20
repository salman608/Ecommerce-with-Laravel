@extends('admin.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">

      <div class="col-md-8 m-auto">
          <div class="card">
              <div class="card-header bg-warning text-white">Edit Coupon
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

                  <form action="{{route('coupon.update')}}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{$coupon->id}}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Coupon name</label>
                        <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$coupon->coupon_name}}">

                        @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Coupon Discount</label>
                        <input type="text" name="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$coupon->coupon_discount}}">

                        @error('coupon_discount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Update Coupon</button>
                    </form>




              </div>
          </div>

      </div>
        </div>
    </div>

</div>
@endsection
