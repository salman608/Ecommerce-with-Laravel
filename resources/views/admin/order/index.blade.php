@extends('admin.admin_master')
@section('orders') active @endsection
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Orders product</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-md-12">
                    <div class="card pd-20 pd-sm-40">

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Sl</th>
                                    <th class="wd-15p">Invoice No</th>
                                    <th class="wd-15p">Payment Type</th>
                                    <th class="wd-20p">Total</th>
                                    <th class="wd-20p">SubTotal</th>
                                    <th class="wd-20p">Discount</th>
                                    <th class="wd-15p">Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($orders as $key=>$order)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>#{{$order->invoice_no}}</td>
                                        <td>{{$order->payment_type}}</td>
                                        <td>{{$order->total}} tk</td>
                                        <td>{{$order->subtotal}} tk</td>
                                        <td>
                                            @if($order->coupon_discount == NULL)
                                                <span class="badge badge-danger">No</span>
                                            @else
                                                <span class="badge badge-warning">Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('orders-view',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> </a>

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
