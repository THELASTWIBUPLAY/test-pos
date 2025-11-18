<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // // Kode akses model UserModel 
        // $user = UserModel::all(); // Mengambil semua data dari tabel m_user

        // // Mengembalikan View 'user' dan mengirimkan data $user
        // return view('user', ['user' => $user]);

        /// --- Hash ---
        // 1. Tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'), // <-- Password di-hash
        //     'level_id' => 3,
        // ];
        
        // // Melakukan insert data ke tabel m_user
        // UserModel::insert($data); 
        
        // // 2. Coba akses model (Setelah insert)
        // $user = UserModel::all(); // Ambil semua data dari tabel m_user
        // return view('user', ['user' => $user]);

        // --- Eloquent Model ---
        // 1. Tambah data user dengan Eloquent Model (OPERASI UPDATE)
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan Pertama', // <-- Perubahan nama
        // ];
        
        // // Melakukan update data user yang memiliki username 'customer-1'
        // UserModel::where('username', 'customer-1')->update($data); 
        
        // 2. Coba akses model (Setelah update)
        $user = UserModel::all(); // Ambil semua data dari tabel m_user
        return view('user', ['user' => $user]);
    }
    
}