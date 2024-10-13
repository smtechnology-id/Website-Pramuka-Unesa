@extends('layouts.app')

@section('active_event', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-12">
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
                        <h3>Form Pendaftaran</h3>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($statusPendaftaran == '0')
                                <form action="{{ route('user.event.register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" readonly>
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIM</label>
                                        <input type="text" class="form-control" name="nim" value="{{ auth()->user()->nim }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="birth_date" value="{{ auth()->user()->birth_date }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="birth_place" value="{{ auth()->user()->birth_place }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Motivasi Mengikuti Kegiatan</label>
                                        <textarea class="form-control" name="motivation" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </form>
                                @else
                                    <label for="" class="text-success">Anda Sudah Pernah Melakukan Pendaftaran pada Event ini</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection