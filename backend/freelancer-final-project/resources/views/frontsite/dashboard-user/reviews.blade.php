@extends('frontsite.dashboard-user.master')
@section('content')
    <!-- Dashboard Content
	================================================== -->


    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Reviews</h3>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li>Reviews</li>
            </ul>
        </nav>
    </div>

    <!-- Row -->
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-6">
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-business"></i> Rate Employers</h3>
                </div>

                <div class="content">
                    <ul class="dashboard-box-list">
                        @forelse($reviews as $review)
                            <li>
                                <div class="boxed-list-item">
                                    <!-- Content -->
                                    <div class="item-content">
                                        <h4>{{$review->project->title}}</h4>
                                        <div class="item-details margin-top-10">
                                            <div class="star-rating" data-rating="{{$review->star}}"></div>
                                            <div class="detail-item"><i
                                                    class="icon-material-outline-date-range"></i>{{$review->created_at->format('D Y')}}
                                            </div>
                                        </div>
                                        <div class="item-description">
                                            <p>{{$review->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="#small-dialog-1" onclick="editReview({{$review->id}})"
                                   class="popup-with-zoom-anim button gray ripple-effect margin-top-5 margin-bottom-10">
                                    <i class="icon-feather-edit"></i> Edit Review</a>
                            </li>
                        @empty
                            not found
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <!-- Row / End -->

    <!-- Dashboard Content / End -->

    <!-- Edit Review Popup
    ================================================== -->
    <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab1">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Change Review</h3>
                        <span>Rate <a href="#" id="username">Herman Ewout</a> for the project <a
                                href="#" id="name_project">WordPress Theme Installation</a> </span>
                    </div>

                    <!-- Form -->
                    <form method="post" id="change-review-form">
                        @csrf
                        @method('PUT')

                        <div class="feedback-yes-no">
                            <strong>Your Rating</strong>
                            <div class="leave-rating">
                                <input type="radio" name="star" id="rating-1" value="5">
                                <label for="rating-1" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-2" value="4">
                                <label for="rating-2" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-3" value="3">
                                <label for="rating-3" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-4" value="2">
                                <label for="rating-4" class="icon-material-outline-star"></label>
                                <input type="radio" name="star" id="rating-5" value="1">
                                <label for="rating-5" class="icon-material-outline-star"></label>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <textarea class="with-border" placeholder="Comment" name="comment" id="comment" cols="7"
                                  required></textarea>

                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit"
                            form="change-review-form">Save Changes <i class="icon-material-outline-arrow-right-alt"></i>
                    </button>

                </div>

            </div>
        </div>
    </div>
    <!-- Edit Review Popup / End -->


@endsection

@section('scripts')
    <script>
        function editReview(id) {
            let url = `/user/reviews/${id}`;
            $.get({
                url,
                success: (res) => {
                    $('#change-review-form').attr('action', `/user/reviews/update/${id}`)
                    $('#username').text(res.freelancer.name)
                    $('#name_project').text(res.project.title)
                    $('#change-review-form textarea[name=comment]').val(res.comment)
                    // .leave-rating input[type="radio"]:checked ~ label {
                    // color: #ffc600;
                    // }
                    // $('#change-review-form input:radio[name=star]').val(res.star)
                    let rating = document.querySelectorAll(".leave-rating label");
                    // let count =0 ;
                    // rating.forEach(el => {
                    //     if(count < res.star){
                    //         el.style.color = '#ffc600';
                    //     }
                    //     count++;
                    // })
                }
            })
        }

        $('#change-review-form').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let data = new FormData(this);
            data.append('_method', 'put');
            let url = form.attr('action');
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
@endsection
