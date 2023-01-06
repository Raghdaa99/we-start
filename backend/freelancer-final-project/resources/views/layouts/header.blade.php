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
                    <div class="header-widget hide-on-mobile">

                        <!-- Notifications -->
                        <div class="header-notifications">

                            <!-- Trigger -->
                            <div class="header-notifications-trigger">
                                <a href="{{ url("#") }}"><i class="icon-feather-bell"></i><span>4</span></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <div class="header-notifications-headline">
                                    <h4>Notifications</h4>
                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                            data-tippy-placement="left">
                                        <i class="icon-feather-check-square"></i>
                                    </button>
                                </div>

                                <div class="header-notifications-content">
                                    <div class="header-notifications-scroll" data-simplebar>
                                        <ul>
                                            <!-- Notification -->
                                            <li class="notifications-not-read">
                                                <a href="{{ url("dashboard-manage-candidates.html") }}">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-group"></i></span>
                                                    <span class="notification-text">
													<strong>Michael Shannah</strong> applied for a job <span
                                                            class="color">Full Stack Software Engineer</span>
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="{{ url("dashboard-manage-bidders.html") }}">
                                                        <span class="notification-icon"><i
                                                                class=" icon-material-outline-gavel"></i></span>
                                                    <span class="notification-text">
													<strong>Gilbert Allanis</strong> placed a bid on your <span
                                                            class="color">iOS App Development</span> project
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="{{ url("dashboard-manage-jobs.html") }}">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-autorenew"></i></span>
                                                    <span class="notification-text">
													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="{{ url("dashboard-manage-candidates.html") }}">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-group"></i></span>
                                                    <span class="notification-text">
													<strong>Sindy Forrest</strong> applied for a job <span
                                                            class="color">Full Stack Software Engineer</span>
												</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Messages -->
                        <div class="header-notifications">
                            <div class="header-notifications-trigger">
                                <a href="{{ url("#") }}"><i class="icon-feather-mail"></i><span>3</span></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <div class="header-notifications-headline">
                                    <h4>Messages</h4>
                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                            data-tippy-placement="left">
                                        <i class="icon-feather-check-square"></i>
                                    </button>
                                </div>

                                <div class="header-notifications-content">
                                    <div class="header-notifications-scroll" data-simplebar>
                                        <ul>
                                            <!-- Notification -->
                                            <li class="notifications-not-read">
                                                <a href="{{ url("dashboard-messages.html") }}">
                                                        <span class="notification-avatar status-online"><img
                                                                src="{{ asset("/assets/frontsite/images/user-avatar-small-03.jpg") }}"
                                                                alt=""></span>
                                                    <div class="notification-text">
                                                        <strong>David Peterson</strong>
                                                        <p class="notification-msg-text">Thanks for reaching out.
                                                            I'm quite busy right now on many...</p>
                                                        <span class="color">4 hours ago</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li class="notifications-not-read">
                                                <a href="{{ url("dashboard-messages.html") }}">
                                                        <span class="notification-avatar status-offline"><img
                                                                src="{{ asset("/assets/frontsite/images/user-avatar-small-02.jpg") }}"
                                                                alt=""></span>
                                                    <div class="notification-text">
                                                        <strong>Sindy Forest</strong>
                                                        <p class="notification-msg-text">Hi Tom! Hate to break it to
                                                            you, but I'm actually on vacation until...</p>
                                                        <span class="color">Yesterday</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li class="notifications-not-read">
                                                <a href="{{ url("dashboard-messages.html") }}">
                                                        <span class="notification-avatar status-online"><img
                                                                src="{{ asset("/assets/frontsite/images/user-avatar-placeholder.png") }}"
                                                                alt=""></span>
                                                    <div class="notification-text">
                                                        <strong>Marcin Kowalski</strong>
                                                        <p class="notification-msg-text">I received payment. Thanks
                                                            for cooperation!</p>
                                                        <span class="color">Yesterday</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a href="{{ url("dashboard-messages.html") }}"
                                   class="header-notifications-button ripple-effect button-sliding-icon">View All
                                    Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>

                    </div>
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
                                            Tom Smith <span>Freelancer</span>
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
                                    <li><a href="{{ url("dashboard-settings.html") }}"><i
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
