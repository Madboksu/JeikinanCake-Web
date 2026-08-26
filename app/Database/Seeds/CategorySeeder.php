<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table('category')->truncate();
        $this->db->enableForeignKeyChecks();

        $categories = [
            ['category_id' => 1, 'category_name' => 'Kue Kering'],
            ['category_id' => 2, 'category_name' => 'Kue Basah'],
            ['category_id' => 3, 'category_name' => 'Hampers'],
            ['category_id' => 4, 'category_name' => 'Cake'],
            ['category_id' => 5, 'category_name' => 'Cookie'],
        ];

        $this->db->table('category')->insertBatch($categories);
    }
}
