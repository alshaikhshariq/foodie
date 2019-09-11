@extends('Admin.master')

@section('title', 'add category')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Category
        <small>Preview</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('create.category') }}" enctype="multipart/form-data">
              <div class="box-body">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <div class="row">
                  <div class="col-md-6">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" class="form-control"  name="category_name" value="{{ old('category') }}" placeholder="enter category name">
                  @if ($errors->has('category_name'))
                  <div class="danger">{{ $errors->first('category_name') }}</div>
                 @endif 
                </div>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  

@endsection