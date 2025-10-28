
<div class="bd-gallery-area p-relative pt-120 pb-95">
  <div class="container">

    @if($GalleryAll->count() === 0)
      <div class="text-center py-5">
        <h4>No gallery items yet.</h4>
        <p>Check back soon for updates.</p>
      </div>
    @else
      <div class="row">
        @foreach($GalleryAll as $item)
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="bd-gallery-thumb-wrapper">
                <div class="bd-gallery-thumb">
                  <img
                    src="{{ asset($item->Image) }}"
                    alt="{{ $item->Title ?? 'HAFE gallery image' }}"
                    loading="lazy">
                </div>
                <div class="bd-gallery-icon">
                  <a href="{{ asset($item->Image) }}" class="popup-image" title="{{ $item->Title ?? 'View image' }}">
                    <i class="flaticon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-12 d-flex justify-content-center pt-3">
          {{ $GalleryAll->links() }}
        </div>
      </div>
    @endif

  </div>
</div>
