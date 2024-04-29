@if ($paginator->hasPages())
<div class="col-lg-12 text-center">
    <div class="pagination__option">
        @if ($paginator->onFirstPage())
        <a class="disabled" href="javascript:void(0)" aria-label="Previous" aria-hidden="true"><i class="fa fa-angle-left"></i></a>
        @else
        <a  href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" aria-hidden="true"><i class="fa fa-angle-left"></i></a>
        @endif
    
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <a class="active" href="javascript:void(0)">{{ $page }}</a>
                    @else
                    <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @else
                <a href="javascript:void(0)">{{ $element }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next" aria-hidden="true"><i class="fa fa-angle-right"></i></a>
        @else
        <a class="disabled" href="javascript:void(0)" aria-label="Next" aria-hidden="true"><i class="fa fa-angle-right"></i></a>
        @endif
    </div>
</div>
@endif
