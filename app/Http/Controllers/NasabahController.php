<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Rekening;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nasabah.index', [
            'nasabahs' => Nasabah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'hp' => ['required'],
            'jenis' => ['required'],
        ]);

        Nasabah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'jenis' => $request->jenis,
            'tgl_daftar' => now(),
        ]);

        return redirect('/nasabah')->with(['success' => 'Nasabah Baru Telah Ditambahkan']);
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
        return view('nasabah.edit', [
            'nasabah' => Nasabah::where('id', $id)->get()->first(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nasabah = Nasabah::where('id', $id)->get()->first();


        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'hp' => ['required'],
            'jenis' => ['required'],
        ]);

        $nasabah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'jenis' => $request->jenis,
        ]);
        return redirect('/nasabah')->with(['success' => 'Nasabah Telah Dihapus']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $nasabah = Nasabah::where('id', $id)->get()->first();
        // dd($nasabah);           
       $nasabah->delete();
    //   $nasabah->update([
        return redirect('/nasabah')->with(['success' => 'Nasabah Telah Dihapus']);
        
    // ]);
    }

    public function archieve(){
        return view('nasabah.archieve', [
           'nasabahs' => Nasabah::onlyTrashed()->get()  ,
        ]);
    }

    public function restore($id){
        Nasabah::onlyTrashed()->where('id', $id)->get()->first()->restore();



        return redirect('/archieve/nasabah');
        
    }


   
}
