@if ($paginator->hasPages())
    <nav>
        <ul class="pagination wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled more-button center" aria-disabled="true">
                    <span class="previous-pagination">
                        <span class="hover-pagination-prev">@lang('pagination.previous')</span>
                        <svg class="svg-prev">
                            <circle class="circle-prev" cx="22" cy="24" r="23"></circle>
                        </svg>
                    </span>
                </li>
            @else
                <li class="more-button center">
                    <span class="previous-pagination">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <span class="hover-pagination-prev">@lang('pagination.previous')</span>
                            <svg class="svg-prev">
                                <circle class="circle-prev" cx="22" cy="24" r="23"></circle>
                            </svg>
                        </a>
                    </span>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="more-button center">
                    <span class="next-pagination">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <span class="hover-pagination-next">
                                @lang('pagination.next')
                            </span>
                            <svg class="svg-next">
                                <circle class="circle-next" cx="22" cy="24" r="23"></circle>
                            </svg>
                        </a>
                    </span>
                </li>
            @else
                <li class="disabled more-button center" aria-disabled="true">
                    <span class="next-pagination">
                        <span class="hover-pagination-next">@lang('pagination.next')</span>
                        <svg class="svg-next">
                            <circle class="circle-next" cx="22" cy="24" r="23"></circle>
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
