<section class="bd-hero-area-2 p-relative">
    <!-- hero area bottom shape  -->

    <!-- hero area side social  -->
    <div class="bd-hero-social-wrapper is-white">
       <div class="bd-hero-social">
          <a href="#"><i class="fa-brands fa-facebook-f"></i>facebook</a>
       </div>
       <div class="bd-hero-social">
          <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
       </div>
       <div class="bd-hero-social">
          <a href="#"><i class="fa-brands fa-youtube"></i>youtube</a>
       </div>
    </div>

    <!-- banner slider navigation  -->
    <div class="bd-hero-navigation mb-15 d-none d-md-flex">
       <button class="bd-hero-prev">
          <i class="fa-regular fa-angle-left"></i>
       </button>
       <button class="bd-hero-next">
          <i class="fa-regular fa-angle-right"></i>
       </button>
    </div>
    <div class="swiper-container bd-hero-slider bd-hero-active">
       <div class="swiper-wrapper">
        @foreach ($Slider as $data)
          <div class="swiper-slide">
             <div class="bd-hero-inner-2">
                <div class="container">
                   <div class="bd-hero-shape-wrapper d-none d-lg-block">
                      <div class="bd-hero-shape bd-hero-shape-2">
                         <img src="{{ asset('assets/img/shape/curved-line-2.png') }}" alt="Shape not found">
                      </div>
                      <div class="bd-hero-shape bd-hero-shape-1">
                         <img src="{{ asset('assets/img/shape/curved-line-2.png') }}" alt="Shape not found">
                      </div>
                   </div>
                   <div class="bd-hero-2">
                      <div class="bd-hero-bg" data-background="{{ asset($data->Image) }}"></div>
                      <div class="row">
                         <div class="col-lg-6">
                            <div class="bd-hero-content-wrapper-2 d-flex align-items-center">
                               <div class="bd-hero-content bd-hero-content-2 is-white">
                                  <span class="animate__animated" data-animation="fadeInUp"
                                     data-delay=".3s">Unlock your child’s full potential</span>
                                  <h1 class="bd-hero-title animate__animated" data-animation="fadeInUp"
                                     data-delay=".5s">
                                     {{ $data->Phrase }} {{ $data->Span }}
                                  </h1>
                                  <div class="bd-hero-btn animate__animated" data-animation="fadeInUp"
                                     data-delay=".7s">
                                     <a href="programs.html" class="bd-btn">
                                        <span class="bd-btn-inner">
                                           <span class="bd-btn-normal">Admission open 25-26</span>
                                           <span class="bd-btn-hover">Admission open 25-26</span>
                                        </span>
                                     </a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          @endforeach

       </div>
    </div>
 </section>
