@extends('frontsite.dashboard-user.master')

@section('content')
    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Manage Tasks</h3>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li>Manage Tasks</li>
            </ul>
        </nav>
    </div>

    <!-- Row -->
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-assignment"></i> My Tasks</h3>
                </div>

                <div class="content">
                    <ul class="dashboard-box-list">
                        @forelse($projects as $project)
                        <li>
                            <!-- Job Listing -->
                            <div class="job-listing width-adjustment">

                                <!-- Job Listing Details -->
                                <div class="job-listing-details">

                                    <!-- Details -->
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title"><a href="#">{{$project->title}}</a> <span class="dashboard-status-button yellow">{{$project->status}}</span></h3>

                                        <!-- Job Listing Footer -->
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li><i class="icon-material-outline-access-time"></i> {{ $project->created_at->diffForHumans() }} left</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Task Details -->
                            <ul class="dashboard-task-info">
                                <li><strong>3</strong><span>Bids</span></li>
                                <li><strong>$22</strong><span>Avg. Bid</span></li>
                                <li><strong>${{$project->min_budget}} - ${{$project->max_budget}}</strong><span>{{$project->type}} Rate</span></li>
                            </ul>

                            <!-- Buttons -->
                            <div class="buttons-to-right always-visible">
                                <a href="dashboard-manage-bidders.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders <span class="button-info">3</span></a>
                                <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                            </div>
                        </li>
                        @empty

                        @endforelse

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- Row / End -->
@endsection
