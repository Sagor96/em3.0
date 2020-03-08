@extends('layouts.admins')

@section('title','Catagory Update')

@section('header','Catagory Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Catagory</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.types.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Catagory List</a>
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
            <form role="form" action="{{ route('admin.types.update', $types->id) }}" method="post">
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
                              <label for="t_name">Catagory Name</label>
                              <input type="text" class="form-control" id="t_name" placeholder="Catagory Name" name="t_name" value="{{ $types->t_name }}">
                       </div>
                       
                       <div class="form-group">
                            <label for="t_detail">Details</label>
                            <input type="text" class="form-control" id="t_detail" placeholder="Details" name="t_detail" value="{{ $types->t_detail }}">
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
