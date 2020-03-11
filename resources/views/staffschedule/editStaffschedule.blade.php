@extends('layouts.admins')

@section('title','StaffScheduleUpdate')

@section('header','Staff Schedule Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Staff Schedule</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.staffschedules.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Staff Schedule List</a>
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
            <form role="form" action="{{ route('admin.staffschedules.update', $schedules->id) }}" method="post">
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
                              <label for="e_name">Event Name</label>
                              <select name="event_id" class="form-control">
                                <?php $events=\App\Models\Event::all(); ?>
                                @foreach($events as $event)
                                <option value="{{ $event->id }}" @if($event->id==$schedules->event_id) selected='selected' @endif>{{ $event->e_name }}</option>
                                @endforeach
                              </select>
                       </div>
                       <div class="form-group">
                              <label for="v_name">Event Venue</label>
                              <select name="venue_id" class="form-control">
                                <?php $venues=\App\Models\Venue::all(); ?>
                                @foreach($venues as $venue)
                                <option value="{{ $venue->id }}" @if($venue->id==$schedules->venue_id) selected='selected' @endif>{{ $venue->v_name }}</option>
                                @endforeach
                              </select>
                       </div>
                       <div class="form-group">
                              <label for="staff_name">Staff Name</label>
                              <select name="staffdetail_id" class="form-control">
                                <?php $staffdetails=\App\Models\Staffdetail::all(); ?>
                                @foreach($staffdetails as $staffdetail)
                                <option value="{{ $staffdetail->id }}" @if($staffdetail->id==$schedules->staffdetail_id) selected='selected' @endif>{{ $staffdetail->staff_name }}</option>
                                @endforeach
                              </select>
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
