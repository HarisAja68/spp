@extends('layout.master')
@section('title')
    Petugas Page
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('petugas.create') }}" class="btn btn-primary" role="button">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kode Petugas</th>
                                    <th>Nama Petugas</th>
                                    <th>No Telp</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->kode_petugas}}</td>
                                    <td>{{ $data->nama_petugas}}</td>
                                    <td>{{ $data->no_telp}}</td>
                                    <td>
                                        <a href="{{ route('petugas.edit', $data->id) }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"> Edit</i></a>
                                        <form class="d-inline" action="{{ route('petugas.destroy', $data->id) }}" role="alert"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash-alt"></i>
                                                Delete</button>
                                        </form>
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
