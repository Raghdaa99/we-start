<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Category</h4>
    <ul class="list cat-list">
        @foreach($categories as $category)
            <li>
                <a href="#" class="d-flex">
                    <p>{{$category->title}}</p>
                    <p>({{$category->posts_count}})</p>
                </a>
            </li>
        @endforeach

    </ul>
</aside>
