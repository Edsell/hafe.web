@isset($About)
@foreach ($About as $data)
<section class="bd-promotion-area pb-60 pt-40">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xl-6 col-lg-6">
             <div class="bd-promotion-thumb-wrapper mb-60">
                <div class="bd-promotion-thumb">
                   <div class="bd-promotion-thumb-mask p-relative wow fadeInLeft" data-wow-delay=".3s"
                      data-wow-duration="1">
                      <img src="{{ asset($data->Image) }}"alt="about image">
                      <div class="panel wow"></div>
                   </div>
                </div>
                <div class="bd-promotion-shape d-none d-lg-block">
                   <img src="{{ asset('assets/img/shape/tripple-line.png') }}" alt="Shape not found">
                </div>
             </div>
          </div>
          <div class="col-xl-6 col-lg-6">
             <div class="bd-promotion mb-60 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="bd-section-title-wrapper mb-35">
                   <h2 class="bd-section-title mb-10">{{ $data->Title }}</h2>
                   <p>  {{ $data->Details }}
                   </p>
                </div>
                <div class="bd-promotion-counter-wrapper mb-40">
                   <div class="bd-promotion-counter">
                      <div class="bd-promotion-counter-number">
                         <p><span class="counter">3</span>+</p>
                      </div>
                      <div class="bd-promotion-counter-text">
                         <span>Years of</span>
                         <span>experience</span>
                      </div>
                   </div>
                   <div class="bd-promotion-counter">
                      <div class="bd-promotion-counter-number">
                         <p><span><span class="counter">50</span></span>+</p>
                      </div>
                      <div class="bd-promotion-counter-text">
                         <span>Students</span>
                         <span>each year</span>
                      </div>
                   </div>
                   <div class="bd-promotion-counter">
                      <div class="bd-promotion-counter-number">
                         <p><span class="counter">5</span>+</p>
                      </div>
                      <div class="bd-promotion-counter-text">
                         <span>Award</span>
                         <span>Wining</span>
                      </div>
                   </div>
                </div>
                <div class="bd-promotion-list mb-50">
                   <ul>
                    @foreach ($Points as $dataP)
                    <li>{{ $dataP->Point }}</li>
                    @endforeach

                   </ul>
                </div>
                <div class="bd-promotion-btn-wrapper flex-wrap">
                   <div class="bd-promotion-btn">
                      <a href="#" class="bd-btn">
                         <span class="bd-btn-inner">
                            <span class="bd-btn-normal">View More</span>
                            <span class="bd-btn-hover">View More</span>
                         </span>
                      </a>
                   </div>
                   <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                      <a href="https://www.youtube.com/watch?v=8szBLH4zkbY" class="popup-video"><i
                            class="flaticon-play-button"></i> Promotional Video</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

 @endforeach
 @endisset
