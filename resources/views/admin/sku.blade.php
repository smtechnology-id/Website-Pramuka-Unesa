@extends('layouts.app')
@section('title', 'Uji SKu')
@section('active_sku', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Uji SKU - Syarat Kecakapan Umum</h5>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable1">
                        <thead>
                            <tr class="text-center align-middle">
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Peserta</th>
                                <th rowspan="2">NIM</th>
                                <th colspan="4" class="text-center">Uji SKU</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Lulus</th>
                                <th>Tidak Lulus</th>
                                <th>Perlu di Validasi</th>
                                <th>Belum Uji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nim }}</td>
                                <td class="text-center"> <span class="badge bg-success" style="font-size: 14px">{{ $sku->where('user_id', $item->id)->where('status', 'lulus')->count() }}</span></td>
                                <td class="text-center"> <span class="badge bg-danger" style="font-size: 14px">{{ $sku->where('user_id', $item->id)->where('status', 'tidak lulus')->count() }}</span></td>
                                <td class="text-center"> <span class="badge bg-warning" style="font-size: 14px">{{ $sku->where('user_id', $item->id)->where('status', 'pending')->count() }}</span></td>
                                <td class="text-center"> <span class="badge badge-secondary" style="font-size: 14px">@php
                                    $total = 24;
                                    echo $total - $sku->where('user_id', $item->id)->where('status', 'lulus')->count() - $sku->where('user_id', $item->id)->where('status', 'tidak lulus')->count() - $sku->where('user_id', $item->id)->where('status', 'pending')->count();
                                @endphp</span></td>
                                <td>
                                    <a href="{{ route('admin.sku.detail', $item->id) }}" class="btn btn-sm btn-warning">Detail</a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <hr>

    </div>
</div>
@endsection