<?php

namespace App\Http\Controllers;

use App\Models\PresensiHadir;
use App\Models\dataguru;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiHadirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kehadiran';
        $data = DB::table('presensihadir')->join('dataguru', 'dataguru.id_dataguru', '=','presensihadir.id_dataguru')->get();
        return view('presensihadir.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Presensi';
        $data = DB::table('presensihadir')->get();
        return view('presensihadir.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guruId = $request->input('id_dataguru');

        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $todayhour = Carbon::now()->isoFormat('HH:mm');



        // Periksa apakah guru telah melakukan presensi pada hari ini

        $presensiHariIni = PresensiHadir::where('id_dataguru', $guruId)->where('waktu_presensi_hari', $today)->first();

        if ($presensiHariIni) {
            return back()->with('gagal', 'Anda Sudah Absensi Hari Ini!!!');
        }else{
            // Jika guru belum melakukan presensi hari ini, simpan presensi baru
            DB::table('presensihadir')->insert([
            'id_dataguru' => $guruId,
            'status_kehadiran' => 'Hadir',
            'waktu_presensi_hari' => $today,
            'waktu_presensi_jam' => $todayhour,
        ]);

        return back()->with('sukses', 'Absensi Berhasil!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $title = 'Data Detail Guru';
        // $result = DB::table('presensihadir')->join('dataguru', 'dataguru.id_dataguru', '=','presensihadir.id_dataguru')->get();
        // return view('presensihadir.show', compact('title', 'result'));

        $result = DB::table('presensihadir')
            ->where('id_hadir', $id)
            ->join('dataguru', 'dataguru.id_dataguru', '=','presensihadir.id_dataguru')
            ->first();

        return view('presensihadir.show', [
            'title' => 'Detail Data Presensi',
            'result' => $result
        ]);
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
