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

                        <li><a href="{{ route("home") }}" class="{{current_page('home')}}">Home</a>

                        </li>

                        <li><a href="{{ route("full_projects") }}"  class="{{current_page('full_projects')}}">Browse Projects</a>

                        </li>

                        <li><a href="{{ url("#") }}">Find a Freelancer</a>

                        </li>
                        <li><a href="{{ route('contact') }}" class="{{current_page('contact')}}">Contact</a>

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
