@extends('layouts.admins')

@section('title','OrderUpdate')

@section('header','Order Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Order Detail</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.orders.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Order List</a>
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
            <form role="form" action="{{ route('admin.orders.update', $orders->id) }}" method="post">
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
                              <label for="email">Contact Email</label>
                              <select name="contact_id" class="form-control">
                                <?php $contacts=\App\Models\Contact::all(); ?>
                                @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}" @if($contact->id==$orders->contact_id) selected='selected' @endif>{{ $contact->email }}</option>
                    @endforeach
                  </select>
                       </div>
                       <div class="form-group">
                              <label for="p_method">Payment Method</label>
                              <select name="payment_id" class="form-control">
                                <?php $payments=\App\Models\Payment::all(); ?>
                                @foreach($payments as $payment)
                                <option value="{{ $payment->id }}" @if($payment->id==$orders->payment_id) selected='selected' @endif>{{ $payment->p_method }}</option>
                                @endforeach
                                </select>
                       </div>
                       <div class="form-group">
                            <label for="order_total">Order Total</label>
                            <input type="text" class="form-control" id="order_total" placeholder="" name="order_total" value="{{ $orders->order_total }}">
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
