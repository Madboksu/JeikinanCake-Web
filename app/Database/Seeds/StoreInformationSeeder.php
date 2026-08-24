<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StoreInformationSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            'store_name'        => 'Jeikinan Cake',
            'store_logo'        => 'logo.png',
            'store_description' => 'Jeikinan Cake menyediakan berbagai macam kue ulang tahun, cupcake, custom cake, dan pastry lezat buatan tangan dengan bahan berkualitas tinggi.',
            'store_image'       => 'store_front.jpg',
            'hero_image'        => 'hero_banner.jpg',
            'address'           => 'Jl. Raya Surabaya No. 123, Jawa Timur, Indonesia',
            'whatsapp'          => '6281234567890',
            'instagram'         => '@jeikinancake',
            'opening_hours'     => 'Senin - Minggu (08.00 - 21.00 WIB)',
            'created_at'        => $now,
            'updated_at'        => $now,
        ];

        $this->db->table('store_information')->insert($data);
    }
}
