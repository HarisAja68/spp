@extends('layout.master')
@section('title')
    History Pembayaran
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Santri</th>
                                    <th>Nama Petugas</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Untuk Bulan</th>
                                    <th>Untuk Tahun</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->santri->nis}}</td>
                                    <td>{{ $value->santri->nama_santri }}</td>
                                    <td>{{ $value->petugas->nama_petugas }}</td>
                                    <td>{{ $value->tanggal_bayar }}</td>
                                    <td>{{ $value->bulan_bayar}}</td>
                                    <td>{{ $value->tahun_bayar}}</td>
                                    <td>{{ $value->jumlah_bayar}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $roles->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
