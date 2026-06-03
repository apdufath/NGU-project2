@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="rounded-lg border border-white/10 px-4 py-2 text-sm text-white/30">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="rounded-lg border border-white/20 px-4 py-2 text-sm text-white hover:bg-white/10">Previous</a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="rounded-lg border border-white/20 px-4 py-2 text-sm text-white hover:bg-white/10">Next</a>
            @else
                <span class="rounded-lg border border-white/10 px-4 py-2 text-sm text-white/30">Next</span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <p class="text-sm text-white/60">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </p>
            <div>
                <span class="inline-flex gap-1">
                    @if ($paginator->onFirstPage())
                        <span class="rounded-lg border border-white/10 px-3 py-2 text-sm text-white/30">&laquo;</span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="rounded-lg border border-white/20 px-3 py-2 text-sm text-white hover:bg-white/10">&laquo;</a>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="rounded-lg border border-white/10 px-3 py-2 text-sm text-white/30">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="rounded-lg border border-brand-400/50 bg-brand-500/30 px-3 py-2 text-sm font-semibold text-white">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="rounded-lg border border-white/20 px-3 py-2 text-sm text-white hover:bg-white/10">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="rounded-lg border border-white/20 px-3 py-2 text-sm text-white hover:bg-white/10">&raquo;</a>
                    @else
                        <span class="rounded-lg border border-white/10 px-3 py-2 text-sm text-white/30">&raquo;</span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
