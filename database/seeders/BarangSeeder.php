<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- SUPPLIER 1 (PT. Sinar Digital) - Fokus Teknologi & ATK Premium ---
            // Kategori 5 (ELK)
            ['barang_id' => 1, 'kategori_id' => 5, 'barang_kode' => 'E001', 'barang_nama' => 'Mouse Wireless Ergonomis', 'harga_beli' => 85000, 'harga_jual' => 125000],
            // Kategori 4 (ATK)
            ['barang_id' => 2, 'kategori_id' => 4, 'barang_kode' => 'A002', 'barang_nama' => 'Binder Kulit A5 Premium', 'harga_beli' => 60000, 'harga_jual' => 90000],
            // Kategori 5 (ELK)
            ['barang_id' => 3, 'kategori_id' => 5, 'barang_kode' => 'E003', 'barang_nama' => 'Webcam HD 1080p', 'harga_beli' => 150000, 'harga_jual' => 220000],
            // Kategori 4 (ATK)
            ['barang_id' => 4, 'kategori_id' => 4, 'barang_kode' => 'A004', 'barang_nama' => 'Kertas Foto Glossy A4 (50)', 'harga_beli' => 40000, 'harga_jual' => 55000],
            // Kategori 3 (RTG)
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'R005', 'barang_nama' => 'Vacuum Cleaner Portable', 'harga_beli' => 350000, 'harga_jual' => 500000],

            // --- SUPPLIER 2 (CV. Rasa Prima) - Fokus Makanan dan Minuman Unik ---
            // Kategori 1 (MKN)
            ['barang_id' => 6, 'kategori_id' => 1, 'barang_kode' => 'M006', 'barang_nama' => 'Granola Homemade Rasa Madu', 'harga_beli' => 35000, 'harga_jual' => 49000],
            // Kategori 2 (MNM)
            ['barang_id' => 7, 'kategori_id' => 2, 'barang_kode' => 'N007', 'barang_nama' => 'Teh Herbal Celup Organik', 'harga_beli' => 25000, 'harga_jual' => 32000],
            // Kategori 1 (MKN)
            ['barang_id' => 8, 'kategori_id' => 1, 'barang_kode' => 'M008', 'barang_nama' => 'Frozen Dimsum Ayam Isi 10', 'harga_beli' => 30000, 'harga_jual' => 40000],
            // Kategori 2 (MNM)
            ['barang_id' => 9, 'kategori_id' => 2, 'barang_kode' => 'N009', 'barang_nama' => 'Kopi Arabika Bubuk 200g', 'harga_beli' => 55000, 'harga_jual' => 75000],
            // Kategori 3 (RTG)
            ['barang_id' => 10, 'kategori_id' => 3, 'barang_kode' => 'R010', 'barang_nama' => 'Lilin Aromaterapi Lavender', 'harga_beli' => 45000, 'harga_jual' => 65000],

            // --- SUPPLIER 3 (UD. Kertas Abadi) - Fokus Kebutuhan Dasar & Rumah Tangga ---
            // Kategori 3 (RTG)
            ['barang_id' => 11, 'kategori_id' => 3, 'barang_kode' => 'R011', 'barang_nama' => 'Lap Microfiber Set 3 pcs', 'harga_beli' => 15000, 'harga_jual' => 22000],
            // Kategori 1 (MKN)
            ['barang_id' => 12, 'kategori_id' => 1, 'barang_kode' => 'M012', 'barang_nama' => 'Gula Pasir Kemasan 1kg', 'harga_beli' => 13000, 'harga_jual' => 15500],
            // Kategori 2 (MNM)
            ['barang_id' => 13, 'kategori_id' => 2, 'barang_kode' => 'N013', 'barang_nama' => 'Susu UHT Full Cream 1L', 'harga_beli' => 18000, 'harga_jual' => 22000],
            // Kategori 4 (ATK)
            ['barang_id' => 14, 'kategori_id' => 4, 'barang_kode' => 'A014', 'barang_nama' => 'Isi Ulang Tinta Printer Hitam', 'harga_beli' => 28000, 'harga_jual' => 40000],
            // Kategori 5 (ELK)
            ['barang_id' => 15, 'kategori_id' => 5, 'barang_kode' => 'E015', 'barang_nama' => 'Stop Kontak 4 Lubang', 'harga_beli' => 19000, 'harga_jual' => 28000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
