@extends('layout.master')
@section('title')
    Santri Page
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
                                <a href="{{ route('santri.create') }}" class="btn btn-primary" role="button">
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
                                    <th>NIS</th>
                                    <th>Nama Santri</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telp</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($santri as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->nis}}</td>
                                    <td>{{ $data->nama_santri }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->no_telp}}</td>
                                    <td>
                                        <a href="{{ route('santri.edit', $data->id) }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"> Edit</i></a>
                                        <form class="d-inline" action="{{ route('santri.destroy', $data->id) }}" role="alert"
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
