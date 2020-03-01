@extends('layouts.master')

@section('title','EditContact')

@section('main-content')

<section class="content-header">
    <div class="row'">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Contact</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.contacts.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Contact List</a>
        </div>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      
        <div class="box box-primary">
                <!-- form start -->
           <form role="form" action="{{ route('admin.contacts.update', $contacts->id) }}" method="post">
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
                    <label for="Name"> Contact Name </label>
                    <input type="text" class="form-control" id="Name" placeholder="Name" name="contact_name" value="{{ $contacts->contact_name }}">
                </div>
                <div class="form-group">
                    <label for="E-mail">E-mail</label>
                    <input type="text" class="form-control" id="E-mail" placeholder="E-mail" name="email" value="{{ $contacts->email }}">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone" value="{{ $contacts->phone }}">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ $contacts->address }}">
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
  <!-- /.row -->
</section>

@stop