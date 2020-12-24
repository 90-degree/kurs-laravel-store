<nav class="navbar navbar-light bg-light navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Store</a>
        @if (auth()->user())
            @include('partials.navbars.user')
        @else
            @include('partials.navbars.guest')
        @endif
    </div>
  </nav>