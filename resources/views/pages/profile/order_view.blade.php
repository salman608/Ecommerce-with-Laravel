@extends('layouts.fontend_master')
@section('content')
    @push('css')
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
    @endpush

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        @php
                            $categories=App\Category::where('category_status',1)->latest()->get();
                        @endphp
                        <ul>
                            @foreach($categories as $cat)
                                <li><a href="#">{{$cat->category_name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>User Order</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('homepage')}}">Home</a>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container">
        <div class="row mt-5" >
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap" height="100%" width="100%" style="border-radius: 50%">
                    <ul class="list-group-flush list-group">
                        <a href="{{route('home')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.order')}}" class="btn btn-primary btn-sm btn-block">My Order</a>
                        <a class="btn btn-warning btn-sm btn-block" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
          <div class="row">

                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2><h3 class="pull-right">Order #{{$order->invoice_no}}</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{$shipping->shipping_first_name}} {{$shipping->shipping_last_name}}<br>
                                {{$shipping->address}}<br>
                                {{$shipping->state}}<br>
                                {{$shipping->post_code}}
                             </address>
                         </div>
                         <div class="col-xs-6 text-right pull-right">
                             <address>
                                 <strong>Shipped To:</strong><br>
                                 {{$shipping->shipping_first_name}} {{$shipping->shipping_last_name}}<br>
                                 {{$shipping->address}}<br>
                                 {{$shipping->state}}<br>
                                 {{$shipping->post_code}}
                             </address>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xs-6">
                             <address>
                                 <strong>Payment Method:</strong><br>
                                 {{$order->payment_type}}<br>
                                 {{$shipping->shipping_email}}<br>
                                 {{$shipping->shipping_phone}}

                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{$order->created_at}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

              <div class="row">
                  <div class="col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title"><strong>Order summary</strong></h3>
                          </div>
                          <div class="panel-body">
                              <div class="table-responsive">
                                  <table class="table table-condensed">
                                      <thead>
                                      <tr>
                                          <td><strong>Item</strong></td>
                                          <td class="text-center"><strong>Image</strong></td>
                                          <td class="text-center"><strong>Name</strong></td>
                                          <td class="text-center"><strong>Quantity</strong></td>

                                          <td class="text-right"><strong>Totals</strong></td>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                      @foreach($orderItems as $item)
                                      <tr>
                                          <td>{{$item->product->product_code}}</td>
                                          <td class="text-center">
                                              <img src="{{asset($item->product->image_one)}}" alt="" height="30" width="30">
                                          </td>
                                          <td class="text-center">{{$item->product->product_name}}</td>
                                          <td class="text-center">{{$item->product_qty}}</td>
                                          <td class="text-right">$10.99</td>
                                      </tr>
                                      @endforeach
                                      <tr>
                                          <td class="thick-line"></td>
                                          <td class="thick-line"></td>
                                          <td class="thick-line"></td>
                                          <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                          <td class="thick-line text-right">{{$order->subtotal}}tk</td>
                                      </tr>

                                      <tr>
                                          <td class="no-line"></td>
                                          <td class="no-line"></td>
                                          <td class="no-line"></td>
                                          <td class="no-line text-center"><strong>Discount</strong></td>
                                          <td class="no-line text-right">{{$order->coupon_discount}} %</td>
                                      </tr>

                                      <tr>
                                          <td class="no-line"></td>
                                          <td class="no-line"></td>
                                          <td class="no-line"></td>
                                          <td class="no-line text-center"><strong>Total</strong></td>
                                          <td class="no-line text-right">{{$order->total}} tk</td>
                                      </tr>

                                      </tbody>
                                  </table>
                              </div>
                          </div>
            </div>
          </div>
    </div>
@endsection
