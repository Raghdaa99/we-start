<!doctype html>
<html lang="en">

@include('layouts.head')

<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container
================================================== -->
    @include('layouts.header')
    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Dashboard Container -->
    <div class="dashboard-container">

        <!-- Dashboard Sidebar
================================================== -->
        <div class="dashboard-sidebar">
            <div class="dashboard-sidebar-inner" data-simplebar>
                <div class="dashboard-nav-container">

                    <!-- Responsive Navigation Trigger -->
                    <a href="{{ url("#") }}" class="dashboard-responsive-nav-trigger">
							<span class="hamburger hamburger--collapse">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</span>
                        <span class="trigger-title">Dashboard Navigation</span>
                    </a>

                    <!-- Navigation -->
                    <div class="dashboard-nav">
                        <div class="dashboard-nav-inner">

                            <ul data-submenu-title="Start">

                                <li class=" {{active('user.dashboard')}}"><a href="{{ route('user.dashboard') }}"><i
                                            class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                                <li class=" {{active('user.messages')}}"><a href="{{ route("user.messages") }}"><i
                                            class="icon-material-outline-question-answer"></i> Messages <span
                                            class="nav-tag">2</span></a></li>
                                <li><a href="{{ url("dashboard-bookmarks.html") }}"><i
                                            class="icon-material-outline-star-border"></i> Bookmarks</a></li>
                                <li class=" {{active('user.reviews')}}"><a href="{{ route("user.reviews") }}"><i
                                            class="icon-material-outline-rate-review"></i> Reviews</a></li>
                            </ul>

                            <ul data-submenu-title="Organize and Manage">

                                <li class=" {{active('user.projects.index')}}"><a href="{{ route("user.projects.index") }}"><i class="icon-material-outline-assignment"></i>
                                        Projects</a>
                                    <ul>
                                        <li class=" {{active('user.projects.index')}}"><a href="{{ route("user.projects.index") }}">Manage Projects</a></li>
                                        <li class=" {{active('user.projects.create')}}"><a href="{{ route("user.projects.create") }}">Post a Project</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul data-submenu-title="Account">
                                <li class=" {{active('user.settings')}}"><a href="{{ route('user.settings')  }}"><i
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
                    <!-- Navigation / End -->

                </div>
            </div>
        </div>
        <!-- Dashboard Sidebar / End -->

        <!-- Dashboard Content
================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">


            @yield('content')
            <!-- Footer -->
                <div class="dashboard-footer-spacer"></div>
                <div class="small-footer margin-top-15">
                    <div class="small-footer-copyrights">
                        © 2018 <strong>Hireo</strong>. All Rights Reserved.
                    </div>
                    <ul class="footer-social-links">
                        <li>
                            <a href="#" title="Facebook" data-tippy-placement="top">
                                <i class="icon-brand-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Twitter" data-tippy-placement="top">
                                <i class="icon-brand-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Google Plus" data-tippy-placement="top">
                                <i class="icon-brand-google-plus-g"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="LinkedIn" data-tippy-placement="top">
                                <i class="icon-brand-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Footer / End -->

            </div>
        </div>
    </div>
    <!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

    <!--Tabs -->
    <div class="sign-in-form">

        <ul class="popup-tabs-nav">
            <li><a href="{{ url("#tab") }}">Add Note</a></li>
        </ul>

        <div class="popup-tabs-container">

            <!-- Tab -->
            <div class="popup-tab-content" id="tab">

                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Do Not Forget 😎</h3>
                </div>

                <!-- Form -->
                <form method="post" id="add-note">

                    <select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
                        <option>Low Priority</option>
                        <option>Medium Priority</option>
                        <option>High Priority</option>
                    </select>

                    <textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

                </form>

                <!-- Button -->
                <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add
                    Note <i class="icon-material-outline-arrow-right-alt"></i></button>

            </div>

        </div>
    </div>
</div>
<!-- Apply for a job popup / End -->


@include('layouts.scripts')
</body>

</html>
