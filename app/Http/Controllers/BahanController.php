<?php

namespace App\Http\Controllers;

use App\Helpers\MY_helpers;

use App\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::orderBy('bahan_harga', 'asc')->get();
        return view('bahan/index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan/create');
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
            'bahan_nama' => 'required',
            'bahan_harga' => 'required'
        ]);

        $data_bahan = $request->all();

        $data_bahan['bahan_harga'] = MY_helpers::nilaiAsliRupiah($data_bahan['bahan_harga']);

        //return MY_helpers::nilaiAsliRupiah('bahan_harga');
        //dd($request);

        //cara ketiga jika sudah panggil $fillable dimodel
        //bahan::create($request->all());
        Bahan::create($data_bahan);

        //kembalikan ke hal awal
        return redirect('/bahan')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahan $bahan)
    {
        return view('bahan/edit', compact('bahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahan $bahan)
    {
        //melakukan validasi
        $request->validate([
            'bahan_nama' => 'required',
            'bahan_harga' => 'required'
        ]);

        $data_bahan = $request->all();

        $data_bahan['bahan_nama'] = $data_bahan['bahan_nama'];
        $data_bahan['bahan_harga'] = MY_helpers::nilaiAsliRupiah($data_bahan['bahan_harga']);


        //update pakai eloquent
        bahan::where('bahan_id', $bahan->bahan_id)
            ->update([
                'bahan_nama' => $data_bahan['bahan_nama'],
                'bahan_harga' => $data_bahan['bahan_harga']
            ]);
        return redirect('/bahan')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        /// fungsi hapus punya eloquent
        Bahan::destroy($bahan->bahan_id);
        // kembalikan ke hal awal
        return redirect('/bahan')->with('status', 'Data Berhasil Dihapus');
    }
}
