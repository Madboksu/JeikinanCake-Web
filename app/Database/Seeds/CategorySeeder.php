<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Birthday Cake'],
            ['category_name' => 'Cupcake'],
            ['category_name' => 'Custom Cake'],
            ['category_name' => 'Pastry & Cookies'],
        ];

        $this->db->table('category')->insertBatch($categories);
    }
}
