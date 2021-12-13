@extends('layout.master')
@section('title')
    Petugas Edit
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Petugas Edit</h3>
                    </div>
                    <form action="{{ route('petugas.update', $data) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode Petugas</label>
                                <input name="kode_petugas" class="form-control  @error('kode_petugas') is-invalid @enderror" value="{{ $data->kode_petugas }}" readonly>
                                @error('kode_petugas')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>nama Petugas</label>
                                <input name="nama_petugas" class="form-control  @error('nama_petugas') is-invalid @enderror" value="{{ $data->nama_petugas }}">
                                @error('nama_petugas')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input name="no_telp" class="form-control" value="{{ $data->no_telp }}">
                                @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('petugas.index') }}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> kembali</a>
                        </div>
                    </form>
                </div>
            <div class="col-md-6">
        </div>
    </div>
</section>

@endsection
