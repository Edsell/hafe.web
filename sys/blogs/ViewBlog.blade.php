@isset($Blogs)
@foreach ($Blogs as $blog)
@php
  $isVideo = (($blog->Type ?? 'article') === 'video');
  $videoId = $blog->VideoID ?? null;

  // Fallback thumbnail if video has no custom image
  if ($isVideo && empty($blog->Image) && !empty($videoId)) {
      $heroImg = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
  } else {
      $heroImg = !empty($blog->Image) ? asset($blog->Image) : asset('assets/img/blog/placeholder.jpg');
  }
@endphp

<div class="modal modal-blur fade" id="ViewBlog{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          {{ $blog->Name }}
          @if($isVideo)
            <span class="badge bg-danger align-middle ms-2">Video</span>
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        {{-- HERO: video iframe for video posts; image otherwise --}}
        <div class="mb-3">
          @if($isVideo && !empty($videoId))
            <div class="ratio ratio-16x9">
              <iframe
                src="https://www.youtube.com/embed/{{ $videoId }}"
                title="{{ $blog->Name }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>
          @else
            <img src="{{ $heroImg }}" alt="{{ $blog->Name }}" class="img-fluid rounded" style="width:100%;object-fit:cover;">
          @endif
        </div>

        <h3>Category: {{ $blog->category->CategoryName ?? 'N/A' }}</h3>

        @if(!empty($blog->Details))
          <p>{{ $blog->Details }}</p>
        @endif

        @if($isVideo && !empty($blog->VideoURL))
          <p class="mt-2">
            <a href="{{ $blog->VideoURL }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">
              <i class="bx bx-link-external"></i> Open on YouTube
            </a>
          </p>
        @endif

        <hr>

        {{-- Blog Paragraphs --}}
        @foreach (($blog->paragraphs ?? []) as $para)
          <h5>{{ $para->Title }}</h5>
          <p>{{ $para->Paragraph }}</p>

          <div class="mt-2">
            <a class="btn btn-info btn-sm" href="#UpdateBlogParagraph{{ $para->id }}" data-bs-toggle="modal">
              <i class="bx bx-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm"
               href="#deleteModal" data-bs-toggle="modal"
               data-route="{{ route('MassDelete', ['id' => $para->id, 'TableName' => 'blog_paragraphs']) }}"
               data-msg="Are you sure you want to delete this paragraph? This action is not reversible">
              <i class="bx bx-trash" aria-hidden="true"></i>
            </a>
          </div>
          <hr>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endforeach
@endisset
