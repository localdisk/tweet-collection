@if ($paginator->hasPages())

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
    <a class="pagination-previous" disabled>前</a>
  @else
    <a class="pagination-previous" wire:click="previousPage">前</a>
  @endif

  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
    <a class="pagination-next" wire:click="nextPage">次</a>
  @else
    <a class="pagination-next" disabled>次</a>
  @endif

  {{-- Pagination Elements --}}
  <ul class="pagination-list">
    @foreach ($elements as $element)

      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <li><span class="pagination-ellipsis">&hellip;</span></li>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li><a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a></li>
          @else
            <li><a class="pagination-link" aria-label="Goto page 1" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif

    @endforeach
  </ul>

</nav>

@endif
