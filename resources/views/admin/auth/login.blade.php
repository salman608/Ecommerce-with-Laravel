@extends('admin.admin_master')
@section('admin_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin Login <span class="tx-info tx-normal"></span></div>
        <div class="tx-center mg-b-60"></div>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">LogIn</button>
        <form>

        <div class="mg-t-60 tx-center"></a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection
