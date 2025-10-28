<section class="bd-joining-area pt-100 pb-95">
    <!-- joiniong bg -->
    <div class="bd-joining-bg" data-background="{{ asset($generalSettings->Crumb) }}"></div>
    <!-- joining bg overlay -->
    <div class="bd-joining-bg-overlay"></div>
    <div class="container">
       <div class="bd-joining">
          <div class="bd-joining-shape-wrapper d-none d-md-block">
             <div class="bd-joining-shape-1 p-absolute">
                <img src="{{ asset('assets/img/shape/white-curved-line.png') }}" alt="img not found!">
             </div>
             <div class="bd-joining-shape-2 p-absolute">
                <img src="{{ asset('assets/img/shape/white-curved-line.png') }}" alt="img not found!">
             </div>
          </div>
          <div class="row justify-content-center">
             <div class="col-md-8">
                <div class="bd-joining-content text-center">
                   <div class="bd-section-title-wrapper is-white mb-45 wow fadeInUp" data-wow-duration="1s"
                      data-wow-delay=".3s">
                      <h2 class="bd-section-title mb-0">Learn. Grow. Lead.</h2>
                      <p>From pre-primary to primary, HAFE nurtures confident, capable learners through modern teaching and strong values.</p>
                   </div>
                   <div class="bd-joining-btn">
                      <a href="{{ route('apply.create') }}" class="bd-btn btn-white">
                         <span class="bd-btn-inner">
                            <span class="bd-btn-normal">Apply now</span>
                            <span class="bd-btn-hover">Apply now</span>
                         </span>
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- bd-joining-bottom-line -->
    <div class="bd-joining-line"></div>
    <div class="bd-joining-line-2"></div>
 </section>
