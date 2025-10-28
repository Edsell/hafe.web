<title>{{ $meta['title'] ?? 'HAFE Pre & Primary School' }}</title>
<meta name="description" content="{{ $meta['description'] ?? 'Providing holistic English Medium education in Arusha, Tanzania.' }}">
<meta name="keywords" content="HAFE, education, Tanzania, primary school, holistic learning, Nduruma-Marurani">
<link rel="canonical" href="{{ $meta['url'] ?? url()->current() }}" />

<!-- Open Graph (Facebook & LinkedIn) -->
<meta property="og:title" content="{{ $meta['title'] ?? 'HAFE Pre & Primary School' }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:image" content="{{ $meta['image'] }}">
<meta property="og:url" content="{{ $meta['url'] }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="HAFE Pre & Primary School">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $meta['title'] }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<meta name="twitter:image" content="{{ $meta['image'] }}">
<meta name="twitter:site" content="@HafeSchools">
<meta name="twitter:creator" content="@HafeSchools">
