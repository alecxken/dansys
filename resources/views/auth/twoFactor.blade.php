@extends('layouts.log')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  {{--      <a href=""><b>Welcome </b></a> --}}
   
 
  </div>
  <div class="login-box-body" style="border-radius: 30px;">
     <div><center><img src="{{url('/images/logo.png')}}" width="60%" height="60%"></center></div>
     <hr>
   <p class="login-box-msg">Two Factor Verification</p> 

    
                        <div class="box-body">

@if(session()->has('message'))
    <p class="alert alert-info">
        {{ session()->get('message') }}
    </p>
@endif
<form method="POST" action="{{ route('verify.store') }}">
    {{ csrf_field() }}

    <p class="text-muted">
        You have received an email which contains two factor login code.
        If you haven't received it, press <a href="{{ url('job-resend') }}" class="label label-info">here</a>.
    </p>

     <div class="form-group has-feedback{{ __('Two Factor Code') }}">
        <input type="text"  name="two_factor_code" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" 
            required autofocus placeholder="Two Factor Code">
     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

           @if ($errors->has('two_factor_code'))
        <span class="invalid-feedback" role="alert"> 
          <strong>{{ $errors->first('two_factor_code') }}</strong>
        </span>
           @endif
      
      </div>

   

    <div class="row">

    	 <button type="submit" style="border-radius: 15px" class="btn btn-success btn-block btn-flat">Verify</button>
       
    </div>
</form>
</div>
</div>
</div>
</body>


@endsection