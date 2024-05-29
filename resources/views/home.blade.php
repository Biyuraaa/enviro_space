@extends('layouts.main')
@section('home')
    
<!-- Hero Section Start -->
<section class="Hero" id="home">
    <main class="content">
        <img src="{{asset('img/header-bg.jpg')}}" alt="The head and torso of a dinosaur skeleton;
        it has a large head with long sharp teeth" width="100%" height="85%" />
        <div class="hero-text">
            <h1>Solusi Literasi dan Edukasi <span>Untuk Lingkungan</span></h1>
            <p>
                Kemudahan literatur terkait lingkungan mulai dimana saja dan kapan
                saja sesukamu.
            </p>
            <a href="#" class="cta">Cari Literatur Sekarang</a>
        </div>
    </main>
</section>

<!-- Hero Section End -->

<!-- About section start -->
<section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>
    
    <div class="row">
        <div class="about-img">
            <img src="{{asset('img/tentang-kami.jpg')}}" alt="Tentang Kami" />
        </div>
        <div class="content">
            <h3>Literasi Untuk Lingkungan</h3>
            <p>
                Perubahan untuk mitigasi terkait lingkungan bisa dimulai dari diri
                kamu.
            </p>
            <p>
                Enviro-Space menyedikan literatur yang dapat menambah wawasan dan
                kepedulian terkait isu lingkungan. Yuk tambah wawasan di
                #ENVIRO-SPACE
            </p>
        </div>
    </div>
</section>

<!-- About section end -->

<!--Koleksi Section Start  -->
<section id="Koleksi" class="Koleksi">
    <h2><span>Koleksi</span> Kami</h2>
    <p>
        Silahkan explore literatur yang terbaru dan informatif semaumu,
        kapanpun, dan dimanapun!
    </p>
    
    <div class="row">
        <div class="Koleksi-card">
            <a href="/topik">
                <img src="/img/Koleksi/1.jpg" alt="Ekosistem" class="Koleksi-card-img" />
                <h3 class="Koleksi-card-title">- Ekosistem -</h3>
                <p class="Koleksi-card-jumlah">TOTAL 989 KOLEKSI</p>
            </a>
        </div>
    </div>
</section>

@endsection