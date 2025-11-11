<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- Penjualan ID 1 (PJL001 - Rina Wijaya) --- Total 3 Item
            // (Barang 6: Granola Homemade - Harga: 49000, Jumlah: 1)
            ['detail_id' => 1, 'penjualan_id' => 1, 'barang_id' => 6, 'harga' => 49000, 'jumlah' => 1],
            // (Barang 13: Susu UHT 1L - Harga: 22000, Jumlah: 2)
            ['detail_id' => 2, 'penjualan_id' => 1, 'barang_id' => 13, 'harga' => 22000, 'jumlah' => 2],
            // (Barang 11: Lap Microfiber - Harga: 22000, Jumlah: 1)
            ['detail_id' => 3, 'penjualan_id' => 1, 'barang_id' => 11, 'harga' => 22000, 'jumlah' => 1],

            // --- Penjualan ID 2 (PJL002 - Bambang Priyono) --- Total 3 Item
            // (Barang 1: Mouse Wireless - Harga: 125000, Jumlah: 1)
            ['detail_id' => 4, 'penjualan_id' => 2, 'barang_id' => 1, 'harga' => 125000, 'jumlah' => 1],
            // (Barang 3: Webcam HD - Harga: 220000, 'jumlah' => 1)
            ['detail_id' => 5, 'penjualan_id' => 2, 'barang_id' => 3, 'harga' => 220000, 'jumlah' => 1],
            // (Barang 4: Kertas Foto - Harga: 55000, 'jumlah' => 1)
            ['detail_id' => 6, 'penjualan_id' => 2, 'barang_id' => 4, 'harga' => 55000, 'jumlah' => 1],

            // --- Penjualan ID 3 (PJL003 - Santi Oktaviani) --- Total 4 Item
            // (Barang 12: Gula Pasir 1kg - Harga: 15500, Jumlah: 2)
            ['detail_id' => 7, 'penjualan_id' => 3, 'barang_id' => 12, 'harga' => 15500, 'jumlah' => 2],
            // (Barang 7: Teh Herbal Organik - Harga: 32000, Jumlah: 1)
            ['detail_id' => 8, 'penjualan_id' => 3, 'barang_id' => 7, 'harga' => 32000, 'jumlah' => 1],
            // (Barang 13: Susu UHT 1L - Harga: 22000, Jumlah: 3)
            ['detail_id' => 9, 'penjualan_id' => 3, 'barang_id' => 13, 'harga' => 22000, 'jumlah' => 3],
            // (Barang 15: Stop Kontak - Harga: 28000, Jumlah: 1)
            ['detail_id' => 10, 'penjualan_id' => 3, 'barang_id' => 15, 'harga' => 28000, 'jumlah' => 1],

            // --- Penjualan ID 4 (PJL004 - Ahmad Setiawan) --- Total 2 Item
            // (Barang 2: Binder Kulit - Harga: 90000, Jumlah: 1)
            ['detail_id' => 11, 'penjualan_id' => 4, 'barang_id' => 2, 'harga' => 90000, 'jumlah' => 1],
            // (Barang 4: Kertas Foto - Harga: 55000, Jumlah: 2)
            ['detail_id' => 12, 'penjualan_id' => 4, 'barang_id' => 4, 'harga' => 55000, 'jumlah' => 2],

            // --- Penjualan ID 5 (PJL005 - Dewi Lestari) --- Total 3 Item
            // (Barang 8: Frozen Dimsum - Harga: 40000, Jumlah: 1)
            ['detail_id' => 13, 'penjualan_id' => 5, 'barang_id' => 8, 'harga' => 40000, 'jumlah' => 1],
            // (Barang 9: Kopi Arabika - Harga: 75000, Jumlah: 1)
            ['detail_id' => 14, 'penjualan_id' => 5, 'barang_id' => 9, 'harga' => 75000, 'jumlah' => 1],
            // (Barang 10: Lilin Aromaterapi - Harga: 65000, Jumlah: 1)
            ['detail_id' => 15, 'penjualan_id' => 5, 'barang_id' => 10, 'harga' => 65000, 'jumlah' => 1],

            // --- Penjualan ID 6 (PJL006 - Toni Susanto) --- Total 4 Item
            // (Barang 14: Tinta Printer Hitam - Harga: 40000, Jumlah: 1)
            ['detail_id' => 16, 'penjualan_id' => 6, 'barang_id' => 14, 'harga' => 40000, 'jumlah' => 1],
            // (Barang 15: Stop Kontak - Harga: 28000, Jumlah: 2)
            ['detail_id' => 17, 'penjualan_id' => 6, 'barang_id' => 15, 'harga' => 28000, 'jumlah' => 2],
            // (Barang 11: Lap Microfiber - Harga: 22000, Jumlah: 3)
            ['detail_id' => 18, 'penjualan_id' => 6, 'barang_id' => 11, 'harga' => 22000, 'jumlah' => 3],
            // (Barang 12: Gula Pasir 1kg - Harga: 15500, Jumlah: 1)
            ['detail_id' => 19, 'penjualan_id' => 6, 'barang_id' => 12, 'harga' => 15500, 'jumlah' => 1],

            // --- Penjualan ID 7 (PJL007 - Wati Handayani) --- Total 3 Item
            // (Barang 5: Vacuum Cleaner Portable - Harga: 500000, Jumlah: 1)
            ['detail_id' => 20, 'penjualan_id' => 7, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 1],
            // (Barang 1: Mouse Wireless - Harga: 125000, Jumlah: 1)
            ['detail_id' => 21, 'penjualan_id' => 7, 'barang_id' => 1, 'harga' => 125000, 'jumlah' => 1],
            // (Barang 3: Webcam HD - Harga: 220000, Jumlah: 1)
            ['detail_id' => 22, 'penjualan_id' => 7, 'barang_id' => 3, 'harga' => 220000, 'jumlah' => 1],

            // --- Penjualan ID 8 (PJL008 - Joko Permana) --- Total 2 Item
            // (Barang 6: Granola Homemade - Harga: 49000, Jumlah: 2)
            ['detail_id' => 23, 'penjualan_id' => 8, 'barang_id' => 6, 'harga' => 49000, 'jumlah' => 2],
            // (Barang 9: Kopi Arabika - Harga: 75000, Jumlah: 1)
            ['detail_id' => 24, 'penjualan_id' => 8, 'barang_id' => 9, 'harga' => 75000, 'jumlah' => 1],

            // --- Penjualan ID 9 (PJL009 - Mega Utami) --- Total 4 Item
            // (Barang 12: Gula Pasir 1kg - Harga: 15500, Jumlah: 5)
            ['detail_id' => 25, 'penjualan_id' => 9, 'barang_id' => 12, 'harga' => 15500, 'jumlah' => 5],
            // (Barang 13: Susu UHT 1L - Harga: 22000, Jumlah: 4)
            ['detail_id' => 26, 'penjualan_id' => 9, 'barang_id' => 13, 'harga' => 22000, 'jumlah' => 4],
            // (Barang 7: Teh Herbal Organik - Harga: 32000, Jumlah: 2)
            ['detail_id' => 27, 'penjualan_id' => 9, 'barang_id' => 7, 'harga' => 32000, 'jumlah' => 2],
            // (Barang 10: Lilin Aromaterapi - Harga: 65000, Jumlah: 1)
            ['detail_id' => 28, 'penjualan_id' => 9, 'barang_id' => 10, 'harga' => 65000, 'jumlah' => 1],

            // --- Penjualan ID 10 (PJL010 - Pujiono) --- Total 2 Item
            // (Barang 14: Tinta Printer Hitam - Harga: 40000, Jumlah: 1)
            ['detail_id' => 29, 'penjualan_id' => 10, 'barang_id' => 14, 'harga' => 40000, 'jumlah' => 1],
            // (Barang 2: Binder Kulit - Harga: 90000, Jumlah: 1)
            ['detail_id' => 30, 'penjualan_id' => 10, 'barang_id' => 2, 'harga' => 90000, 'jumlah' => 1],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
