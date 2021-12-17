@extends('layout.master')
@section('title')
    Pembayaran Page
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
                                    <th>NO</th>
                                    <th>NIS</th>
                                    <th>Nama Santri</th>
                                    <th>Alamat</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->nis}}</td>
                                    <td>{{ $value->nama_santri }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran.bayar', $value->nis) }}"class="btn btn-primary btn-sm ml-2">
                                            <i class="fas fa-money-check"></i> BAYAR
                                        </a>
                                    </td>
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
