@if ($paginator->hasPages())
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{-- Previous Page Link --}}
                                @if ($paginator->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true"><a class="page-link"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                                             href="{{ $paginator->previousPageUrl() }}"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                        <li class="page-item disabled" aria-disabled="true"><a
                                                class="page-link">{{ $element }}</a></li>
                                    @endif
                                    {{-- Array Of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $paginator->currentPage())
                                                <li class="page-item active" aria-current="page"><a
                                                        class="page-link">{{ $page }}</a>
                                                </li>

                                            @else
                                                <li class="page-item"><a class="page-link"
                                                                         href="{{$url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($paginator->hasMorePages())

                                    <li class="page-item"><a class="page-link"
                                                             href="{{ $paginator->nextPageUrl() }}"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true"><a class="page-link"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

