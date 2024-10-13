<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Pppk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    // public function soal(Request $request)
    // {
    //     $totalSoal = Pppk::count();
    //     $dtSoal = Pppk::paginate(1);
    //     $allSoal = Pppk::all();
    //     $currentPage = $request->get('page', 1);
    //     $jawabanTerkirim = Jawab::where('user_id', auth()->user()->id)->pluck('soal_id')->toArray();

    //     // Memuat jawaban pengguna yang sudah ada dalam session
    //     $jawabanUser = Session::get('jawaban_user', []);

    //     return view('layouts.soal', compact('dtSoal', 'totalSoal', 'jawabanTerkirim', 'jawabanUser', 'allSoal', 'currentPage'));
    // }


    // public function soal(Request $request)
    // {
    //     $paketOptions = Pppk::select('paket')->distinct()->get();

    //     $paket = $request->get('paket', "paket 1");

    //     // Filter soal berdasarkan paket yang dipilih
    //     $totalSoal = Pppk::where('paket', $paket)->count();
    //     $dtSoal = Pppk::where('paket', $paket)->paginate(1);
    //     $allSoal = Pppk::where('paket', $paket)->get();
    //     $currentPage = $request->get('page', 1);
    //     $jawabanTerkirim = Jawab::where('user_id', auth()->user()->id)->pluck('soal_id')->toArray();

    //     // Memuat jawaban pengguna yang sudah ada dalam session
    //     $jawabanUser = Session::get('jawaban_user', []);

    //     return view('layouts.soal', compact('dtSoal', 'totalSoal', 'jawabanTerkirim', 'jawabanUser', 'allSoal', 'currentPage', 'paket', 'paketOptions'));
    // }




    // public function soalTeknis(Request $request)
    // {
    //     $paket = "paket teknis"; // Paket teknis
    //     $totalSoal = Pppk::where('paket', $paket)->count();
    //     $nomorSoal = $request->get('nomor', 1);
    //     $dtSoal = Pppk::where('paket', $paket)
    //         ->where('no', $nomorSoal)
    //         ->get();
    //     $allSoal = Pppk::where('paket', $paket)->get();
    //     $jawabanTerkirim = Jawab::where('user_id', auth()->user()->id)->pluck('soal_id')->toArray();
    //     $jawabanUser = Session::get('jawaban_user', []);

    //     return view('layouts.soal', compact('dtSoal', 'totalSoal', 'jawabanTerkirim', 'jawabanUser', 'allSoal', 'nomorSoal', 'paket'));
    // }

    public function soal(Request $request)
    {
        $paketOptions = Pppk::select('paket')->distinct()->get();
        $paket = $request->get('paket', "paket 1");

        $jumlahTeknis = Pppk::where('paket', $paket)->where('jenis_soal', 'Teknis')->count();
        $jumlahManajerial = Pppk::where('paket', $paket)->where('jenis_soal', 'Manajerial')->count();
        $jumlahSosialKultural = Pppk::where('paket', $paket)->where('jenis_soal', 'Sosiokultural')->count();
        $jumlahWawancara = Pppk::where('paket', $paket)->where('jenis_soal', 'Wawancara')->count();
        // Filter soal berdasarkan paket yang dipilih
        $totalSoal = Pppk::where('paket', $paket)->count();

        // Menggunakan nomor soal alih-alih pagination
        $nomorSoal = $request->get('nomor', 1);
        $dtSoal = Pppk::where('paket', $paket)
            ->where('no', $nomorSoal)
            ->get();

        $allSoal = Pppk::where('paket', $paket)->get();
        $jawabanTerkirim = Jawab::where('user_id', auth()->user()->id)->pluck('soal_id')->toArray();

        // Memuat jawaban pengguna yang sudah ada dalam session
        $jawabanUser = Session::get('jawaban_user', []);

        return view('layouts.soal', compact('dtSoal', 'totalSoal', 'jawabanTerkirim', 'jawabanUser', 'allSoal', 'nomorSoal', 'paket', 'paketOptions', 'jumlahTeknis', 'jumlahManajerial', 'jumlahSosialKultural', 'jumlahWawancara'));
    }



    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'soal_id' => 'required|array', // Memastikan soal_id adalah array
            'jawaban' => 'required|array',  // Memastikan jawaban adalah array
        ]);

        $soalIds = $request->input('soal_id');
        $jawabanUser = $request->input('jawaban');
        $userId = auth()->user()->id;

        // Memeriksa dan memproses jawaban pengguna
        foreach ($soalIds as $soalId) {
            // Memastikan setiap soal_id memiliki jawaban yang sesuai
            if (!isset($jawabanUser[$soalId])) {
                // Tangani jika jawaban tidak ada
                return response()->json(['message' => 'Jawaban tidak lengkap.'], 400);
            }

            $jawabanBaru = $jawabanUser[$soalId];

            // Memeriksa apakah pengguna telah menjawab pertanyaan sebelumnya
            $existingJawaban = Jawab::where('user_id', $userId)
                ->where('soal_id', $soalId)
                ->first();

            if ($existingJawaban) {
                // Jika pengguna telah menjawab pertanyaan ini sebelumnya, perbarui jawaban yang ada
                $existingJawaban->update(['jawaban_user' => $jawabanBaru]);
            } else {
                // Jika belum ada jawaban sebelumnya, simpan jawaban baru
                Jawab::create([
                    'user_id' => $userId,
                    'soal_id' => $soalId,
                    'jawaban_user' => $jawabanBaru,
                ]);
            }

            // Menyimpan jawaban baru dalam session
            Session::put('jawaban_user.' . $soalId, $jawabanBaru);
        }

        // Redirect kembali ke halaman yang sama
        return back();
    }





    public function selesai()
    {
        $confirmation = request()->input('confirmation');

        if ($confirmation === 'confirmed') {
            // Menghitung skor akhir dengan memanggil fungsi yang telah Anda buat
            $skorAkhir = $this->hitungSkorAkhir();
            Session::forget('jawaban_user');

            // Kirim skor akhir ke halaman hasil.blade.php
            return view('layouts.hasil', compact('skorAkhir'));
        }

        // Jika pengguna tidak mengonfirmasi, kembalikan mereka ke halaman sebelumnya
        return back();
    }

    public function getKunciJawaban($idSoal)
    {
        $kunciJawaban = Pppk::where('id', $idSoal)->value('jawaban');

        return response()->json(['kunci_jawaban' => $kunciJawaban]);
    }


    // Fungsi untuk menghitung skor akhir berdasarkan jawaban pengguna
    private function hitungSkorAkhir()
    {
        $userId = auth()->user()->id;
        $jawabanUser = Session::get('jawaban_user', []);

        // Inisialisasi skor
        $skor = 0;

        // Iterasi melalui semua jawaban pengguna
        foreach ($jawabanUser as $soalId => $jawaban) {
            // Mengambil kunci jawaban dari database berdasarkan id soal
            $kunciJawaban = Pppk::where('id', $soalId)->first();

            // Membandingkan jawaban pengguna dengan kunci jawaban
            if ($jawaban === $kunciJawaban->jawaban) {
                // Jika jawaban benar, tambahkan +5 ke skor jika jawaban_e terisi,
                // atau tambahkan +4 ke skor jika jawaban_e tidak terisi
                if (!empty($kunciJawaban->jawaban_e)) {
                    $skor += 5;
                } else {
                    $skor += 4;
                }
            }
        }

        return $skor;
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
        //
    }
}
