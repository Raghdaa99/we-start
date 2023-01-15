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
=                            <!-- Task Details -->
                            <ul class="dashboard-task-info">
                                <li><strong>{{$project->proposals_count}}</strong><span>Bids</span></li>
                                <li><strong>${{$project->proposals->pluck('cost')->avg()?? 0}}</strong><span>Avg. Bid</span></li>
                                <li><strong>${{$project->min_budget}} - ${{$project->max_budget}}</strong><span>{{$project->type}} Rate</span></li>
                            </ul>

                            <!-- Buttons -->
                            <div class="buttons-to-right always-visible">
                                <a href="{{route('user.project.manage.bidders',$project->slug)}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders <span class="button-info">{{$project->proposals_count}}</span></a>
                                <a href="{{route('user.projects.edit',$project)}}" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                <a  onclick="projectDelete('{{$project->id}}',this)" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Remove">
                                    <i class="icon-feather-trash-2"></i>
                                </a>
{{--                                <button  class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top">--}}
{{--                                    <i class="icon-feather-trash-2"></i>--}}
{{--                                </button>--}}
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function projectDelete(id, reference) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id, reference)
                }
            })
        }

        function performDelete(id, reference) {
            $.ajax({
                type: "delete",
                url:`/user/projects/${id}`,
                success: function (res) {
                    reference.closest('li').remove();
                    toastr.success(res.message);
                },
                error: function (error) {
                    console.log(error.responseJSON);
                    toastr.error(error.responseJSON);
                },
            });



        }
    </script>
@endsection
