<header>
    <div class="bd-header">
       <!-- header top area start  -->
       <div class="bd-header-top bd-header-top-2 d-none d-xl-block">
          <!-- header top clip shape  -->
          <div class="bd-header-top-clip-shape"></div>
          <div class="container">
             <div class="row">
                <div class="col-12">
                   <div class="bd-header-top-wrapper d-flex justify-content-between">
                      <div class="bd-header-top-left">
                         <div class="bd-header-meta-items-2  d-flex align-items-center">
                            <div class="bd-header-meta-item is-white d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fa-sharp fa-solid fa-flag"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p>Journey Since 2023</p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center ms-5">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-map-marker-alt"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="#">{{ $generalSettings->Plot }} {{ $generalSettings->Address }} {{ $generalSettings->Country }}</a></p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="bd-header-top-right d-flex align-items-center">
                         <div class="bd-header-meta-items d-flex align-items-center">
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-envelope"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="mailto:{{ $generalSettings->Email }}">{{ $generalSettings->Email }}</a></p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-clock"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p>7.00am-5.00pm</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- header top area end -->

       <!-- header bottom area start -->
       <div id="header-sticky" class="bd-header-bottom-2">
          <!-- header bottom clip shape  -->
          <div class="bd-header-bottom-clip-shape"></div>
          <div class="container">
             <div class="mega-menu-wrapper p-relative">
                <div class="d-flex align-items-center justify-content-between">
                   <div class="bd-header-logo">
                      <a href="/">
                         <img src="{{ asset('uploads/logo.png') }}" style="width: 50%" alt="logo">HAFE
                      </a>
                   </div>
                   <div class="bd-main-menu d-none d-lg-flex align-items-center">
                      <nav id="mobile-menu">
                         <ul>
                            <li>
                               <a href="/">Home</a>

                            </li>
                            <li>
                               <a href="/about-us">About</a>
                            </li>
                            <li>
                               <a href="/blogs">Blogs</a>
                            </li>
                            <li>
                               <a href="/gallery">Gallery</a>
                            </li>
                            <li>
                               <a href="/faq">FAQs</a>
                            </li>


                            <li>
                               <a href="/contact-us">Contact</a>
                            </li>
                         </ul>
                      </nav>
                      <div class="bd-search-btn-wrapper">
                         <button class="bd-search-open-btn">
                            <i class="flaticon-search"></i>
                         </button>
                      </div>
                   </div>
                   <div class="bd-header-bottom-right d-flex justify-content-end align-items-center">
                      <div class="bd-header-meta-item d-none bd-header-menu-meta d-xxl-flex align-items-center">
                         <div class="bd-header-meta-icon">
                            <i class="flaticon-phone-call"></i>
                         </div>
                         <div class="bd-header-meta-text">
                            <p><a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}">{{ $generalSettings->Code }} {{ $generalSettings->Phone }}</a></p>
                         </div>
                      </div>
                      <div class="bd-header-btn d-none d-xl-block">
                         <a href="{{ route('apply.create') }}" class="bd-btn">
                            <span class="bd-btn-inner">
                               <span class="bd-btn-normal">Apply now</span>
                               <span class="bd-btn-hover">Apply now</span>
                            </span>
                         </a>
                      </div>
                      <div class="header-hamburger">
                         <button type="button" class="hamburger-btn offcanvas-open-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                         </button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- header bottom area end -->
    </div>
 </header>
