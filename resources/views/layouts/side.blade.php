  <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('images/logo.png')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          <li  class="{{ (request()->is('dashboard')) ? 'active' : '' }}"><a href="{{url('dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
           @role('Responder')
       <li><a href="{{url('reported-incident')}}"><i class="fa fa-link"></i> <span>Reported Incidents</span></a></li>
       <li><a href="{{url('reported-incident-closed')}}"><i class="fa fa-link"></i> <span>Actioned Incidents</span></a></li>
       @else
           <li><a href="{{url('new-incident')}}"><i class="fa fa-link"></i> <span>New Incident</span></a></li>
           <li><a href="{{url('my-incidents')}}"><i class="fa fa-link"></i> <span>My Incidents</span></a></li>
          


           @endrole
        @role('Admin')
          <li class="treeview {{ (request()->is('job')) ? 'active' : '' }} ">
            <a href="#"><i class="fa fa-cog"></i> <span> Setting Sections</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
             <li><a href="{{url('create-responder')}}"><i class="fa fa-link"></i> <span>Incident Responders</span></a></li>
            <li><a href="{{url('company-create')}}"><i class="fa fa-link"></i> <span>Register Organizations</span></a></li>
            <li>
              <a href="{{url('soscompany-create')}}"><i class="fa fa-link"></i> <span>Emergency Resp Orgs</span></a></li>

             <li><a href="{{url('admin')}}"><i class="fa fa-link"></i> <span>User Management</span></a></li>
   
           
          
            </ul>
          </li>
          @endrole
     

        </ul>

    
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>