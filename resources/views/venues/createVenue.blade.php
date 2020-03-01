@extends('layouts.master')

@section('title','AddVenue')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Add Event Venue</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.venues.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Package List</a>
        </div>
      </div>
    </div>
<hr/>
<!-- Main content -->
<hr/>
<div class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
                <!-- form start -->
            <form role="form" action="{{ route('admin.venues.store') }}" method="post">
	            @csrf

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
					                  <label for="v_name">Event Venue Name</label>
					                  <input type="text" class="form-control" id="v_name" placeholder="Venue Name" name="v_name" value="{{ old('v_name') }}">
					             </div>
                       <div class="form-group">
					                  <label for="v_addr">Event Venue Address</label>
					                  <input type="text" class="form-control" id="v_addr" placeholder="Venue Address" name="v_addr" value="{{ old('v_addr') }}">
					             </div>
                       <div class="form-group">
                         <label for="status">Status</label>
                         <select name="status" class="form-control">
                           <option value="1">Empty</option>
                           <option value="0">Fixed</option>
                         </select>
                       </div>

	               </div>
                <!-- /.box-body -->

                <div class="box-footer">

                  <button type="submit" class="btn btn-success">Save</button>

                </div>
            </form>
        </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</section>

@endsection
