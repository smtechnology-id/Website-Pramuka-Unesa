@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(255, 165, 0, 0.7), rgba(255, 255, 255, 0.7));"></div>
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: #175789;">About Us</h1>
                <p class="lead " style="color: #175789;" font-weight: bold;>
                    Sekilas Tentang Pramuka Unesa
                </p>
            </div>
        </div>
    </div>
    {{-- Visi Misi --}}
    <div class="vision">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class=" font-weight-bold" style="color: #175789;">Visi</h1>
                    <!-- Updated class for better styling -->
                    <ul class="list-group list-group-flush">
                        <!-- Changed to remove default list styling -->
                        <li class="list-group-item mb-2"><i class="fas fa-check-circle text-success"></i>
                            Gerakan Pramuka Gugus Depan Surabaya 413-414 sebagai wadah pembinaan dan solusi handal
                            masalah-masalah kaum muda serta pengembangan ipteks yang mempunyai keuntungan kompetitif dan
                            komperatif dalam menghadapi tantangan zaman, berlandaskan iman dan taqwa kepada Tuhan YME.
                        </li>

                    </ul>
                    <hr class="my-4 border-primary"> <!-- Changed border color for better visibility -->
                    <h1 class=" font-weight-bold" style="color: #175789;">Misi</h1>
                    <!-- Updated class for better styling -->
                    <ul class="list-group list-group-flush">
                        <!-- Changed to remove default list styling -->
                        <li class="list-group-item mb-2"><i class="fas fa-check-circle text-success"></i> Membina
                            anggota gugus depan Surabaya 413-414 yang berjiwa dan berwatak Pramuka, berlandaskan iman
                            dan taqwa (IMTAQ) kepada Tuhan YME, serta selalu mengikuti perkembangan IPTEKS.</li>
                        <li class="list-group-item mb-2"><i class="fas fa-check-circle text-success"></i> Menggerakkan
                            anggota Gugus Depan Surabaya 413-414 dan organisasi Gerakan Pramuka agar peduli dan tanggap
                            terhadap masalah-masalah kemasyarakatan.</li>
                        <li class="list-group-item mb-2"><i class="fas fa-check-circle text-success"></i> Membentuk
                            kader bangsa patriot pembangunan yang memiliki jiwa bela Negara.</li>
                        <li class="list-group-item mb-2"><i class="fas fa-check-circle text-success"></i> Mencetak
                            Sarjana yang Sujana.</li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset('assets-landing/images/about-us/3.jpg') }}" alt="Visi Misi Pramuka Unesa"
                        class="img-fluid rounded shadow-lg" style="height: auto;">
                    <!-- Updated shadow class for better effect -->
                </div>
            </div>
        </div>
    </div>

    {{-- Sejarah --}}
    <div class="history mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class=" font-weight-bold text-center" style="color: #175789;">Sejarah</h1>
                    <!-- Updated class for better styling -->
                    <p class="lead text-black">
                        Gerakan Pramuka Gugus Depan Surabaya 413-414 yang berpangkalan di Kampus IKIP Surabaya yang
                        sekarang telah menjadi Universitas Negeri Surabaya didirikan pada tanggal 10 November 1982. Bumi
                        Perkemahan Sumberboto Jombang menjadi saksi bisu pengukuhan Gudep Surabaya 413-414 oleh Kak H.A.
                        Hudan Dardari (waktu itu sebagai Bupati Jombang) mewakili Ka. Kwarda Jawa Timur dan dipelopori
                        oleh Kak Ganet dan Kak Joko selaku mahasiswa IKIP Surabaya yang juga anggota Gugus Depan
                        Surabaya 413-414.
                    </p>
                    <p class="lead text-black">
                        Sebelum Gugus Depan Surabaya 413-414 lahir, di IKIP Surabaya telah terjadi aktivitas
                        kepramukaan, tetapi terbatas pada perkuliahan yaitu pada Mata Kuliah Dasar Umum (MKDU). Setelah
                        terbit surat keputusan bersama antara Ditjen Dikti, Depdikbud dan S.K. Kwarnas Gerakan Pramuka
                        tentang kerjasama dalam usaha Pembinaan dan Pengembangan Pendidikan Kepramukaan di Pergruan
                        Tinggi, barulah Gerakan Pramuka mendapat angin segar untuk berkibar di Perguruan Tinggi. Karena
                        besarnya minat mahasiswa pada saat itu (kurang dari 400 orang) dan didukung oleh beberapa
                        aktifis Pramuka, serta beberapa Dosen IKIP Surabaya.
                    </p>
                    <img src="{{ asset('assets-landing/images/about-us/4.jpg') }}" alt="Sejarah Pramuka Unesa"
                        class="img-fluid rounded shadow-lg" style="height: auto;">
                    <!-- Updated shadow class for better effect -->
                    <p class="lead text-black">
                        Sebelum Gugus Depan Surabaya 413-414 lahir, di IKIP Surabaya telah terjadi aktivitas
                        kepramukaan, tetapi terbatas pada perkuliahan yaitu pada Mata Kuliah Dasar Umum (MKDU). Setelah
                        terbit surat keputusan bersama antara Ditjen Dikti, Depdikbud dan S.K. Kwarnas Gerakan Pramuka
                        tentang kerjasama dalam usaha Pembinaan dan Pengembangan Pendidikan Kepramukaan di Pergruan
                        Tinggi, barulah Gerakan Pramuka mendapat angin segar untuk berkibar di Perguruan Tinggi. Karena
                        besarnya minat mahasiswa pada saat itu (kurang dari 400 orang) dan didukung oleh beberapa
                        aktifis Pramuka, serta beberapa Dosen IKIP Surabaya.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection