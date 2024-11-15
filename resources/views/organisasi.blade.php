@extends('layouts.landing')

@section('content')
    <div class="container-fluid" style="padding: 0; margin:0;">
        <div class="banner" style="padding: 0; margin:0;">
            <div class="jumbotron jumbotron-fluid"
                style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
                <div
                    style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(255, 165, 0, 0.7), rgba(255, 255, 255, 0.7));">
                </div>
                <div class="container-fluid" style="position: relative; z-index: 1;">
                    <h1 class="display-4" style="color: #175789;">Organisasi</h1>
                    <p class="lead " style="color: #175789;" font-weight: bold;>
                        Sekilas Tentang Pramuka Unesa
                    </p>
                </div>
            </div>
        </div>
        {{-- Organisasi --}}
        <div class="container organisasi">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4">Pembina Pramuka Unesa</h1>
                </div>
                <h3 class="text-center mb-4">Pembina K.H. Dewantara</h3>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK YATNO.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Kak Yatno</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Prof. Dr. Suyatno, M.Pd</h6>
                                    <p class="card-text">
                                        Pembina Gudep 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/kak ganet.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK GANET</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Drs. Boedi Oetomo</h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/kak ghofur.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK GHOFUR</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Abdul Ghofur, S.Pd
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/kak amin.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK AMIN</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Amin Fauzi, M.Pd
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/kak roem.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK ROEM</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Moh. Roem, S.Si
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK HASAN.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK HASAN</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Hasan Subekti, S.Pd., M.Pd
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- Tambahkan anggota tim lainnya di sini --}}
                    </div>
                </div>

                <h3 class="text-center mb-4 mt-5">Pembina R.A. Kartini</h3>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK MASPIYAH.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK MASPIYAH</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Dr. Maspiyah, M.Kes</h6>
                                    <p class="card-text">
                                        Pembina Gudep 24.414
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK DEWI.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK DEWI</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Dra. Dewi Lutfiati, M.Kes</h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK JUN.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK JUN</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Dr. Jun Surjanti, SE., M.Si
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('assets-landing/images/foto-pembina/KAK NUNUK.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KAK NUNUK</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Dr. Nunuk Hariyati S.Pd, M.Pd
                                    </h6>
                                    <p class="card-text">
                                        Pembina Satuan 24.413
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- STRUKTUR ORGANISASI --}}
        <div class="container struktur-organisasi" style="padding: 20px; background-color: #f8f9fa;">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>Struktur Organisasi</h1>
                </div>
                <h3 class="text-center mb-4">Bagan Organisasi Gudep 24.413</h3>
                <div class="col-md-12 text-center mb-4">
                    <img src="{{ asset('assets-landing/images/organisasi/BAGAN ORGANISASI GUDEP.jpg') }}"
                        alt="Bagan Organisasi" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
                <h3 class="text-center mb-4 mt-5">Struktur Dewan Racana</h3>
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets-landing/images/organisasi/STRUKTUR DEWAN RACANA (6000 x 3000 piksel)_20240902_144041_0000.png') }}"
                        alt="Struktur Dewan Racana" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>

        {{-- DIVISI (SCROLL DOWN) --}}
        <div class="container divisi">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4">Divisi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="card shadow-lg d-flex justify-content-center align-items-center p-3">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets-landing/images/logo/DIVISI CYBER.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 300px; object-fit: cover;">
                            </div>
                            <div class="col-md-8 d-flex justify-content-center flex-column">
                                <h5 class="card-title">DIVISI CYBER</h5>
                                <p class="card-text text-justify">
                                    Divisi cyber adalah divisi yang bergerak di bidang jurnalistik, editing, fotografi, dan
                                    videografi yang dinaungi oleh Racana Ki Hadjar Dewantara dan Raden Ajeng Kartini Gugus
                                    depan Surabaya 24.413 dan 24.414. Tujuan divisi ini adalah untuk menjadikan anggotanya
                                    paham akan perkembangan teknologi yang ada, memiliki keahlian dalam bidang jurnalistik,
                                    editing, fotografi, dan videografi, serta sebagai wadah anggotanya agar dapat
                                    menciptakan lapangan pekerjaan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="card shadow-lg d-flex justify-content-center align-items-center p-3">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets-landing/images/logo/DIVISI KOLATMAPTA.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 300px; object-fit: cover;">
                            </div>
                            <div class="col-md-8 d-flex justify-content-center flex-column">
                                <h5 class="card-title">DIVISI KOLATMAPTA</h5>
                                <p class="card-text text-justify">
                                    Komando Latihan Kesamaptaan yang selanjutnya disingkat Kolatmapta adalah divisi khusus
                                    pendidikan dan pelatihan kesamaptaan bagi Warga Racana Ki Hadjar Dewantara dan Raden
                                    Ajeng Kartini Gugus depan Surabaya 24.413 dan 24.414. Kolatmapta sebagai wadah Pembinaan
                                    dan Pengembangan karakter anggota racana untuk menguatkan loyalitas dan meningkatkan
                                    keterampilan alam bebas sesuai satya dan dharma pramuka.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="card shadow-lg d-flex justify-content-center align-items-center p-3">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets-landing/images/logo/DIVISI WIRABUMI.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 300px; object-fit: cover;">
                            </div>
                            <div class="col-md-8 d-flex justify-content-center flex-column">
                                <h5 class="card-title">DIVISI WIRABUMI</h5>
                                <p class="card-text text-justify">
                                    Divisi Wirabumi diambil dari bahasa sansekerta yang memiliki arti Wira (Pejuang) dan
                                    Bumi (Lingkungan). Oleh sebab itu, Wira Bumi bermakna pejuang
                                    lingkungan. Divisi ini merupakan suatu kelompok satuan khusus bergerak dalam bidang
                                    lingkungan hidup yang dinaungi oleh Racana Ki Hadjar Dewantara dan Raden Ajeng Kartini
                                    Gugus depan Surabaya 24.413 dan 24.414. Tujuan Divisi ini menjadi wadah bagi anggotanya
                                    dalam mengembangkan keilmuan serta jiwa cinta alam terhadap
                                    lingkungan sekitar yang kreatif dan inovatif guna mewujudkan Gugus Depan yang produktif
                                    serta pelestarian lingkungan yang berkelanjutan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="card shadow-lg d-flex justify-content-center align-items-center p-3">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets-landing/images/logo/DIVISI PAWIRA.png') }}" alt=""
                                    class="card-img-top" style="height: 300px; width: 300px; object-fit: cover;">
                            </div>
                            <div class="col-md-8 d-flex justify-content-center flex-column">
                                <h5 class="card-title">DIVISI PAWIRA</h5>
                                <p class="card-text text-justify">
                                    Divisi Pandega Wirausaha yang selanjutnya disingkat Divisi Pawira merupakan suatu kelompok satuan khusus bergerak dalam bidang kewirausahaan yang dinaungi Ki Hadjar Dewantara dan Raden Ajeng Kartini Gugus depan Surabaya 24.413 dan 24.414. Tujuan Divisi ini adalah mengajak seluruh anggota Gugus Depan 
                                    24.413 dan 24.414 melakukan kegiatan kewirausahaan sebagai penunjang 
                                    kegiatan di racana serta memberi bekal ilmu wirausaha pada setiap anggota 
                                    racana.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
