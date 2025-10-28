<footer>
    <div class="bd-footer-area pt-5">
       <!-- footer area bg here  -->
       <div class="bd-gradient-bg"></div>
       <div class="bd-footer pt-90 pb-25">
          <div class="container">
             <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="bd-footer-widget bd-footer-widget-1 mb-50">
                      <div class="bd-footer-logo mb-35">
                         <a href="/"> <img src="{{ asset($generalSettings->Logo) }}" alt="Logo - {{ $generalSettings->CompanyName }}"></a>
                      </div>
                      <div class="bd-footer-widget-content mb-40">
                         <p>{{ $generalSettings->CompanyName }} - We Strive for Excellence </p>
                      </div>
                      <div class="bd-footer-bottom-social pb-20">
                         <ul>
                            <li><a target="_blank" href="https://www.facebook.com/HafeSchools"><i
                                     class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="https://x.com/HafeSchools"><i
                                     class="fa-brands fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/@HafeSchTz"><i
                                     class="fa-brands fa-youtube"></i></a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="bd-footer-widget bd-footer-widget-2 mb-50">
                      <div class="bd-footer-widget-content">
                         <h4 class="bd-footer-widget-title mb-30">Quick links</h4>
                         <div class="bd-footer-list">
                            <ul>
                                <li><a href="{{ route('AboutPage') }}">About Us</a></li>
                                <li><a href="{{ route('BlogPage') }}">Blog</a></li>
                                <li><a href="{{ route('GalleryPage') }}">Gallery</a></li>
                                <li><a href="{{ route('ContactPage') }}">Contact</a></li>
                                <li><a href="{{ route('apply.create') }}">Apply Now</a></li>
                                <li><a href="/faq">Admissions FAQ</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="bd-footer-widget bd-footer-widget-3 mb-50">
                      <div class="bd-footer-widget-content">
                         <h4 class="bd-footer-widget-title mb-30">Resources</h4>
                         <div class="bd-footer-list">
                            <ul>
                                <li><a href="/admissions/requirements">Requirements</a></li>
                                <li><a href="/resources/calendar">Academic Calendar</a></li>
                                <li><a href="{{ route('BlogPage') }}">News & Updates</a></li>
                                <li><a href="{{-- /resources/downloads --}}">Downloads</a></li>
                                <li><a href="/policies/privacy">Privacy Policy</a></li>
                                <li><a href="/">Terms of Use</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="bd-footer-widget bd-footer-widget-4">
                      <div class="bd-footer-widget-content">
                         <h4 class="bd-footer-widget-title mb-30">Contact Us</h4>
                         <div class="bd-footer-contact">
                            <ul>
                               <li><i class="fa-light fa-location-dot"></i><a href="#">{{ $generalSettings->Plot }} {{ $generalSettings->Address }}</a></li>
                               <li><i class="fa-light fa-phone"></i><a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}">({{ $generalSettings->Code }}) {{ $generalSettings->Phone }} / {{ $generalSettings->Phone2 }}</a></li>
                               <li><i class="fa-light fa-envelope"></i><a
                                     href="mailto:{{ $generalSettings->Email}}">{{ $generalSettings->Email}}</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="bd-footer-copyright pb-5">
          <div class="bd-footer-copyright-line pb-20">
             <img src="{{ asset('assets/img/shape/wave-line.png') }}" alt="bottom line">
          </div>
          <div class="container">
             <div class="bd-footer-copyright-wrap d-flex align-items-md-center justify-content-center">
                <div class="bd-footer-copyright-text pb-20">
                   <p>Copyrighted by &copy;{{ date('Y') }} <a href="https://devimpressions.com"
                    rel="nofollow">{{ $generalSettings->CompanyName }}</a>
              </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>





    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__bg"></div>
        <div class="offcanvas__wrapper">
           <div class="offcanvas__content">
              <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                 <div class="offcanvas__logo logo">
                    <a href="/">
                       <img src="{{ asset($generalSettings->Logo) }}" alt="logo">
                    </a>
                 </div>
                 <div class="offcanvas__close">
                    <button class="offcanvas__close-btn">
                       <i class="fa-thin fa-times"></i>
                    </button>
                 </div>
              </div>
              <div class="offcanvas__search mb-0">
                 <form action="#">
                    <button type="submit"><i class="flaticon-search"></i></button>
                    <input type="text" placeholder="Search here">
                 </form>
              </div>
              <div class="mobile-menu fix mt-40"></div>
              <div class="offcanvas__about d-none d-lg-block mt-30 mb-30">
                 <h4>{{ $generalSettings->CompanyName }}</h4>
                 <p>We Strive for Excellence</p>
              </div>
              <div class="offcanvas__contact mt-30 mb-30">
                 <h4>Contact Info</h4>
                 <ul>
                    <li class="d-flex align-items-center gap-2">
                       <div class="offcanvas__contact-icon">
                          <a target="_blank"
                             href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">
                             <i class="fal fa-map-marker-alt"></i></a>
                       </div>
                       <div class="offcanvas__contact-text">
                          <a target="_blank"
                             href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">
                             {{ $generalSettings->Plot }} {{ $generalSettings->Address }}</a>
                       </div>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                       <div class="offcanvas__contact-icon">
                          <a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}"><i class="far fa-phone"></i></a>
                       </div>
                       <div class="offcanvas__contact-text">
                          <a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}">{{ $generalSettings->Code }} {{ $generalSettings->Phone }}</a>
                       </div>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                       <div class="offcanvas__contact-icon">
                          <a href="mailto:{{ $generalSettings->Email }}"><i class="fal fa-envelope"></i></a>
                       </div>
                       <div class="offcanvas__contact-text">
                          <a href="mailto:{{ $generalSettings->Email }}">{{ $generalSettings->Email }}</a>
                       </div>
                    </li>
                 </ul>
              </div>
              <div class="offcanvas__social">
                 <ul>
                    <li><a target="_blank" href="https://www.facebook.com/HafeSchools"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li><a target="_blank" href="https://x.com/HafeSchools"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/@HafeSchTz"><i class="fa-brands fa-youtube"></i></a>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
     </div>
     <div class="body-overlay"></div>
     <!-- offcanvas area end -->

     <!-- serach popup area start here  -->
     <div class="bd-search-popup-area">
        <div class="container">
           <div class="row">
              <div class="col-12">
                 <div class="bd-search-popup">
                    <div class="bd-search-form">
                       <form action="#">
                          <div class="bd-search-input">
                             <input type="search" placeholder="Type here to serach ...">
                             <div class="bd-search-submit">
                                <button type="submit"><i class="flaticon-search"></i></button>
                             </div>
                          </div>
                       </form>
                       <div class="bd-search-close">
                          <div class="bd-search-close-btn">
                             <button><i class="fa-thin fa-close"></i></button>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- search popup overlay  -->
     <div class="bd-search-overlay"></div>
     <!-- serach popup area end here  -->


     @include('foot.scripts')
