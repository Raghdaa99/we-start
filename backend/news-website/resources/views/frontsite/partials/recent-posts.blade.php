<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Recent Post</h3>
    @foreach($recent_posts as $recent_post)
        <div class="media post_item">
            <img src="{{ $recent_post->image_url }}"
                 alt="post" width="80" height="80">
            <div class="media-body">
                <a href="{{ url("single-blog.html") }}">
                    <h3>{{ $recent_post->title }}</h3>
                </a>
                <p>{{$recent_post->created_at->diffForHumans()}}</p>
            </div>
        </div>
    @endforeach

</aside>
