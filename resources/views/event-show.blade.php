@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('storage/event/' . $event->photo) }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div> <!-- Overlay hitam -->
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: white;">Berita</h1>
                <p class="lead text-white">
                    {{ $event->title }}
                </p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8">
                    <h1>{{ $event->title }}</h1>
                    <img src="{{ asset('storage/event/' . $event->photo) }}" alt="{{ $event->title }}" style="width: 100%; height: 500px; margin-top: 20px; margin-bottom: 20px;">
                    <p>{!! $event->content !!}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Link pendaftaran --}}
    <div class="link-pendaftaran">
        <div class="container">
            <h3>Link Pendaftaran</h3>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $event->link_pendaftaran }}" class="btn btn-primary" style="background-color: #175789; color: white;">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection