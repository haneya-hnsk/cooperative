<?php

namespace App\Http\Controllers;

use App\Models\JenisTabungan;
use App\Models\JenisTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi.index', [
            'transaksis' => Transaksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create', [
            'jenistransaksis' => JenisTransaksi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rek' =>['required'],
            'id_jenis_transaksi' =>['required'],
            'nominal' =>['required'],
            'keterangan' =>['required'],
        ]);

        $transaksi = Transaksi::create([
            'no_rek' =>$request->no_rek,
            'id_jenis_transaksi' =>$request->id_jenis_transaksi,
            'nominal' =>$request->nominal,
            'keterangan' =>$request->keterangan,
        ]);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::where('id', $id)->get()->first();

        $transaksi->delete();

        return redirect('/transaksi')->with(['succcess' => 'Transaksi dimasukan ke arsip']);
    }

    public function archieve(){
        return view('transaksi.archieve', [
           'transaksis' => Transaksi::onlyTrashed()->get()  ,
        ]);
    }

    public function restore($id){
        Transaksi::onlyTrashed()->where('id', $id)->get()->first()->restore();



        return redirect('/archieve/transaksi')->with(['success' => 'Data berhasil dikembalikan']);
        
    }

    public function forcedelete($id){
        Transaksi::onlyTrashed()->where('id', $id)->get()->first()->restore();



        return redirect('/archieve/transaksi')->with(['success' => 'Data berhasil dihapus total']);
    }

}
