<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santri = Santri::all();
        return view('santri.index', compact('santri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $santri = $request->validate([
            'nis' => 'required|unique:santri,nis',
            'nama_santri' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ]);

        $santri = new Santri;
        $santri->nis = $request->nis;
        $santri->nama_santri = $request->nama_santri;
        $santri->alamat = $request->alamat;
        $santri->jenis_kelamin = $request->jenis_kelamin;
        $santri->no_telp = $request->no_telp;

        $santri->save();
        return redirect('santri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $santri = Santri::find($id);
        return view('santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $santri = Santri::find($id);
        $santri->nis = $request->nis;
        $santri->nama_santri = $request->nama_santri;
        $santri->alamat = $request->alamat;
        $santri->jenis_kelamin = $request->jenis_kelamin;
        $santri->no_telp = $request->no_telp;

        $santri->update();
        return redirect('santri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Santri::destroy($id);
        return redirect('santri');
    }
}
