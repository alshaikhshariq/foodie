@extends('Admin.master')

@section('title', 'edit food')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Food
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
              <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('update.food',$food->food_id) }}">
              <div class="box-body">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    {{method_field('PUT')}}

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <div class="row">
                  <div class="col-md-3">
                <div class="form-group">
                  <label>Food Title</label>
                  <input type="text" class="form-control"  name="title" value="{{ old('food_title',$food->food_title) }}" placeholder="enter food title">
                  @if ($errors->has('food_title'))
                  <div class="danger">{{ $errors->first('food_title') }}</div>
                 @endif 
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label >Food Price</label>
                  <input type="text" class="form-control" name="price" value="{{ old('food_price',$food->food_price) }}" placeholder="enter price address" disabled>
                  @if ($errors->has('food_price'))
                   <div class="danger">{{ $errors->first('food_price') }}</div>
                  @endif
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label >Category</label>
                  <input type="number" class="form-control" name="category" value="{{ old('category_name',$food->category_name) }}" placeholder="enter contact no" disabled>
                  @if ($errors->has('contact'))
                   <div class="danger">{{ $errors->first('contact') }}</div>
                  @endif
                </div>
                </div>
                                 <div class="col-md-3">
                      <div class="form-group">
                        <label >Cover Image</label>
                        <input type="file" class="form-control" name="image"  placeholder="enter delivery fee">
                        @if ($errors->has('image'))
                        <div class="danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                 </div>
                </div>
                

            </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
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