@extends('layouts.template')
@section('content')
<div class="box-body">
  
<div class="row">

<div class="col-md-12">  

<div class="box box-success">
            <div class="box-header with-border bg-success disabled">
                <h6 class="box-title "> Checklist Registration</h6>
            </div> 
           <div class="box-body">
          {!! Form::open(['method'=> 'post','url' => 'store-course-checklist' ,'files' => true]) !!}
            <div class="form-group col-md-4 ">
            {!! Form::label('C_Name', 'Course Name', ['class' => 'col-form-label '])!!}
            <select class="form-control" name="course_code">
              <option value="">Select Course</option>
              @if(!empty($data1))
              @foreach($data1 as $skul)
                <option value="{{$skul->course_code}}">{{$skul->course_name}}</option>
              @endforeach
              @endif
            </select>
           </div>
          <div class="form-group col-md-6">
            {!! Form::label('C_Name', 'Checklist Description', ['class' => 'col-form-label '])!!}
            {!!Form::text('checklist',Null,['class' => 'form-control' ])!!}
           </div>          
           <div class="form-group col-md-2 ">
               {!! Form::label('C_Name', 'Action', ['class' => 'col-form-label '])!!}
              <button type="submit" class="btn btn-info ">Submit Checklist</button>
            </div>
           {!!Form::close()!!}
   </div>
</div>
</div>
 
<div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Checlist View</h3>
            </div>
             <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr class="box-success">  
                   <th>Course Code</th>
                   <th>Checklist</th>
                  
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data))
                   @foreach ($data as $user)
                      <tr>
                        <td>{{$user->course_code}}</td>
                        <td>{{$user->checklist_name}}</td>
                   
                        <td><a href="{{url('deletechecklist/'.$user->id
)}}" class="btn btn-danger">Drop</a></td>
                      </tr>
                  @endforeach
                  @endif
              </tbody>
              </table>
              </div>
           </div>
       </div>
 </div>


@endsection
