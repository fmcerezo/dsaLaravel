<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-between align-items-center">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="btn-secondary px-4 py-2 border rounded">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-primary px-4 py-2 border">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
 
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-primary px-4 py-2 border">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="btn-secondary px-4 py-2 border rounded">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>