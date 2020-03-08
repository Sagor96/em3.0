@extends('layouts.admins')

@section('title','EventUpdate')

@section('header','Event Update')

@section('main-content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Staff Detail</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('admin.events.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Event List</a>
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
            <form role="form" action="{{ route('admin.events.update', $events->id) }}" method="post">
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
                                <option value="{{ $contact->id }}" @if($contact->id==$events->contact_id) selected='selected' @endif>{{ $contact->email }}</option>
                    @endforeach
                  </select>
                       </div>
                       <div class="form-group">
                            <label for="e_name">Event Name</label>
                            <input type="text" class="form-control" id="e_name" placeholder="Event Name"  name="e_name" value="{{ $events->e_name }}">
                       </div>
                       <div class="form-group">
                              <label for="t_name">Catagory Name</label>
                              <select name="type_id" class="form-control">
                                <?php $types=\App\Models\Type::all(); ?>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($contact->id==$events->type_id) selected='selected' @endif>{{ $type->t_name }}</option>
                                @endforeach
                                </select>
                       </div>
                       <div class="form-group">
                            <label for="e_date">Event Date</label>
                            <input type="date" class="form-control" id="e_date" placeholder="" name="e_date" value="{{ $events->e_date }}">
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
