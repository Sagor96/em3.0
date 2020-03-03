@extends('layouts.admins')

@section('title','Contact')

@section('header','ClientList')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Clients List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centralModalSm">
              Add New Client
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
                <table id="example1" class="table table-bordered table-warning
                table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Contact Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('admin.contacts.edit', $contact->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('admin.contacts.destroy', $contact->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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

<!--Create Contact-->

<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Contact</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('admin.contacts.store') }}" method="post">
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
                    <label for="Name"> Contact Name </label>
                    <input type="text" class="form-control" id="Name" placeholder="Name" name="contact_name" value="{{ old('contact_name') }}">
                </div>
                <div class="form-group">
                    <label for="E-mail">E-mail</label>
                    <input type="text" class="form-control" id="E-mail" placeholder="E-mail" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ old('address') }}">
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