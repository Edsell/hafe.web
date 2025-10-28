<div class="col-12 d-flex mx-3">

    @if ($Page == 'courses.MgtCourses')

        <form method="GET" action="{{ url()->current() }}" class="d-flex mb-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Search course...">
            <button type="submit" class="btn btn-primary btn-sm"><i class="bx bx-search-alt"></i></button>
        </form>

    @elseif ($Page == 'packages.MgtPackages')
    <form method="GET" action="{{ url()->current() }}" class="d-flex mb-3">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Search package...">
        <button type="submit" class="btn btn-primary btn-sm"><i class="bx bx-search-alt"></i></button>
    </form>

    @endif
    </div>
