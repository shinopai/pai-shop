@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex mt-20">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled hidden" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">First</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r-0 hover:bg-blue-500 hover:text-white" aria-label="@lang('pagination.previous')">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="" aria-current="page"><a class="active py-2 px-4 leading-tight bg-blue-500 text-white border border-gray-200 border-r-0">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r-0 hover:bg-blue-500 hover:text-white">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 hover:bg-blue-500 hover:text-white" aria-label="@lang('pagination.next')">Next</a>
                </li>
            @else
                <li class="disabled hidden" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
