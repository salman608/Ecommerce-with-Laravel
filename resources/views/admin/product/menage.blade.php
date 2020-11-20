@extends('admin.admin_master')
@section('product') active show-sub @endsection
@section('menage-product') active  @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Menage Products</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
      <div class="col-md-12">
        <div class="card pd-20 pd-sm-40">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if(session('delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('delete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
          <h3 class="card-body-title">Product List</h3>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-20p">Product Qunt</th>
                  <th class="wd-20p">Pd Code</th>
                  <th class="wd-20p">Price</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>

                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($products as $product)

                <tr>
                  <td>
                    <img src="{{asset($product->image_one)}}" width="50px" height="50px" alt="">
                  </td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_quantity}}</td>
                  <td>{{$product->product_code}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->category->category_name}}</td>
                  <td>
                       @if($product->product_status == 1)
                       <span class="badge badge-success">Active</span>
                       @else
                       <span class="badge badge-warning">Inactive</span>
                       @endif
                  </td>
                  <td>
                    <a href="{{route('edit.product',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> </a>
                    <a href="{{route('delete.product',$product->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                    @if($product->product_status==1)
                    <a href="{{route('inactive.product',$product->id)}}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> </a>

                    @else
                    <a href="{{route('active.product',$product->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i> </a>
                    @endif
                  </td>
                </tr>
             @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div>


        </div>
    </div>

</div>
@endsection
