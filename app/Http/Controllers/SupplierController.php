<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar supplier yang terdaftar dalam sistem'
        ];

        $activeMenu = 'supplier'; 

        $supplier = DB::table('m_supplier')->get();

        return view('supplier.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'supplier' => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah supplier baru'
        ];

        $activeMenu = 'supplier'; 

        return view('supplier.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode' => 'required|string|min:3|max:10|unique:m_supplier,supplier_kode', 
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        DB::table('m_supplier')->insert([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $supplier = DB::table('m_supplier')->where('supplier_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail supplier'
        ];

        $activeMenu = 'supplier'; 

        return view('supplier.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'supplier' => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $supplier = DB::table('m_supplier')->where('supplier_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit supplier'
        ];

        $activeMenu = 'supplier'; 

        return view('supplier.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'supplier' => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'supplier_kode' => 'required|string|min:3|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id', 
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        DB::table('m_supplier')
            ->where('supplier_id', $id)
            ->update([
                'supplier_kode' => $request->supplier_kode,
                'supplier_nama' => $request->supplier_nama,
                'supplier_alamat' => $request->supplier_alamat,
                'updated_at' => now(),
            ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $check = DB::table('m_supplier')->where('supplier_id', $id)->first();
        if (!$check) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan.');
        }

        try {
            DB::table('m_supplier')->where('supplier_id', $id)->delete();
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/supplier')->with('error', 'Data supplier tidak dapat dihapus karena masih digunakan di tabel Stok Barang.');
        }
    }
}
