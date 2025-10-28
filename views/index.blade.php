@include('headers.header')
@include('sidebar.sidebar')
@include('headers.nav')
@include('headers.crumb')


@isset($Page)
@include($Page)
@endisset



 @include('footers.footer')
