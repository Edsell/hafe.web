{{-- resources/views/pages/blogs.blade.php --}}
@php
  use Carbon\Carbon;
@endphp

<section class="bd-blog-area pt-120 pb-120">
  <div class="container">

    {{-- keep existing search + categories exactly as in your template --}}
    <div class="bd-blog-menu-wrapper">
      <div class="row align-items-end">

        {{-- SEARCH (unchanged) --}}
        <div class="col-xxl-6 col-xl-5 col-lg-4">
          <div class="bd-blog-search mb-60 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
            <form action="{{ url()->current() }}" method="GET" role="search" aria-label="Blog search">
              @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
              <label for="bd-blog-search-input-label">Search by Keyword</label>
              <div class="bd-blog-search-input">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Type here..." id="bd-blog-search-input-label">
                <div class="bd-blog-search-submit">
                  <button type="submit" aria-label="Submit search"><i class="flaticon-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>

        {{-- CATEGORIES (unchanged button UI) --}}
        <div class="col-xxl-6 col-xl-7 col-lg-8">
          <div class="bd-blog-cat-menu-wrapper mb-60 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
            <h5 class="bd-blog-cat-title">By Category</h5>
            <div class="bd-blog-cat-menu bd-filter-btn">
              @php
                $allUrl = request()->fullUrlWithQuery(['category' => null, 'page' => null]);
              @endphp
              <button type="button"
                      onclick="location.href='{{ $allUrl }}'"
                      class="{{ !request('category') ? 'active' : '' }}">
                All ({{ $blogsAll->total() }})
              </button>

              @foreach ($Categories as $cat)
                @php
                  $catUrl = request()->fullUrlWithQuery(['category' => $cat->id, 'page' => null]);
                @endphp
                <button type="button"
                        onclick="location.href='{{ $catUrl }}'"
                        class="{{ (string)request('category') === (string)$cat->id ? 'active' : '' }}">
                  {{ $cat->CategoryName }} ({{ max(0, (int)$cat->blogs_count) }})
                </button>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- GRID (unchanged structure; only the card internals updated for video) --}}
    <div class="row grid">
      @forelse ($blogsAll as $data)
        @php
          $title   = $data->Name ?? 'Untitled';
          $isVideo = ($data->Type ?? 'article') === 'video';
          $date    = !empty($data->created_at) ? Carbon::parse($data->created_at)->format('M d, Y') : '';

          // thumbnail logic: use YouTube HQ thumb if video & no custom image
          if ($isVideo && empty($data->Image) && !empty($data->VideoID)) {
            $thumb = "https://img.youtube.com/vi/{$data->VideoID}/hqdefault.jpg";
          } else {
            $thumb = !empty($data->Image) ? asset($data->Image) : asset('assets/img/blog/placeholder.jpg');
          }
        @endphp

        <div class="col-xl-4 col-lg-6 col-md-6 grid-item c-{{ (int)$data->CategoryID }}">
          <div class="bd-blog mb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

            <a href="{{ route('BlogDetails', ['slug' => $data->slug]) }}" class="bd-blog-thumb-link" aria-label="{{ $title }}">
              <div class="bd-blog-thumb position-relative" style="aspect-ratio:16/9;overflow:hidden;background:#f3f4f6;">
                <img src="{{ $thumb }}" alt="{{ $title }}" style="width:100%;height:100%;object-fit:cover;">
                @if($isVideo)
                  {{-- subtle play overlay for video posts --}}
                  <span class="position-absolute top-50 start-50 translate-middle d-inline-flex align-items-center justify-content-center"
                        style="width:64px;height:64px;border-radius:50%;background:rgba(0,0,0,.55);">
                    <i class="fa-solid fa-play" style="font-size:20px;color:#fff;"></i>
                  </span>
                @endif
              </div>
            </a>

            <div class="bd-blog-content">
              @if($date)
                <div class="bd-blog-date"><span>{{ $date }}</span></div>
              @endif

              <div class="bd-blog-meta">
                <span><i class="fas fa-user"></i> by
                  <a href="{{ route('BlogDetails', ['slug' => $data->slug]) }}">{{ $data->Author ?? 'Admin' }}</a>
                </span>
                <span>
                  <i class="fa-solid fa-comment-dots"></i>
                  {{ (int)($data->approved_comments_count ?? 0) }} Comments
                </span>
                @if($isVideo)
                  <span class="badge bg-danger ms-1">Video</span>
                @endif
              </div>

              <h4 class="bd-blog-title">
                <a href="{{ route('BlogDetails', ['slug' => $data->slug]) }}">{{ $title }}</a>
              </h4>
            </div>

          </div>
        </div>
      @empty
        <div class="col-12"><p>No blog posts found.</p></div>
      @endforelse
    </div>

    {{-- PAGINATION (unchanged) --}}
    @php $p = $blogsAll; @endphp
    @if ($p->hasPages())
      <div class="bd-pagination pt-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <ul class="justify-content-center">
          {{-- Prev --}}
          @if ($p->onFirstPage())
            <li class="disabled" aria-disabled="true"><span class="page-numbers">‹</span></li>
          @else
            <li><a class="prev page-numbers" href="{{ $p->previousPageUrl() }}">‹</a></li>
          @endif

          {{-- Pages (neighbors) --}}
          @for ($i = max(1, $p->currentPage()-1); $i <= min($p->lastPage(), $p->currentPage()+1); $i++)
            @if ($i === $p->currentPage())
              <li><span aria-current="page" class="page-numbers current">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span></li>
            @else
              <li><a class="page-numbers" href="{{ $p->url($i) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</a></li>
            @endif
          @endfor

          {{-- Next --}}
          @if ($p->hasMorePages())
            <li><a class="next page-numbers" href="{{ $p->nextPageUrl() }}"><i class="fa-sharp fa-solid fa-angle-right"></i></a></li>
          @else
            <li class="disabled" aria-disabled="true"><span class="page-numbers">›</span></li>
          @endif
        </ul>
      </div>
    @endif

  </div>
</section>
