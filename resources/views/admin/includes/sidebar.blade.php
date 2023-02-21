<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                    @can('isEmployee')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('createStep1')}}" aria-expanded="false"><span class="hide-menu">1-Personal Information</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('register.create.step.2')}}" aria-expanded="false">
                            <span class="hide-menu">2-USG Contract and <br> Direct Employer Information</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('register.create.step.3')}}" aria-expanded="false"><span class="hide-menu">3-Additional Information</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('register.create.step.4')}}" aria-expanded="false"><span class="hide-menu">4-Upload Supporting
                                <br> Documentation</span></a></li>
                    @endcan
                    @can('isAdmin')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">User Management</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{route('user')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Users List </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('user.create')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Create User </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('import-view')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Import User </span></a></li>
                                </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Applicant List</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{route('applicants.list')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Applicants List </span></a></li>
                                </ul>
                        </li>
                    @endcan
                    @can('isEmployee')
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{route('profile')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> My profile </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('change.password')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Change Password </span></a></li>
                                </ul>
                            </li>
                    @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
