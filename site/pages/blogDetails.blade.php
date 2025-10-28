{{-- resources/views/pages/blogDetails.blade.php --}}
@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

// Primary blog record (with optional paragraphs from your controller)
$blog   = collect($Blogs ?? [])->first();
$title  = $blog->Name ?? $blog->Title ?? 'Blog Details';
$author = $blog->Author ?? 'Admin';
$date   = !empty($blog->created_at) ? Carbon::parse($blog->created_at)->format('d M Y') : '';
$catName = $catName ?? ($blog->category_name ?? null);
$paras  = collect($blog->paragraphs ?? []);

// Video flags
$isVideo = (($blog->Type ?? 'article') === 'video');
$videoId = $blog->VideoID ?? null;

// Image/thumbnail for hero
if ($isVideo && empty($blog->Image) && !empty($videoId)) {
  $img = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
} else {
  $img = !empty($blog->Image) ? asset($blog->Image) : asset('assets/img/blog/placeholder.jpg');
}

// Listing (index) URL (no named route provided)
$blogIndexUrl = url('/blogs');
$toIndex = function(array $params = []) use ($blogIndexUrl) {
  return empty($params) ? $blogIndexUrl : $blogIndexUrl . (str_contains($blogIndexUrl, '?') ? '&' : '?') .
         http_build_query($params);
};

// Social share
$permalink = url()->current();
$shareUrl  = urlencode($permalink);
$shareText = urlencode($title);
$facebook  = "https://www.facebook.com/sharer/sharer.php?u={$shareUrl}";
$twitterX  = "https://twitter.com/intent/tweet?url={$shareUrl}&text={$shareText}";
$youtube   = $isVideo && $videoId ? "https://www.youtube.com/watch?v={$videoId}" : "https://www.youtube.com/";

// Latest posts (from $blogsAll), show 3 most recent
$latest = collect($blogsAll ?? [])->sortByDesc('created_at')->take(3);

// Prev/Next by created_at across all posts
$ordered = collect($blogsAll ?? [])->sortBy('created_at')->values();
$idx = is_object($blog) ? $ordered->search(fn($b) => $b->id === $blog->id) : null;
$prev = is_int($idx) && $idx > 0 ? $ordered->get($idx - 1) : null;
$next = is_int($idx) && $idx < $ordered->count() - 1 ? $ordered->get($idx + 1) : null;

$thumbStyle = "aspect-ratio:16/9;overflow:hidden;background:#f3f4f6;";
@endphp

