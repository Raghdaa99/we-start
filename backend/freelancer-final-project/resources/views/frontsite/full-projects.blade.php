@extends('frontsite.master')
<!-- Page Content
================================================== -->

@section('content')
    <div class="full-page-container">

        <div class="full-page-sidebar">
            <div class="full-page-sidebar-inner" data-simplebar>
                <div class="sidebar-container">

                    <!-- Location -->
                    <div class="sidebar-widget">
                        <h3>Location</h3>
                        <div class="input-with-icon">
                            <div id="autocomplete-container">
                                <input id="autocomplete-input" type="text" placeholder="Location">
                            </div>
                            <i class="icon-material-outline-location-on"></i>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="sidebar-widget">
                        <h3>Category</h3>
                        <select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
                            <option>Admin Support</option>
                            <option>Customer Service</option>
                            <option>Data Analytics</option>
                            <option>Design & Creative</option>
                            <option>Legal</option>
                            <option>Software Developing</option>
                            <option>IT & Networking</option>
                            <option>Writing</option>
                            <option>Translation</option>
                            <option>Sales & Marketing</option>
                        </select>
                    </div>

                    <!-- Keywords -->
                    <div class="sidebar-widget">
                        <h3>Keywords</h3>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                                <input type="text" class="keyword-input" placeholder="e.g. task title"/>
                                <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                            </div>
                            <div class="keywords-list"><!-- keywords go here --></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <!-- Budget -->
                    <div class="sidebar-widget">
                        <h3>Fixed Price</h3>
                        <div class="margin-top-55"></div>

                        <!-- Range Slider -->
                        <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="2500" data-slider-step="25" data-slider-value="[50,2500]"/>
                    </div>

                    <!-- Hourly Rate -->
                    <div class="sidebar-widget">
                        <h3>Hourly Rate</h3>
                        <div class="margin-top-55"></div>

                        <!-- Range Slider -->
                        <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="150" data-slider-step="5" data-slider-value="[10,200]"/>
                    </div>

                    <!-- Tags -->
                    <div class="sidebar-widget">
                        <h3>Skills</h3>

                        <div class="tags-container">
                            <div class="tag">
                                <input type="checkbox" id="tag1"/>
                                <label for="tag1">front-end dev</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag2"/>
                                <label for="tag2">angular</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag3"/>
                                <label for="tag3">react</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag4"/>
                                <label for="tag4">vue js</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag5"/>
                                <label for="tag5">web apps</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag6"/>
                                <label for="tag6">design</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag7"/>
                                <label for="tag7">wordpress</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- More Skills -->
                        <div class="keywords-container margin-top-20">
                            <div class="keyword-input-container">
                                <input type="text" class="keyword-input" placeholder="add more skills"/>
                                <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                            </div>
                            <div class="keywords-list"><!-- keywords go here --></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="margin-bottom-40"></div>

                </div>
                <!-- Sidebar Container / End -->

                <!-- Search Button -->
                <div class="sidebar-search-button-container">
                    <button class="button ripple-effect">Search</button>
                </div>
                <!-- Search Button / End-->

            </div>
        </div>
        <!-- Full Page Sidebar / End -->

        <!-- Full Page Content -->
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">Search Results</h3>

                <div class="notify-box margin-top-15">
                    <div class="switch-container">
                        <label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
                    </div>

                    <div class="sort-by">
                        <span>Sort by:</span>
                        <select class="selectpicker hide-tick">
                            <option>Relevance</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Random</option>
                        </select>
                    </div>
                </div>

                <!-- Tasks Container -->
                <div class="tasks-list-container tasks-grid-layout margin-top-35">

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Food Delviery Mobile App</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-on"></i> San Francisco</li>
                                    <li><i class="icon-material-outline-access-time"></i> 2 minutes ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$1,000 - $2,500</strong>
                                    <span>Fixed Price</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">2000 Words English to German</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 5 minutes ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$75</strong>
                                    <span>Fixed Price</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Fix Python Selenium Code</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 30 minutes ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$100 - $150</strong>
                                    <span>Hourly Rate</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">WordPress Theme Installation</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 1 hour ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$100</strong>
                                    <span>Fixed Price</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">PHP Core Website Fixes</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 1 hour ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$50 - $80</strong>
                                    <span>Hourly Rate</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Adsense Expert</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 2 hours ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$70 - $100</strong>
                                    <span>Hourly Rate</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Design a Landing Page</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 2 hours ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$500</strong>
                                    <span>Fixed Price</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Website and Logo Redesign</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 3 hours ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$850 - $1000</strong>
                                    <span>Fixed Price</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Task -->
                    <a href="single-task-page.html" class="task-listing">

                        <!-- Job Listing Details -->
                        <div class="task-listing-details">

                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title">Simple Chrome Extension</h3>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-location-off"></i> Online Job</li>
                                    <li><i class="icon-material-outline-access-time"></i> 3 hours ago</li>
                                </ul>
                            </div>

                        </div>

                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong>$100</strong>
                                    <span>Hourly Rate</span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Tasks Container / End -->

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="pagination-container margin-top-20 margin-bottom-20">
                    <nav class="pagination">
                        <ul>
                            <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                            <li><a href="#" class="ripple-effect">1</a></li>
                            <li><a href="#" class="ripple-effect current-page">2</a></li>
                            <li><a href="#" class="ripple-effect">3</a></li>
                            <li><a href="#" class="ripple-effect">4</a></li>
                            <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clearfix"></div>
                <!-- Pagination / End -->

                <!-- Footer -->
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
        <!-- Full Page Content / End -->

    </div>
@endsection
