<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'OLR', 'kategori_nama' => 'Olahraga'],
            ['kategori_id' => 2, 'kategori_kode' => 'MSK', 'kategori_nama' => 'Musik'],
            ['kategori_id' => 3, 'kategori_kode' => 'OTO', 'kategori_nama' => 'Otomotif'],
            ['kategori_id' => 4, 'kategori_kode' => 'DGT', 'kategori_nama' => 'Produk Digital'],
            ['kategori_id' => 5, 'kategori_kode' => 'TNM', 'kategori_nama' => 'Tanaman Hias'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
