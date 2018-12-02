<!DOCTYPE html>
<html>
  <head>
    @include('layouts.frontend.head')
  </head>
  <body>
    @include('layouts.frontend.nav')
    @yield('content')
    <footer id="lst_footer" data-ng-controller="footer">
      @include('layouts.frontend.footer')
    </footer>
  </body>
</html>
