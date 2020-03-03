<header class="main-header">

        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>Mir</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">EventMir</span>
        </a>
    
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

               <!-- Notifications Domain -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  News <i class="fa fa-bell-o"></i>
                  <span class="label label-danger">
                    #13</span>
                </a>
                <ul class="dropdown-menu">
                  #3
                  <li class="header">You have #4 notifications</li>
                  #2
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      #1
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> #14<br> to renew Domain.
                        </a>
                      </li>
                        #12                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>


               <!-- Notifications Hosting -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Report <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">
                    #5
                    </span>
                </a>
                <ul class="dropdown-menu">
                  #6
                  <li class="header">You have #7 notifications</li>
                  #8
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                     #9
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> #10<br> to renew Hosting.
                        </a>
                      </li>#11
                        
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ asset('backend/dist/img/client.png') }}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ asset('backend/dist/img/client.png') }}" class="img-circle" alt="User Image">
    
                    <p>
                      Client
                      <small>Admin since {{ Auth::guard('admin')->user()->created_at->format('F d, Y') }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!-- <a href="#" class="btn btn-default btn-flat">Edit Profile</a> -->
                    </div>
                    <div class="pull-right">
                      <a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>