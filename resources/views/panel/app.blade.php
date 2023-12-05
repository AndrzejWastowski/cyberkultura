<!DOCTYPE html>
<html lang="pl">
  @include('panel/layout/head')
<body>
    @include('panel/layout/header')
    @include('panel/layout/sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    @include('panel/layout/footer')
    @include('panel/layout/scripts')
    @yield('script')
</body>
</html>