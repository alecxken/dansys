@extends('layouts.template')
@section('content')
<div class="box-body">
  
<div class="row">
<div class="col-md-5">
    <div class="box box-success">
            <div class="box-header with-border bg-danger disabled">
                <h6 class="box-title "> School Registration</h6>
            </div> 
           <div class="box-body">
          {!! Form::open(['method'=> 'post','url' => 'store-school' ,'files' => true]) !!}
           
          <div class="form-group col-md-12 ">
            {!! Form::label('C_Name', 'School Name', ['class' => 'col-form-label '])!!}
            {!!Form::text('school_name',Null,['class' => 'form-control' ])!!}
           </div>          
          </div>
           <div class="box-footer">
              <button type="submit" class="btn btn-primary ">Submit School</button>
            </div>
           {!!Form::close()!!}
   </div>
 </div>
    <div class="col-md-7">
      <div class="box box-danger">
            <div class="box-header with-border bg-danger disabled">
                <h6 class="box-title "> Course Registration</h6>
            </div> 
           <div class="box-body">
          {!! Form::open(['method'=> 'post','url' => 'store-course' ,'files' => true]) !!}
            <div class="form-group col-md-6 ">
            {!! Form::label('C_Name', 'Shool Name', ['class' => 'col-form-label '])!!}
            <select class="form-control" name="skul">
              <option value="">Select School</option>
              @if(!empty($data))
              @foreach($data as $skul)
                <option value="{{$skul->id}}">{{$skul->name}}</option>
              @endforeach
              @endif
            </select>
           </div>
          <div class="form-group col-md-6 ">
            {!! Form::label('C_Name', 'Course Name', ['class' => 'col-form-label '])!!}
            {!!Form::text('cos_name',Null,['class' => 'form-control' ])!!}
           </div>          
          </div>
           <div class="box-footer">
              <button type="submit" class="btn btn-info ">Submit Course</button>
            </div>
           {!!Form::close()!!}
   </div>
</div>
</div>
<div class="col-md-5">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Schools Created</h3>
            </div>
             <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr class="box-success">  
                   <th>ID</th>
                   <th>School Name</th>
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data))
                   @foreach ($data as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td><a href="{{url('deleteschool/'.$user->id)}}" class="btn btn-danger">Drop</a></td>
                      </tr>
                  @endforeach
                  @endif
              </tbody>
              </table>
              </div>
           </div>
       </div>

 
<div class="col-md-7">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Courses Created</h3>
            </div>
             <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr class="box-success">  
                   <th>Course Code</th>
                   <th>School ID</th>
                   <th>Course Name</th>
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data1))
                   @foreach ($data1 as $user)
                      <tr>
                        <td>{{$user->course_code}}</td>
                        <td>{{$user->school_id}}</td>
                        <td>{{$user->course_name}}</td>
                        <td><a href="{{url('deletecourse/'.$user->id
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
