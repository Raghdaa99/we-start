@if ($paginator->hasPages())

<!-- Pagination -->
<div class="clearfix"></div>
<div class="pagination-container margin-top-20 margin-bottom-20">
    <nav class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
                <li class="pagination-arrow disabled" aria-disabled="true">
                    <a  class="ripple-effect"><i
                            class="icon-material-outline-keyboard-arrow-left"></i></a></li>
            @else
                <li class="pagination-arrow"><a href="{{ $paginator->previousPageUrl() }}" class="ripple-effect"><i
                            class="icon-material-outline-keyboard-arrow-left"></i></a></li>
            @endif



{{--            <li><a href="#" class="ripple-effect">1</a></li>--}}
{{--            <li><a href="#" class="ripple-effect current-page">2</a></li>--}}
{{--            <li><a href="#" class="ripple-effect">3</a></li>--}}
{{--            <li><a href="#" class="ripple-effect">4</a></li>--}}

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true">
                            <a class="ripple-effect">{{ $element }}</a></li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li  aria-current="page"><a
                                        class="ripple-effect current-page">{{ $page }}</a>
                                </li>

                            @else
                                <li class=""><a class="ripple-effect"
                                                         href="{{$url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="pagination-arrow">
                        <a href="{{ $paginator->nextPageUrl() }}" class="ripple-effect"><i
                                class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                @else
                    <li class="pagination-arrow disabled" aria-disabled="true">
                        <a href="#" class="ripple-effect"><i
                                class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                @endif

        </ul>
    </nav>
</div>
<div class="clearfix"></div>
<!-- Pagination / End -->
@endif
