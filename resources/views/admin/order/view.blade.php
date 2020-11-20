@extends('admin.admin_master')
@section('orders') active @endsection
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
            <span class="breadcrumb-item active">View Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Shipping Information</h6>
                    <br>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname" value="{{$shipping->shipping_first_name}}" readonly >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname" value="{{$shipping->shipping_last_name}}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{$shipping->shipping_email}}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{$shipping->shipping_phone}}" readonly>
                                </div>
                            </div><!-- col-8 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{$shipping->address}}" readonly>
                                </div>
                            </div><!-- col-8 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{$shipping->state}}" readonly>
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Post Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{$shipping->post_code}}" readonly>
                                </div>
                            </div><!-- col-8 -->

                        </div><!-- row -->


                    </div><!-- form-layout -->
                </div><!-- card -->
                </div>
            <br>
            <div class="row">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Order List</h6>
                    <br>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Invoice No: <span class="tx-danger"></span></label>
                                    <input class="form-control" type="text" name="firstname" value="{{$order->invoice_no}}" readonly >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Payment Type: <span class="tx-danger"></span></label>
                                    <input class="form-control" type="text" name="lastname" value="{{$order->payment_type}}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Total Price: <span class="tx-danger"></span></label>
                                    <input class="form-control" type="text" name="email" value="{{$order->total}}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Total: <span class="tx-danger"></span></label>
                                    <input class="form-control" type="text" name="address" value="{{$order->subtotal}}" readonly>
                                </div>
                            </div><!-- col-8 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Coupon Discount: <span class="tx-danger"></span></label>
                                    @if($order->coupon_discount==NULL)
                                    <span class="badge badge-pill badge-success">NO</span>
                                        @else
                                        <span class="badge badge-pill badge-success">{{$order->coupon_discount}}%</span>
                                        @endif
                                </div>
                            </div><!-- col-8 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->
                </div><!-- card -->

            <br>
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Order Item</h6>
                    <br>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>

                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Product Name</th>
                                        <th class="wd-20p">Quantity</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orderItems as $row)

                                        <tr>

                                            <td>
                                                <img src="{{asset($row->product->image_one)}}" alt="" width="50px" height="50px">
                                            </td>
                                            <td>{{$row->product->product_name}}</td>
                                            <td>{{$row->product_qty}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->


        </div>

        </div>
    </div>

@endsection
