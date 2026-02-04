@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="custom-pagination">
        {{-- Desktop: Only show page numbers --}}
        <div class="desktop-pagination">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="page-dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-number active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-number">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Mobile: Only show Prev/Next and current page --}}
        <div class="mobile-pagination">
            @if ($paginator->onFirstPage())
                <span class="page-btn disabled">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="page-btn">Previous</a>
            @endif

            <span class="page-number active">{{ $paginator->currentPage() }}</span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-btn">Next</a>
            @else
                <span class="page-btn disabled">Next</span>
            @endif
        </div>
    </nav>
@endif
