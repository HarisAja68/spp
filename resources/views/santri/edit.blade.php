@extends('layout.master')
@section('title')
    Santri Create
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Santri Create</h3>
                    </div>
                    <form action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIS</label>
                                <input name="nis" class="form-control  @error('nis') is-invalid @enderror" value="{{ $santri->nis }}" readonly>
                                @error('nis')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Santri</label>
                                <input name="nama_santri" class="form-control  @error('nama_santri') is-invalid @enderror" value="{{ $santri->nama_santri }}" >
                                @error('nama_santri')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control  @error('alamat') is-invalid @enderror" value="{{ $santri->alamat }}" >
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input name="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" value="{{ $santri->jenis_kelamin }}" >
                                @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input name="no_telp" class="form-control" value="{{ $santri->no_telp }}" >
                                @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <div class="alert alert-danger">{{$message}}</div>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('santri.index') }}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> kembali</a>
                        </div>
                    </form>
                </div>
            <div class="col-md-6">
        </div>
    </div>
</section>

@endsection
