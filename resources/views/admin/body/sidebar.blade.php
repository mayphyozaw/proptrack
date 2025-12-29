<div class="sidebar" id="sidebar">

    <!-- Start Logo -->
    <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="{{route('dashboard')}}" class="logo logo-normal">
                <img src="{{ asset('backend/assets/img/logo.svg') }}" alt="Logo">
            </a>

            <!-- Logo Small -->
            <a href="{{route('dashboard')}}" class="logo-small">
                <img src="{{ asset('backend/assets/img/logo-small.svg') }}" alt="Logo">
            </a>

            <!-- Logo Dark -->
            <a href="{{route('dashboard')}}" class="dark-logo">
                <img src="{{ asset('backend/assets/img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
     

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main Menu</span></li>
                <li>
                    <ul>
                        <li class="submenu ">
                            <a href="{{ route('dashboard') }}"
                                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="ti ti-dashboard"></i><span>Dashboard</span>
                            </a>

                        </li>

                    </ul>
                </li>
                <li class="menu-title"><span>CRM</span></li>

                <li hidden>
                    <ul>
                        <li>
                            <a href="contacts.html"><i class="ti ti-user-up"></i><span>Contacts</span></a>
                        </li>
                        <li>
                            <a href="companies.html"><i class="ti ti-building-community"></i><span>Companies</span></a>
                        </li>

                    </ul>
                </li>


                <li class="menu-title"><span>Reports</span></li>
                <li hidden>
                    <ul>
                        <li class="submenu ">
                            <a href="javascript:void(0);">
                                <i class="ti ti-report-analytics"></i><span>Reports</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="lead-reports.html">Lead Reports</a></li>
                                <li><a href="deal-reports.html">Deal Reports</a></li>
                                <li><a href="contact-reports.html">Contact Reports</a></li>
                                <li><a href="company-reports.html">Company Reports</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title"><span>User Management</span></li>
                <li>
                    <ul>
                        <li><a href="{{route('admin-user.index')}}"  class="{{ request()->routeIs('admin-users.*') ? 'active' : '' }}"><i class="ti ti-users"></i><span>All Admin Users</span></a></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-user-shield"></i>
                                        <span>Roles & Permissions</span>
                                        <span class="menu-arrow"></span>
                                    </a>

                                    <ul style="{{ request()->routeIs('role.*') ? 'display:block;' : 'display:none;' }}">
                                        <li>
                                            <a href="{{ route('role.index') }}"
                                                class="{{ request()->routeIs('role.*') ? 'active' : '' }}">
                                                Roles
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                       

                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>
