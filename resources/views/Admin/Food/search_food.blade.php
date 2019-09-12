@extends('Admin.master')

@section('title', 'search food')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Food
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
              <h3 class="box-title">Search</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="GET" action="{{ route('search.food') }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFoodTitle1">Food Title</label>
                  <input type="text" class="form-control" id="exampleFoodTitle" name="title" placeholder="enter food title">
                 </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFoodPrice1">Food Price</label>
                  <input type="number" class="form-control" id="exampleFoodPrice1" name="price" placeholder="enter food price">
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label > Customized</label>
                  <input type="text" class="form-control" name="is_customized" value="{{ old('is_customized') }}" placeholder="is customized">
                  @if ($errors->has('is_customized'))
                   <div class="danger">{{ $errors->first('is_customized') }}</div>
                  @endif
                 </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                        <label> Food Description</label>
                        <textarea class="form-control" rows="5" name="description" value="{{ old('description') }}" placeholder="enter description about food ..."></textarea>
                        @if ($errors->has('description'))
                        <div class="danger">{{ $errors->first('description') }}</div>
                        @endif
                 </div>
                </div>
              </div>

            </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


         <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Food List</h3>

              <a href="{{url('addfood')}}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"> Add Food</i>
                          </a>
            </div>
            <!-- /.box-header -->
            <div class="container">

            @if($food->isEmpty())         
               <h3 class="text-center">no food found</h3>
            @else
            <table class="table table-striped">
                   <thead>
                      <tr>
                          <th>Food Title</th>
                          <th>Food Price</th>
                          <th>Category</th>
                          <th class="text-center">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                      @foreach ($food as $food)
                      <tr>
                        <td>{{ $food->food_title }}</td>
                        <td>{{ $food->food_price }}</td>
                        <td>{{ $food->is_customized }}</td>
                        <td>{{ $food->description }}</td>
                        
                        <td class="text-center">
                          <a href="{{url('editfood',$food->food_id)}}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                          </a>

                         
                          <a href="{{url('deletefood',$food->food_id)}}" class="btn btn-primary">
                            <i class="fa fa-dustbin"></i>
                          </a>
                        
                        </td>

                        
                      </tr>
                      @endforeach
                   </tbody>
                </table>        
            @endif
               
                
             </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        </div>
      </div>

          

        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  

@endsection