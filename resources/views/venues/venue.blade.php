@extends('layouts.master')

@section('title','VenueLists')

@section('main-content')

<section class="content-header">
      <div class="row'">
    <div class="col-md-6">
      <h1 style="display: inline-block;">Event Venues</h1>
    </div>
    <div class="col-md-6">
      <div class="add-new">
        <a href="{{ route('admin.venues.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add New Venue</a>
      </div>
    </div>
  </div>
</section>

   <!-- Main content -->
<section class="content">
  <div class="row">
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Venue Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($venues as $venue)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $venue->v_name }}</td>
                        <td>{{ $venue->v_addr }}</td>
                        <td>{{ $venue->status ==1 ? 'Empty' : 'Fixed' }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.venues.edit', $venue->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.venues.destroy', $venue->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@stop