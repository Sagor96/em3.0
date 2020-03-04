@extends('layouts.admins')

@section('title','StaffList')

@section('header','StaffDetails')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Staff Details List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sdModalSm">
              Add New Staff
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
                        <th>StaffName</th>
                        <th>Designation</th>
                        <th>PhoneNumber</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($staffdetails as $staffdetail)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $staffdetail->staff_name }}</td>
                        <td>{{ $staffdetail->designation }}</td>
                        <td>{{ $staffdetail->phone }}</td>
                        <td>{{ $staffdetail->address }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.staffdetails.edit', $staffdetail->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.staffdetails.destroy', $staffdetail->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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

  <!--Create staffdetail-->

<!-- Central Modal Small -->
<div class="modal fade" id="sdModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.staffdetails.store') }}" method="post">
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
                            <label for="staff_name">StaffName</label>
                            <input type="text" class="form-control" id="staff_name" placeholder="Staff Name" name="staff_name" value="{{ old('staff_name') }}">
                       </div>
                       <div class="form-group">
                            <label for="designation">StaffDesignation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation" value="{{ old('designation') }}">
                       </div>
                       <div class="form-group">
                            <label for="phone">StaffPhone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                       </div>
                       <div class="form-group">
                            <label for="address">StaffAddress</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ old('address') }}">
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

</section>
@stop