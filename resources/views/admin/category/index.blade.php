@extends('admin.admin_master')
@section('category') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
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
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>

                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($categories as $category)

                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$category->category_name}}</td>
                  <td>
                       @if($category->category_status == 1)
                       <span class="badge badge-success">Active</span>
                       @else
                       <span class="badge badge-warning">Inactive</span>
                       @endif
                  </td>
                  <td>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    @if($category->category_status==1)
                    <a href="{{route('category.inactive',$category->id)}}" class="btn btn-warning btn-sm">Inactive</a>
                    @else
                    <a href="{{route('category.active',$category->id)}}" class="btn btn-success btn-sm">Active</a>
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
              <div class="card-header bg-warning text-white">Add Category
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

                  <form action="{{route('store.category')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                        @error('category_name')
                      <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>

                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>




              </div>
          </div>

      </div>
        </div>
    </div>

</div>
@endsection
