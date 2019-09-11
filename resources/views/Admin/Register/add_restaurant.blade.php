@extends('Admin.master')

@section('title', 'add restaurant')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Restaurant
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
            <form method="GET" action="{{ route('register.restaurant') }}" enctype="multipart/form-data">
              <div class="box-body">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <div class="row">
                  <div class="col-md-3">
                <div class="form-group">
                  <label>Restaurant Title</label>
                  <input type="text" class="form-control"  name="title" value="{{ old('title') }}" placeholder="enter restaurant title">
                  @if ($errors->has('title'))
                  <div class="danger">{{ $errors->first('title') }}</div>
                 @endif 
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label >Email Address</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="enter email address">
                  @if ($errors->has('email'))
                   <div class="danger">{{ $errors->first('email') }}</div>
                  @endif
                 </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label >Contact No</label>
                  <input type="number" class="form-control" name="contact" value="{{ old('contact') }}" placeholder="enter contact no">
                  @if ($errors->has('contact'))
                   <div class="danger">{{ $errors->first('contact') }}</div>
                  @endif
                </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Delivery Fee</label>
                      <input type="number" class="form-control" name="delivery_fee" value="{{ old('delivery_fee') }}" placeholder="enter delivery fee">
                      @if ($errors->has('delivery_fee'))
                      <div class="danger">{{ $errors->first('delivery_fee') }}</div>
                     @endif
                    </div>
                 </div>
              </div>


              <div class="row">
                <div class="col-md-3">
               <!-- time Picker -->
               <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Opening Time:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="open_time" value="{{ old('open_time') }}">
                    @if ($errors->has('open_time'))
                    <div class="danger">{{ $errors->first('open_time') }}</div>
                    @endif
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              </div>
              <div class="col-md-3">
              <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Close Time:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="close_time" value="{{ old('close_time') }}">
                    @if ($errors->has('close_time'))
                    <div class="danger">{{ $errors->first('close_time') }}</div>
                    @endif
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>Select Delivery Time</label>
                <select class="form-control select2" style="width: 100%;" name="delivery_time" value="{{ old('delivery_time') }}">
                      <option value="20" selected="selected">20 minutes</option>
                      <option value="30">30 minutes</option>
                      <option value="40">40 minutes</option>
                      <option value="50">50 minutes</option>
                      <option value="60">1 hour above</option>
                   </select>
                 </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                    <label >Minimum Order</label>
                    <input type="number" class="form-control" name="minimum_order" value="{{ old('minimum_order') }}" placeholder="500">
                    @if ($errors->has('minimum_order'))
                   <div class="danger">{{ $errors->first('minimum_order') }}</div>
                  @endif
                </div>
              </div>
            </div>


            <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Latitude</label>
                            <input type="number" step="any" min="0" class="form-control" name="latitude" value="{{ old('latitude') }}" placeholder="enter latitude">
                            @if ($errors->has('latitude'))
                            <div class="danger">{{ $errors->first('latitude') }}</div>
                            @endif    
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label >Longitude</label>
                        <input type="number" step="any" min="0" class="form-control" name="longitude" value="{{ old('longitude') }}" placeholder="enter longitude">
                        @if ($errors->has('longitude'))
                        <div class="danger">{{ $errors->first('longitude') }}</div>
                        @endif
                    </div>
                    </div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label >Badge</label>
                    <input type="text" class="form-control" name="badge" value="{{ old('badge') }}" placeholder="ex : Flat 70% off">
                     
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
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description" value="{{ old('description') }}" placeholder="enter description about restaurant ..."></textarea>
                        @if ($errors->has('description'))
                        <div class="danger">{{ $errors->first('description') }}</div>
                        @endif
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