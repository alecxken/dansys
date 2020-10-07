@extends('layouts.template')
@section('content')
<div class="box-body">
   {!! Form::open(['method'=> 'post','url' => 'save-final' ,'files' => true]) !!}
   <input type="hidden" name="token" value="{{$token}}">
<div class="row">

<div class="col-md-12">  

<div class="box box-success">
            <div class="box-header with-border bg-success disabled">
                <h6 class="box-title "> CHECKLIST PAGE</h6>
            </div> 
           <div class="box-body">
       
             <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr class="box-success">  
                   <th>Course Code</th>
                   <th>Status</th>                               
                </tr>
              </thead>
               <tbody>

                  @if(!empty($checklist))
                   @foreach ($checklist as $user)
                     <tr>
                        <td><input type="hidden" name="checklist[]" value="{{$user->checklist_name}}">{{$user->checklist_name}}</td>
                        <td><select class="form-control" name="passed[]" required="">
                          <option value="">Select Option</option>
                          <option>No</option>
                          <option>Yes</option>
                        
                     
                        </select></td>
                      </tr>
                  @endforeach
                  @endif
              </tbody>
              </table>
            </div>
          </div>
                
           <div class="box-footer ">
              
              <button type="submit" class="btn btn-info ">Next</button>
            </div>
           {!!Form::close()!!}
   </div>
</div>
</div>
 

@endsection