<section class="bd-blog-details-area pt-120 pb-60">
  <div class="container">
    <div class="row">

      {{-- MAIN --}}
      <div class="col-lg-8">
        <div class="bd-blog-details-wrapper mb-60">
          <div class="row">
            <div class="col-12">

              <div class="bd-blog-details mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

                {{-- HERO: video iframe OR image --}}
                @if($isVideo && !empty($videoId))
                  <div class="bd-blog-details-thumb" style="{{ $thumbStyle }}">
                    <div class="ratio ratio-16x9" style="width:100%;height:100%;">
                      <iframe
                        src="https://www.youtube.com/embed/{{ $videoId }}"
                        title="{{ $title }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                @else
                  <div class="bd-blog-details-thumb" style="{{ $thumbStyle }}">
                    <img src="{{ $img }}"
                         alt="{{ $title }} - {{ $generalSettings->CompanyName ?? '' }}"
                         style="width:100%;height:100%;object-fit:cover;">
                  </div>
                @endif

                {{-- META --}}
                <div class="bd-blog-details-meta wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                  <span>
                    <i class="fas fa-user"></i> by
                    <a href="{{ $blogIndexUrl }}">{{ $author }}</a>
                  </span>

                  @if($date)
                    <span><i class="fas fa-calendar-days"></i> {{ $date }}</span>
                  @endif

                  @if(!empty($catName))
                    <span><i class="fas fa-folder-open"></i> {{ $catName }}</span>
                  @endif

                  <span>
                    <i class="fa-solid fa-comment-dots"></i>
                    <a href="#comments">{{ $commentsCount }} Comments</a>
                  </span>

                  @if($isVideo)
                    <span class="badge bg-danger ms-1">Video</span>
                  @endif
                </div>

                {{-- BODY --}}
                <div class="bd-blog-details-content wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                  <h3 class="bd-blog-details-title mt-5 mb-15">{{ $title }}</h3>

                  @if(!empty($blog->Details))
                    <p>{!! nl2br(e($blog->Details)) !!}</p>
                  @endif

                  @foreach($paras as $p)
                    @if(!empty($p->title))
                      <h4 class="mt-4 mb-2">{{ $p->title }}</h4>
                    @endif
                    @if(!empty($p->paragraph))
                      <p>{!! nl2br(e($p->paragraph)) !!}</p>
                    @endif
                  @endforeach
                </div>

                {{-- OPTIONAL QUOTE --}}
                @if(!empty($blog->Quote))
                  <div class="bd-blog-details-quote wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <blockquote class="bd-blog-quote">
                      <div class="bd-blog-quote-icon"><i class="flaticon-quote"></i></div>
                      <div class="bd-blog-quote-content">
                        <p>{{ $blog->Quote }}</p>
                        @if(!empty($blog->QuoteAuthor))<span>{{ $blog->QuoteAuthor }}</span>@endif
                      </div>
                    </blockquote>
                  </div>
                @endif

                {{-- SHARE + TAGS --}}
                <div class="bd-blog-share d-flex justify-content-between align-items-center flex-wrap wow fadeInUp"
                     data-wow-duration="1s" data-wow-delay=".3s">

                  @if(!empty($blog->Tags))
                    @php $tags = array_filter(array_map('trim', explode(',', $blog->Tags))); @endphp
                    @if($tags)
                      <div class="bd-blog-tag">
                        <ul>
                          @foreach($tags as $t)
                            <li><a href="{{ $toIndex(['q' => $t]) }}">{{ $t }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                  @endif

                  <div class="bd-blog-social">
                    <ul>
                      <li><a target="_blank" rel="noopener" href="{{ $facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <li><a target="_blank" rel="noopener" href="{{ $twitterX }}"><i class="fa-brands fa-twitter"></i></a></li>
                      <li>
                        {{-- For video posts, link the YouTube icon directly to the original watch page --}}
                        <a target="_blank" rel="noopener" href="{{ $youtube }}"><i class="fa-brands fa-youtube"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>

                {{-- PREV / NEXT --}}
                <div class="bd-blog-details-nav wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                  <div class="bd-blog-details-nav-prev">
                    @if($prev)
                      <a href="{{ route('BlogDetails', ['slug' => $prev->slug]) }}"><i class="fa-regular fa-angle-left"></i></a>
                      <a href="{{ route('BlogDetails', ['slug' => $prev->slug]) }}">Previous Post</a>
                    @else
                      <span class="opacity-50"><i class="fa-regular fa-angle-left"></i></span>
                      <span class="opacity-50">Previous Post</span>
                    @endif
                  </div>
                  <span class="d-none d-md-block"><i class="flaticon-menu"></i></span>
                  <div class="bd-blog-details-nav-next">
                    @if($next)
                      <a href="{{ route('BlogDetails', ['slug' => $next->slug]) }}">Next Post</a>
                      <a href="{{ route('BlogDetails', ['slug' => $next->slug]) }}"><i class="fa-regular fa-angle-right"></i></a>
                    @else
                      <span class="opacity-50">Next Post</span>
                      <span class="opacity-50"><i class="fa-regular fa-angle-right"></i></span>
                    @endif
                  </div>
                </div>

              </div>

              {{-- COMMENTS (static shell) --}}
              <div id="comments" class="bd-blog-comment-wrap theme-bg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="bd-blog-comment">
                  <h4 class="bd-blog-comment-title mb-30">Comments ({{ $commentsCount ?? 0 }})</h4>
                  <ul>
                    @forelse(($comments ?? []) as $c)
                      <li>
                        <div class="bd-blog-comment-box">
                          <div class="bd-blog-comment-info mb-15">
                            <div class="bd-blog-comment-thumb-wrap">
                              <div class="bd-blog-comment-thumb">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                     style="width:48px;height:48px;font-weight:700;">
                                  {{ strtoupper(substr($c->name,0,1)) }}
                                </div>
                              </div>
                              <div class="bd-blog-comment-author">
                                <h5>{{ $c->name }}</h5>
                                <span>{{ \Carbon\Carbon::parse($c->created_at)->format('d M Y \\a\\t h:ia') }}</span>
                              </div>
                            </div>
                          </div>
                          <div class="bd-blog-comment-text">
                            <p style="white-space:pre-wrap">{{ $c->content }}</p>
                          </div>
                        </div>
                      </li>
                    @empty
                      <li>
                        <div class="bd-blog-comment-box">
                          <div class="bd-blog-comment-text"><p>No comments yet.</p></div>
                        </div>
                      </li>
                    @endforelse
                  </ul>
                </div>

                <div class="bd-comment-form">
                  <h3 class="bd-contact-form-title mb-25">Leave a reply</h3>
                  {{-- Success / errors (keep as before) --}}
                  @if (session('comment_submitted'))
                    <div class="alert alert-success">{{ session('comment_submitted') }}</div>
                  @endif
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul class="m-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                  @endif

                  <form action="{{ route('CreateComment', ['slug' => $blog->slug]) }}" method="POST" novalidate>
                    @csrf

                    {{-- Honeypots --}}
                    <div style="position:absolute;left:-5000px;opacity:0;" aria-hidden="true">
                      <label for="website">Website</label>
                      <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="comment_started_at" value="{{ now()->toIso8601String() }}">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="bd-contact-input mb-20">
                          <label for="textarea">Comments <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                          <textarea name="content" id="textarea" class="theme-bg-6" required>{{ old('content') }}</textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="bd-contact-input mb-30">
                          <label for="name">Name <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                          <input id="name" name="name" type="text" class="theme-bg-6" value="{{ old('name') }}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="bd-contact-input mb-30">
                          <label for="email">Email <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                          <input id="email" name="email" type="email" class="theme-bg-6" value="{{ old('email') }}" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="bd-contact-btn mb-15">
                          <button type="submit" class="bd-btn">
                            <span class="bd-btn-inner">
                              <span class="bd-btn-normal">Post Comment</span>
                              <span class="bd-btn-hover">Post Comment</span>
                            </span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      {{-- SIDEBAR --}}
      <div class="col-lg-4">
        <div class="bd-blog-sidebar-wrapper mb-60">

          {{-- Search --}}
          <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
            <h5 class="bd-blog-sidebar-title">Search</h5>
            <div class="bd-blog-sidebar-content">
              <div class="bd-blog-search">
                <form action="{{ $blogIndexUrl }}" method="GET">
                  <div class="bd-blog-search-input-2">
                    <input type="text" name="q" placeholder="Type here..." value="{{ request('q') }}">
                    <div class="bd-blog-search-submit">
                      <button type="submit"><i class="flaticon-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- Latest Blog --}}
          <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
            <h5 class="bd-blog-sidebar-title">Latest Blog</h5>
            <div class="bd-blog-latest">
              <ul>
                @foreach($latest as $lb)
                  @php
                    $lbIsVideo = (($lb->Type ?? 'article') === 'video');
                    $lbVideoID = $lb->VideoID ?? null;
                    if ($lbIsVideo && empty($lb->Image) && !empty($lbVideoID)) {
                      $limg = "https://img.youtube.com/vi/{$lbVideoID}/hqdefault.jpg";
                    } else {
                      $limg = !empty($lb->Image) ? asset($lb->Image) : asset('assets/img/blog/placeholder.jpg');
                    }
                    $ldt = !empty($lb->created_at) ? Carbon::parse($lb->created_at)->format('d M Y') : '';
                  @endphp
                  <li>
                    <div class="bd-blog-latest-content">
                      <div class="bd-blog-latest-thumb" style="position:relative;">
                        <a href="{{ route('BlogDetails', ['slug' => $lb->slug]) }}">
                          <img src="{{ $limg }}" alt="{{ $lb->Name ?? 'Blog' }}">
                          @if($lbIsVideo)
                            <span class="position-absolute top-50 start-50 translate-middle d-inline-flex align-items-center justify-content-center"
                                  style="width:34px;height:34px;border-radius:50%;background:rgba(0,0,0,.55);">
                              <i class="fa-solid fa-play" style="font-size:12px;color:#fff;"></i>
                            </span>
                          @endif
                        </a>
                      </div>
                      <div class="bd-blog-latest-title">
                        <h6>
                          <a href="{{ route('BlogDetails', ['slug' => $lb->slug]) }}">
                            {{ $lb->Name ?? 'Blog' }}
                          </a>
                          @if($lbIsVideo)
                            <span class="badge bg-danger ms-1 align-middle">Video</span>
                          @endif
                        </h6>
                        <div class="bd-blog-latest-meta">
                          <i class="fa-solid fa-calendar-days"></i><span>{{ $ldt }}</span>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

          {{-- Categories --}}
          <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
            <h5 class="bd-blog-sidebar-title">Categories</h5>
            <div class="bd-blog-sidebar-cat">
              <ul>
                @foreach($Categories as $cat)
                  <li>
                    <a href="{{ $toIndex(['category' => $cat->id]) }}">
                      <span>{{ $cat->CategoryName }}</span>
                      <span>({{ (int) $cat->blogs_count }})</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

          {{-- Tags --}}
          @if(!empty($blog->Tags))
            @php $tags = array_filter(array_map('trim', explode(',', $blog->Tags))); @endphp
            @if($tags)
              <div class="bd-blog-sidebar mb-50 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                <h5 class="bd-blog-sidebar-title">Tags</h5>
                <div class="bd-blog-sidebar-content">
                  <div class="bd-blog-sidebar-tag">
                    <ul>
                      @foreach($tags as $t)
                        <li><a href="{{ $toIndex(['q' => $t]) }}">{{ $t }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            @endif
          @endif

        </div>
      </div>

    </div>
  </div>
</section>
