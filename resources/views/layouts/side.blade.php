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
          
           <li><a href="{{url('jobs-apps')}}"><i class="fa fa-link"></i> <span>New Application</span></a></li>
           <li><a href="{{url('view-apps')}}"><i class="fa fa-link"></i> <span>My Application</span></a></li>
           @role('Reports')
           <li  class="{{ (request()->is('my-apps1')) ? 'active' : '' }}"><a href="{{url('my-apps1')}}"><i class="fa fa-link text-green"></i> <span>Job Applicants List</span></a></li>

           @endrole
      
          <li class="treeview {{ (request()->is('job')) ? 'active' : '' }} ">
            <a href="#"><i class="fa fa-cog"></i> <span> Setting Sections</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
<li><a href="{{url('view-adminapps')}}"><i class="fa fa-link"></i> <span>View Applications</span></a></li>
            <li><a href="{{url('create-school')}}"><i class="fa fa-link"></i> <span>Course/School</span></a></li>
             <li><a href="{{url('create-checklist')}}"><i class="fa fa-link"></i> <span>Checklist Creation</span></a></li>
            <li><a href="{{url('admin')}}"><i class="fa fa-link"></i> <span>User Management</span></a></li>
             {{-- //<li><a href="{{url('delete-alls/')}}"><i class="fa fa-link"></i> <span>Delete Applicants</span></a></li> --}}
           
          
            </ul>
          </li>
     

        </ul>

    
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>