@extends('layouts.admins')

@section('title','StaffUpdate')

@section('header','Staff Detail Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Staff Detail</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.staffdetails.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Staff Details</a>
        </div>
      </div>
    </div>
<hr/>

<!-- Main content -->
<hr/>
<div class="content">
  <div class="row p-3">
    <div class="col-xs-12">

        <div class="box box-primary">
                <!-- form start -->
            <form role="form" action="{{ route('admin.staffdetails.update', $staffdetails->id) }}" method="post">
	              @csrf
	              @method('PUT')

	              @if ($errors->any())
	                  <div class="alert alert-danger">
	                  @if($errors->count()==1)
	                  {{ $errors->first() }}
	                @else
	                      <ul>
	                          @foreach ($errors->all() as $error)
	                              <li>{{ $error }}</li>
	                          @endforeach
	                      </ul>
	                      @endif
	                  </div>
	              @endif

	              @if(session()->has('message'))
	                <div class="alert alert-success">
	                  {{ session('message') }}
	                </div>
	              @endif
                <div class="box-body">
					             <div class="form-group">
                              <label for="staff_name">Staff Name</label>
                              <input type="text" class="form-control" id="staff_name" placeholder="Staff Name" name="staff_name" value="{{ $staffdetails->staff_name }}">
                       </div>
                       
                       <div class="form-group">
                            <label for="designation">Staff Designation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation" value="{{ $staffdetails->designation }}">
                       </div>
                       <div class="form-group">
                            <label for="phone">StaffPhone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ $staffdetails->phone }}">
                       </div>
                       <div class="form-group">
                            <label for="address">Staff Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $staffdetails->address }}">
                       </div>
	            </div>
                <!-- /.box-body -->

                <div class="box-footer">

                  <button type="submit" class="btn btn-success">Update</button>

                </div>
            </form>
        </div>

    </div>
    <!-- /.col -->

  </div>
</div>

  <!-- /.row -->
</section>

@stop
