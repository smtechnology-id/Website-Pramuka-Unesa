@extends('layouts.app')
@section('title', 'Uji SKu')
@section('active_sku', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Uji SKU - Syarat Kecakapan Umum</h5>
            <hr>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Peserta</th>
                            <th>:</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Lulus</th>
                            <th>:</th>
                            <td><span class="badge bg-success">{{ $sku->where('status', 'lulus')->count() }}</span></td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Tidak Lulus</th>
                            <th>:</th>
                            <td><span class="badge bg-danger">{{ $sku->where('status', 'tidak lulus')->count() }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Sedang Divalidasi</th>
                            <th>:</th>
                            <td><span class="badge bg-warning">{{ $sku->where('status', 'pending')->count() }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah SKU Belum Dikerjakan</th>
                            <th>:</th>
                            <td>@php
                                $total_sku = 24;
                                $total_lulus = $sku->where('status', 'lulus')->count();
                                $total_tidak_lulus = $sku->where('status', 'tidak lulus')->count();
                                $total_pending = $total_sku - $total_lulus - $total_tidak_lulus - $sku->where('status',
                                'pending')->count();
                                echo '<span class="badge bg-light text-dark">'.$total_pending.'</span>';
                                @endphp</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="row ">
                                <div class="col">
                                    SKU 1
                                </div>
                                <div class="col">
                                    @if ($sku->where('no_sku', '1')->first())
                                    @if ($sku->where('no_sku', '1')->first()->status == 'lulus')
                                    <span class="badge bg-success"> ✔ (Lulus)</span>
                                    @elseif ($sku->where('no_sku', '1')->first()->status == 'tidak lulus')
                                    <span class="badge bg-danger"> ✘ (Tidak Lulus)</span>
                                    @elseif ($sku->where('no_sku', '1')->first()->status == 'pending')
                                    <span class="badge bg-warning"> Sedang Divalidasi</span>
                                    @endif
                                    @else
                                    <span class="badge badge-light text-dark"> Belum Dikerjakan</span>
                                    @endif
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if (!$sku->where('no_sku', '1')->first())
                            <form action="{{ route('user.sku.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="no_sku" value="1">
                                <div class="form-group mb-3">
                                    <label for="file">Submit SKU <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            @endif
                            @if ($sku->where('no_sku', '1')->first())
                            @if ($sku->where('no_sku', '1')->first()->status == 'pending')
                            <div class="alert alert-warning">
                                SKU 1 Sedang Di validasi Oleh Pembina, <a target="_blank"
                                    href="{{ Storage::url('sku/' . $sku->where('no_sku', '1')->first()->file) }}">File</a>
                            </div>
                            @endif
                            @if ($sku->where('no_sku', '1')->first()->status == 'lulus')
                            <div class="alert alert-success">
                                SKU 1 Telah Lulus
                            </div>
                            @endif
                            @if ($sku->where('no_sku', '1')->first()->status == 'tidak lulus')
                            <div class="alert alert-danger">
                                SKU 1 Tidak Lulus, Silahkan Coba Lagi
                            </div>
                            <form action="{{ route('user.sku.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="no_sku" value="1">
                                <input type="hidden" name="id" value="{{ $sku->where('no_sku', '1')->first()->id }}">
                                <div class="form-group mb-3">
                                    <label for="file">Submit SKU <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            @endif
                            @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="islam-tab" data-bs-toggle="tab"
                                        data-bs-target="#islam" type="button" role="tab" aria-controls="islam"
                                        aria-selected="true">Islam</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="katolik-tab" data-bs-toggle="tab"
                                        data-bs-target="#katolik" type="button" role="tab" aria-controls="katolik"
                                        aria-selected="false">Katolik</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="protestan-tab" data-bs-toggle="tab"
                                        data-bs-target="#protestan" type="button" role="tab" aria-controls="protestan"
                                        aria-selected="false">Protestan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="hindu-tab" data-bs-toggle="tab" data-bs-target="#hindu"
                                        type="button" role="tab" aria-controls="hindu"
                                        aria-selected="false">Hindu</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="budha-tab" data-bs-toggle="tab" data-bs-target="#budha"
                                        type="button" role="tab" aria-controls="budha"
                                        aria-selected="false">Budha</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="islam" role="tabpanel"
                                    aria-labelledby="islam-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Pandega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="6">1</td>
                                                <td rowspan="6">Islam</td>
                                                <td>
                                                    Dapat menjelaskan makna rukun iman, rukun islam, dan ihsan serta
                                                    memberikan
                                                    contohnya dalam
                                                    bentuk tulisan.
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Dapat menjelaskan makna rukun iman, rukun islam, dan ihsan serta
                                                    memberikan
                                                    contohnya dalam
                                                    bentuk tulisan.
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Islam
                                                     Dapat menjelaskan makna rukun iman, rukun islam, dan ihsan serta
                                                    memberikan contohnya dalam
                                                    bentuk tulisan.

                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Dapat merawat jenazah</td>
                                            </tr>
                                            <tr>

                                                <td>Dapat menjelaskan perbedaan zakat fitrah dan zakat mal serta dapat
                                                    menghitung nisab zakat mal
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Dapat menafsirkan ayat al-quran dan haidst secara tematik serta
                                                    dapat
                                                    menjelaskanya
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="katolik" role="tabpanel" aria-labelledby="katolik-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Pandega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="6">1</td>
                                                <td rowspan="6">Katolik</td>
                                                <td>
                                                    Dapat menyebut dan menghayati 5 (lima) pondasi hidup gereja :
                                                    bersekutu, beribadah, mendalami imam, saling
                                                    melayani, dan bersaksi

                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Dapat menjelaskan dan mendeskripsikan hierarki gereja dalam
                                                    bentuk tulisan
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="protestan" role="tabpanel"
                                    aria-labelledby="protestan-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Pandega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="6">1</td>
                                                <td rowspan="6">Protestan</td>
                                                <td>
                                                    Dapat menyanyikan minimal 6 lagugerejani dan memimpin
                                                    nyanyian gerejani
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat memimpin doa
                                                    dalam pertemuan satuannya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat memimpin suatu kelompok dalam
                                                    mempelajari Al kitab
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat membantu seorang calon siaga atau calon penggalang sampai
                                                    memenuhi SKU untuk Pramuka golongan siaga tingkat siaga mula atau
                                                    golongan penggalang tingkat penggalang ramu dibidang pendidikan
                                                    agama
                                                    protestan

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="hindu" role="tabpanel" aria-labelledby="hindu-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Pandega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="8">1</td>
                                                <td rowspan="8">Hindu</td>
                                                <td>
                                                    Dapat menjelaskan korelasi konsep kepemimpinan hindu dengan
                                                    kepemimpinan modern dalam bentuk
                                                    tulisan

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat menjelaskan fungsi dharma gita sebagai bentuk pemantapan
                                                    sradha dan bhakti umat dalam bentuk tulisan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Berperan aktif dalam upaya pengembangan dharma gita di masyarakat
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Berperan aktif dalam upaya pengembangan ajaran yoga menuju
                                                    masyarakat sehat secara fisik maupun
                                                    mental

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Mempu menjelaskan konsep catur asrama dalam bentuk tulisan

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat menjelaskan makna dan fungsi dari 5 elemen panca bhuwana dalam
                                                    bentuk tulisan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Aktif dimasyarakat dalam pelaksanaan meditas
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Berpera aktif dalam upaya peningkatan pengetahuan keagamaan hindu
                                                    ditingkat siaga dan penggalang (konsep brahmacaria)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="budha" role="tabpanel" aria-labelledby="budha-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Pandega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="8">1</td>
                                                <td rowspan="8">Budha</td>
                                                <td>
                                                    Menyebutkan bagian- bagian dari kitab suci tripitakan bagian sutta
                                                    dan abhiddhamma
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dapat menjelaskan pengertian sila dan manfaat melaksanakan sila
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Mempraktikkan Latihan athasila setiap hari uposatha
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Melatih meditasi vippasana pagi dan sore
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    (1)Dapat memimpin dan mengorganisir kebaktian (pagi dan sore) aerta
                                                    perayaan hari-hari besar buddha (2) dapat membimbing cara membaca/
                                                    melafalkan paritta- paritta suci kepada pramuka penggalang sampai
                                                    mencapai penggalang ramu
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @foreach ($sku_items as $sku_item)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $sku_item['no'] }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sku{{ $sku_item['no'] }}" aria-expanded="false"
                            aria-controls="sku{{ $sku_item['no'] }}">
                            <div class="row ">
                                <div class="col">
                                    SKU {{ $sku_item['no'] }}
                                </div>
                                <div class="col">
                                    @if ($sku->where('no_sku', $sku_item['no'])->first())
                                    @if ($sku->where('no_sku', $sku_item['no'])->first()->status == 'lulus')
                                    <span class="badge bg-success"> ✔ (Lulus)</span>
                                    @elseif ($sku->where('no_sku', $sku_item['no'])->first()->status == 'tidak lulus')
                                    <span class="badge bg-danger"> ✘ (Tidak Lulus)</span>
                                    @elseif ($sku->where('no_sku', $sku_item['no'])->first()->status == 'pending')
                                    <span class="badge bg-warning"> Sedang Divalidasi</span>
                                    @endif
                                    @else
                                    <span class="badge badge-light text-dark"> Belum Dikerjakan</span>
                                    @endif
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="sku{{ $sku_item['no'] }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $sku_item['no'] }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pandega</th>
                                        <th>Submit SKU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $sku_item['no'] }}</td>
                                        <td>{{ $sku_item['question'] }}</td>
                                        <td>
                                            @if ($sku->where('no_sku', $sku_item['no'])->first())
                                            @if ($sku->where('no_sku', $sku_item['no'])->first()->status == 'lulus')
                                            <span class="badge bg-success"> SKU {{ $sku_item['no'] }} Lulus </span>
                                            @elseif ($sku->where('no_sku', $sku_item['no'])->first()->status == 'tidak lulus')
                                            <span class="badge bg-danger"> SKU {{ $sku_item['no'] }} Tidak Lulus, Silahkan Coba Lagi</span>
                                            <form action="{{ route('user.sku.update') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="no_sku" value="{{ $sku_item['no'] }}">
                                                <input type="hidden" name="id"
                                                    value="{{ $sku->where('no_sku', $sku_item['no'])->first()->id }}">
                                                <input type="file" name="file" class="form-control" required>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            @elseif ($sku->where('no_sku', $sku_item['no'])->first()->status ==
                                            'pending')
                                            <span class="badge bg-warning"> SKU {{ $sku_item['no'] }} Sedang
                                                Divalidasi</span>
                                            @endif
                                            @else
                                            <form action="{{ route('user.sku.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="no_sku" value="{{ $sku_item['no'] }}">
                                                <input type="file" name="file" class="form-control" required>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection