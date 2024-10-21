<?php

namespace App\Http\Controllers;

use App\Models\dataguru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DataguruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Guru';
        $data = DB::table('dataguru')->get();
        return view('dataguru.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Guru';
        $data = DB::table('dataguru')->get();
        return view('dataguru.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $request->validate([
            'nama_guru' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'foto_guru' => 'required: jpg, jpeg, png, tfif, jfif, raw, gif, ai, psd',
        ], $message);
        $foto_guru = $request->file('foto_guru');
        $namafotoguru = 'guru'.date('Ymdhis').'.'.$request->file('foto_guru')->getClientOriginalExtension();
        $foto_guru->move('file/guru/',$namafotoguru);

        $guru = new dataguru();
        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->no_hp = $request->no_hp;
        $guru->jabatan = $request->jabatan;
        $guru->alamat = $request->alamat;
        $guru->foto_guru = $namafotoguru;
        $guru->save();
        return redirect()->route('dataguru.index')->with('sukses', 'Berhasil Tambah Data Guru');
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
        $data = dataguru::findorfail($id);
        $title = 'Edit Data Guru';
        return view('dataguru.edit', compact('data', 'title' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = dataguru::findorfail($id);
        $namaFotoGuru = $data->foto_guru;
        $update = [
            'nama_guru' => $request->nama_guru, 
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'gambar' => $request->gambar,
            'foto_guru' => $namaFotoGuru,
        ];
        if ($request->foto_guru != ""){
            $request->foto_guru->move(public_path('file/guru/'), $namaFotoGuru);
        }   
        $data->update($update);
        return redirect()->route('dataguru.index')->with('sukses', 'Berhasil Edit Data Guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = dataguru::find($id);
        $namaFotoGuru = $data->foto_guru;
        $file_guru = public_path('file/guru/').$namaFotoGuru;
        if(file_exists($file_guru)){
            @unlink($file_guru);
        }
        $data->delete();
        return back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
