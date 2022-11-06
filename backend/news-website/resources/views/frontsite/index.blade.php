@extends('frontsite.master')


@section('title','Home')

@section('styles')
@endsection

@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/trending_top.jpg") }}" alt="">
                                    <div class="trend-top-cap">
                                        <span>Appetizers</span>
                                        <h2><a href="{{ url("details.blade.php") }}">Welcome To The Best Model
                                                Winner<br> Contest At Look of the year</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom1.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Lifestyple</span>
                                                <h4><a href="{{ url("details.blade.php") }}">Get the Illusion of Fuller
                                                        Lashes by “Mascng.”</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom2.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color2">Sports</span>
                                                <h4><h4><a href="{{ url("details.blade.php") }}">Get the Illusion of
                                                            Fuller Lashes by “Mascng.”</a></h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom3.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Travels</span>
                                                <h4><a href="{{ url("details.blade.php") }}"> Welcome To The Best Model
                                                        Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom3.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Travels</span>
                                                <h4><a href="{{ url("details.blade.php") }}"> Welcome To The Best Model
                                                        Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom3.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Travels</span>
                                                <h4><a href="{{ url("details.blade.php") }}"> Welcome To The Best Model
                                                        Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    src="{{ asset("/assets/front/assets/img/trending/trending_bottom3.jpg") }}"
                                                    alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Travels</span>
                                                <h4><a href="{{ url("details.blade.php") }}"> Welcome To The Best Model
                                                        Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right1.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Concert</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right2.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color3">sea beach</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right3.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color2">Bike Show</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right4.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color4">See beach</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right5.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Skeping</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right5.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Skeping</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset("/assets/front/assets/img/trending/right3.jpg") }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color2">Bike Show</span>
                                    <h4><a href="{{ url("details.blade.php") }}">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->


        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/weekly2News1.jpg") }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/weekly2News2.jpg") }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event night</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/weekly2News3.jpg") }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/weekly2News4.jpg") }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event time</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/weekly2News4.jpg") }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!--  Recent Articles start -->
        <div class="recent-articles">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Recent Articles</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="recent-active dot-style d-flex dot-style">
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/recent1.jpg") }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Night party</span>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/recent2.jpg") }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Night party</span>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/recent3.jpg") }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Night party</span>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset("/assets/front/assets/img/news/recent2.jpg") }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Night party</span>
                                        <h4><a href="{{ url("#") }}">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="{{ url("#") }}"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ url("#") }}">01</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ url("#") }}">02</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ url("#") }}">03</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ url("#") }}"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>
@endsection

@section('scripts')
@endsection
