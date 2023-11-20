<?php

namespace App\Http\Controllers;

use App\Models\JenisTabungan;
use App\Models\Nasabah;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Rules\valid_id;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'rekening.index',
            [
                'rekenings' => Rekening::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekening.create', [
            'jenistabungans' => JenisTabungan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
// dd($request);
        $request->validate([
            'id_nasabah' => ['required', new valid_id],
            'id_jenis_tabungan' => ['required'],
        ]);

        $isvalid_id = Nasabah::where('id', $request->id_nasabah)->get()->first();
        if(! $isvalid_id) return back()->withErrors(['id' => 'Id tidak ditemukan']);

        $no_rek = rand(1, 999999999);

        //  dd($no_rek);
        Rekening::create([
            'id_nasabah' => $request->id_nasabah,
            'id_jenis_tabungan' => $request->id_jenis_tabungan,
            'no_rek' => rand(1, 999999999),
            'tgl_aktif' => now(),
            'status' => 1,
        ]);

        return redirect('/rekening')->with(['success' =>'Data berhasil ditambah']);

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
        $rekening = Rekening::where('id', $id)->get()->first();
        

        return view('rekening.edit', [
            'rekening' => $rekening,
            'jenistabungans' => JenisTabungan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $rekening = Rekening::where('id', $id)->get()->first();


        $request->validate([
            'id_nasabah' => ['required'],
            'id_jenis_tabungan' => ['required'],
        ]);


        $no_rek = random_int(1, 999999999);
        $rekening->update([
            'no_rek' => $no_rek,
            'id_nasabah' => $request->id_nasabah,
            'id_jenis_tabungan' => $request->id_jenis_tabungan,
        ]);

        return redirect('/rekening')->with(['success' =>'Data berhasil ditambah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rekening = Rekening::where('id', $id)->get()->first();
//dd($rekening);
        $rekening->delete();


        return redirect('/rekening')->with(['success' => 'Berhasil Dimasukan Ke folder sampah']);
    }

    public function archieve(){
        return view('rekening.archieve', [
           'rekenings' => Rekening::onlyTrashed()->get()  ,
        ]);
    }

    public function restore($id){
        Rekening::onlyTrashed()->where('id', $id)->get()->first()->restore();



        return redirect('/archieve/rekening');
        
    }
}
