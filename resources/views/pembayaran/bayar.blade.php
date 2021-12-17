@extends('layout.master')
@section('title')
    Tambah Pembayaran
@endsection
@push('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('template') }}/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{ asset('template') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <a href="/pembayaran" class="btn btn-danger btn-sm">
                        <i class="fas fa-window-close fa-fw"></i>
                          BATALKAN
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pembayaran.proses-bayar', $santri->nis) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="nisn">NIS</label>
                                        <input required="" type="hidden" name="santri_id" value="{{ $santri->id }}" readonly id="santri_id" class="form-control">
                                        <input required="" type="text" name="nisn" value="{{ $santri->nis }}" readonly id="nisn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa:</label>
                                        <input required="" type="text" name="nama_siswa" value="{{ $santri->nama_santri }}" readonly id="nama_siswa" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="tahun_bayar">Untuk Tahun:</label>
                                        <input type="number" class="form-control" name="tahun_bayar" id="tahun_bayar">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="jumlah_bayar" id="nominal_spp_label">Nominal Spp/bulan:</label>
                                        <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group select2-purple">
                                        <label for="bulan_bayar">Untuk Bulan:</label>
                                        <select required="" name="bulan_bayar[]" id="bulan_bayar" class="select2" multiple="multiple" data-dropdown-css-class="select2-purple" data-placeholder="Pilih Bulan" style="width: 100%;">
                                            @foreach(Universe::bulanAll() as $bulan)
                                                <option value="{{ $bulan['nama_bulan'] }}">{{ $bulan['nama_bulan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="total_bayar">Total Bayar:</label>
                                        <input required="" type="" name="total_bayar" readonly="" id="total_bayar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i>
                                    KONFIRMASI
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<!-- Select2 -->
<script src="{{ asset('template') }}/plugins/select2/js/select2.full.min.js"></script>
<script>
	//Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    function rupiah(number) {
    	var formatter = new Intl.NumberFormat('ID', {
    		style: 'currency',
    		currency: 'idr',
    	})

    	return formatter.format(number)
    }

    $(document).on("change", "#bulan_bayar", function(){
    	var bulan = $(this).val()
    	var total_bulan = bulan.length
    	var total_bayar = $("#jumlah_bayar").val()
    	var hasil_bayar = (total_bulan * total_bayar)

    	var formatter = new Intl.NumberFormat('ID', {
    		style: 'currency',
    		currency: 'idr',
    	})

    	$("#total_bayar").val(formatter.format(hasil_bayar))
    })

</script>
@endpush
