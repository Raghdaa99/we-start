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
                                <img src="{{ $post->image_url }}" alt="">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>{{$post->title}}</h3>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> {{$post->category->title}}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>

                            <div class="about-prea">
                                {!! $post->description !!}
                            </div>
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="{{ url("#") }}"><img
                                                    src="{{ asset("/assets/front/assets/img/news/icon-ins.png") }}"
                                                    alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img
                                                    src="{{ asset("/assets/front/assets/img/news/icon-fb.png") }}"
                                                    alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img
                                                    src="{{ asset("/assets/front/assets/img/news/icon-tw.png") }}"
                                                    alt=""></a></li>
                                        <li><a href="{{ url("#") }}"><img
                                                    src="{{ asset("/assets/front/assets/img/news/icon-yo.png") }}"
                                                    alt=""></a></li>
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
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_1.png") }}"
                                                 alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female
                                                fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day
                                                sea lesser
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
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_2.png") }}"
                                                 alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female
                                                fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day
                                                sea lesser
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
                                            <img src="{{ asset("/assets/front/assets/img/comment/comment_3.png") }}"
                                                 alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female
                                                fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day
                                                sea lesser
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
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30"
                                                      rows="9" placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="website" id="website" type="text"
                                                   placeholder="Website">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                        Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            @include('frontsite.partials.sidebar-search')
                            @include('frontsite.partials.sidebar-categories')
                            @include('frontsite.partials.recent-posts')
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
