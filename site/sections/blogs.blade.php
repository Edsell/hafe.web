<section class="bd-blog-area-2 p-relative fix pt-120 pb-120">
    <div class="container">
       <div class="bd-blog-section-title mb-40">
          <div class="row align-items-end">
             <div class="col-lg-6">
                <div class="bd-section-title-wrapper mb-0 wow fadeInLeft" data-wow-duration="1s"
                   data-wow-delay=".3s">
                   <h2 class="bd-section-title mb-0">News & Updates</h2>
                   <p>What’s happening on campus—events, achievements, and helpful updates for our community.</p>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="bd-blog-navigation mb-15 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                   <button class="bd-blog-prev">
                      <i></i><i class="fa-regular fa-angle-left"></i>
                   </button>
                   <button class="bd-blog-next">
                      <i class="fa-regular fa-angle-right"></i>
                   </button>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-12">
             <div class="bd-blog-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="swiper-wrapper">
                    @foreach ($Blogs as $data)
                   <div class="swiper-slide">
                      <div class="bd-blog">
                         <a href="{{ route('BlogDetails', ['slug'=> $data->slug]) }}">
                            <div class="bd-blog-thumb">
                               <img src="{{ asset($data->Image) }}" alt="{{ $data->Name }}">
                            </div>
                         </a>
                         <div class="bd-blog-content bd-blog-content-2">
                            <div class="test-thumb">
                               <div class="bd-blog-date-2">
                                  <span>{{ date('d M Y', strtotime($data->created_at)) }}</span>
                               </div>
                            </div>
                            <div class="bd-blog-meta">
                               <span><i class="fas fa-user"></i> by <a href="{{ route('BlogDetails', ['slug'=> $data->slug]) }}">Dr. Benedict Mushi</a></span>
                               <span>
                                <i class="fa-solid fa-comment-dots"></i>
                                <a href="{{ route('BlogDetails', ['slug'=> $data->slug]) }}">
                                  {{ $data->approved_comments_count ?? 0 }} Comments
                                </a>
                              </span>
                            </div>
                            <h4 class="bd-blog-title"><a href="{{ route('BlogDetails', ['slug'=> $data->slug]) }}">{{ $data->Name }}</a></h4>
                         </div>
                      </div>
                   </div>
                   @endforeach


                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
