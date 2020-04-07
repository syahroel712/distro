<?php

namespace App\Http\Controllers;

use App\Helpers\MY_helpers;
use App\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukuran = Ukuran::orderBy('ukuran_harga', 'asc')->get();
        return view('ukuran/index', compact('ukuran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ukuran/create');
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
            'ukuran_nama' => 'required',
            'ukuran_harga' => 'required'
        ]);

        $data_ukuran = $request->all();

        $data_ukuran['ukuran_harga'] = MY_helpers::nilaiAsliRupiah($data_ukuran['ukuran_harga']);

        //return MY_helpers::nilaiAsliRupiah('ukuran_harga');
        //dd($request);

        //cara ketiga jika sudah panggil $fillable dimodel
        //Ukuran::create($request->all());
        Ukuran::create($data_ukuran);

        //kembalikan ke hal awal
        return redirect('/ukuran')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ukuran  $ukuran
     * @return \Illuminate\Http\Response
     */
    public function show(Ukuran $ukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ukuran  $ukuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Ukuran $ukuran)
    {
        return view('ukuran/edit', compact('ukuran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ukuran  $ukuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ukuran $ukuran)
    {
        //melakukan validasi
        $request->validate([
            'ukuran_nama' => 'required',
            'ukuran_harga' => 'required'
        ]);

        $data_ukuran = $request->all();

        $data_ukuran['ukuran_nama'] = $data_ukuran['ukuran_nama'];
        $data_ukuran['ukuran_harga'] = MY_helpers::nilaiAsliRupiah($data_ukuran['ukuran_harga']);


        //update pakai eloquent
        Ukuran::where('ukuran_id', $ukuran->ukuran_id)
            ->update([
                'ukuran_nama' => $data_ukuran['ukuran_nama'],
                'ukuran_harga' => $data_ukuran['ukuran_harga']
            ]);
        return redirect('/ukuran')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ukuran  $ukuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ukuran $ukuran)
    {
        /// fungsi hapus punya eloquent
        Ukuran::destroy($ukuran->ukuran_id);
        // kembalikan ke hal awal
        return redirect('/ukuran')->with('status', 'Data Berhasil Dihapus');
    }
}
