<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->Pembayaran = new Pembayaran();
    }

    public function index()
    {
        $data = Santri::orderBy('nis')->get();
        return view('pembayaran.index', compact('data'));
    }

    public function bayar($nis)
    {
        $santri = Santri::orderBy('nis')
            ->where('nis', $nis)
            ->first();
        return view('pembayaran.bayar', compact('santri'));
    }

    public function prosesBayar(Request $request, $nis)
    {
        $petugas = Petugas::where('user_id', Auth::user()->id)
            ->first();

        $pembayaran = Pembayaran::whereIn('bulan_bayar', $request->bulan_bayar)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->where('santri_id', $request->santri_id)
            ->pluck('bulan_bayar')
            ->toArray();

        if (!$pembayaran) {
            DB::transaction(function () use ($request, $petugas) {
                foreach ($request->bulan_bayar as $bulan) {
                    Pembayaran::create([
                        'kode_pembayaran' => 'SPPR' . Str::upper(Str::random(5)),
                        'petugas_id' => $petugas->id,
                        'santri_id' => $request->santri_id,
                        'tanggal_bayar' => Carbon::now('Asia/Jakarta'),
                        'tahun_bayar' => $request->tahun_bayar,
                        'bulan_bayar' => $bulan,
                        'jumlah_bayar' => $request->jumlah_bayar,
                    ]);
                }
            });

            return redirect()->route('pembayaran.history');
        } else {
            // return back()
            //     ->with('error', 'Siswa Dengan Nama : ' . $request->nama_siswa . ' , NISN : ' .
            //         $request->nisn . ' Sudah Membayar Spp di bulan yang diinput (' .
            //         implode($pembayaran, ',') . ")" . ' , di Tahun : ' . $request->tahun_bayar . ' , Pembayaran Dibatalkan');
        }
    }

    public function history()
    {
        $data = Pembayaran::with(['petugas', 'santri'])
            ->latest()->get();
        return view('pembayaran.history', compact('data'));
    }
}
