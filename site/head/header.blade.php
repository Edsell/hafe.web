<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "EducationalOrganization",
          "name": "HAFE Pre and Primary School",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('uploads/logo.png') }}",
          "description": "A holistic English Medium school in Arusha, Tanzania, offering quality education for pre and primary levels.",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Marurani Village, Nduruma Ward",
            "addressLocality": "Arusha",
            "addressCountry": "TZ"
          },
          "sameAs": [
            "https://www.facebook.com/HafeSchools",
            "https://x.com/HafeSchools",
            "https://www.youtube.com/@HafeSchTz"
          ]
        }
        </script>



   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>
    @isset($Title)
    {{ $Title }} | {{ $generalSettings->CompanyName }}
    @endisset
   </title>

   <meta name="author" content="Dev Impressions">
   <meta name="description" content="{{ $generalSettings->CompanyName }}">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="keywords" content="{{ $generalSettings->CompanyName }}">


   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/favicon.png') }}">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/backtotop.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/flaticon_kindedo.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
   <!-- pre loader area start -->
   <div id="loading">
      <div id="preloader">
         <div class="preloader-thumb-wrap">
            <div class="preloader-thumb">
               <div class="preloader-border"></div>
               <img src="{{ asset('uploads/favicon.png') }}" alt="logo">
            </div>
         </div>
      </div>
   </div>
   <!-- pre loader area end -->


   <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
       <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
 </div>
 <!-- back to top end -->
