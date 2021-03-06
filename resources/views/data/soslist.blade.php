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
               <th>Date</th>
               <th>Userid</th>
               <th>Message</th>
               <th>Location</th>
               <th>status</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)
            @if($user->sos_status !== 'Actioned')
              <tr>
                <td>{{$user->created_at}}</td>
                <td>{{\App\User::all()->where('id',$user->user_id)->first()->name}}</td> 
                <td>{{$user->sos_message}}</td>            
                <td>{{$user->sos_location}}</td>
                <td>
                  @if($user->sos_status =='In Progress')
                      <label class="label label-info">{{$user->sos_status}}</label>
                  @elseif($user->sos_status =='Actioned')
                      <label class="label label-success">{{$user->sos_status}}</label>
                  @else
                      <label class="label label-danger">{{$user->sos_status}}</label>
                  @endif
                  </td>
                <td>
                 
 <button class="btn btn-sm btn-success  open-modal" value="{{$user->id}}">Action</button>
              </td>
            
              
              </tr>
              @endif
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
