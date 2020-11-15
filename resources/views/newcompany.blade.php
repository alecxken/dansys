@extends('layouts.template')
@section('content')

  

<div class="box-body">
  
<div class="row">
<div class="col-md-12">
    <div class="box box-warning">
            <div class="box-header with-border bg-warning disabled">
                <h6 class="box-title ">Company Registration</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'company-store' ,'files' => true]) !!}
           
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Name', ['class' => 'col-form-label '])!!}
                    {!!Form::text('company_name',Null,['class' => 'form-control','required'  ])!!}
                </div>
                
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Address:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('company_address',Null,['class' => 'form-control','required'])!!}
                </div> 
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Contact PhoneNo:', ['class' => 'col-form-label '])!!}
                    {!!Form::number('company_phone',Null,['class' => 'form-control','required' ])!!}
                </div>  

                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Action:', ['class' => 'col-form-label '])!!}
                     <button type="submit" class="btn btn-primary form-control ">Submit </button>
                </div>  
             
                
                
              
                 
          </div>
       
           {!!Form::close()!!}
   </div>


 </div>



   <div class="col-md-12">  
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
                <td>{{$user->company_name}}</td>
                <td>{{$user->company_address}}</td>            
                <td>{{$user->company_phone}}</td>
                <td>{{$user->status}}</td>
                <td><a href="{{url('company-drop/'.$user->id)}}" class="btn btn-danger btn-xs">Drop</a></td>
            
              
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
