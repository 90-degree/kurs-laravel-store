<nav class="navbar navbar-light bg-light navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Store</a>
        @if (auth()->user())
            @if (auth()->user()->isAdmin())
              @include('partials.navbars.admin')
            @else
              @include('partials.navbars.user')    
            @endif
        @else
            @include('partials.navbars.guest')
        @endif
    </div>
  </nav>