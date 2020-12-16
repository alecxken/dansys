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
           @if(\App\User::all()->where('id',$user->user_id)->first()->id == Auth::id())
              <tr>
                <td>{{$user->id}}</td>
                <td>{{\App\User::all()->where('id',$user->user_id)->first()->name}}</td> 
                <td>{{$user->sos_message}}</td>            
                <td>{{$user->sos_location}}</td>
                <td>{{$user->sos_status}}</td>
                <td><a href="{{url('dropincident/'.$user->id)}}" class="btn btn-danger">Drop</a></td>
            
              
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
