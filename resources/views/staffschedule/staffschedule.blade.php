@extends('layouts.admins')

@section('title','StaffScheduleList')

@section('header','Staff Schedule List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Staff Schedule List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Add New Staff Schedule
            </button>
          </div>
        </div>
      </div>
      <hr>
      <hr>

   <!-- Main content -->

  <div class="row p-3">
    <div class="col-xs-12">
      
    <div class="box">
            <!-- /.box-header -->
            <div class="delete-msg" style="width: 100%; display: block; overflow: hidden;">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
            </div>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-warning table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Create Date</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Venue</th>
                        <th>Staff Name</th>
                        <th>Staff Designation</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $schedule->created_at }}</td>
                        <td>{{ $schedule->event->e_name }}</td>
                        <td>{{ $schedule->event->e_date }}</td>
                        <td>{{ $schedule->venue->v_name }}</td>
                        <td>{{ $schedule->staffdetail->staff_name }}</td>
                        <td>{{ $schedule->staffdetail->designation }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.staffschedules.edit', $schedule->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.staffschedules.destroy', $schedule->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger float-left"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Delete</button>
                          </form>
                        </span>
                        
                      </div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
  
    <!-- /.col -->
    </div>
  </div>
  <!-- /.row -->
</section>
  <!--Create Staffschedule-->

<!-- Central Modal Small -->
<div class="modal fade" id="eModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Staff Scedule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.staffschedules.store') }}" method="post">
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
                            <label for="e_name">Event Name</label>
                            <select name="event_id" class="form-control">
                              <?php $events=\App\Models\Event::all(); ?>
                              @foreach($events as $event)
                              <option value="{{ $event->id }}">{{ $event->e_name }}</option>
                               @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="v_name">Event Venue</label>
                            <select name="venue_id" class="form-control">
            <!-- <option selected="selected" > -->
                              <?php $venues=\App\Models\Venue::all(); ?>      @foreach($venues as $venue)
                              <option value="{{ $venue->id }}">{{ $venue->v_name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staff_name">Staff Name</label>
                            <select name="staffdetail_id" class="form-control">
            <!-- <option selected="selected" > -->
                              <?php $staffdetails=\App\Models\Staffdetail::all(); ?>      @foreach($staffdetails as $staffdetail)
                              <option value="{{ $staffdetail->id }}">{{ $staffdetail->staff_name }}</option>
                              @endforeach
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
</div>
</div>
<!-- Central Modal Small -->

@stop