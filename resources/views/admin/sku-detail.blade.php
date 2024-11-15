@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail User</h5>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <th>:</th>
                            <td>{{ $user->nim }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-md-6 text-center">
                    @if ($user->photo)
                        <img src="{{ asset('storage/user/' . $user->photo) }}" alt="" class="img-fluid" style="width: 100px; height: 100px; border-radius: 50%;">
                    @else
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="" class="img-fluid" style="width: 100px; height: 100px; border-radius: 50%;">
                    @endif
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr>
                            <th>Jumlah SKU Lulus</th>
                            <th>:</th>
                            <td>{{ $sku->where('user_id', $user->id)->where('status', 'lulus')->count() }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Tidak Lulus</th>
                            <th>:</th>
                            <td>{{ $sku->where('user_id', $user->id)->where('status', 'tidak lulus')->count() }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Perlu Diperiksa</th>
                            <th>:</th>
                            <td>{{ $sku->where('user_id', $user->id)->where('status', 'pending')->count() }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Belum Lulus</th>
                            <th>:</th>
                            <td>{{ 24 - $sku->where('user_id', $user->id)->where('status', 'lulus')->count() - $sku->where('user_id', $user->id)->where('status', 'tidak lulus')->count() - $sku->where('user_id', $user->id)->where('status', 'pending')->count() }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>SKU</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
