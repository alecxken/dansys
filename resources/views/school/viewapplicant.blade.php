
@extends('layouts.template')
@section('content')
<div class="box-body">
  
<div class="row">

<div class="col-md-12">  

       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Courses Created</h3>
            </div>
             <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr class="box-success">  
                   <th>Ref </th>
                   <th>Applicant Name</th>
                   <th>Course Applied</th>
                   <th>Course Done</th>
                   <th>Institutition</th>
                  <th>Status</th>
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data1))
                   @foreach ($data1 as $user)
                      <tr>
                        <td>{{$user->token}}</td>
                        <td>{{$user->applicant}}</td>
                          <td>{{$user->course_code}}</td>
                        <td>{{$user->course_done}}</td>
                        <td>{{$user->institution}}</td>                      
                        <td>{{$user->status}}</td>
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