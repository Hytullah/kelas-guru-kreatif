<?php

namespace App\Http\Controllers;

use App\Models\Pppk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.layouts.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.tambah-soal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pppk::create([
            'no' => $request->no,
            'jenis_soal' => $request->jenis_soal,
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
            'durasi_waktu' => $request->durasi_waktu,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_e' => $request->jawaban_e
        ]);
        return redirect('datapppk')->with('success', 'Data Berhasil ditambahkan');
    }

    public function datapppk()
    {
        $dtPppk = Pppk::all();
        return view('admin.layouts.datapppk', compact('dtPppk'));
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
    public function edit($id)
    {

        $soalp3k = Pppk::findorfail($id);
        return view('admin.layouts.edit-soal', compact('soalp3k'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $soalp3k = Pppk::findorfail($id);
        $soalp3k->update($request->all());
        return redirect('datapppk')->with('toast_info', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soalp3k = Pppk::findorfail($id);
        $soalp3k->delete();
        return back()->with('success', 'Data Berhasil diHapus');
    }
}
