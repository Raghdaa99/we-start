@extends('frontsite.dashboard-user.master')

@section('content')
    <!-- Dashboard Content
	================================================== -->


    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Manage Bidders</h3>
        <span class="margin-top-7">Bids for <a href="{{ url("#") }}">{{$project->title}}</a></span>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="{{ url("#") }}">Home</a></li>
                <li><a href="{{ url("#") }}">Dashboard</a></li>
                <li>Manage Bidders</li>
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
                    <h3><i class="icon-material-outline-supervisor-account"></i> {{$project->proposals_count}} Bidders
                    </h3>
                    <div class="sort-by">
                        <select class="selectpicker hide-tick">
                            <option>Highest First</option>
                            <option>Lowest First</option>
                            <option>Fastest First</option>
                        </select>
                    </div>
                </div>

                <div class="content">
                    <ul class="dashboard-box-list">
                        @forelse($project->proposals as $proposal)
                            <li>

                                <!-- Overview -->
                                <div class="freelancer-overview manage-candidates">
                                    <div class="freelancer-overview-inner">

                                        <!-- Avatar -->
                                        <div class="freelancer-avatar">
                                            <div class="verified-badge"></div>
                                            <a href="{{ route('single-freelancer-profile',[$proposal->freelancer->name,$proposal->freelancer->id]) }}"><img
                                                    src="{{ $proposal->freelancer->image_url }}"
                                                    alt=""></a>
                                        </div>

                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <a href="{{ route('single-freelancer-profile',[$proposal->freelancer->name,$proposal->freelancer->id]) }}">{{ $proposal->freelancer->name }}
                                                <img
                                                    class="flag"
                                                    src="{{ asset('/assets/frontsite/images/flags/'.$proposal->freelancer->profile->country.'.svg') }}"
                                                    alt=""
                                                    title="United Kingdom" data-tippy-placement="top"></a>
                                            <!-- Details -->
                                            <span class="freelancer-detail-item"><a href="{{ url("#") }}"><i
                                                        class="icon-feather-mail"></i> {{$proposal->freelancer->email}}</a></span>

                                            <!-- Rating -->
                                            <div class="freelancer-rating">
                                                <div class="star-rating" data-rating="{{$proposal->freelancer->rate}}"></div>

                                            </div>

                                            <!-- Bid Details -->
                                            <ul class="dashboard-task-info bid-info">
                                                <li><strong>${{$proposal->cost}}</strong><span>Fixed Price</span></li>
                                                <li>
                                                    <strong>{{$proposal->duration}} {{$proposal->duration_unit}}</strong><span>Delivery Time</span>
                                                </li>
                                            </ul>
                                        {{--                                            href="{{ url("#small-dialog-1") }}"--}}
                                        <!-- Buttons -->
                                            <div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
                                                {{--                                                @dump($proposal->contract->exists)--}}
                                                @if($proposal->contract->exists)
                                                    <a class="margin-bottom-25"> <i
                                                            class="icon-material-outline-check"></i>Accepted </a>

                                                    <a href="{{ url("#small-dialog-3") }}"
                                                       onclick="changeStatusContract({{$proposal->contract->id}})"
                                                       class="popup-with-zoom-anim button  ripple-effect"><i
                                                            class="icon-feather-edit"></i> Status Contract
                                                    </a>
                                                    <a href="#small-dialog-4" onclick="performReviews({{$proposal->id}})"
                                                       class="popup-with-zoom-anim button"
                                                       style="background-color: #febe42">
                                                        <i class="icon-material-outline-thumb-up"></i> Leave a
                                                        Review</a>
                                                @else
                                                    <a onclick="accept_offer({{$proposal->id}})"
                                                       href="{{ url("#small-dialog-1") }}"
                                                       class="popup-with-zoom-anim button ripple-effect"><i
                                                            class="icon-material-outline-check"></i> Accept Offer
                                                    </a>
                                                @endif

                                                <a href="{{ url("#small-dialog-2") }}"
                                                   onclick="sendMessage({{$proposal->id}})"
                                                   class="popup-with-zoom-anim button dark ripple-effect"><i
                                                        class="icon-feather-mail"></i> Send Message
                                                </a>
                                                <a onclick="deletePropsal({{$proposal->id}},this)"
                                                   class="button gray ripple-effect ico"
                                                   title="Remove Bid" data-tippy-placement="top"><i
                                                        class="icon-feather-trash-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <br>
                            <p class="text-center"> No propsals yet for this project</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- Row / End -->

    <!-- Dashboard Content / End -->

    <!-- Bid Acceptance Popup
================================================== -->
    <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="{{ url("#tab1") }}">Accept Offer</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Accept Offer From <span id="name_freelancer"></span></h3>

                        <div class="bid-acceptance margin-top-15">
                            <span id="cost"></span>

                        </div>

                    </div>

                    <form id="terms" action="{{route('user.contract')}}" method="post">
                        @csrf
                        <input type="hidden" id="proposal_id" name="proposal_id">

                        <label>Start Date
                            <input type="date" name="start_on" required>
                        </label>
                        <label>End Date
                            <input type="date" name="end_on" required>
                        </label>
                        <div class="radio">
                            <input id="radio-1" name="accept" type="radio" required>
                            <label for="radio-1"><span class="radio-label"></span> I have read and agree to the Terms
                                and Conditions</label>
                        </div>


                        <button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit"
                                form="terms">Accept <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Bid Acceptance Popup / End -->


    <!-- Send Direct Message Popup
    ================================================== -->
    <div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="{{ url("#tab2") }}">Send Message</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab2">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Direct Message To <span id="name_user"></span></h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="send-pm" action="{{route('user.sendMessage')}}">
                        @csrf
                        <textarea name="body" cols="10" placeholder="Message" class="with-border"
                                  required></textarea>
                        <input type="hidden" name="recipient_id" id="recipient_id">
                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">
                        Send <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>
    <!-- Send Direct Message Popup / End -->

    <div id="small-dialog-3" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="{{ url("#tab2") }}">Status Contract</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab2">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>IF Freelancer complete this Project, You can change the status of contract
                            to Complete , then it will convert money to account this freelancer</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="change_contract" action="{{route('user.contract.update')}}">
                        @csrf
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Status</h5>
                                <select class="selectpicker with-border" data-size="7" title="Select Status"
                                        name="status">
                                    <option value="active">active</option>
                                    <option value="completed">Completed</option>
                                    <option value="terminated">Terminated</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit"
                            form="change_contract">
                        Send <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>

    <!-- Leave a Review for Freelancer Popup
================================================== -->
    <div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab2">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Leave a Review</h3>
                        <span>Rate <a href="#" id="username"></a> for the project <a
                                href="#" id="name_project"></a> </span>
                    </div>

                    <!-- Form -->
                    <form method="post" id="leave-review-form" action="{{route('user.reviews.store')}}">
                        @csrf


                        <input type="hidden" name="freelancer_id">
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <input type="hidden" name="contract_id">
                        <div class="feedback-yes-no">
                            <strong>Your Rating</strong>
                            <div class="leave-rating">
                                <input type="radio" name="star" id="rating-radio-1" value="5" required>
                                <label for="rating-radio-1" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-radio-2" value="4" required>
                                <label for="rating-radio-2" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-radio-3" value="3" required>
                                <label for="rating-radio-3" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-radio-4" value="2" required>
                                <label for="rating-radio-4" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-radio-5" value="1" required>
                                <label for="rating-radio-5" class="icon-material-outline-star"></label>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <textarea class="with-border" placeholder="Comment" name="comment" id="comment" cols="7"
                                  required></textarea>

                    </form>

                <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit"
                            form="leave-review-form">Leave a Review <i
                            class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>
    <!-- Leave a Review Popup / End -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function accept_offer(id) {
            let url = `http://127.0.0.1:8000/user/proposal/${id}`;
            $.get({
                url,
                success: (res) => {
                    console.log(res.cost)
                    $('#cost').text('$' + res.cost)
                    $('#terms input[name=proposal_id]').val(id)
                }
            })
        }

        $('#terms').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let url = $('#terms').attr('action');
            $.ajax({
                type: 'post',
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log(res.message);
                    toastr.success(res.message);
                    window.location.reload();
                    // document.getElementById('small-dialog-1').style.display = 'none';
                },
                error: (error) => {
                    toastr.error(error.responseJSON.message);
                    console.log(error.responseJSON.message);
                }

            })
        })
        // console.log('dddd')
        // $('#cost span').val('555')
    </script>
    <script>
        function sendMessage(id) {
            let url = `http://127.0.0.1:8000/user/proposal/${id}`;
            $.get({
                url,
                success: (res) => {
                    console.log('raaaa');
                    $('#name_user').text(res.freelancer.name)
                    $('#send-pm input[name=recipient_id]').val(res.freelancer_id)
                }
            })
        }

        $('#send-pm').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let url = $('#send-pm').attr('action');
            $.ajax({
                type: 'post',
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log(res.message);
                    toastr.success(res.message);
                    window.location.reload();
                },
                error: (error) => {
                    toastr.error(error.responseJSON.message);
                    console.log(error.responseJSON.message);
                }

            })
        })
    </script>
    <script>
        function changeStatusContract(id) {
            $('#change_contract').on('submit', function (e) {
                e.preventDefault();
                let data = new FormData(this);
                data.append('contract_id', id);
                let url = $('#change_contract').attr('action');
                $.ajax({
                    type: 'post',
                    url,
                    data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        console.log(res.message);
                        toastr.success(res.message);
                        window.location.reload();
                        // document.getElementById('small-dialog-1').style.display = 'none';
                    },
                    error: (error) => {
                        toastr.error(error.responseJSON.message);
                        console.log(error.responseJSON.message);
                    }

                })
            })
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deletePropsal(id, reference) {
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
            let url = `http://127.0.0.1:8000/user/proposal/${id}`;
            $.ajax({
                type: 'delete',
                url,
                success: (res) => {
                    reference.closest('li').remove();
                    toastr.success(res.data.message);
                },
                error: (error) => {
                    toastr.error(error.responseJSON.message);
                    console.log(error.responseJSON.message);
                }
            });


            // axios.delete().then((response) => {
            //
            //     toastr.success(response.data.message);
            // }).catch((error) => {
            //     console.log(error.response.data.message);
            //     toastr.error(error.response.data.message);
            // });
        }
    </script>
    <script>
        function performReviews(id) {
            let url = `http://127.0.0.1:8000/user/proposal/${id}`;
            $.get({
                url,
                success: (res) => {

                    $('#username').text(res.freelancer.name)
                    $('#name_project').text('{{$project->title}}')
                    $('#leave-review-form input[name=freelancer_id]').val(res.freelancer_id)
                    $('#leave-review-form input[name=contract_id]').val(res.contract.id)
                }
            })
        }

        $('#leave-review-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let url = $('#leave-review-form').attr('action');
            $.ajax({
                type: 'post',
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log(res.message);
                    toastr.success(res.message);
                    window.location.reload();
                },
                error: (error) => {
                    toastr.error(error.responseJSON.message);
                    console.log(error.responseJSON.message);
                }

            })
        });
    </script>

@endsection
