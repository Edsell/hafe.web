<section class="bd-gallery-area p-relative pt-120 pb-60 theme-bg-6 p-relative">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-lg-8">
             <div class="bd-section-title-wrapper mb-55 text-center wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".3s">
                <h2 class="bd-section-title mb-0">Our Gallery</h2>
                <p>Moments That Matter - A glimpse into everyday learning, creativity, and community life at HAFE.</p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-12">
             <div class="bd-gallery-active swiper-container wow fadeInUp" data-wow-duration="1s"
                data-wow-delay=".5s">
                <div class="swiper-wrapper">
                    @foreach ($Gallery as $data)
                   <div class="swiper-slide">
                      <div class="bd-gallery">
                         <div class="bd-gallery-thumb-wrapper">
                            <div class="bd-gallery-thumb">
                               <img src="{{ asset($data->Image) }}" alt="Gallery">
                            </div>
                            <div class="bd-gallery-icon">
                               <a href="{{ asset($data->Image) }}" class="popup-image"><i
                                     class="flaticon-eye"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endforeach

                </div>
             </div>
             <!-- program slider dots pagination  -->
             <div class="bd-gallery-pagination bd-dots-pagination fill-pagination wow fadeInUp"
                data-wow-duration="1s" data-wow-delay=".4s"></div>
          </div>
       </div>
    </div>
 </section>
