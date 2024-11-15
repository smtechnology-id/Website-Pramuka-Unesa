<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('LOGO PRAMUKA UNESA.png') }}">
    <meta name="description"
        content="Website Pramuka Unesa adalah website resmi Pramuka Unesa yang berisi informasi tentang Pramuka Unesa, organisasi, dan informasi lainnya.">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Website Pramuka Unesa</title>
</head>

<body style="background-color: #f8f9fa;">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light d-flex align-items-center justify-content-between"
            style="background-color: #175789; color: white;">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" alt="" srcset="" style="height: 80px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" style="margin-right: 100px;" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}" style="color: white;">Beranda <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" style="color: white;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organisasi') }}" style="color: white;">Organisasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="color: white;">
                            Informasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('berita') }}">Berita</a>
                            <a class="dropdown-item" href="{{ route('event') }}">Event</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pojokPembina') }}" style="color: white;">Pojok Pembina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pojokAnggota') }}" style="color: white;">Pojok Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diskusi') }}" style="color: white;">Diskusi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ranking') }}" style="color: white;">Ranking</a>
                    </li>
                    @if (Auth::check())

                    <li class="nav-item">
                        @php
                        $photo = Auth::user()->photo;
                        if ($photo != null) {
                        $photo = asset('storage/user/' . $photo);
                        } else {
                        $photo = asset('images/user.jpg');
                        }
                        @endphp
                        <div class="profile d-flex flex-row align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="color: white;">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" target="_blank" href="{{ route('user.dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" target="_blank" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                    <img src="{{ $photo }}" alt="" style="height: 30px; width: 30px; border-radius: 50%;">
            </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color: white;">Login</a>
            </li>
            @endif
            </ul>
    </div>
    </nav>
    @if (session('success'))
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">{{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">error</i></div>
        <div class="alert-content">
            <span class="alert-title">{{ session('error') }}</span>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">error</i></div>
        <div class="alert-content">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
    @endif
    @yield('content')

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted py-5" style="background-color: #175789; color: white; color: white;">
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" style="color: white;">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3" style="color: white;"></i>Website Pramuka Unesa
                        </h6>
                        <p>
                            Website Pramuka Unesa adalah website resmi Pramuka Unesa yang berisi informasi tentang Pramuka Unesa, organisasi, dan informasi lainnya.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" style="color: white;">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Social Media
                        </h6>
                        <p>
                            <a href="https://www.instagram.com/pramukaunesa/" class="text-reset">Instagram</a>
                        </p>
                        <p>
                            <a href="https://www.facebook.com/pramukaunesa/" class="text-reset">Facebook</a>
                        </p>
                        <p>
                            <a href="https://www.tiktok.com/@pramukaunesa" class="text-reset">Tiktok</a>
                        </p>
                        <p>
                            <a href="https://x.com/pramuka_unesa" class="text-reset">X</a>
                        </p>
                        <p>
                            <a href="https://www.youtube.com/@pramukaunesa" class="text-reset">YouTube</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="color: white;">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="{{ route('index') }}" class="text-reset">Beranda</a>
                        </p>
                        <p>
                            <a href="{{ route('about') }}" class="text-reset">About Us</a>
                        </p>
                        <p>
                            <a href="{{ route('organisasi') }}" class="text-reset">Organisasi</a>
                        </p>
                        <p>
                            <a href="{{ route('berita') }}" class="text-reset">Berita</a>
                        </p>
                        <p>
                            <a href="{{ route('event') }}" class="text-reset">Event</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="color: white;">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Jl. Ketintang, Ketintang, Kec. Gayungan, Surabaya, Jawa
                            Timur 60231</p>
                        <p>
                            <a href="mailto:pramuka@unesa.ac.id" class="text-reset">pramuka@unesa.ac.id</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); color: white;">
            © 2024
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>