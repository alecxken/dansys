@extends('layouts.template')
@section('content')

  

<div class="box-body">
  
<div class="row">
<div class="col-md-6">
    <div class="box box-warning">
            <div class="box-header with-border bg-warning disabled">
                <h6 class="box-title ">SOS Company Registration</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'soscompany-store' ,'files' => true]) !!}
           
                 <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Company Name', ['class' => 'col-form-label '])!!}
                    {!!Form::text('name',Null,['class' => 'form-control','required'  ])!!}
                </div>
                
                 <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Email Address:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('email',Null,['class' => 'form-control','required'])!!}
                </div> 
                 <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Sos HQ location', ['class' => 'col-form-label '])!!}
                    {!!Form::text('location',Null,['class' => 'form-control','required' ])!!}
                </div> 

                  <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Contact PhoneNo:', ['class' => 'col-form-label '])!!}
                    {!!Form::number('phone',Null,['class' => 'form-control','required' ])!!}
                </div>  

                 <div class="form-group col-md-12 ">
                 
                     <button type="submit" class="btn btn-primary form-control ">Submit </button>
                </div>  
             
                
                
              
                 
          </div>
       
           {!!Form::close()!!}
   </div>


 </div>


<div class="col-md-6">
    <div class="box box-warning">
            <div class="box-header with-border bg-warning disabled">
                <h6 class="box-title ">SOS Networks Registration</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'rescompany-store' ,'files' => true]) !!}
           

               <div class="form-group col-md-12 ">
                    {!! Form::label('C_Name', 'Responder Company Name', ['class' => 'col-form-label '])!!}
                    <select class="form-control" name="sos_company">
                      <option value="">Select Company</option>
                      @if(!empty($data))

                        @foreach($data as $co)

                           <option>{{$co->name}}</option>

                        @endforeach

                      @endif

                    </select>
                </div>

                 <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Responder Alias Name', ['class' => 'col-form-label '])!!}
                    {!!Form::text('sos_name',Null,['class' => 'form-control','required'  ])!!}
                </div>
                
                 <div class="form-group col-md-6 ">
                    {!! Form::label('C_Name', 'Base Location:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('sos_location',Null,['class' => 'form-control','required'])!!}
                </div> 
         
              

                 <div class="form-group col-md-12 ">
                   
                     <button type="submit" class="btn btn-primary form-control ">Submit </button>
                </div>  
             
                
                
              
                 
          </div>
       
           {!!Form::close()!!}
   </div>


 </div>


   <div class="col-md-6">  
       <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Companies</h3>
            </div>
         <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="box-success">  
               <th>Company Name</th>
               <th>Address</th>
               <th>Phone</th>
               <th>status</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>            
                <td>{{$user->phone}}</td>
                <td>{{$user->status}}</td>
                <td><a href="{{url('soscompany-drop/'.$user->id)}}" class="btn btn-danger btn-xs">Drop</a></td>
            
              
              </tr>
          @endforeach
          @endif
          </tbody>
          </table>
          </div>



           </div>
       </div>

          <div class="col-md-6">  
       <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Responders</h3>
            </div>
         <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="box-success">  
               <th>Responder Name</th>
               <th>Location</th>
               <th>availability</th>
               <th>status</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($datas))
           @foreach ($datas as $users)
              <tr>
                <td>{{$users->sos_name}}</td>
                <td>{{$users->sos_location}}</td>            
                <td>{{$users->sos_phone}}</td>
                <td>{{$users->sos_availability}}</td>
                <td><a href="{{url('rescompany-drop/'.$users->id)}}" class="btn btn-danger btn-xs">Drop</a></td>
            
              
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
