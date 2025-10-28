@if ($Page == 'students.list')
@if ($applications->hasPages())
<nav aria-label="Page navigation">
<ul class="pagination ms-3">
    {{-- First Page Link --}}
    <li class="page-item {{ $applications->onFirstPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $applications->url(1) }}">
        <i class="icon-base bx bx-chevrons-left icon-sm"></i>
    </a>

    </li>

    {{-- Previous Page Link --}}
    <li class="page-item {{ $applications->onFirstPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $applications->previousPageUrl() ?? 'javascript:void(0);' }}">
        <i class="icon-base bx bx-chevron-left icon-sm"></i>
    </a>
    </li>

    {{-- Pagination Elements --}}
    @foreach ($applications->getUrlRange(1, $applications->lastPage()) as $page => $url)
    <li class="page-item {{ $page == $applications->currentPage() ? 'active' : '' }}">
        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
    @endforeach

    {{-- Next Page Link --}}
    <li class="page-item {{ $applications->currentPage() == $applications->lastPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $applications->nextPageUrl() ?? 'javascript:void(0);' }}">
        <i class="icon-base bx bx-chevron-right icon-sm"></i>
    </a>
    </li>

    {{-- Last Page Link --}}
    <li class="page-item {{ $applications->currentPage() == $applications->lastPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $applications->url($applications->lastPage()) }}">
        <i class="icon-base bx bx-chevrons-right icon-sm"></i>
    </a>
    </li>
</ul>
</nav>
@endif

@endif


@if ($Page == 'blogs.MgtBlogs')
@if ($Blogs->hasPages())
<nav aria-label="Page navigation">
<ul class="pagination ms-3">
    {{-- First Page Link --}}
    <li class="page-item {{ $Blogs->onFirstPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $Blogs->url(1) }}">
        <i class="icon-base bx bx-chevrons-left icon-sm"></i>
    </a>

    </li>

    {{-- Previous Page Link --}}
    <li class="page-item {{ $Blogs->onFirstPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $Blogs->previousPageUrl() ?? 'javascript:void(0);' }}">
        <i class="icon-base bx bx-chevron-left icon-sm"></i>
    </a>
    </li>

    {{-- Pagination Elements --}}
    @foreach ($Blogs->getUrlRange(1, $Blogs->lastPage()) as $page => $url)
    <li class="page-item {{ $page == $Blogs->currentPage() ? 'active' : '' }}">
        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
    @endforeach

    {{-- Next Page Link --}}
    <li class="page-item {{ $Blogs->currentPage() == $Blogs->lastPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $Blogs->nextPageUrl() ?? 'javascript:void(0);' }}">
        <i class="icon-base bx bx-chevron-right icon-sm"></i>
    </a>
    </li>

    {{-- Last Page Link --}}
    <li class="page-item {{ $Blogs->currentPage() == $Blogs->lastPage() ? 'disabled' : '' }}">
    <a class="page-link" href="{{ $Blogs->url($Blogs->lastPage()) }}">
        <i class="icon-base bx bx-chevrons-right icon-sm"></i>
    </a>
    </li>
</ul>
</nav>
@endif

@endif
