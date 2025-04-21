<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="header-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
                    <h5 class="logo-title light-logo ml-3">POSDash</h5>
                </a>
                <div class="iq-menu-bt-sidebar ml-0">
                    <i class="ri-menu-line wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="active">
                            <a href="{{ route('admin.dashboard') }}" class="svg-icon">
                                <svg class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span class="ml-4">Dashboards</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                <span class="ml-4">POS</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="">
                                    <a href="{{ route('billing') }}">
                                        <i class="ri-menu la-money-bill"></i><span>Billing</span>
                                    </a>
                                </li>
                                <!-- <li class="">
                                    <a href="{{ route('billing.list') }}">
                                        <i class="ri-menu la-money-bill"></i><span>Billing List</span>
                                    </a>
                                </li> -->
                                <li class="">
                                    <a href="{{ route('bills.order_list') }}">
                                        <i class="ri-menu la-minus"></i><span>Print Bills</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('bills.take_away') }}">
                                        <i class="ri-shopping-bag-3-line"></i><span>Take Away</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="{{ request()->routeIs('categories.*', 'subcategories.*', 'product.*') ? 'active' : '' }}">
                            <a href="#itemCreation" class="{{ request()->routeIs('categories.*', 'subcategories.*', 'product.*') ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('categories.*', 'subcategories.*', 'product.*') ? 'true' : 'false' }}">
                                <svg class="svg-icon" id="p-dash2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="ml-4">Item Creation</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>

                            <ul id="itemCreation" class="iq-submenu collapse {{ request()->routeIs('categories.*', 'subcategories.*', 'product.*') ? 'show' : '' }}" data-parent="#iq-sidebar-toggle">

                                <!-- Categories Section -->
                                <li class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                                    <a href="#category" class="{{ request()->routeIs('categories.*') ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('categories.*') ? 'true' : 'false' }}">
                                        <i class="ri-menu la-minus"></i><span>Categories</span>
                                    </a>
                                    <ul id="category" class="iq-submenu collapse {{ request()->routeIs('categories.*') ? 'show' : '' }}">
                                        <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                                            <a href="{{ route('categories.index') }}"><i class="las la-minus"></i><span>List Category</span></a>
                                        </li>
                                        <li class="{{ request()->routeIs('categories.add') ? 'active' : '' }}">
                                            <a href="{{ route('categories.add') }}"><i class="las la-minus"></i><span>Add Category</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Subcategories Section -->
                                <li class="{{ request()->routeIs('subcategories.*') ? 'active' : '' }}">
                                    <a href="#subcategory" class="{{ request()->routeIs('subcategories.*') ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('subcategories.*') ? 'true' : 'false' }}">
                                        <i class="ri-menu la-minus"></i><span>Subcategories</span>
                                    </a>
                                    <ul id="subcategory" class="iq-submenu collapse {{ request()->routeIs('subcategories.*') ? 'show' : '' }}">
                                        <li class="{{ request()->routeIs('subcategories.index') ? 'active' : '' }}">
                                            <a href="{{ route('subcategories.index') }}"><i class="las la-minus"></i><span>List Subcategory</span></a>
                                        </li>
                                        <li class="{{ request()->routeIs('subcategories.create') ? 'active' : '' }}">
                                            <a href="{{ route('subcategories.create') }}"><i class="las la-minus"></i><span>Add Subcategory</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Product Section -->
                                <li class="{{ request()->routeIs('product.*') ? 'active' : '' }}">
                                    <a href="#product1" class="{{ request()->routeIs('product.*') ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('product.*') ? 'true' : 'false' }}">
                                        <i class="ri-menu la-minus"></i><span>Products</span>
                                    </a>
                                    <ul id="product1" class="iq-submenu collapse {{ request()->routeIs('product.*') ? 'show' : '' }}">
                                        <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                                            <a href="{{ route('product.index') }}"><i class="las la-minus"></i><span>List Product</span></a>
                                        </li>
                                        <li class="{{ request()->routeIs('product.add') ? 'active' : '' }}">
                                            <a href="{{ route('product.add') }}"><i class="las la-minus"></i><span>Add Product</span></a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>



                        <li class=" ">
                            <a href="#billsMenu" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash6" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="4 14 10 14 10 20"></polyline>
                                    <polyline points="20 10 14 10 14 4"></polyline>
                                    <line x1="14" y1="10" x2="21" y2="3"></line>
                                    <line x1="3" y1="21" x2="10" y2="14"></line>
                                </svg>
                                <span class="ml-4">Bills</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>


                            <ul id="billsMenu" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                                <!-- Purchases Section -->
                                <!-- <li>
                                    <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="las la-minus"></i><span>Purchases</span>
                                    </a>
                                    <ul id="purchase" class="iq-submenu collapse">
                                        <li class="{{ request()->routeIs('purchases.index') ? 'active' : '' }}">
                                            <a href="{{ route('purchases.index') }}">
                                                <i class="las la-minus"></i><span>List Purchases</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('purchases.create') ? 'active' : '' }}">
                                            <a href="{{ route('purchases.create') }}">
                                                <i class="las la-minus"></i><span>Add Purchase</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->

                                <!-- Sales Section -->
                                <!-- <li>
                                    <a href="#sales" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="las la-minus"></i><span>Sales</span>
                                    </a>
                                    <ul id="sales" class="iq-submenu collapse">
                                        <li class="{{ request()->routeIs('sales.index') ? 'active' : '' }}">
                                            <a href="{{ route('sales.index') }}">
                                                <i class="las la-minus"></i><span>Sales List</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li> -->

                                <!-- Bills Section -->
                                <li>
                                    <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="las la-minus"></i><span>View Bills</span>
                                    </a>
                                    <ul id="return" class="iq-submenu collapse">
                                        <li class="{{ request()->routeIs('bills.index') ? 'active' : '' }}">
                                            <a href="{{ route('bills.index') }}">
                                                <i class="las la-minus"></i><span>View Bill</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                        <!-- <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Reports</span>
                            </a>
                            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li> -->

                        <li class="{{ request()->routeIs('manage.users') ? 'active' : '' }}">
                            <a href="{{ route('manage.users') }}">
                                <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Users</span>
                            </a>
                            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>

                        <!-- <li class="{{ request()->routeIs('users.permissions') ? 'active' : '' }}">
                            <a href="{{ route('users.permissions', auth()->id()) }}">
                                <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Permissions</span>
                            </a>
                            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li> -->

                    </ul>
                </nav>
                <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                    <div class="card border-none">
                        <div class="card-body p-0">
                            <div class="sidebarbottom-content">
                                <div class="image">
                                    <img src="{{ asset('assets/images/layouts/side-bkg.png') }}" class="img-fluid" alt="side-bkg">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3"></div>
            </div>
        </div>