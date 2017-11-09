<div class="blog-masthead">
  <div class="container">
    <nav class="nav d-flex justify-content-end">

      @if (Auth::check())
		    <a class="nav-link" href='#'>{{ auth()->user()->name }}</a>
        <a class="nav-link" href="{{ route('galleries') }}">Home</a>
        <a class="nav-link" href="{{ route('create-gallery') }}">Create New Album</a>
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      @else
        <a class="nav-link" href="{{ route('login') }}">Login</a>
        <a class="nav-link" href="{{ route('register') }}">Register</a>
      @endif

    </nav>
  </div>
</div>
