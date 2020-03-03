@extends('layouts.admins')

@section('title','AdminDash')

@section('header','Service Provider Dashboard')

@section('main-content')
 
<section class="content">
  <h1 style="display: inline-block;">Service Provider Dashboard</h1>
  <hr>
  <hr>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_admins }}</h5>
        <p class="card-text">Total Service Provider</p>
        <a href="#" class="btn btn-primary">More info</a>
      </div>
    </div>
  </div>
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_clients }}</h5>
        <p class="card-text">Total Visitors</p>
        <a href="#" class="btn btn-primary">More info</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_contacts }}</h5>
        <p class="card-text">Total Clients</p>
        <a href="{{route('admin.contacts.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_venues }}</h5>
        <p class="card-text">Total Venues</p>
        <a href="{{route('admin.venues.index')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>
</div>
</section>

@endsection