@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(255, 165, 0, 0.7), rgba(255, 255, 255, 0.7));"></div>
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: #175789;">Karya Pembina</h1>
                <p class="lead " style="color: #175789;" font-weight: bold;>
                    Karya Pembina Terbaru Dari UMK Pramuka Unesa
                </p>
            </div>
        </div>
    </div>

    {{-- Berita --}}
    <div class="berita">
        <div class="container">
            <div class="row">
                @foreach ($mentorWork as $item)
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body" style="background-color: #d16223;">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/mentor-work/' . $item->photo) }}" alt="" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <h5 style="color: white;">{{ $item->title }}</h5>
                                    <p style="color: white;">By {{ $item->user->name }}</p>
                                    <p style="color: white;">{!! Str::limit($item->content, 200) !!}</p>
                                    <a href="{{ route('mentor-work.show', $item->slug) }}" class="btn" style="background-color: #d16223; border-color: #fff; color: white;">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>  
</div>
@endsection