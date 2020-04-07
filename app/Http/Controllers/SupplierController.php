<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::orderBy('supplier_nama', 'asc')->get();
        return view('supplier/index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier/create');
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
            'supplier_nama' => 'required',
            'supplier_kontak' => 'required|min:10|max:15',
            'supplier_email' => 'sometimes|nullable|email',
            'supplier_alamat' => 'required'
        ]);

        //cara ketiga jika sudah panggil $fillable dimodel
        supplier::create($request->all());

        //kembalikan ke hal awal
        return redirect('/supplier')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier/edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //melakukan validasi
        $request->validate([
            'supplier_nama' => 'required',
            'supplier_kontak' => 'required|min:10|max:15',
            'supplier_email' => 'sometimes|nullable|email',
            'supplier_alamat' => 'required'
        ]);

        //update pakai eloquent
        Supplier::where('supplier_id', $supplier->supplier_id)
            ->update([
                'supplier_nama' => $request->supplier_nama,
                'supplier_kontak' => $request->supplier_kontak,
                'supplier_email' => $request->supplier_email,
                'supplier_alamat' => $request->supplier_alamat
            ]);
        return redirect('/supplier')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // fungsi hapus punya eloquent
        Supplier::destroy($supplier->supplier_id);
        // kembalikan ke hal awal
        return redirect('/supplier')->with('status', 'Data Berhasil Dihapus');
    }
}
