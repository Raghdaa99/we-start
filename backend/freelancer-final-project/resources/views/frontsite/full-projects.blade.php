@extends('frontsite.master')
<!-- Page Content
================================================== -->

@section('content')
    <form id="search-form" method="GET" action="{{ route('full_projects') }}">
    <div class="full-page-container">

        <div class="full-page-sidebar">
            <div class="full-page-sidebar-inner" data-simplebar>


                    <div class="sidebar-container">

                    {{--                    @dump( request()->category)--}}
                    <!-- Category -->
                        <div class="sidebar-widget">
                            <h3>Category</h3>
                            <select class="selectpicker default" multiple data-selected-text-format="count"
                                    data-size="7"
                                    title="All Categories" name="category[]">

                                @foreach($categories as $category)

                                    <option
                                        {{ in_array($category->id,request()->category ?? [])  ? 'selected' : '' }} value="{{$category->id}}">{{$category->trans_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type -->
                        <div class="sidebar-widget">
                            <h3>Type Project</h3>
                            <select class="selectpicker default" data-selected-text-format="count"
                                    data-size="7"
                                    title="Type Project" name="type">
                                <option value="hourly" {{request()->type == 'hourly' ? 'selected' : '' }}>Hourly
                                    Project
                                </option>
                                <option value="fixed" {{request()->type == 'fixed' ? 'selected' : '' }}>Fixed Project
                                </option>
                            </select>
                        </div>

                        <!-- Budget -->
                        <div class="sidebar-widget">
                            <h3> Price</h3>
                            <div class="margin-top-55"></div>

                            <!-- Range Slider -->
                            <input class="range-slider" type="text" value="" data-slider-currency="$"
                                   data-slider-min="25" name="price"
                                   data-slider-max="10000" data-slider-step="5"
                                   data-slider-value="[{{request()->price ?? '25,10000'}}]"/>
                        </div>


                        <!-- Tags -->
                        <div class="sidebar-widget">
                            <h3>Skills</h3>
                            {{--                           --}}
                            <div class="tags-container">
                                @foreach($tags as $tag)
                                    <div class="tag">
                                        <input type="checkbox" id="tag_{{$tag->id}}" name="tags[]"
                                               value="{{$tag->id}}" {{ in_array($tag->id, request()->tags ?? [])  ? 'checked' : '' }} />
                                        <label for="tag_{{$tag->id}}">{{$tag->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clearfix"></div>


                        </div>
                        <div class="clearfix"></div>

                        <div class="margin-bottom-40"></div>

                    </div>
                    <!-- Sidebar Container / End -->

                    <!-- Search Button -->
                    <div class="sidebar-search-button-container">
                        <button type="submit" class="button ripple-effect">Search</button>
                    </div>
                    <!-- Search Button / End-->
{{--                </form>--}}

            </div>
        </div>
        <!-- Full Page Sidebar / End -->

        <!-- Full Page Content -->
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">Search Results</h3>

                <div class="notify-box margin-top-15">

                        <div class="sort-by">
                            <span>Sort by:</span>
                            <select class="selectpicker hide-tick" name="sort"
                                    onchange="document.getElementById('search-form').submit()">
                                <option {{ request()->sort == 'newest' ? 'selected' : '' }} value="newest">Newest
                                </option>
                                <option {{ request()->sort == 'oldest' ? 'selected' : '' }} value="oldest">Oldest
                                </option>
                            </select>
                        </div>

                </div>

                <!-- Tasks Container -->
                <div class="tasks-list-container tasks-grid-layout margin-top-35">
                @forelse($projects as $project )
                    <!-- Task -->
                        <a href="{{route('single.project',$project->slug)}}" class="task-listing">

                            <!-- Job Listing Details -->
                            <div class="task-listing-details">

                                <!-- Details -->
                                <div class="task-listing-description">
                                    <h3 class="task-listing-title">{{$project->title}}</h3>
                                    <ul class="task-icons">
                                        <li><i class="icon-material-outline-location-on"></i> {{$project->location}}
                                        </li>
                                        <li>
                                            <i class="icon-material-outline-access-time"></i> {{\Carbon\Carbon::parse($project->created_at)->diffForHumans()}}
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="task-listing-bid">
                                <div class="task-listing-bid-inner">
                                    <div class="task-offers">
                                        <strong>${{$project->min_budget}} - ${{$project->max_budget}}</strong>
                                        <span>{{ucfirst($project->type)}} Price</span>
                                    </div>
                                    <span class="button button-sliding-icon ripple-effect">Bid Now <i
                                            class="icon-material-outline-arrow-right-alt"></i></span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Not found</p>
                    @endforelse

                </div>
                <!-- Tasks Container / End -->

                {{ $projects->appends($_GET)->links('layouts.pagination') }}


            </div>
        </div>
        <!-- Full Page Content / End -->
    </div>
    </form>

@endsection
