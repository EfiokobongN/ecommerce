




    @if ($paginator->hasPages())
    <div class="col-lg-12 text-center">
    <nav aria-label="...">
  <ul class="pagination justify-content-center">
  @if ($paginator->onFirstPage())
    <li class="page-item disabled">
      <a href="javascript:void(0)" aria-label="Previous" aria-hidden="true" class="page-link"><i class="fa fa-angle-left"></i></a>
    </li>
    @else
    <li class="page-item">
      <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" aria-hidden="true" class="page-link"><i class="fa fa-angle-left"></i></a>
    </li>
    @endif

    @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
    <li class="page-item"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
    @else
    <li class="page-item" aria-current="page">
      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
    @endif
                @endforeach
            @else

            <li class="page-item"><a class="page-link" href="javascript:void(0)">{{ $element }}</a></li>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
    <li class="page-item">
      <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next" aria-hidden="true"><i class="fa fa-angle-right"></i></a>
    </li>
    @else

    <li class="page-item disabled">
      <a class="page-link" href="javascript:void(0)" aria-label="Next" aria-hidden="true"><i class="fa fa-angle-right"></i></a>
    </li>
    @endif
  </ul>
</nav>
</div>
@endif




