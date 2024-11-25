<aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{route('admin.index')}}" class="text-nowrap logo-img">
                    <img src="{{asset('admin.png')}}" class="dark-logo" width="180" alt="" />
                    <img src="{{asset('admin.png')}}" class="light-logo"  width="180" alt="" />
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
                        <a class="sidebar-link" href="{{route('admin.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    @can('role-list')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('roles-permission.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-user-shield"></i>
                  </span>
                            <span class="hide-menu">Roles</span>
                        </a>
                    </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.user-list')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                                <span class="hide-menu">Create User</span>
                            </a>
                        </li>
                    @endcan
                {{-- Main sidebar start --}}
                <!-- =================== -->
                    <!-- Recipe Intro -->
                    <!-- =================== -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">E-commerce</span>
                        </li>
                    <!-- =================== -->
                    <!-- Books -->
                    <!-- =================== -->

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-product-category.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-category-2"></i>
                  </span>
                            <span class="hide-menu">Product Category</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-products.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-brand-producthunt"></i>
                  </span>
                            <span class="hide-menu">Products</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-coupons.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-discount"></i>
                  </span>
                            <span class="hide-menu">Coupons</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-order.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-shopping-cart"></i>
                  </span>
                            <span class="hide-menu">Orders</span>
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-service.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-world-code"></i>
                  </span>
                            <span class="hide-menu">Services</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-faq.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-bell-question"></i>
                  </span>
                            <span class="hide-menu">FAQ</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-slider.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-slideshow"></i>
                  </span>
                            <span class="hide-menu">Slider</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('custom-review.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-star-half"></i>
                  </span>
                            <span class="hide-menu">Custom Review</span>
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('home-page-setting')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-home-check"></i>
                  </span>
                            <span class="hide-menu">Home Page Setting</span>
                        </a>
                    </li>


                <!-- =================== -->
                    <!-- Support Intro -->
                    <!-- =================== -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Support System</span>
                        </li>
                    <!-- =================== -->
                    <!-- Support -->
                    <!-- =================== -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin-support-list')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-message-chatbot"></i>
                  </span>
                            <span class="hide-menu">Support</span>
                        </a>
                    </li>
                    <!-- =================== -->

                <!-- =================== -->
                    <!-- Recipe Intro -->
                    <!-- =================== -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Blog</span>
                        </li>
                    <!-- =================== -->
                    <!-- Books -->
                    <!-- =================== -->
                    @can('category-list')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('category.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-category-2"></i>
                  </span>
                            <span class="hide-menu">Category</span>
                        </a>
                    </li>
                    @endcan
                    <!-- =================== -->
                    @can('blog-list')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('blog.list')}}">
                          <span>
                            <i class="ti ti-brand-blogger"></i>
                          </span>
                                <span class="hide-menu">Blog</span>
                            </a>
                        </li>
                    @endcan


{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link" href="{{route('affiliate.index')}}">--}}
{{--                  <span>--}}
{{--                    <i class="ti ti-brand-producthunt"></i>--}}
{{--                  </span>--}}
{{--                            <span class="hide-menu">Affiliate Product</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @can('page-list')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('new-page.index')}}">
                      <span>
                        <i class="ti ti-new-section"></i>
                      </span>
                                <span class="hide-menu">Pages</span>
                            </a>
                        </li>
                    @endcan


{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link" href="{{route('project.index')}}">--}}
{{--                  <span>--}}
{{--                    <i class="ti ti-file-code"></i>--}}
{{--                  </span>--}}
{{--                            <span class="hide-menu">Project</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link" href="{{route('comment.message')}}">--}}
{{--                      <span>--}}
{{--                        <i class="ti ti-message-2-share"></i>--}}
{{--                      </span>--}}
{{--                            <span class="hide-menu">Comment List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    @can('social-list')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('update-socials-links')}}">
                          <span>
                            <i class="ti ti-brand-facebook"></i>
                          </span>
                                <span class="hide-menu">Update Socials Link</span>
                            </a>
                        </li>
                    @endcan

                    <!-- =================== -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Website</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('page.homeAbout')}}">
                      <span>
                        <i class="ti ti-user-bolt"></i>
                      </span>
                            <span class="hide-menu">About Section</span>
                        </a>
                    </li>
                    @can('subscriber-list')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('newsletters.index')}}">
                      <span>
                        <i class="ti ti-news"></i>
                      </span>
                                <span class="hide-menu">Subscriber</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('contact.message')}}">
                      <span>
                        <i class="ti ti-message"></i>
                      </span>
                                <span class="hide-menu">Contact Message List</span>
                            </a>
                        </li>
                    @endcan
{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link" href="{{route('page.homePrivacy')}}">--}}
{{--                      <span>--}}
{{--                        <i class="ti ti-user-bolt"></i>--}}
{{--                      </span>--}}
{{--                            <span class="hide-menu">Privacy Policy</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @can('website-list')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.setting')}}">
                  <span>
                    <i class="ti ti-settings"></i>
                  </span>
                                <span class="hide-menu">Website Setting</span>
                            </a>
                        </li>
                    @endcan

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
