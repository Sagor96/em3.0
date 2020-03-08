@extends('layouts.admins')

@section('title','AdminDash')

@section('header','Service Provider Dashboard')

@section('main-content')
 
<section class="content">
  <h1 style="display: inline-block;">Service Provider Dashboard</h1>
  <hr>
  <hr>
<div class="row">

  <!--ServiceProvider-->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_admins }}</h5>
        <p class="card-text">Total Service Provider</p>
        <a href="#" class="btn btn-primary">More info</a>
      </div>
    </div>
  </div>

  <!--Visitor-->
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_clients }}</h5>
        <p class="card-text">Total Visitors</p>
        <a href="#" class="btn btn-primary">More info</a>
      </div>
    </div>
  </div>

  <!--Client-->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_contacts }}</h5>
        <p class="card-text">Total Clients</p>
        <a href="{{route('admin.contacts.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

  <!--Event-->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_events }}</h5>
        <p class="card-text">Total Events</p>
        <a href="{{route('admin.events.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

  <!--Venue-->
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_venues }}</h5>
        <p class="card-text">Total Venues</p>
        <a href="{{route('admin.venues.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

<!--StaffDetails-->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_staffdetails }}</h5>
        <p class="card-text">Total Staff</p>
        <a href="{{route('admin.staffdetails.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

  <!--Payment-->
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_payments }}</h5>
        <p class="card-text">Total Payments</p>
        <a href="{{route('admin.payments.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

  <!--Type-->
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_types }}</h5>
        <p class="card-text">Total Catagory</p>
        <a href="{{route('admin.types.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>

<!--Service-->
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_services }}</h5>
        <p class="card-text">Total Service</p>
        <a href="{{route('admin.services.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>


</div>
</section>

@endsection