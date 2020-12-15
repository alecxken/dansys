@extends('layouts.template')
@section('content')

  

<div class="box-body">
  
<div class="row">
<div class="col-md-12">
    <div class="box box-danger">
            <div class="box-header with-border bg-danger disabled">
                <h6 class="box-title ">Incident Registration</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'incident-store' ,'files' => true]) !!}
           
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Incident', ['class' => 'col-form-label '])!!}
                    {!!Form::text('token',rand(),['class' => 'form-control' ,'readonly' ])!!}
                </div>
                
               
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Nearest Sos Location:', ['class' => 'col-form-label '])!!}
                    <select class="form-control" name="sos_company">
         <option disabled="">Select Option</option>
         @if(!empty($datas))
          @foreach($datas as $key => $camp)
            <option value="{{$camp->sos_name}}">{{$camp->sos_name}} - {{$camp->sos_location}}</option>
          @endforeach
         @endif
       </select>
                </div>  
                  <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Victims Company:', ['class' => 'col-form-label '])!!}
       <select class="form-control" name="company">
         <option disabled="">Select Company</option>
         @if(!empty($data))
          @foreach($data as $camp)
            <option>{{$camp->company_name}}</option>
          @endforeach
         @endif
       </select>
                </div>  
             
                 <div class="form-group col-md-12 ">
                    {!! Form::label('C_Name', 'Incident Description:', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('incident',Null,['class' => 'form-control','rows'=>'2' ])!!}
                </div>  
                
              
                 
          </div>
           <div class="box-footer">
              <button type="submit" class="btn btn-primary ">Submit </button>
            </div>
           {!!Form::close()!!}
   </div>


 </div>



   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Incidents Created</h3>
            </div>
         <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="box-success">  
               <th>Reference</th>
               <th>Title</th>
               <th>Location</th>
               <th>status</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($incident))
           @foreach ($incident as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->company_name}}</td>            
                <td>{{$user->company_address}}</td>
                <td>{{$user->company_phone}}</td>
                <td><a href="{{url('dropincident/'.$user->token)}}" class="btn btn-danger">Drop</a></td>
            
              
              </tr>
          @endforeach
          @endif
          </tbody>
          </table>
          </div>



           </div>
       </div>
     </div>
   </div>
   
 <script >


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

 $('.textarea').summernote()
   
  })

 
</script>

@endsection
