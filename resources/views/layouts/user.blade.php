<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../../assets/css/masyrakat.css">

    <title>Laporan</title>
  </head>
  <body>
    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="../assets/images/logongadulight.png" alt="" width="75">
        </a>
    
        @guest
        <div class="d-flex gap-3">
            <a class="btn" href="{{ route('login') }}" style="background-color: white; color: #6096B4; font-weight: 500; font-size: 14px" type="submit">Masuk</a> 
            <a class="btn" href="{{ route('register') }}" style="background-color: white; color: #6096B4; font-weight: 500; font-size: 14px" type="submit">Daftar</a> 
        </div>
        @endguest


        @auth("web")   
        <div class="d-flex gap-3">
          <a class="btn" href="{{ route('riwayat') }}" style="background-color: white; color: #6096B4; font-weight: 500; font-size: 14px" type="submit"><i class="bi bi-clock-history me-1"></i>Riwayat Pengaduan</a>
          <a class="btn" href="{{ route('logout') }}" style="background-color: white; color: #6096B4; font-weight: 500; font-size: 14px"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-in-right me-1"></i>Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>         
        @endauth



      </div>
    </nav>
    <div class="waves">
      <div class="header" style="color: white; text-align: center; padding-top: 125px">
        <h3>Layanan Pengaduan Online Rakyat</h3>
        <p><strong>@auth("web") Selamat Datang {{Auth::guard('web')->user()->name}}! , @endauth</strong> Kami Siap Menerima Semua Keluhan Anda</p>
      </div>
      <div class="wave wave1"></div>
      <div class="wave wave2"></div>
      <div class="wave wave3"></div>
      @yield('content')

      <div class="container" style="width: 600px; color: #6096B4; margin-top: 75px;">
        <h4 class="text-center">Tentang Ngadu</h4>
        <p class="mt-4" style="text-align: justify; color: #6096B4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque purus semper eget duis at tellus. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Sed sed risus pretium quam vulputate dignissim suspendisse in. Quisque non tellus orci ac auctor augue mauris. Aliquet risus feugiat in ante metus dictum at. Urna molestie at elementum eu facilisis sed odio morbi quis. Amet nisl suscipit adipiscing bibendum est ultricies integer. Sed risus pretium quam vulputate dignissim suspendisse. Sit amet consectetur adipiscing elit pellentesque.</p>
      </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
      <div class="text-center p-3" >
        <p style="font-size: 12px; color: grey">© 2023 Copyright: Arbim</p>
      </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->
    @yield('js')

    <script>
      $(document).ready(function() {
              // Transition effect for navbar 
              $(window).scroll(function() {
                // checks if window is scrolled more than 500px, adds/removes solid class
                if($(this).scrollTop() > 500) { 
                    $('.navbar').addClass('solid');
                } else {
                    $('.navbar').removeClass('solid');
                }
              });
      });
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>