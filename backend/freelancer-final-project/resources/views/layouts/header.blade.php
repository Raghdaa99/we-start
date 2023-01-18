<header id="header-container" class="fullwidth">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a href="{{ url("/") }}"><img src="{{ asset("/assets/frontsite/images/logo.png") }}"
                                                  alt=""></a>
                </div>

                <!-- Main Navigation -->
                <nav id="navigation">
                    <ul id="responsive">

                        <li><a href="{{ url("/") }}" class="current">Home</a>

                        </li>

                        <li><a href="{{ url("#") }}">Find Work</a>
                            <ul class="dropdown-nav">
                                <li><a href="{{ url("#") }}">Browse Jobs</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ url("jobs-list-layout-full-page-map.html") }}">Full Page
                                                List + Map</a></li>
                                        <li><a href="{{ url("jobs-grid-layout-full-page-map.html") }}">Full Page
                                                Grid + Map</a></li>
                                        <li><a href="{{ url("jobs-grid-layout-full-page.html") }}">Full Page
                                                Grid</a></li>
                                        <li><a href="{{ url("jobs-list-layout-1.html") }}">List Layout 1</a></li>
                                        <li><a href="{{ url("jobs-list-layout-2.html") }}">List Layout 2</a></li>
                                        <li><a href="{{ url("jobs-grid-layout.html") }}">Grid Layout</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url("#") }}">Browse Tasks</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ url("tasks-list-layout-1.html") }}">List Layout 1</a></li>
                                        <li><a href="{{ url("tasks-list-layout-2.html") }}">List Layout 2</a></li>
                                        <li><a href="{{ url("tasks-grid-layout.html") }}">Grid Layout</a></li>
                                        <li><a href="{{ url("tasks-grid-layout-full-page.html") }}">Full Page
                                                Grid</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url("browse-companies.html") }}">Browse Companies</a></li>
                                <li><a href="{{ url("single-job-page.html") }}">Job Page</a></li>
                                <li><a href="{{ url("single-task-page.html") }}">Task Page</a></li>
                                <li><a href="{{ url("single-company-profile.html") }}">Company Profile</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ url("#") }}">For Employers</a>
                            <ul class="dropdown-nav">
                                <li><a href="{{ url("#") }}">Find a Freelancer</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ url("freelancers-grid-layout-full-page.html") }}">Full Page
                                                Grid</a></li>
                                        <li><a href="{{ url("freelancers-grid-layout.html") }}">Grid Layout</a></li>
                                        <li><a href="{{ url("freelancers-list-layout-1.html") }}">List Layout 1</a>
                                        </li>
                                        <li><a href="{{ url("freelancers-list-layout-2.html") }}">List Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ url("single-freelancer-profile.html") }}">Freelancer Profile</a>
                                </li>
                                <li><a href="{{ url("dashboard-post-a-job.html") }}">Post a Job</a></li>
                                <li><a href="{{ url("dashboard-post-a-task.html") }}">Post a Task</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a>

                        </li>

                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->


            <!-- Right Side Content / End -->
            <div class="right-side">

            @if(Auth::user())
                <!--  User Notifications -->
                    <x-notification-menu/>
                    <!--  User Notifications / End -->

                    <!-- User Menu -->
                    <div class="header-widget">

                        <!-- Messages -->
                        <div class="header-notifications user-menu">
                            <div class="header-notifications-trigger">
                                <a href="{{ url("#") }}">
                                    <div class="user-avatar status-online"><img
                                            src="{{ asset("/assets/frontsite/images/user-avatar-small-01.jpg") }}"
                                            alt=""></div>
                                </a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <!-- User Status -->
                                <div class="user-status">

                                    <!-- User Name / Avatar -->
                                    <div class="user-details">
                                        <div class="user-avatar status-online"><img
                                                src="{{ asset("/assets/frontsite/images/user-avatar-small-01.jpg") }}"
                                                alt=""></div>
                                        <div class="user-name">
                                            {{Auth::user()->name}} <span>{{Auth::user()->type}}</span>
                                        </div>
                                    </div>

                                    <!-- User Status Switcher -->
                                    <div class="status-switch" id="snackbar-user-status">
                                        <label class="user-online current-status">Online</label>
                                        <label class="user-invisible">Invisible</label>
                                        <!-- Status Indicator -->
                                        <span class="status-indicator" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <ul class="user-menu-small-nav">
                                    <li><a href="{{ route("user.dashboard") }}"><i
                                                class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                                    <li><a href="{{ route("user.settings") }}"><i
                                                class="icon-material-outline-settings"></i> Settings</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="nav-link"
                                           onclick="event.preventDefault(); document.getElementById('logout').submit();"><i
                                                class="icon-material-outline-power-settings-new"></i>
                                            Logout
                                        </a>
                                        <form action="{{ route('logout') }}" method="post" style="display: none;"
                                              id="logout">
                                            @csrf
                                            <input type="hidden" value="admin" name="guard">
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <!-- User Menu / End -->

                    <!-- Mobile Navigation Button -->
                    <span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>
                @else
                    <div class="header-widget">
                        <br>
                        <div class="align-bottom">

                            <a href="{{route('login')}}">
                                    <span class="button button-sliding-icon ripple-effect">
                                    Login<i class="icon-material-outline-arrow-right-alt"></i></span>
                            </a>

                        </div>

                        @endif
                    </div>
                    <!-- Right Side Content / End -->

            </div>
        </div>
    </div>
    <!-- Header / End -->

</header>
