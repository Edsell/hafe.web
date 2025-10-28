{{-- head/breadcrumb.blade.php --}}

<section class="bd-breadcrumb-area p-relative fix theme-bg">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg"
         data-background="{{ asset(optional($generalSettings)->Crumb ?? 'assets/img/bg/breadcrumb-bg.html') }}"></div>

    {{-- (rest unchanged) --}}
    <div class="bd-breadcrumb-wrapper mb-60 p-relative">
       <div class="container">
          <div class="bd-breadcrumb-shape d-none d-sm-block p-relative">
             <div class="bd-breadcrumb-shape-1">
                <img src="{{ asset('assets/img/shape/curved-line-2.png') }}" alt="crumb image">
             </div>
             <div class="bd-breadcrumb-shape-2">
                <img src="{{ asset('assets/img/shape/white-curved-line.png') }}" alt="crumb image">
             </div>
          </div>
          <div class="row justify-content-center">
             <div class="col-xl-10">
                <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                   <div class="bd-breadcrumb-content text-center">
                      <h1 class="bd-breadcrumb-title">
                        @isset($Desc) {{ $Desc }} @endisset
                      </h1>
                      <div class="bd-breadcrumb-list">
                         <span><a href="/"><i class="flaticon-hut"></i>Home</a></span>
                         <span>@isset($Title) {{ $Title }} @endisset</span>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="bd-wave-wrapper bd-wave-wrapper-3">
       <div class="bd-wave bd-wave-3"></div>
       <div class="bd-wave bd-wave-3"></div>
    </div>
  </section>
