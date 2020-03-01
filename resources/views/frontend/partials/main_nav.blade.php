<aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
  
  
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            
<!--Dashboard-->
            <li>
              <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

<!--Client-->
            <li class="treeview">
              <a href="#"><i class="fa fa-user-md"></i> <span>Clients</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.contacts.index') }}">Contacts</a></li>
                <li><a href="{{ route('admin.contacts.index') }}">Add Client</a></li>
              </ul>
            </li>

<!--Service-->
            <li class="treeview">
                <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> <span>Services</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Add Service</a></li>
                </ul>
            </li>

<!--Event-->            
            <li class="treeview">
              <a href="#"><i class="fa fa-user-circle-o"></i> <span>Events</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Event List</a></li>
                <li><a href="#">Add Event</a></li>
              </ul>
            </li>

<!--Event Catagory-->
            <li class="treeview">
              <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> <span>Event Catagory</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Catagory List</a></li>
                <li><a href="#">Add New Catagory</a></li>
              </ul>
            </li> 

<!--Venue-->    
            <li class="treeview">
              <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> <span>Event Venues</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('admin.venues.index')}}">Venue List</a></li>
                <li><a href="{{route('admin.venues.create')}}">Add New Venue</a></li>
              </ul>
            </li>

<!--Order-->    
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Order List</a></li>
                <li><a href="#">Add New Order</a></li>
              </ul>
            </li>

<!--Expence-->    
            <li class="treeview">
              <a href="#"><i class="fa fa-calendar-o"></i> <span>Expence</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Expence List</a></li>
                <li><a href="3">Add Expence</a></li>
              </ul>
            </li>

<!--Payment-->    
            <li class="treeview">
              <a href="#"><i class="fa fa-user-secret "></i> <span>Payments</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Payment List</a></li>
                <li><a href="#">Add Payment</a></li>
              </ul>
            </li>
    
<!--Staff List-->    
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Staff Schedule</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Lists</a></li>
                <li><a href="#">Add Schedule</a></li>
              </ul>
            </li>

<!--Staff Details-->
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Staff Details</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Staff Recoards</a></li>
                <li><a href="#">Add Staff Profile</a></li>
              </ul>
            </li>

<!--Report-->
            <li class="treeview">
              <a href="#"><i class="fa fa-bell"></i> <span>Reports</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Client Report</a></li>
                <li><a href="#">Lead Report</a></li>
                <li><a href="#">Income Report</a></li>
                <li><a href="#">Expense Report</a></li>
              </ul>
            </li>

                      </ul>
          <!-- /.sidebar-menu -->
        </section>
      <!-- /.sidebar -->
    </aside>