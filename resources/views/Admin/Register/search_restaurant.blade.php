@extends('Admin.master')

@section('title', 'register')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register Restaurant
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
            <form  method="GET" action="{{ route('find.restaurant') }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Restaurant Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="enter restaurant title">
                 </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="enter email address">
                 </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact No</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="contact" placeholder="enter contact no">
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
              <h3 class="box-title">Restaurant List</h3>

              <a href="{{url('addrestaurant')}}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"> Add Restaurant</i>
                          </a>
            </div>
            <!-- /.box-header -->
            <div class="container">

            @if($restaurant->isEmpty())         
               <h3 class="text-center">no restaurant found</h3>
            @else
            <table class="table table-striped">
                   <thead>
                      <tr>
                          <th>Title</th>
                          <th>Email Address</th>
                          <th>Minimum Order</th>
                          <th>Delivery Fee</th>
                          <th>Contact</th>
                          <th class="text-center">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                      @foreach ($restaurant as $restaurant)
                      <tr>
                        <td>{{ $restaurant->title }}</td>
                        <td>{{ $restaurant->email }}</td>
                        <td>{{ $restaurant->minimum_order }}</td>
                        <td>{{ $restaurant->delivery_fee }}</td>
                        <td>{{ $restaurant->contact }}</td>
                        
                        <td class="text-center">
                          <a href="{{url('editrestaurant',$restaurant->id)}}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
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