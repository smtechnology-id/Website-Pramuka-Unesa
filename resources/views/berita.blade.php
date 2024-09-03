@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(255, 165, 0, 0.7), rgba(255, 255, 255, 0.7));"></div>
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: #175789;">Berita</h1>
                <p class="lead " style="color: #175789;" font-weight: bold;>
                    Berita Terbaru Tentang Pramuka Unesa
                </p>
            </div>
        </div>
    </div>

    {{-- Berita --}}
    <div class="berita">
        <div class="container">
            <div class="row">
                @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <!-- Added mb-4 for spacing between cards -->
                    <div class="card h-100" style="background-color: #d16223;">
                        <!-- Added h-100 for equal height cards -->
                        <img src="{{ asset('storage/news/' . $item->photo) }}" class="card-img-top" alt="..."
                            style="height: 200px; object-fit: cover; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <!-- Added d-flex and flex-column for better layout -->
                            <h5 class="card-title" style="color: white;">{{ $item->title }}</h5>
                            <p class="card-text" style="color: white;">By {{ $item->author }}</p>
                            <p class="card-text flex-grow-1" style="color: white;">{!! Str::limit($item->content, 100) !!}</p>
                            <a href="{{ route('news.show', $item->slug) }}"
                                class="btn mt-2" style="background-color: #d16223; border-color: #fff; color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>  
</div>
@endsection