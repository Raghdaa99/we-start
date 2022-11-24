<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset("/assets/front/css/bootstrap.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/font-awesome.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/elegant-icons.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/flaticon.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/owl.carousel.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/nice-select.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/jquery-ui.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/magnific-popup.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/slicknav.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/front/css/style.css") }}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon search-switch">
        <i class="icon_search"></i>
    </div>
    <div class="header-configure-area">
        <div class="language-option">
            <img src="{{ asset("/assets/front/img/flag.jpg") }}" alt="">
            <span>EN <i class="fa fa-angle-down"></i></span>
            <div class="flag-dropdown">
                <ul>
                    <li><a href="{{ url("#") }}">Zi</a></li>
                    <li><a href="{{ url("#") }}">Fr</a></li>
                </ul>
            </div>
        </div>
        <a href="{{ url("#") }}" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li><a href="{{ route("home") }}">Hotels</a></li>

        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="{{ url("#") }}"><i class="fa fa-facebook"></i></a>
        <a href="{{ url("#") }}"><i class="fa fa-twitter"></i></a>
        <a href="{{ url("#") }}"><i class="fa fa-tripadvisor"></i></a>
        <a href="{{ url("#") }}"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section header-normal">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
                        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="{{ url("#") }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-tripadvisor"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="{{ url("#") }}" class="bk-btn">Booking Now</a>
                        <div class="language-option">
                            <img src="{{ asset("/assets/front/img/flag.jpg") }}" alt="">
                            <span>EN <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="{{ url("#") }}">Zi</a></li>
                                    <li><a href="{{ url("#") }}">Fr</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset("/assets/front/img/logo.png") }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
{{--                                <li><a href="{{ url("./index.html") }}">Home</a></li>--}}
                                <li class="active"><a href="{{ route('home')}}">Hotels</a></li>

                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Hotels</h2>
                    <div class="bt-option">
                        <a href="{{ url("./home.html") }}">Home</a>
                        <span>Hotels</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

@yield('content')

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="{{ url("#") }}">
                                <img src="{{ asset("/assets/front/img/footer-logo.png") }}" alt="">
                            </a>
                        </div>
                        <p>We inspire and reach millions of travelers<br/> across 90 local websites</p>
                        <div class="fa-social">
                            <a href="{{ url("#") }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-tripadvisor"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-instagram"></i></a>
                            <a href="{{ url("#") }}"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contact Us</h6>
                        <ul>
                            <li>(12) 345 67890</li>
                            <li>info.colorlib@gmail.com</li>
                            <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>New latest</h6>
                        <p>Get the latest updates and offers.</p>
                        <form action="#" class="fn-form">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        <li><a href="{{ url("#") }}">Contact</a></li>
                        <li><a href="{{ url("#") }}">Terms of use</a></li>
                        <li><a href="{{ url("#") }}">Privacy</a></li>
                        <li><a href="{{ url("#") }}">Environmental Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{ asset("/assets/front/js/jquery-3.3.1.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/jquery.magnific-popup.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/jquery.nice-select.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/jquery-ui.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/jquery.slicknav.js") }}"></script>
<script src="{{ asset("/assets/front/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("/assets/front/js/main.js") }}"></script>
</body>

</html>
