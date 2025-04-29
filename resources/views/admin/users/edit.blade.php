@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
    <form action="{{ route('users.update',$users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Users</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" id="name" class="form-control" value="{{ $users->name }}">
              </div>
              @error('name')
              <div class="form-text text-danger">{{ $message }}</div>
          @enderror
              <div class="form-group">
                <label for="inputEmail">User Email</label>
                <input type="email" id="inputEmail" class="form-control" value="{{ $users->email }}">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                 @enderror
              </div>
              {{-- <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" class="form-control" value="{{ $users->password }}">
              </div> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-center">
        </div>
      </div>
    </form>

    </section>
    <!-- /.content -->
  </div>
@endsection