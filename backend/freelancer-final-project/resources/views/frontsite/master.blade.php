<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Hireo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset("/assets/frontsite/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/frontsite/css/colors/blue.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container
    ================================================== -->
  @include('layouts.header')
    <div class="clearfix"></div>
    <!-- Header Container / End -->


@yield('content')
{{--{{\Request::route()->getName()}}--}}
    @if(\Request::route()->getName() != 'full_projects')
<!-- Footer
================================================== -->
    <div id="footer">

        <!-- Footer Top Section -->
        <div class="footer-top-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Footer Rows Container -->
                        <div class="footer-rows-container">

                            <!-- Left Side -->
                            <div class="footer-rows-left">
                                <div class="footer-row">
                                    <div class="footer-row-inner footer-logo">
                                        <img src="{{ asset("/assets/frontsite/images/logo2.png") }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="footer-rows-right">

                                <!-- Social Icons -->
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <ul class="footer-social-links">
                                            <li>
                                                <a href="{{ url("#") }}" title="Facebook" data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url("#") }}" title="Twitter" data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url("#") }}" title="Google Plus"
                                                   data-tippy-placement="bottom" data-tippy-theme="light">
                                                    <i class="icon-brand-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url("#") }}" title="LinkedIn" data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <!-- Language Switcher -->
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <select class="selectpicker language-switcher" data-selected-text-format="count"
                                                data-size="5">
                                            <option selected>English</option>
                                            <option>Français</option>
                                            <option>Español</option>
                                            <option>Deutsch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Footer Rows Container / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top Section / End -->

        <!-- Footer Middle Section -->
        <div class="footer-middle-section">
            <div class="container">
                <div class="row">

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Candidates</h3>
                            <ul>
                                <li><a href="{{ url("#") }}"><span>Browse Jobs</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Add Resume</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Job Alerts</span></a></li>
                                <li><a href="{{ url("#") }}"><span>My Bookmarks</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Employers</h3>
                            <ul>
                                <li><a href="{{ url("#") }}"><span>Browse Candidates</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Post a Job</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Post a Task</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Plans & Pricing</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="{{ url("#") }}"><span>Contact</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Privacy Policy</span></a></li>
                                <li><a href="{{ url("#") }}"><span>Terms of Use</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Account</h3>
                            <ul>
                                <li><a href="{{ url("#") }}"><span>Log In</span></a></li>
                                <li><a href="{{ url("#") }}"><span>My Account</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
                        <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
                        <form action="#" method="get" class="newsletter">
                            <input type="text" name="fname" placeholder="Enter your email address">
                            <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Middle Section / End -->

        <!-- Footer Copyrights -->
        <div class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        © 2018 <strong>Hireo</strong>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyrights / End -->

    </div>
    <!-- Footer / End -->
    @endif
</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{ asset("/assets/frontsite/js/jquery-3.3.1.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/jquery-migrate-3.0.0.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/mmenu.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/tippy.all.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/simplebar.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/bootstrap-slider.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/snackbar.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/clipboard.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/counterup.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/magnific-popup.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/slick.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/custom.js") }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->

<script>
    // Snackbar for user status switcher
    $('#snackbar-user-status label').click(function () {
        Snackbar.show({
            text: 'Your status has been changed!',
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    });
</script>


<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
        var options = {
            types: ['(cities)'],
            // componentRestrictions: {country: "us"}
        };

        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    // Autocomplete adjustment for homepage
    if ($('.intro-banner-search-form')[0]) {
        setTimeout(function () {
            $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
        }, 300);
    }

</script>

<!-- Google API -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

@yield('scripts')
</body>
</html>
