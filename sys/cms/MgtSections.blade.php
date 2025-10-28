<div class="row g-6">
    <div class="col-xl-12">
      <h6 class="text-body-secondary">{{ $Desc }}</h6>
      <div class="nav-align-top">
        <ul class="nav nav-pills mb-4" role="tablist">
          <li class="nav-item">
            <button
              type="button"
              class="nav-link active"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#about-section-tab"
              aria-controls="about-section-tab"
              aria-selected="true">
              About us
            </button>
          </li>
          <li class="nav-item">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#counter-section-tab"
              aria-controls="counter-section-tab"
              aria-selected="false">
              Counter
            </button>
          </li>
          <li class="nav-item">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#video-section-tab"
              aria-controls="video-section-tab"
              aria-selected="false">
              Video
            </button>
          </li>

        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="about-section-tab" role="tabpanel">
            @include('cms.UpdateAbout')
          </div>
          <div class="tab-pane fade" id="counter-section-tab" role="tabpanel">
           @include('cms.UpdateCounter')
          </div>
          <div class="tab-pane fade" id="video-section-tab" role="tabpanel">
           @include('cms.UpdateVideo')
          </div>
        </div>
      </div>
    </div>


  </div>
