@extends('Admin.master')

@section('title', 'user')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
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
            <form  method="GET" action="{{ route('find.user') }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="enter first name">
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="last_name" placeholder="enter last name">
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email_address" placeholder="enter email address">
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone Number</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="phone_number" placeholder="enter phone number">
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
              <h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <div class="container">

            
            @if(empty($user))         
               <h3 class="text-center">no user found</h3>
            @else
            <table class="table table-striped">
                   <thead>
                      <tr>
                          <th>Id</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>Phone Number</th>
                          <th class="text-center">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                      @foreach ($user as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name}}</td>
                        <td>{{ $user->email_address}}</td>
                        <td>{{ $user->phone_number}}</td>
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