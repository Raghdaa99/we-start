@extends('frontsite.master')


@section('title','Category')

@section('styles')
@endsection

@section('content')
    <main>

        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link {{!$slug? 'active' : ''}}" id="nav-home-tab"
                                               role="tab" aria-controls="nav-home"
                                               aria-selected="true"
                                               href="{{route('category')}}"
                                            >All</a>

                                            @foreach($categories as $category)
                                                <a class="nav-item nav-link {{$category->slug == $slug ? 'active' : ''}}"
                                                   id="{{$category->slug}}"
                                                   href="{{route('category',$category->slug)}}"
                                                >{{$category->title}}</a>
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">

                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row" id="content-tab">
                                                @foreach($posts as $post)
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img
                                                                    src="{{ $post->image_url }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="what-cap">
                                                                <span class="color1">{{$post->category->title}}</span>
                                                                <h4>
                                                                    <a href="{{ url(route('details',$post->id)) }}">{{$post->title}}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="blog_right_sidebar">
                            @include('frontsite.partials.sidebar-search')
                            @include('frontsite.partials.recent-posts')
                            <!-- New Poster -->
                                <div class="news-poster d-none d-lg-block">
                                    <img src="{{ asset("/assets/front/assets/img/news/news_card.jpg") }}" alt="">
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Whats New End -->
        {{--                @include('frontsite.partials.categories-pagination')--}}
        {{ $posts->links('frontsite.partials.categories-pagination') }}
    </main>
@endsection


