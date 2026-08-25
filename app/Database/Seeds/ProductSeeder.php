<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $products = [
            [
                'product_image'          => 'chocolate_fudge.jpg',
                'product_name'           => 'Chocolate Fudge Cake',
                'product_desc'           => 'Kue cokelat lezat berlapis fudge cokelat pekat khas Jeikinan Cake.',
                'product_price'          => 175000.00,
                'product_is_available'   => true,
                'product_is_best_seller' => true,
                'product_slug'           => 'chocolate-fudge-cake',
                'created_at'             => $now,
                'updated_at'             => $now,
                'category_id'            => 1, // Birthday Cake
            ],
            [
                'product_image'          => 'red_velvet_cupcake.jpg',
                'product_name'           => 'Red Velvet Cupcake',
                'product_desc'           => 'Cupcake red velvet lembut dengan cream cheese frosting di atasnya.',
                'product_price'          => 25000.00,
                'product_is_available'   => true,
                'product_is_best_seller' => true,
                'product_slug'           => 'red-velvet-cupcake',
                'created_at'             => $now,
                'updated_at'             => $now,
                'category_id'            => 2, // Cupcake
            ],
            [
                'product_image'          => 'strawberry_shortcake.jpg',
                'product_name'           => 'Strawberry Shortcake',
                'product_desc'           => 'Kue spons dengan potongan buah stroberi segar dan krim pilihan.',
                'product_price'          => 150000.00,
                'product_is_available'   => true,
                'product_is_best_seller' => true,
                'product_slug'           => 'strawberry-shortcake',
                'created_at'             => $now,
                'updated_at'             => $now,
                'category_id'            => 1, // Birthday Cake
            ],
        ];

        $this->db->table('product')->insertBatch($products);
    }
}
