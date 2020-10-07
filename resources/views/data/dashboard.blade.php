@extends('layouts.template')

@section('content')
@php
$school = \App\School::all()->count();
$jobapp = \App\Appdata::all()->count();
$pend = \App\Appdata::all()->where('status','pending')->count();
$comp = \App\Appdata::all()->where('status','Complete')->count();
@endphp
<div class="content">
	 <div class="row justify-content-center" >
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Schools</span>
              <span class="info-box-number">@if(!empty($school)) {{$school}} @else  0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Applicants</span>
              <span class="info-box-number">@if(!empty($jobapp)) {{$jobapp}} @else 0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Completed </span>
              <span class="info-box-number">@if(!empty($jobapp)) {{$jobapp}} @else 0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> Pending </span>
              <span class="info-box-number">@if(!empty($pend)) {{$pend}} @else 0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
    </div>
  {{--    <div class="col-md-6" >
      <div class="box box-success">
         <div class="box-header with-border">
          <h3 class="box-title"><b>Applicants Distribution</b>  </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="video" style="display: block;" >
            
                    <div class="app"> 
                            <center>  
                                  
								{!! $chart->container() !!}
                            </center>
                      </div>
                    </div>
          
              {!! $chart->script() !!}
      </div>
    </div>
     <div class="col-md-6" >
      <div class="box box-success">
         <div class="box-header with-border">
          <h3 class="box-title"><b>Transaction Items</b>  </h3>
          </div>
         <div class="box-body" id="video" style="display: block;" >
            
                    <div class="app"> 
                            <center>  
                                  
                {!! $sam->container() !!}
                            </center>
                      </div>
                    </div>
          
              {!! $sam->script() !!}
      </div>
        
    </div> --}}
</div>

@endsection