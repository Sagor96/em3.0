@extends('layouts.admins')

@section('title','ServiceList')

@section('header','Service List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Service List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sModalSm">
              Add New Service
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
                        <th>Service Name</th>
                        <th>Service Amount</th>
                        <th>Status</th>
                        <th>Venue</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $service->s_name }}</td>
                        <td>{{ $service->amount }}(Tk)</td>
                        <td>{{ $service->status ==1 ? 'Active' : 'Inactive' }}
                        <td>{{ $service->venue->v_name }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.services.edit', $service->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.services.destroy', $service->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
<div class="modal fade" id="sModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Servce</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.services.store') }}" method="post">
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
                            <label for="s_name">Service Name</label>
                            <input type="text" class="form-control" id="s_name" placeholder="Service Name" name="s_name" value="{{ old('s_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount(Tk)</label>
                            <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount" value="{{ old('amount') }}">
                        </div>
                        <div class="form-group">
                         <label for="s_status">Status</label>
                         <select name="s_status" class="form-control">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                         </select>
                       </div>
                        <div class="form-group">
                            <label for="v_name">Venue</label>
                            <select name="venue_id" class="form-control">
                              <?php $venues=\App\Models\Venue::all(); ?>
                              @foreach($venues as $venue)
                              <option value="{{ $venue->id }}">{{ $venue->v_name }}</option>
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