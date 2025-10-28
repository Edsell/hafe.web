{{-- MANAGE --}}
@if {{-- ($Page == 'stats')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>



    </ol>
</nav>

@elseif --}} ($Page == 'cms.MgtSlider')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtSlider') }}">Sliders</a>
        </li>
        <li class="breadcrumb-item active">Manage Sliders</li>
    </ol>
</nav>
@elseif ($Page == 'cms.CreateSlider')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtSlider') }}">Sliders</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</nav>
@elseif ($Page == 'packages.MgtPackages')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'packages.CreatePackage')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtPackages') }}">Packages</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'packages.UpdatePackage')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtPackages') }}">Packages</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'packages.MgtItinerary')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtPackages') }}">Packages</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'packages.MgtIncludes')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtPackages') }}">Packages</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'packages.UpdateItinerary')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtPackages') }}">Packages</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'blogs.MgtBlogs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'blogs.CreateBlog')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtBlogs') }}">Blogs</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'blogs.UpdateBlog')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtBlogs') }}">Blogs</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'blogs.MgtBlogCategory')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtBlogs') }}">Blogs</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'blogs.BlogParagraph')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtBlogs') }}">Blogs</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'cms.MgtWhy')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>
@elseif ($Page == 'cms.UpdateWhy')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('AdminCP') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('MgtWhy') }}">Purpose</a>
        </li>
        <li class="breadcrumb-item active">{{ $Title }}</li>
    </ol>
</nav>


@endif
