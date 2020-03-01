@extends('layouts.master')

@section('title','AdminDash')

@section('main-content')

<section class="content-header">
  <h1 style="display: inline-block;">Service Provider Dashboard</h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

<!--Provider-->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{  $total_admins }}</h3>

              <p>Total Service Provider</p>
            </div>
            <div class="icon">
              <i class="ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Visitors-->        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
<!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{  $total_clients }}</h3>

              <p>Total Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-load-a"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Clients-->        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
<!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{  $total_contacts }}</h3>

              <p>Total Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.contacts.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Events-->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>#4<sup style="font-size: 20px"></sup></h3>

              <p>Total Events</p>
            </div>
            <div class="icon">
              <i class="ion ion-fireball"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Events Service-->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>#3</h3>

              <p>Total Service</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios7 more"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Orders-->
       <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>#3</h3>

              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-flag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Staffs-->
    <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>#3</h3>

              <p>Total Staffs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Payments-->
    <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>#3</h3>

              <p>Total Payments</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-bitcoin"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!--Venues-->
    <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>#3</h3>

              <p>Total Venues</p>
            </div>
            <div class="icon">
              <i class="ion ion-location"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>

  <!-- /.row -->
</section>
@stop