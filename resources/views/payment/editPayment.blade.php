@extends('layouts.admins')

@section('title','PaymentUpdate')

@section('header','Payment Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Staff Detail</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.payments.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Payment Details</a>
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
            <form role="form" action="{{ route('admin.payments.update', $payments->id) }}" method="post">
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
                              <label for="staff_name">Payment Method</label>
                              <input type="text" class="form-control" id="p_method" placeholder="Method" name="p_method" value="{{ $payments->p_method }}">
                       </div>
                       
                       <div class="form-group">
                            <label for="p_status">Payment Status</label>
                            <select name="p_status" class="form-control">
                        <option value="1" @if ($payments->status === 1) selected @endif>Clear</option>
                        <option value="0" @if ($payments->status === 0) selected @endif>Due</option>
                    </select>
                       </div>
                       <div class="form-group">
                            <label for="p_date">Payment Date</label>
                            <input type="date" class="form-control" id="p_date" placeholder="" name="p_date" value="{{ $payments->date }}">
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
