@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin: 0;">
    {{-- Banner Carousel --}}
    <div class="banner mb-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets-landing/images/carousel/1.jpg') }}" alt="First slide"  style="height: 80vh; object-fit: cover;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                        style="height: 100%;">
                        <h1>PRAMUKA UNESA</h1>
                        <h2>Racana K.H. Dewantara dan R.A. Kartini</h2>
                        <p>Gugus Depan 24.431 dan 24.414</p>
                        <p>Universitas Negeri Surabaya</p>
                    </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets-landing/images/carousel/2.jpg') }}" alt="Second slide"  style="height: 80vh; object-fit: cover;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                        style="height: 100%;">
                        <h1>PRAMUKA UNESA</h1>
                        <h2>Racana K.H. Dewantara dan R.A. Kartini</h2>
                        <p>Gugus Depan 24.413 dan 24.414</p>
                        <p>Universitas Negeri Surabaya</p>
                    </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets-landing/images/carousel/3.jpg') }}" alt="Third slide"  style="height: 80vh; object-fit: cover;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                        style="height: 100%;">
                        <h1>PRAMUKA UNESA</h1>
                        <h2>Racana K.H. Dewantara dan R.A. Kartini</h2>
                        <p>Gugus Depan 24.431 dan 24.414</p>
                        <p>Universitas Negeri Surabaya</p>
                    </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
       
    </div>

    {{-- ABOUT US --}}
    <div class="about-us mb-5" style="padding: 50px 0; background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="color: #175789;" class="mb-4 text-justify">About Pramuka Unesa</h1>
                    <p class="text-justify">Gerakan Pramuka Gugus Depan Surabaya 413-414 yang berpangkalan di
                        Kampus IKIP Surabaya yang sekarang telah menjadi Universitas Negeri Surabaya didirikan
                        pada tanggal 10 November 1982. Bumi Perkemahan Sumberboto Jombang menjadi saksi bisu
                        pengukuhan Gudep Surabaya 413-414 oleh Kak H.A. Hudan Dardari (waktu itu sebagai Bupati
                        Jombang) mewakili Ka. Kwarda Jawa Timur dan dipelopori oleh Kak Ganet dan Kak Joko
                        selaku mahasiswa IKIP Surabaya yang juga anggota Gugus Depan Surabaya 413-414. </p>
                    <a href="#" class="btn btn-primary"
                        style="background-color: #175789; color: white;">Selengkapnya</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets-landing/images/about-us/2.jpg') }}" alt="" srcset=""
                        style="width: 100%; height: auto; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    {{-- Kenapa Memilih Kami --}}
    <div class="why-us mb-5 d-flex justify-content-center align-items-center flex-column py-5"
        style="background-color: #175789;">
        <div class="container">
            <h1 class="text-center mb-5" style="color: white;">Kenapa Memilih Kami</h1>

            <div class="row text-center">
                <!-- Added text-center for better alignment -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/6.jpg') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Pengalaman dan Tradisi</h5>
                            <p class="card-text">Pramuka Unesa memiliki pengalaman yang kaya dan tradisi yang
                                kuat dalam kegiatan Pramuka di lingkungan kampus. Kami telah berkomitmen untuk
                                mengembangkan kepanduan dan mempersiapkan mahasiswa menjadi pemimpin yang
                                tangguh melalui program-program yang teruji dan terpercaya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/2.jpg') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Kaderisasi yang Unggul</h5>
                            <p class="card-text">Pramuka Unesa memiliki sistem kaderisasi yang unggul. Kami
                                memberikan pelatihan dan pembinaan yang komprehensif kepada anggota kami,
                                memungkinkan mereka untuk mengembangkan potensi diri, keterampilan kepemimpinan,
                                serta nilai-nilai positif yang akan membawa manfaat jangka panjang dalam
                                kehidupan pribadi dan profesional mereka.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/11.png') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Lingkungan Kampus yang Berkelanjutan</h5>
                            <p class="card-text">Kami aktif berpartisipasi dalam kegiatan sosial dan lingkungan
                                yang bertujuan untuk menciptakan lingkungan kampus yang berkelanjutan. Pramuka
                                Unesa mendorong anggotanya untuk menjadi agen perubahan positif dalam menjaga
                                dan melestarikan alam serta memberikan dampak positif bagi masyarakat sekitar.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/9.jpg') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Jaringan Persaudaraan</h5>
                            <p class="card-text">Bergabung dengan Pramuka Unesa memberikan kesempatan untuk
                                membangun jaringan dan persaudaraan yang luas. Kami memiliki anggota dari
                                berbagai jurusan dan latar belakang, sehingga memberikan kesempatan untuk
                                bertemu dan belajar dari orang-orang dengan minat dan visi yang serupa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/8.jpg') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Kesempatan Bertumbuh dan Berkembang</h5>
                            <p class="card-text">Pramuka Unesa memberikan berbagai kesempatan bagi anggotanya
                                untuk bertumbuh dan berkembang. Kami menyelenggarakan berbagai kegiatan seperti
                                pelatihan keterampilan, perkemahan, dan kegiatan pengabdian masyarakat yang
                                memungkinkan anggota kami mengembangkan keterampilan praktis, kepemimpinan,
                                serta rasa tanggung jawab sosial.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('assets-landing/images/about-us/10.jpg') }}" class="card-img-top" alt="..."
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Kebersamaan dan Kehangatan</h5>
                            <p class="card-text">Pramuka Unesa adalah komunitas yang penuh kebersamaan dan
                                kehangatan. Kami memberikan dukungan dan semangat satu sama lain dalam
                                perjalanan kepanduan kami. Bergabung dengan Pramuka Unesa berarti menjadi bagian
                                dari keluarga Pramuka yang saling mendukung dan menjalin persahabatan yang erat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- QUotes Section --}}
    <div class="quotes-section mb-5 d-flex justify-content-center align-items-center flex-column py-5"
        style="background-color: #f8f9fa;">
        <div class="container-fluid">
            <h1 class="text-center mb-5" style="color: #175789;">Quotes</h1>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                                        <blockquote class="blockquote text-center">
                                            <!-- Centered the blockquote -->
                                            <p class="mb-0">"Seorang Pramuka tidak pernah terkejut; dia tahu apa
                                                yang harus dilakukan ketika sesuatu yang tak terduga terjadi"
                                            </p>
                                            <footer class="blockquote-footer">
                                                <cite title="Source Title">Robert Baden Powell</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                                        <blockquote class="blockquote text-center">
                                            <!-- Centered the blockquote -->
                                            <p class="mb-0">Ing ngarsa sung tulada, ing madya mangun karsa, tut
                                                wuri handayani.”
                                                Di Depan, Seorang Pendidik harus memberi Teladan atau Contoh
                                                Tindakan Yang Baik, Di tengah atau di antara Murid, Guru harus
                                                menciptakan prakarsa dan ide, Dari belakang Seorang Guru harus
                                                Memberikan dorongan dan Arahan
                                            </p>
                                            <footer class="blockquote-footer">
                                                <cite title="Source Title">K.H. Dewantara</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                                        <blockquote class="blockquote text-center">
                                            <!-- Centered the blockquote -->
                                            <p class="mb-0">“Habis Gelap Terbitlah Terang .”
                                                Mengacu pada kondisi di zaman milenial, di mana kaum perempuan
                                                memiliki hak yang sangat terbatas. Salah satunya adalah hak
                                                untuk bersekolah dan mengenyam pendidikan seperti para
                                                laki-laki. Inilah yang membuat RA Kartini berjuang menyetarakan
                                                hak menuntut pendidikan bagi perempuan.

                                            </p>
                                            <footer class="blockquote-footer">
                                                <cite title="Source Title">R.A. Kartini</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

    {{-- Berita --}}
    <div class="berita-section mb-5 d-flex justify-content-center align-items-center flex-column py-5"
        style="background-color: #175789;">
        <div class="container">
            <h1 class="text-center mb-5" style="color: white;">Berita</h1>
            <div class="row">
                @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <!-- Added mb-4 for spacing between cards -->
                    <div class="card h-100">
                        <!-- Added h-100 for equal height cards -->
                        <img src="{{ asset('storage/news/' . $item->photo) }}" class="card-img-top" alt="..."
                            style="height: 200px; object-fit: cover; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <!-- Added d-flex and flex-column for better layout -->
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">By {{ $item->author }}</p>
                            <p class="card-text flex-grow-1">{!! Str::limit($item->content, 100) !!}</p>
                            <a href="{{ route('news.show', $item->slug) }}"
                                class="btn btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Footer --}}

</div>
@endsection