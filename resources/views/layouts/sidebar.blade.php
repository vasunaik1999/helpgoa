    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">

        @if(Auth::user()->hasRole('superadmin'))
        <p class="text-gray font-weight-bold text-uppercase px-3 pt-3 small pb-3 mb-0">Users</p>
        <ul class="nav flex-column bg-white mb-0">
            <!-- <li class="nav-item">
                <a href="#" class="nav-link text-dark bg-light">
                    <i class="fa fa-th-large mr-3 text-main fa-fw"></i>
                    Warriors
                </a>
            </li> -->

            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddwarrior" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-shield ml-2 mr-3 text-main fa-fw"></i>Warriors
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddwarrior">
                        <a class="dropdown-item nav-link text-dark" href="{{route('warrior.view')}}">View Warriors</a>
                        <a class="dropdown-item nav-link text-dark" href="{{route('warrior.add')}}">Add Warrior</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users ml-2 mr-3 text-main fa-fw"></i>Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item nav-link text-dark" href="{{route('user.view')}}">View Users</a>
                        <a class="dropdown-item nav-link text-dark" href="{{route('user.add')}}">Add User</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddadmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users-cog ml-2 mr-3 text-main fa-fw"></i>Admins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddadmin">
                        <a class="dropdown-item nav-link text-dark" href="{{route('admin.view')}}">View Admins</a>
                        <a class="dropdown-item nav-link text-dark" href="{{route('admin.add')}}">Add Admin</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddsadmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-cog ml-2 mr-3 text-main fa-fw"></i>Super Admins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddsadmin">
                        <a class="dropdown-item nav-link text-dark" href="{{route('superadmin.view')}}">View Superadmins</a>
                        <a class="dropdown-item nav-link text-dark" href="{{route('superadmin.add')}}">Add Superadmin</a>
                    </div>
                </div>
            </li>
        </ul>
        @endif

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Requests</p>

        <ul class="nav flex-column bg-white mb-0">
            <!-- <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddrequest" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-address-card ml-2 mr-3 text-main fa-fw"></i>Requests
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddrequest">
                        <a class="dropdown-item nav-link text-dark" href="{{route('request.create')}}">Create Request</a>
                        <a class="dropdown-item nav-link text-dark" href="{{route('request.show')}}">View Request</a>
                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                        <a class="dropdown-item nav-link text-dark" href="{{route('request.manage')}}">Manage Requests</a>
                        @endif
                    </div>
                </div>
            </li> -->
            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a href="{{url('/dashboard/resources')}}" class="nav-link ">
                    <i class="fa fa-info mr-3 text-main fa-fw"></i>Resources
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{route('request.create')}}" class="nav-link ">
                    <i class="fa fa-file-medical mr-3 text-main fa-fw"></i>Create Request
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('request.show')}}" class="nav-link ">
                    <i class="fa fa-file-alt mr-3 text-main fa-fw"></i>View Request
                </a>
            </li>
            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a href="{{route('request.manage')}}" class="nav-link ">
                    <i class="fa fa-folder mr-3 text-main fa-fw"></i>Manage Request
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('warrior.verifyindex')}}" class="nav-link ">
                    <i class="fa fa-id-card mr-3 text-main fa-fw"></i>Verify Warriors
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{route('contactform.index')}}" class="nav-link ">
                    <i class="fa fa-id-card mr-3 text-main fa-fw"></i>Contact Form
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-area-chart mr-3 text-main fa-fw"></i>
                    Extra
                </a>
            </li> -->
        </ul>
    </div>
    <!-- End vertical navbar -->