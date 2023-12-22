<!DOCTYPE html>
<html lang="pl">
  @include('panel/layout/head')
<body>
  @include('panel/layout/header')
  @if(auth()->user()->isEditorOrAdmin())

    @include('panel/layout/sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    @else
    <main id="main" class="main">
      @include('panel/nopermision_form')

  </main>

    @endif

    @include('panel/layout/footer')
    @include('panel/layout/scripts')
    @yield('script')
</body>
</html>