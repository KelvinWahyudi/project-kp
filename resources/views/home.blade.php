<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV LAWANG AGUNG SUKSES</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    @include('navbar.navbar')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
{{-- hero section --}}
     <section class="hero" id="home">
       <main class="content">
       <h1>Jaga Keselamatan <span>Kapal Anda!</span></h1>
       <p>Dapatkan perlindungan maksimal dengan produk
          keselamatan kapal terbaik 
          di pasaran saat ini.</p>
          <a href="/product" class="cta">Pesan Sekarang</a>
       </main>
     </section>
  {{-- about section --}}
     <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>
      <div class="row">
        <div class="about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang Kami">
        </div>
        <div class="content">
          <h3>Kenapa Memilih Layanan Kami</h3>
          <p>Dalam situasi darurat di laut, alat keselamatan kapal adalah yang paling penting.
            Pastikan Anda memiliki perlengkapan keselamatan kapal kami untuk 
            melindungi diri Anda dan kru Anda.</p>
            <p>Dengan produk keselamatan kapal kami, 
              Anda tidak hanya membeli perlengkapan 
              keselamatan berkualitas tinggi, 
              tetapi juga perdamaian pikiran yang tak ternilai harganya.</p>
        </div>
      </div>
     </section>
     {{-- product section --}}
     <section id="menu" class="menu">
      <h2><span>Produk</span> Kami</h2>
      <p>Perlengkapan keselamatan kapal kami terbuat 
        dari bahan-bahan berkualitas tinggi dan 
        dirancang untuk tahan lama dan andal. 
        Jangan ragu untuk membeli dari kami.</p>
        
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          <div class="menu-card">
            <img src="img/p1.jpg" alt="Pelampung" class="menu-card-img">
            <h3 class="menu-card-title">- Pelampung -</h3>
            <p class="menu-card-price">IDR 200k</p>
          </div>
          {{-- @foreach($produk as $item)
          <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="menu-card">
              <img src="{{asset('storage/'. $item->foto)}}" alt="Pelampung" class="menu-card-img">
              <h3 class="menu-card-title">- {{ $item->nama }} -</h3>
              <p class="menu-card-price">Rp. {{ $item->harga }}</p>
            </div>
            
            @endforeach
       </section> --}}
     </section>


    {{-- <footer>
      <div class="links">
        <a href="#home">Home</a>
        <a href="#menu">Produk</a>
        <a href="#about">Tentang Kami</a>
      </div>

      <div class="credit">
        <p>Created by <span>CV LAWANG AGUNG SUKSES</span> | &copy; 2023</p>
      </div>
    </footer> --}}

     




@include('footer.footer')
  </body>
</html>