<?php

namespace App\Http\Controllers;

use App\Models\JenisTabungan;
use App\Models\JenisTransaksi;
use Illuminate\Http\Request;

class JenisTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenisTransaksi.index', [
            'jenistransaksis' => JenisTransaksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisTransaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_transaksi' => ['required'],
            'keterangan' => ['required'],
            'menambah_saldo' => ['required'],
        ]);

        JenisTransaksi::create([
            'nama_transaksi' => $request->nama_transaksi,
            'keterangan' => $request->keterangan,
            'menambah_saldo' => $request->menambah_saldo,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('jenisTransaksi.edit', [
            'jenistransaksi' => JenisTransaksi::where('id', $id)->first()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenistransaksi = JenisTransaksi::where('id', $id)->first()->get();
        $request->validate([
            'nama_transaksi' => ['required'],
            'keterangan' => ['required'],
            'menambah_saldo' => ['required'],
        ]);

        $jenistransaksi->update([
            'nama_transaksi' => $request->nama_transaksi,
            'keterangan' => $request->keterangan,
            'menambah_saldo' => $request->menambah_saldo,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenistransaksi = JenisTransaksi::where('id', $id)->first()->get();
        
        $jenistransaksi->delete();
    }
}
