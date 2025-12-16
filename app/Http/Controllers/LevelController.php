<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // --- INSERT DATA ---
        // DB::insert('insert into m_level (level_kode, level_nama, created_at) values (?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return "Insert Data Baru Berhasil";

        // --- UPDATE DATA ---
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return "Update Data Berhasil. Jumlah Data Yang Diupdate: $row Baris";

        // --- DELETE DATA ---
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return "Delete Data Berhasil. Jumlah Data Yang Dihapus: $row Baris";

        // --- SELECT DATA ---
        // $data = DB::select('select * from m_level');
        // return view("level", ["data" => $data]);

        $breadcrumb = (object) [
            'title' => 'Daftar Level User',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar Level yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level';

        $level = DB::select('select * from m_level');

        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'data' => $level,
            'activeMenu' => $activeMenu
        ]);
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level User',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level user baru'
        ];

        $activeMenu = 'level'; 

        return view('level.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode', 
            'level_nama' => 'required|string|max:100',
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level')->with('success', 'Data level berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level User',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail level user'
        ];

        $activeMenu = 'level'; 

        return view('level.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level User',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level user'
        ];

        $activeMenu = 'level'; 

        return view('level.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id', 
            'level_nama' => 'required|string|max:100',
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan.');
        }

        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level tidak dapat dihapus karena masih digunakan di tabel lain.');
        }
    }
}
