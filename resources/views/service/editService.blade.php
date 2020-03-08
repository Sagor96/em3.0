@extends('layouts.admins')

@section('title','ServiceUpdate')

@section('header','Service Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Service Detail</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.services.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Service List</a>
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
            <form role="form" action="{{ route('admin.services.update', $services->id) }}" method="post">
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
                
                        <div class="form-group">
                            <label for="s_name">Service Name</label>
                            <input type="text" class="form-control" id="s_name" placeholder="Service Name"  name="s_name" value="{{ $services->s_name }}">
                       </div>
                       <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Amount"  name="amount" value="{{ $services->amount }}">
                       </div>
                       <div class="form-group">
                        <label for="s_status">Status</label>
                        <select name="s_status" class="form-control">
                        <option value="1" @if ($services->s_status === 1) selected @endif>Active</option>
                        <option value="0" @if ($services->s_status === 0) selected @endif>Inactive</option>
                        </select>
                       </div>


                       <div class="form-group">
                              <label for="v_name">Venue</label>
                              <select name="venue_id" class="form-control">
                                <?php $venues=\App\Models\Venue::all(); ?>
                                @foreach($venues as $venue)
                                <option value="{{ $venue->id }}" @if($services->id==$venue->venue_id) selected='selected' @endif>{{ $venue->v_name }}</option>
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
