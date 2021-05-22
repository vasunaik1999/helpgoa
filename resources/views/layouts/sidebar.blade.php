    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">

        @if(Auth::user()->hasRole('superadmin'))
        <p class="text-gray font-weight-bold text-uppercase px-3 pt-3 small pb-3 mb-0">Users</p>
        <ul class="nav flex-column bg-white mb-0">
            <!-- <li class="nav-item">
                <a href="#" class="nav-link text-dark bg-light">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Warriors
                </a>
            </li> -->

            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddwarrior" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-shield ml-2 mr-3 text-primary fa-fw"></i>Warriors
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
                        <i class="fa fa-users ml-2 mr-3 text-primary fa-fw"></i>Users
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
                        <i class="fa fa-users-cog ml-2 mr-3 text-primary fa-fw"></i>Admins
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
                        <i class="fa fa-user-cog ml-2 mr-3 text-primary fa-fw"></i>Super Admins
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
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn dropdown-toggle text-dark" role="button" id="ddrequest" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-cog ml-2 mr-3 text-primary fa-fw"></i>Requests
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddrequest">
                        <a class="dropdown-item nav-link text-dark" href="{{route('request.create')}}">Create Request</a>
                        <a class="dropdown-item nav-link text-dark" href="">View Requests</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                    Extra
                </a>
            </li>
        </ul>
    </div>
    <!-- End vertical navbar -->