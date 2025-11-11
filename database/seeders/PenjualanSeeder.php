<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Atur tanggal awal 5 hari yang lalu untuk variasi
        $date = $now->copy()->subDays(5);

        $data = [
            // Penjualan hari ini ($now - 1 hari) - Dilayani oleh User 3 (Staff)
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'Rina Wijaya', 'penjualan_kode' => 'PJL001', 'penjualan_tanggal' => $now->copy()->subDay(1)],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Bambang Priyono', 'penjualan_kode' => 'PJL002', 'penjualan_tanggal' => $now->copy()->subDay(1)],

            // Penjualan 2 hari yang lalu - Dilayani oleh User 2 (Manager)
            ['penjualan_id' => 3, 'user_id' => 2, 'pembeli' => 'Santi Oktaviani', 'penjualan_kode' => 'PJL003', 'penjualan_tanggal' => $date->copy()->addDays(3)],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Ahmad Setiawan', 'penjualan_kode' => 'PJL004', 'penjualan_tanggal' => $date->copy()->addDays(3)],

            // Penjualan 3 hari yang lalu - Dilayani oleh User 3 (Staff)
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Dewi Lestari', 'penjualan_kode' => 'PJL005', 'penjualan_tanggal' => $date->copy()->addDays(2)],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Toni Susanto', 'penjualan_kode' => 'PJL006', 'penjualan_tanggal' => $date->copy()->addDays(2)],

            // Penjualan 4 hari yang lalu - Dilayani oleh User 2 (Manager)
            ['penjualan_id' => 7, 'user_id' => 2, 'pembeli' => 'Wati Handayani', 'penjualan_kode' => 'PJL007', 'penjualan_tanggal' => $date->copy()->addDays(1)],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Joko Permana', 'penjualan_kode' => 'PJL008', 'penjualan_tanggal' => $date->copy()->addDays(1)],

            // Penjualan 5 hari yang lalu - Dilayani oleh User 3 (Staff)
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Mega Utami', 'penjualan_kode' => 'PJL009', 'penjualan_tanggal' => $date->copy()],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Pujiono', 'penjualan_kode' => 'PJL010', 'penjualan_tanggal' => $date->copy()],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}