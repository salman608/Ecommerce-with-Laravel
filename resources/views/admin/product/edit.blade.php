@extends('admin.admin_master')
@section('product') active show-sub @endsection
@section('add-product') active  @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Update Products</span>
  </nav>
  <div class="sl-pagebody">
    <div class="row">
      <div class="card pd-20 pd-sm-40">
        <h5 class="card-body-title">Edit Products</h5>

        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

        <form method="post" action="{{route('update.product')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$product->id}}">
          <input type="hidden" name="img_one" value="{{$product->image_one}}">
          <input type="hidden" name="img_two" value="{{$product->image_two}}">
          <input type="hidden" name="img_three" value="{{$product->image_three}}">

        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">ProductName: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                @error('product_name')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}">
                @error('product_code')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">ProductPrice: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_price" value="{{$product->product_price}}" placeholder="Enter email address">
                @error('product_price')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">ProductQuantity: <span class="tx-danger">*</span></label>
                <input class="form-control" type="number" name="product_quantity" value="{{$product->product_quantity}}" placeholder="Enter product quantity">
                @error('product_quality')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">BrandName: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                  <option label="Choose Brand"></option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}" {{$brand->id==$product->brand_id?"selected":''}}>{{$brand->brand_name}}</option>
                  @endforeach
                </select>
                @error('brand_id')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">CategoryName: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                  <option label="Choose Category"></option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" {{$category->id==$product->category_id?"selected":''}}>{{$category->category_name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                <textarea name="short_description" class="form-control" id='summernote'>{!!$product->short_description!!}</textarea>
              </div>
              @error('short_description')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
            </div><!-- col-4 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                <textarea name="long_description" class="form-control" id='summernote2'>{!!$product->long_description!!}</textarea>
              </div>
              @error('long_description')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
            </div><!-- col-4 -->


            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Thumnail: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="image_one">
              </div>
              @error('image_one')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
                <img src="{{asset($product->image_one)}}" width="100px" height="100px" alt="">
            </div><!-- col-4 -->



            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">ProductImage2: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="image_two" >
              </div>
              @error('image_two')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
                <img src="{{asset($product->image_two)}}" width="100px" height="100px" alt="">
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">ProductImage3: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="image_three"  >
              </div>
              @error('image_three')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
                <img src="{{asset($product->image_three)}}" width="100px" height="100px" alt="">
            </div><!-- col-4 -->
          </div><!-- row -->


          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Update product</button>

          </div><!-- form-layout-footer -->
        </form>
        </div><!-- form-layout -->
      </div><!-- card -->
      </div>
    </div>

</div>
@endsection
1>
