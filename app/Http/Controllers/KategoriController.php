<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {

        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $raws = DB::table('m_kategori')
        //     ->where('kategori_kode', '=', 'SNK') 
        //     ->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil, jumlah data yang diupdate: ' . $raws . ' baris';

        //     $raws = DB::table('m_kategori')
        //         ->where('kategori_kode', '=', 'SNK') 
        //         ->delete();
        //     return 'Delete data berhasil, jumlah data yang dihapus: ' . $raws . ' baris';

        // $kategori = DB::table('m_kategori')->get();
        // return view('kategori', ['kategori' => $kategori]);

        $breadcrumb = (object) [
            'title' => 'Daftar Kategori Barang',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori barang yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; 

        $kategori = DB::table('m_kategori')->get();

        return view('kategori.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori Barang',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori barang baru'
        ];

        $activeMenu = 'kategori'; 

        return view('kategori.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|min:3|max:10|unique:m_kategori,kategori_kode', 
            'kategori_nama' => 'required|string|max:100',
        ]);

        DB::table('m_kategori')->insert([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail Kategori Barang',
            'list' => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail kategori barang'
        ];

        $activeMenu = 'kategori'; 

        return view('kategori.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Edit Kategori Barang',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategori barang'
        ];

        $activeMenu = 'kategori'; 

        return view('kategori.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|min:3|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id', 
            'kategori_nama' => 'required|string|max:100',
        ]);

        DB::table('m_kategori')
            ->where('kategori_id', $id)
            ->update([
                'kategori_kode' => $request->kategori_kode,
                'kategori_nama' => $request->kategori_nama,
                'updated_at' => now(),
            ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $check = DB::table('m_kategori')->where('kategori_id', $id)->first();
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan.');
        }

        try {
            DB::table('m_kategori')->where('kategori_id', $id)->delete();
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori tidak dapat dihapus karena masih digunakan di tabel Barang.');
        }
    }

    public function list(Request $request)
    {

        $kategori = DB::table('m_kategori')->select('kategori_id', 'kategori_kode', 'kategori_nama');

        return DataTables::of($kategori)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($k) {
                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $k->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $k->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $k->kategori_id . '/confirm_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('kategori.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_kode' => 'required|string|min:3|max:10|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        try {
            DB::table('m_kategori')->insert([
                'kategori_kode' => $request->kategori_kode,
                'kategori_nama' => $request->kategori_nama,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil disimpan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data kategori: ' . $e->getMessage()
            ]);
        }
    }

    public function show_ajax(string $id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();
        return view('kategori.show_ajax', [
            'kategori' => $kategori
        ]);
    }

    public function edit_ajax(string $id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();
        return view('kategori.edit_ajax', [
            'kategori' => $kategori
        ]);
    }

    public function update_ajax(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori_kode' => 'required|string|min:3|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        try {
            DB::table('m_kategori')
                ->where('kategori_id', $id)
                ->update([
                    'kategori_kode' => $request->kategori_kode,
                    'kategori_nama' => $request->kategori_nama,
                    'updated_at' => now(),
                ]);

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil diubah.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengubah data kategori: ' . $e->getMessage()
            ]);
        }
    }

    public function confirm_ajax(string $id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();
        return view('kategori.confirm_ajax', [
            'kategori' => $kategori
        ]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();

            if ($kategori) {
                try {
                    DB::table('m_kategori')->where('kategori_id', $id)->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data kategori berhasil dihapus.'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {

                    return response()->json([
                        'status' => false,
                        'message' => 'Data kategori tidak dapat dihapus karena masih digunakan di tabel lain (misal: barang).'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kategori tidak ditemukan.'
                ]);
            }
        }
        return redirect('/');
    }
}
