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
              {!! Form::open(['method'=> 'post','url' => '#' ,'files' => true]) !!}
           
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Incident', ['class' => 'col-form-label '])!!}
                    {!!Form::text('token',rand(),['class' => 'form-control' ,'readonly' ])!!}
                </div>
                
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Incident Date:', ['class' => 'col-form-label '])!!}
                    {!!Form::date('date',Null,['class' => 'form-control'])!!}
                </div> 
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Location:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('location',Null,['class' => 'form-control','required' ])!!}
                </div>  
             
                 <div class="form-group col-md-12 ">
                    {!! Form::label('C_Name', 'Incident Description:', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('responsibility',Null,['class' => 'form-control','rows'=>'1' ])!!}
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
              <h3 class="box-title">Jobs Created</h3>
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
           <tbody> @if(!empty($data))
           @foreach ($data as $user)
              <tr>
                <td>{{$user->token}}</td>
                <td>{{$user->title}}</td>            
                <td>{{$user->deadline}}</td>
                <td>{{$user->file}}</td>
                <td><a href="{{url('deletejob/'.$user->token)}}" class="btn btn-danger">Drop</a></td>
            
              
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
