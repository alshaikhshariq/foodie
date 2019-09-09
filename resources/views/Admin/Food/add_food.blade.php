@extends('Admin.master')

@section('title', 'add food')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Food
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
            <form method="GET" action="{{ route('search.food') }}" enctype="multipart/form-data">
              <div class="box-body">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <div class="row">
                  <div class="col-md-3">
                <div class="form-group">
                  <label>Food Title</label>
                  <input type="text" class="form-control"  name="food_title" value="{{ old('food_title') }}" placeholder="enter food title">
                  @if ($errors->has('food_title'))
                  <div class="danger">{{ $errors->first('food_title') }}</div>
                 @endif 
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label > Food Price</label>
                  <input type="number" class="form-control" name="food_price" value="{{ old('food_price') }}" placeholder="enter price">
                  @if ($errors->has('food_price'))
                   <div class="danger">{{ $errors->first('food_price') }}</div>
                  @endif
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label >Category Name</label>
                  <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" placeholder="enter category name">
                  @if ($errors->has('category_name'))
                   <div class="danger">{{ $errors->first('category_name') }}</div>
                  @endif
                </div>
                </div>
                


            
                  <div class="col-md-3">
                      <div class="form-group">
                        <label >Food Image</label>
                        <input type="file" class="form-control" name="image"  placeholder="enter delivery fee">
                        @if ($errors->has('image'))
                        <div class="danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                 </div>
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