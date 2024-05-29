<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Enviro Space</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="/css/style.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">enviro<span>space</span>.</a>

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

  <!-- Navbar End -->

@yield('home')

@yield('topik')
{{-- @yield('loginPage') --}}

 

  <!-- Contact Section Start -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>Silahkan berikan penilaian dan rating mu dengan kontak berikut!</p>

    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25767358471!2d112.63011032570213!3d-7.2754416871371035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1709169461970!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="Nama" />
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="Email" />
        </div>
        <div class="input-group">
          <i data-feather="book"></i>
          <input type="text" placeholder="Pesan" />
        </div>
        <button type="submit" class="btn">kirim pesan</button>
      </form>
    </div>
  </section>

  <script>
    feather.replace();
  </script>

  <!-- My Javascript -->
  <script src="js/script.js"></script>

</body>

</html>