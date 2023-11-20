<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTabungan;

class JenisTabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenisTabungan', [
            'jenistabungans' => JenisTabungan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisTabungan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_tabungan' => ['required'],
            'keterangan' => ['required'],
        ]);

        JenisTabungan::create([
            'nama_jenis_tabungan' => $request->nama_jenis_tabungan,
            'keterangan' => $request->keterangan,
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
        $jenis = JenisTabungan::where('id', $id)->first()->get();

        return view('jenisTabungan.edit', [$jenis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis = JenisTabungan::where('id', $id)->first()->get();

        $request->validate([
            'nama_jenis_tabungan' => ['required'],
            'keterangan' => ['required'],
        ]);

        $jenis->update([
            'nama_jenis_tabungan' => $request->nama_jenis_tabungan,
            'keterangan' => $request->keterangan,
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = JenisTabungan::where('id', $id)->first()->get();
        
    }
}
