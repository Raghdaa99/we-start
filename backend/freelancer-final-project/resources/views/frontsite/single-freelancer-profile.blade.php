@extends('frontsite.master')

@section('content')
    <!-- Titlebar
================================================== -->
    <div class="single-page-header freelancer-header" data-background-image="images/single-freelancer.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image freelancer-avatar"><img src="{{$user->image_url}}" alt=""></div>
                            <div class="header-details">
                                <h3>{{$user->name}} <span>{{$user->profile->title}}</span></h3>
                                <ul>
                                    <li>
                                        <div class="star-rating" data-rating="{{$user->rate}}"></div>
                                    </li>
                                    @if($user->profile->country)
                                    <li><img class="flag"
                                             src="{{ asset('/assets/frontsite/images/flags/'.$user->profile->country.'.svg') }}"
                                             alt="">
                                        {{Symfony\Component\Intl\Countries::getName($user->profile->country) ?? ''}}
                                    </li>
                                    @endif

                                    @if($user->email_verified_at)
                                        <li>
                                            <div class="verified-badge-with-title">Verified</div>
                                        </li>
                                    @endif
                                </ul>
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

                <!-- Page Content -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">About Me</h3>
                    {{$user->profile->description}}
                </div>

                <!-- Boxed List -->
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-material-outline-thumb-up"></i> Work History and Feedback</h3>
                    </div>
                    <ul class="boxed-list-ul">
                        @forelse($user->reviews as $review)
                        <li>
                            <div class="boxed-list-item">
                                <!-- Content -->
                                <div class="item-content">
                                    <h4>{{$review->project->title}} <span>Rated as Freelancer</span></h4>
                                    <div class="item-details margin-top-10">
                                        <div class="star-rating" data-rating="{{$review->star}}"></div>
                                        <div class="detail-item"><i class="icon-material-outline-date-range"></i> {{$review->created_at->format('D Y')}}
                                        </div>
                                    </div>
                                    <div class="item-description">
                                        <p>{{$review->comment}} </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                            not found
                        @endforelse
                    </ul>

                    <div class="clearfix"></div>
                    <!-- Pagination / End -->

                </div>
                <!-- Boxed List / End -->


            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">

                    <!-- Profile Overview -->
                    <div class="profile-overview">
                        <div class="overview-item">
                            <strong>${{$user->profile->hourly_rate ?? 0}}</strong><span>Hourly Rate</span></div>
                        <div class="overview-item"><strong>{{$user->count_jobs_done}}</strong><span>Jobs Done</span></div>
{{--                        <div class="overview-item"><strong>22</strong><span>Rehired</span></div>--}}
                    </div>

                    <!-- Button -->
                    <a href="{{ url("#small-dialog") }}" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Make
                        an Offer <i class="icon-material-outline-arrow-right-alt"></i></a>

                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3>Skills</h3>
                        <div class="task-tags">
                            @forelse($user->profile->skills_arr as $skill)
                                <span>{{$skill}}</span>

                            @empty
                                <p></p>
                            @endforelse
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3>Social Profiles</h3>
                        <div class="freelancer-socials margin-top-25">
                            <ul>
                                <li><a href="{{ url("#") }}" title="Dribbble" data-tippy-placement="top"><i
                                            class="icon-brand-dribbble"></i></a></li>
                                <li><a href="{{ url("#") }}" title="Twitter" data-tippy-placement="top"><i
                                            class="icon-brand-twitter"></i></a></li>
                                <li><a href="{{ url("#") }}" title="Behance" data-tippy-placement="top"><i
                                            class="icon-brand-behance"></i></a></li>
                                <li><a href="{{ url("#") }}" title="GitHub" data-tippy-placement="top"><i
                                            class="icon-brand-github"></i></a></li>

                            </ul>
                        </div>
                    </div>


                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3>Attachments</h3>
                        <div class="attachments-container">
                            {{--                            @foreach($project->files as $file)--}}
                            {{--                                <a href="{{ asset('storage/' . $file->path) }}" class="attachment-box ripple-effect"--}}
                            {{--                                   target="_blank">--}}
                            {{--                                    <span> {{ $file->name }}</span>--}}
                            {{--                                    <i>{{strtoupper(substr($file->path,strpos($file->path ,'.')+1,strlen($file->path)))}}</i></a>--}}


                            {{--                            @endforeach--}}
                            <a href="{{ url("#") }}" class="attachment-box ripple-effect"><span>Cover Letter</span><i>PDF</i></a>
                        </div>
                    </div>

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
