@extends('frontsite.master')


@section('title','Detials')

@section('styles')
@endsection

@section('content')
    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <!-- Hot Aimated News Tittle-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{ asset("/assets/front/assets/img/trending/trending_top.jpg") }}" alt="">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>Here come the moms in space</h3>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>

                            <div class="about-prea">
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">
                                    My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.
                                    the refractor telescope uses a convex lens to focus the light on the eyepiece.
                                    The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see.
                                    Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the celestial body.
                                    Aperture is a fancy word for how big the lens of your telescope is. But it’s an important word because the aperture of the lens is the key to how powerful your telescope is. Magnification has nothing to do with it, its all in the aperture.
                                    Focuser is the housing that keeps the eyepiece of the telescope, or what you will look through, in place. The focuser has to be stable and in good repair for you to have an image you can rely on.
                                    Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                    Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                            </div>

                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-ins.png") }}" alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-fb.png") }}" alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-tw.png") }}" alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-yo.png") }}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <h4>05 Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_1.png") }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="{{ url("#") }}">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="{{ url("#") }}" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_2.png") }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="{{ url("#") }}">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="{{ url("#") }}" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_3.png") }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="{{ url("#") }}">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="{{ url("#") }}" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- From -->
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form class="form-contact comment_form" action="#" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Follow Us</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-fb.png") }}" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-tw.png") }}" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-ins.png") }}" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="{{ url("#") }}"><img src="{{ asset("/assets/front/assets/img/news/icon-yo.png") }}" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="{{ asset("/assets/front/assets/img/news/news_card.jpg") }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
    </main>
@endsection

@section('scripts')
@endsection
