  <nav class="navbar">
    @if (Auth::user())
    <a href="{{route('dashboard')}}" class="navbar-logo">enviro<span>space</span>.</a>
    @else
    <a href="{{route('home')}}" class="navbar-logo">enviro<span>space</span>.</a>
    @endif

    <div class="navbar-nav">
      <a href="{{route('home')}}">Home</a>
      <a href="/#about">Tentang Kami</a>
      <a href="/#Koleksi">Koleksi</a>
      <a href="/#contact">Kontak</a>
      @if (Auth::user())
      <a href="{{route('logout')}}">Logout</a>
      @else
      <a href="{{route('login')}}">Login</a>
      @endif
    </div>
    <div class="search-bar hidden">
      <input type="text" placeholder="Search Your Article">
      <button>Search</button>
    </div>

    <div class="navbar-extra">
      <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>




  </nav>