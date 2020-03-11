@extends('layouts.admins')

@section('title','OrderList')

@section('header','Order List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Order List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Add New Order
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
                        <th>Created Date</th>
                        <th>Client Email</th>
                        <th>Pament Method</th>
                        <th>Order Total</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->contact->email }}</td>
                        <td>{{ $order->payment->p_method}}</td>
                        <td>{{ $order->order_total }}Tk</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.orders.edit', $order->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.orders.destroy', $order->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
  <!--Create Order-->

<!-- Central Modal Small -->
<div class="modal fade" id="eModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.orders.store') }}" method="post">
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
                            <label for="p_method">Payment Method</label>
                            <select name="payment_id" class="form-control">
            <!-- <option selected="selected" > -->
                              <?php $payments=\App\Models\Payment::all(); ?>      @foreach($payments as $payment)
                              <option value="{{ $payment->id }}">{{ $payment->p_method }}</option>
                              @endforeach
                            </select>
        
                        </div>
                        <div class="form-group">
                            <label for="order_total">Order Total</label>
                            <input type="text" class="form-control" id="order_total" placeholder="" name="order_total" value="{{ old('order_total') }}">
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