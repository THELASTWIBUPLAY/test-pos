<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => 'TCH01',
                'supplier_nama' => 'PT. Sinar Digital Nusantara',
                'supplier_alamat' => 'Jl. Merdeka Digital No. 101'
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'FNB02',
                'supplier_nama' => 'CV. Rasa Prima Katering',
                'supplier_alamat' => 'Jl. Dapur Bersama Kav. 3'
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'ATK03',
                'supplier_nama' => 'UD. Kertas Abadi',
                'supplier_alamat' => 'Jl. Gudang Lama No. 77'
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}