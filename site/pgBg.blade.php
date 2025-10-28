@include('head.header')
@include('head.top')
@include('head.breadcrumb')

  <main class="vs-main">

    @isset($Page)
    @include($Page)
    @endisset

  </main>

@include('foot.footer')


