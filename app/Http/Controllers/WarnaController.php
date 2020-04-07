<?php

namespace App\Http\Controllers;

use App\Helpers\MY_helpers;
use App\Warna;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warna = Warna::orderBy('warna_nama', 'asc')->get();
        return view('warna/index', compact('warna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warna/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'warna_nama' => 'required',
            'warna_harga' => 'required'
        ]);

        $data_warna = $request->all();

        $data_warna['warna_harga'] = MY_helpers::nilaiAsliRupiah($data_warna['warna_harga']);

        //return MY_helpers::nilaiAsliRupiah('warna_harga');
        //dd($request);

        //cara ketiga jika sudah panggil $fillable dimodel
        //warna::create($request->all());
        Warna::create($data_warna);

        //kembalikan ke hal awal
        return redirect('/warna')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warna  $warna
     * @return \Illuminate\Http\Response
     */
    public function show(Warna $warna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warna  $warna
     * @return \Illuminate\Http\Response
     */
    public function edit(Warna $warna)
    {
        return view('warna/edit', compact('warna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warna  $warna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warna $warna)
    {
        //melakukan validasi
        $request->validate([
            'warna_nama' => 'required',
            'warna_harga' => 'required'
        ]);

        $data_warna = $request->all();

        $data_warna['warna_nama'] = $data_warna['warna_nama'];
        $data_warna['warna_harga'] = MY_helpers::nilaiAsliRupiah($data_warna['warna_harga']);


        //update pakai eloquent
        warna::where('warna_id', $warna->warna_id)
            ->update([
                'warna_nama' => $data_warna['warna_nama'],
                'warna_harga' => $data_warna['warna_harga']
            ]);
        return redirect('/warna')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warna  $warna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warna $warna)
    {
        /// fungsi hapus punya eloquent
        Warna::destroy($warna->warna_id);
        // kembalikan ke hal awal
        return redirect('/warna')->with('status', 'Data Berhasil Dihapus');
    }
}
