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
              <div class="card-header bg-warning text-white">Edit Brand
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

                  <form action="{{route('update.brand')}}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{$brand->id}}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brand->brand_name}}">

                        @error('category_name')
                      <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>

                      <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>




              </div>
          </div>

      </div>
        </div>
    </div>

</div>
@endsection
