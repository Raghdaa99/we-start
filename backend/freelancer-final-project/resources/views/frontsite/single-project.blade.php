@extends('frontsite.master')

@section('content')
    <!-- Titlebar
================================================== -->
    <div class="single-page-header" data-background-image="images/single-task.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image"><a href="{{ url("single-company-profile.html") }}"><img
                                        src="{{ asset("/assets/frontsite/images/browse-companies-02.png") }}"
                                        alt=""></a></div>
                            <div class="header-details">
                                <h3>{{$project->title}}</h3>
                                <h5>About the Employer</h5>
                                <ul>
                                    <li><i
                                            class="icon-material-outline-business"></i> {{$project->status}}</li>
                                    <li>
                                        <div class="star-rating" data-rating="5.0"></div>
                                    </li>

                                    @if($project->user->profile->country)
                                    <li><img class="flag"
                                             src="{{ asset('/assets/frontsite/images/flags/'.$project->user->profile->country.'.svg') }}"
                                             alt=""> {{Symfony\Component\Intl\Countries::getName($project->user->profile->country)}}
                                    </li>
                                    @endif

                                    @if($project->user->email_verified_at)
                                        <li>
                                            <div class="verified-badge-with-title">Verified</div>
                                        </li>
                                    @else
                                        {{--                                        <li><span class="text-red-600">sss</span></li>--}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Project Budget</div>
                                <div class="salary-amount">${{$project->min_budget}} - ${{$project->max_budget}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-xl-8 col-lg-8 content-right-offset">
                @if (session('msg'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('msg') }}
                    </div>
            @endif
            <!-- Description -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Project Description</h3>

                    <p>{{$project->description}}</p>
                </div>

                <!-- Atachments -->
                <div class="single-page-section">
                    <h3>Attachments</h3>
                    <div class="attachments-container">
                        @foreach($project->files as $file)
                            <a href="{{ asset('storage/' . $file->path) }}" class="attachment-box ripple-effect"
                               target="_blank">
                                <span> {{ $file->name }}</span>
                                <i>{{strtoupper(substr($file->path,strpos($file->path ,'.')+1,strlen($file->path)))}}</i></a>


                        @endforeach
                    </div>
                </div>

                <!-- Skills -->
                <div class="single-page-section">
                    <h3>Skills Required</h3>
                    <div class="task-tags">
                        @foreach($project->tags as $tag)
                            <span>{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>

                <!-- Freelancers Bidding -->
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-material-outline-group"></i> Freelancers Bidding</h3>
                    </div>
                    <ul class="boxed-list-ul">
                        @forelse($project->proposals as $proposal)
                            <li>
                                <div class="bid">
                                    <!-- Avatar -->
                                    <div class="bids-avatar">
                                        <div class="freelancer-avatar">
                                            <div class="verified-badge"></div>
                                            <a href="{{ route('single-freelancer-profile',[$proposal->freelancer->name,$proposal->freelancer->id]) }}"><img
                                                    src="{{ $proposal->freelancer->image_url }}"
                                                    alt=""></a>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="bids-content">
                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <h4>
                                                <a href="{{ route('single-freelancer-profile',[$proposal->freelancer->name,$proposal->freelancer->id]) }}">{{ $proposal->freelancer->name }}
                                                    <img
                                                        class="flag"
                                                        src="{{ asset('/assets/frontsite/images/flags/'.$proposal->freelancer->profile->country.'.svg') }}"
                                                        alt=""
                                                        title="United Kingdom" data-tippy-placement="top"></a>
                                            </h4>
                                            <span class="star-rating" data-rating="4.9"></span>
                                        </div>
                                    </div>

                                    <!-- Bid -->
                                    <div class="bids-bid">
                                        <div class="bid-rate">
                                            <div class="rate">${{$proposal->cost}}</div>
                                            <span>in {{$proposal->duration}} {{$proposal->duration_unit}}</span>
                                        </div>
                                    </div>

                                </div>
                                <p style="margin-left: 15%">{{$proposal->description}}</p>
                            </li>
                        @empty
                            <br>
                            <p class="text-center"> No propsals yet for this project</p>
                        @endforelse

                    </ul>
                </div>

            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">
                    <div class="countdown green margin-bottom-35">{{$project->created_at->diffForHumans()}}</div>


                    <form action="{{route('proposal.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="sidebar-widget">
                            <div class="bidding-widget">
                                <div class="bidding-headline"><h3>Bid on this job!</h3></div>
                                <div class="bidding-inner">

                                    <input type="hidden" name="project_id" value="{{$project->id}}">
                                    <input type="hidden" name="freelancer_id" value="{{Auth::id()}}">
                                    <!-- Headline -->
                                    <span class="bidding-detail">Set your <strong>minimal rate</strong></span>

                                    <!-- Price Slider -->
                                    <div class="bidding-value">$<span id="biddingVal"></span></div>
                                    <input class="bidding-slider" name="cost" type="text" value=""
                                           data-slider-handle="custom"
                                           data-slider-currency="$" data-slider-min="2500" data-slider-max="4500"
                                           data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide"/>

                                    <!-- Headline -->
                                    <span
                                        class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>

                                    <!-- Fields -->
                                    <div class="bidding-fields">
                                        <div class="bidding-field">
                                            <!-- Quantity Buttons -->
                                            <div class="qtyButtons">
                                                <div class="qtyDec"></div>
                                                <input type="text" name="duration" value="1">
                                                <div class="qtyInc"></div>
                                            </div>
                                        </div>
                                        <div class="bidding-field">
                                            <select class="selectpicker default" name="duration_unit">
                                                @foreach($duration_units as $unit)
                                                    <option value="{{$unit}}">{{ucwords($unit)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Details Bid</p>
                                        <textarea name="description" rows="7"></textarea>
                                    </div>
                                    @if(!Auth::guard('web')->user())
                                        <div class="bidding-signup">Don't have an account? <a
                                                href="{{ route('register') }}"
                                                class="register-tab sign-in popup-with-zoom-anim">Sign
                                                Up</a></div>
                                    @elseif(Auth::guard('web')->user()->type !== 'freelancer')
                                        <p>you are not freelancer to submit this project</p>
                                    @else
                                    <!-- Button -->
                                        <button id="snackbar-place-bid" type="submit"
                                                class="button ripple-effect move-on-hover full-width margin-top-30">
                                            <span>Place a Bid</span>
                                        </button>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Sidebar Widget -->


                    <div class="sidebar-widget">
                        <h3>Bookmark or Share</h3>

                        <!-- Bookmark Button -->
                        <button class="bookmark-button margin-bottom-25">
                            <span class="bookmark-icon"></span>
                            <span class="bookmark-text">Bookmark</span>
                            <span class="bookmarked-text">Bookmarked</span>
                        </button>

                        <!-- Copy URL -->
                        <div class="copy-url">
                            <input id="copy-url" type="text" value="" class="with-border">
                            <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url"
                                    title="Copy to Clipboard" data-tippy-placement="top"><i
                                    class="icon-material-outline-file-copy"></i></button>
                        </div>

                        <!-- Share Buttons -->
                        <div class="share-buttons margin-top-25">
                            <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                            <div class="share-buttons-content">
                                <span>Interesting? <strong>Share It!</strong></span>
                                <ul class="share-buttons-icons">
                                    <li><a href="{{ url("#") }}" data-button-color="#3b5998" title="Share on Facebook"
                                           data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                                    <li><a href="{{ url("#") }}" data-button-color="#1da1f2" title="Share on Twitter"
                                           data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                    <li><a href="{{ url("#") }}" data-button-color="#dd4b39"
                                           title="Share on Google Plus" data-tippy-placement="top"><i
                                                class="icon-brand-google-plus-g"></i></a></li>
                                    <li><a href="{{ url("#") }}" data-button-color="#0077b5" title="Share on LinkedIn"
                                           data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


    <!-- Spacer -->
    <div class="margin-top-15"></div>
    <!-- Spacer / End-->
@endsection
