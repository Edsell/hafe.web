{{-- pages/about.blade.php --}}

@php
$about = collect($About ?? [])->first();
$paragraphs = collect($Paragraphs ?? []);
$points = collect($Points ?? [])->where('AboutID', optional($about)->id)->pluck('Point')->filter();
$whyUs = collect($WhyUs ?? []);
$introParas = $paragraphs->where('AboutID', optional($about)->id)->whereNull('SubTitle')->pluck('Paragraph');
$titledParas= $paragraphs->where('AboutID', optional($about)->id)->whereNotNull('SubTitle');
@endphp

{{-- promotion area start --}}
<section class="bd-promotion-area pt-120 pb-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="bd-promotion-thumb-wrapper mb-60 wow fadeInLeft" data-wow-duration="1s"
                    data-wow-delay=".3s">
                    <div class="bd-promotion-thumb">
                        <div class="bd-promotion-thumb-mask p-relative">
                            <img src="{{ isset($about->Image) ? asset($about->Image) : asset('assets/img/promotion/2.png') }}"
                                alt="{{ $about->Title ?? 'About HAFE' }}">
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
                        <h2 class="bd-section-title mb-10">{{ $about->Title ?? 'About Our School' }}</h2>

                        {{-- Short lead from DB --}}
                        @if(!empty($about->Details))
                        <span class="d-block mb-10">{!! $about->Details !!}</span>
                        @endif

                        {{-- Free-form intro paragraphs (no SubTitle) --}}
                        @foreach($introParas as $p)
                        <p class="mb-10">{!! nl2br(e($p)) !!}</p>
                        @endforeach
                    </div>

                    {{-- Key points list --}}
                    @if($points->isNotEmpty())
                    <div class="bd-promotion-list mb-40">
                        <ul>
                            @foreach($points as $pt)
                            <li>{{ $pt }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        {{-- Vision / Mission / any titled sections --}}
        @if($titledParas->isNotEmpty())
        <section class="pt-30 pb-20" id="about-key-sections" aria-labelledby="about-key-sections-title">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-20" id="about-key-sections-title">Our Vision, Mission & Pillars</h3>
                    <div class="row g-3">
                        @foreach($titledParas as $tp)
                        <div class="col-md-6">
                            <article class="p-20 rounded-md border h-100" itemscope
                                itemtype="{{-- https://schema.org/CreativeWork --}}">
                                <h4 class="mb-8 ps-2" itemprop="headline">{{ $tp->SubTitle }}</h4>
                                <p class="mb-0 ps-2" itemprop="text">{!! nl2br(e($tp->Paragraph)) !!}</p>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{-- Helpful school contacts from global settings --}}
        @isset($generalSettings)
        @php
        // Normalize phone to E.164 if possible (basic clean; adjust to your numbering plan as needed)
        $rawPhone = preg_replace('/\s+/', '', (string) $generalSettings->Phone);
        $countryC = ltrim((string)($generalSettings->Code ?? ''), '+');
        $e164Phone = $countryC ? ('+'.$countryC.preg_replace('/^\+?'.$countryC.'?/', '', $rawPhone)) : $rawPhone;
        @endphp

        <section class="pt-20" id="contact-actions" itemscope itemtype="https://schema.org/Organization">
            <meta itemprop="name" content="{{ $generalSettings->CompanyName }}">
            @if(!empty($generalSettings->Email))
            <meta itemprop="email" content="{{ $generalSettings->Email }}">
            @endif
            @if(!empty($e164Phone))
            <meta itemprop="telephone" content="{{ $e164Phone }}">
            @endif

            @if(!empty($generalSettings->Address))
            <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                <meta itemprop="streetAddress" content="{{ $generalSettings->Address }}">
                @if(!empty($generalSettings->Country))
                <meta itemprop="addressCountry" content="{{ $generalSettings->Country }}">@endif
            </div>
            @endif

            <div class="bd-promotion-btn-wrapper flex-wrap">
                @if(!empty($e164Phone))
                <div class="bd-promotion-btn">
                    <a href="tel:{{ $e164Phone }}" class="bd-btn" rel="nofollow noopener">
                        <span class="bd-btn-inner">
                            <span class="bd-btn-normal">Call {{ $generalSettings->Phone }}</span>
                            <span class="bd-btn-hover">Call Us</span>
                        </span>
                    </a>
                </div>
                @endif

                <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                    <a href="https://www.youtube.com/watch?v=8szBLH4zkbY" class="popup-video"><i
                          class="flaticon-play-button"></i> Promotional Video</a>
                 </div>
            </div>

            @if(!empty($generalSettings->Address))
            <p class="mt-15">
                <strong>Address:</strong> <span itemprop="address">{{ $generalSettings->Address }}</span>
                @if(!empty($generalSettings->Country)) — <span
                    itemprop="addressCountry">{{ $generalSettings->Country }}</span>@endif
            </p>
            @endif
        </section>
        @endisset



    </div>
</section>
{{-- promotion area end --}}

{{-- feature area (Why Us) --}}
@if($WhyUs->isNotEmpty())
<div class="bd-feature-area p-relative pt-120 pb-120">

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 col-md-10">
            <div class="bd-section-title-wrapper is-white text-center mb-55 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
               <h2 class="bd-section-title mb-0">Why Choose Us</h2>
               <p>Our pillars of value and impact for learners and the community.</p>
            </div>
         </div>
      </div>

      <div class="bd-feature-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
         <div class="row">
            <div class="col-12">
               <ul class="feature">
                  @foreach($WhyUs as $w)
                  <li class="feature-item mb-3 border">
                     <div class="bd-feature feature-card rounded-3 overflow-hidden">
                        {{-- Full-width image (always above the white panel) --}}
                        <div class="feature-media w-100" style="aspect-ratio:16/9; background:#f3f4f6;">
                           @if(!empty($w->Image))
                              <img
                                 src="{{ asset($w->Image) }}"
                                 alt="{{ $w->Title ?? 'Why HAFE' }}"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-100 h-100"
                                 style="object-fit:cover; display:block;"
                              >
                           @else
                              <div class="w-100 h-100" style="background:linear-gradient(135deg,#e5e7eb,#f3f4f6);"></div>
                           @endif
                        </div>

                        {{-- Text content in the template’s content block --}}
                        <div class=" ">
                           <h4 class="bd-feature-title">{{ $w->Title }}</h4>
                           @if(!empty($w->Phrase))
                              <p>{{ $w->Phrase }}</p>
                           @endif
                        </div>
                     </div>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- Minimal CSS; no :hover rules --}}
<style>
  .feature-card{ position:relative; background:transparent; }
  .feature-card .feature-media{ position:relative; z-index:2; }
  .feature-card .feature-body{
    position:relative; z-index:1; background:#fff;
    margin-top:-10px; /* slight overlap for a neat seam */
    padding:20px;
  }
</style>
@endif



{{-- Optional CTA section (static for now, can be made dynamic later) --}}
@include('sections.cta')
