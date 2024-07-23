{{-- HEADER DEBUT --}}
    <div class="headers">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row ">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center headers">
                <a class="navbar-brand brand-logo nav-link-heart" href="{{route('HomeAdmin')}}"><img  id="logo" src="" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini nav-link-heart" href="{{route('HomeAdmin')}}"><img src="" id="logo1" alt="logo"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex nav-link-heart as" type="button" data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end headers">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link nav-link-heart" href="#">
                            <span class="as">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link active nav-link-heart" href="#">
                            <span class="as">Statistic</span>
                        </a>
                    </li>
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link nav-link-heart" href="#">
                            <span class="as">Employee</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item d-none d-lg-flex as mr-2">
                        <a class="nav-link nav-link-heart " href="#">
                            <span class="as">Help</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown d-flex ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="typcn typcn-message-typing as nav-link-heart"></i>
                            <span class="count bg-success">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list headers" aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text mb-0">
                                The meeting is cancelled
                                </p>
                            </div>
                            </a>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text mb-0">
                                New product launch
                                </p>
                            </div>
                            </a>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text mb-0">
                                Upcoming board meeting
                                </p>
                            </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown  d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center  nav-link-heart" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="typcn typcn-bell mr-0 as"></i>
                            <span class="count bg-danger">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list headers" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                <i class="typcn typcn-info-large mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0">
                                Just now
                                </p>
                            </div>
                            </a>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                <i class="typcn typcn-cog mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0">
                                Private message
                                </p>
                            </div>
                            </a>
                            <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                <i class="typcn typcn-user-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0">
                                2 days ago
                                </p>
                            </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown ">
                        <a class="nav-link dropdown-toggle  pl-0 pr-0 " href="#" data-toggle="dropdown" id="profileDropdown">
                            <i class="typcn typcn-user-outline mr-0 as nav-link-heart"></i>
                            <span class="nav-profile-name nav-link-heart as">Evan Morales</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown headers" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                            <i class="typcn typcn-cog text-primary "></i>
                            <span class=""> Settings</span>
                            </a>
                            <a class="dropdown-item">
                            <i class="typcn typcn-power text-primary as"></i>

                            <span class="">     Logout    </span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-flex nav-link-heart ">
                        <a class=" btn nav-link " href="#" id="mode-toggle">
                            <i id="icon" class="fas themes"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center nav-link-heart" type="button" data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu as"></span>
                </button>
            </div>
        </nav>
    </div>
{{-- HEADER FIN --}}
