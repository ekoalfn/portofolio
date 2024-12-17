@if ($paginator->hasPages())  
<nav class="d-flex" aria-label="pagination">
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                </a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="uil uil-arrow-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" ><span aria-hidden="true"><i class="uil uil-arrow-right"></i></span></a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#"><span aria-hidden="true"><i class="uil uil-arrow-right"></i></span></a>
            </li>
        @endif
    </ul>
</nav>
@endif