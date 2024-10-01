@if(Auth::user()->role_id == 2)
@include('backEnd.inc.sidebar')

@else
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{route('admin.index')}}" class="text-nowrap logo-img">
                <img src="{{asset(setting()->website_logo)}}" class="dark-logo" width="180" alt="" />
                <img src="{{asset(setting()->website_logo)}}" class="light-logo"  width="180" alt="" />
            </a>
            <div class="cursor-pointer close-btn d-lg-none d-block sidebartoggler" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Intro -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Dashboard</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('my-orders')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                        <span class="hide-menu">My Orders</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('user-support.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-message-chatbot"></i>
                  </span>
                        <span class="hide-menu">My Support Tickets</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('user-profile.edit')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                        <span class="hide-menu">Update Profile</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('home')}}" target="_blank">
                  <span>
                    <i class="ti ti-world"></i>
                  </span>
                        <span class="hide-menu">Visit Website</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
@endif
