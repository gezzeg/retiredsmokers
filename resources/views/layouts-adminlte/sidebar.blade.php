 
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
    
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Carian...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        
        <li>
         <a href="{{ url('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>

        <li>
         <a href="{{ url('profile') }}">
            <i class="fa fa-dashboard"></i> <span>Profile</span>
            
          </a>
        </li>


        <li>
         <a href="{{ url('about') }}">
            <i class="fa fa-dashboard"></i> <span>About</span>
            
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Smoking History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Daftar</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Update</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Carian</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Article</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('articles') }}"><i class="fa fa-circle-o"></i> Article</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> New</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Search</a></li>
          </ul>
        </li>     

     

        

       
    </section>
    <!-- /.sidebar -->
  </aside>
