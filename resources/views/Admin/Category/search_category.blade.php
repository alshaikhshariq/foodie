@extends('Admin.master')

@section('title', 'category')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
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
            <form  method="GET" action="{{ route('search.category') }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="category_id" placeholder="enter category id">
                 </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Restaurant ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="restaurant_id" placeholder="enter restaurant id">
                 </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="enter category name">
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
              <h3 class="box-title">Category List</h3>
              <a href="{{url('add.category')}}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"> Add Category</i>
                          </a>
            </div>
            <!-- /.box-header -->
            <div class="container">

            
            @if(empty($category))         
               <h3 class="text-center">no categories found</h3>
            @else
            <table class="table table-striped">
                   <thead>
                      <tr>
                          <th>Category ID</th>
                          <th>Restaurant ID</th>
                          <th>Category Name</th>
                          <th class="text-center">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                      @foreach ($category as $category)
                      <tr>
                        <td>{{ $category->category_id }}</td>
                        <td>{{ $category->restaurant_id }}</td>
                        <td>{{ $category->category_name}}</td>
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