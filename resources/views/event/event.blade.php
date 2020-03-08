@extends('layouts.admins')

@section('title','EventList')

@section('header','Event List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Event List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Add New Event
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
                        <th>Client Email</th>
                        <th>Event Name</th>
                        <th>Event Catagory</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $event->contact->email }}</td>
                        <td>{{ $event->e_name }}</td>
                        <td>{{ $event->type->t_name }}</td>
                        <td>{{ $event->e_date }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.events.edit', $event->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.events.destroy', $event->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
  <!--Create payment-->

<!-- Central Modal Small -->
<div class="modal fade" id="eModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.events.store') }}" method="post">
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
                            <label for="email">Client email</label>
                            <select name="contact_id" class="form-control">
                              <?php $contacts=\App\Models\Contact::all(); ?>
                              @foreach($contacts as $contact)
                              <option value="{{ $contact->id }}">{{ $contact->email }}</option>
                               @endforeach
                              </select>
                        </div>

                        <div class="form-group">
                            <label for="e_name">Event Name</label>
                            <input type="text" class="form-control" id="e_name" placeholder="" name="e_name" value="{{ old('e_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="t_name">Catagory Name</label>
                            <select name="type_id" class="form-control">
            <!-- <option selected="selected" > -->
                              <?php $types=\App\Models\Type::all(); ?>      @foreach($types as $type)
                              <option value="{{ $type->id }}">{{ $type->t_name }}</option>
                              @endforeach
                            </select>
        
                        </div>

                        <div class="form-group">
                            <label for="e_date">Event Date</label>
                            <input type="date" class="form-control" id="e_date" placeholder="" name="e_date" value="{{ old('e_date') }}">
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