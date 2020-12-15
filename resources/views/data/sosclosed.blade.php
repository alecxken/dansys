@extends('layouts.template')
@section('content')

  

<div class="box-body">


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
               <th>Userid</th>
               <th>Message</th>
               <th>Location</th>
               <th>status</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)
          
              <tr>
                <td>{{$user->id}}</td>
                <td>{{\App\User::all()->where('id',$user->user_id)->first()->name}}</td> 
                <td>{{$user->sos_message}}</td>            
                <td>{{$user->sos_location}}</td>
                <td>{{$user->sos_status}}</td>
                <td>
                 
 <button class="btn btn-sm btn-success  open-modal" value="{{$user->id}}">Action</button>
              </td>
            
              
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
   
@include('data.soslistmodal')
  <script type="text/javascript">      
       $(document).ready(function(){
          var url = "get-incidents";
            //display modal form for task editing
            $('.open-modal').click(function(){
                var task_id = $(this).val();

                $.get(url + '/' + task_id, function (data) {
                    //success data
                    console.log(data);
                    $('#id').val(data.id);
                    $('#message').val(data.sos_message);
                    $('#btn-save').val("update");
                    $('#myModal').modal('show');
                }) 
            });
          });
   </script>

@endsection
