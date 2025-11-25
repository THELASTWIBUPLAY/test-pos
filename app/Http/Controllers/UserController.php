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
        // $user = UserModel::all(); // Ambil semua data dari tabel m_user
        // return view('user', ['user' => $user]);

        //fillable
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'Manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all(); // Ambil semua data dari tabel m_user
        // return view('user', ['user' => $user]);

        //retriving single model
        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id',1)->first();
        // $user = UserModel::firstWhere('level_id', 1); // Ambil semua data dari tabel m_user
        // $user = UserModel::findOr(1, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // return view('user', ['user' => $user]);

        //NotFoundException
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('username','admin')->firstOrFail();
        // return view('user', ['user' => $user]);

        //retreiving aggregats
        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user); //tampilan default
        // return view('user', ['user' => $user]);

        //retreaving or creating models
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'level_id' => 2,
        //         'password' => Hash::make('12345')
        //     ],
        // );
        // return view('user', ['user' => $user]);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['user' => $user]);

        //attribute changes
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        // $user->username = 'manager56';
        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true
        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false
        // $user->save();
        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());

        $user->username = 'manager12';
        $user->save();
        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged('username', 'level_id'); // true
        $user->wasChanged('nama'); // true
        dd($user->wasChanged(['nama', 'username'])); // true

    }

}
