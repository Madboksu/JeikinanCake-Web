<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // Hapus produk dummy sebelumnya
        $this->db->table('product')->truncate();

        $products = [

            // =====================================================
            // CAKE - CATEGORY 4
            // =====================================================

            [
                'product_image' => 'bolu_pisang_cokelat_chip.jpeg',
                'product_name' => 'Banana Choco Cake',
                'product_desc' => 'Harga Rp48.000.',
                'product_price' => 48000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'banana-choco-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Prol Tape',
                'product_desc' => 'Harga Rp48.000.',
                'product_price' => 48000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'prol-tape',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Cheese Cake',
                'product_desc' => 'Harga Rp55.000. PO.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cheese-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'fudgy_brownies.jpeg',
                'product_name' => 'Bronis Fudgy',
                'product_desc' => 'Mulai Rp55.000, tergantung topping.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bronis-fudgy',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bronis Kenari',
                'product_desc' => 'Mulai Rp40.000. Minimum 3 / PO.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bronis-kenari',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Spikoe Kenari Premium',
                'product_desc' => 'Harga Rp75.000. Catatan sumber: cek.',
                'product_price' => 75000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'spikoe-kenari-premium',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Spikoe Kenari Reguler',
                'product_desc' => 'Harga Rp60.000.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'spikoe-kenari-reguler',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'marmer_cake.jpeg',
                'product_name' => 'Marmer Butter Cake',
                'product_desc' => 'Harga Rp65.000. Catatan sumber: Juni 2026.',
                'product_price' => 65000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'marmer-butter-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'marmer_cake.jpeg',
                'product_name' => 'Marmer Jadoel',
                'product_desc' => 'Harga Rp50.000.',
                'product_price' => 50000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'marmer-jadoel',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bolu Pisang Kayu Manis',
                'product_desc' => 'Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bolu-pisang-kayu-manis',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pizza Bronie',
                'product_desc' => 'Diameter 22 cm. Harga mulai Rp120.000.',
                'product_price' => 120000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pizza-bronie',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'fudgy_brownies.jpeg',
                'product_name' => 'Brownie Fudgy',
                'product_desc' => 'Ukuran 20x20 cm. Harga Rp120.000.',
                'product_price' => 120000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'brownie-fudgy',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'marmer_cake.jpeg',
                'product_name' => 'Marmer Butter Cake Loyang Sultan',
                'product_desc' => 'Harga Rp150.000.',
                'product_price' => 150000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'marmer-butter-cake-loyang-sultan',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bluder Tape Cake 22 cm',
                'product_desc' => 'Ukuran 22 cm. Harga Rp75.000.',
                'product_price' => 75000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bluder-tape-cake-22-cm',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bluder Tape Cake 20x10 cm',
                'product_desc' => 'Ukuran 20x10 cm. Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bluder-tape-cake-20x10-cm',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bronis Sekat',
                'product_desc' => 'Ukuran 20x20 cm. Harga Rp120.000.',
                'product_price' => 120000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bronis-sekat',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bronis Hias',
                'product_desc' => 'Harga Rp125.000.',
                'product_price' => 125000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bronis-hias',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // KUE BASAH - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Leker Holand',
                'product_desc' => 'Harga Rp45.000.',
                'product_price' => 45000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'leker-holand',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'roti_bolen_pisang.jpeg',
                'product_name' => 'Bolen Pisang',
                'product_desc' => 'Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bolen-pisang',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bolen Tape',
                'product_desc' => 'Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bolen-tape',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Banana Strudel',
                'product_desc' => 'Ukuran 25 cm. Harga Rp60.000.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'banana-strudel',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pukis Labu Kuning',
                'product_desc' => 'Rp4.000/pcs. Minimum 10 pcs. By PO.',
                'product_price' => 4000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pukis-labu-kuning',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Camilan Keju',
                'product_desc' => 'Isi 250 gram. Harga Rp45.000.',
                'product_price' => 45000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'camilan-keju',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Karipap / Currypuff / Pastel Malaysia',
                'product_desc' => 'Harga Rp16.000. Isi 2 pcs.',
                'product_price' => 16000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'karipap-currypuff-pastel-malaysia',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // CHIFFON & ROLL CAKE - CATEGORY 4
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Chiffon Keju',
                'product_desc' => 'Harga Rp70.000.',
                'product_price' => 70000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-keju',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'Chiffon_Cake_Coklat.jpeg',
                'product_name' => 'Chiffon Coklat Tinggi',
                'product_desc' => 'Harga Rp75.000.',
                'product_price' => 75000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-coklat-tinggi',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'Chiffon_Cake_Coklat.jpeg',
                'product_name' => 'Chiffon Coklat',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-coklat',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'chiffon_cake_pandan.jpeg',
                'product_name' => 'Chiffon Pandan Tinggi',
                'product_desc' => 'Harga Rp65.000.',
                'product_price' => 65000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-pandan-tinggi',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'chiffon_cake_pandan.jpeg',
                'product_name' => 'Chiffon Pandan',
                'product_desc' => 'Harga Rp45.000.',
                'product_price' => 45000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-pandan',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Chiffon Pandan Gluten Free',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chiffon-pandan-gluten-free',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roll Cake Coklat Keju',
                'product_desc' => 'Ukuran 22 cm, gembul. Harga Rp60.000.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roll-cake-coklat-keju',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roll Cake Pandan Keju',
                'product_desc' => 'Ukuran 22 cm, gembul. Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roll-cake-pandan-keju',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Moo Cake',
                'product_desc' => 'Ukuran 22 cm, gembul. Harga Rp60.000.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'moo-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // ROTI - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Japanese Bread',
                'product_desc' => 'By PO. Harga Rp60.000. Update Agustus 2026.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'japanese-bread',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Babka Bread',
                'product_desc' => 'Mulai Rp45.000. By PO.',
                'product_price' => 45000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'babka-bread',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'korean_garlic_cheese_bread.jpeg',
                'product_name' => 'Korean Garlic Original',
                'product_desc' => 'Harga Rp20.000/pcs. By PO.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'korean-garlic-original',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Korean Garlic Cheese Beef',
                'product_desc' => 'Harga Rp22.000/pcs. By PO.',
                'product_price' => 22000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'korean-garlic-cheese-beef',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Labu Kuning',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-labu-kuning',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'roti_sobek(Japanese_milk_bun).jpeg',
                'product_name' => 'Roti Sobek Original',
                'product_desc' => 'Harga Rp30.000.',
                'product_price' => 30000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-sobek-original',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Sobek Keju',
                'product_desc' => 'Harga Rp37.000.',
                'product_price' => 37000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-sobek-keju',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Sobek Chocomaltine',
                'product_desc' => 'Harga Rp37.000.',
                'product_price' => 37000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-sobek-chocomaltine',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Sobek Nutella',
                'product_desc' => 'Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-sobek-nutella',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'cinnamon_bread.jpeg',
                'product_name' => 'Cinnamon Bread',
                'product_desc' => 'Dough 50 gr. Harga Rp9.000. Catatan sumber: Oktober 2025.',
                'product_price' => 9000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cinnamon-bread',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Sosis',
                'product_desc' => 'Dough 50 gr. Harga Rp9.000. Catatan sumber: Oktober 2025.',
                'product_price' => 9000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-sosis',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Coffee Bun',
                'product_desc' => 'Dough 50 gr. Harga Rp12.000. Catatan sumber: Oktober 2025.',
                'product_price' => 12000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'coffee-bun',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Pisang',
                'product_desc' => 'Dough 50 gr. Harga Rp8.000. Catatan sumber: Oktober 2025.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-pisang',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Kacang',
                'product_desc' => 'Dough 50 gr. Harga Rp8.000. Catatan sumber: Oktober 2025.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-kacang',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Coklat',
                'product_desc' => 'Dough 50 gr. Harga Rp8.000. Catatan sumber: Oktober 2025.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-coklat',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Smoked Beef',
                'product_desc' => 'Dough 50 gr. Harga Rp10.000. Catatan sumber: Oktober 2025.',
                'product_price' => 10000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-smoked-beef',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Roti Garlic Cheese',
                'product_desc' => 'Dough 50 gr. Harga Rp10.000. Catatan sumber: Oktober 2025.',
                'product_price' => 10000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'roti-garlic-cheese',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Krim Cheese',
                'product_desc' => 'Dough 50 gr. Harga Rp11.000. Catatan sumber: Oktober 2025.',
                'product_price' => 11000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'krim-cheese',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // ROLL BREAD
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Garlic Roll',
                'product_desc' => 'Isi 3 pcs. Harga Rp35.000.',
                'product_price' => 35000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'garlic-roll',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pizza Roll',
                'product_desc' => 'Isi 3 pcs. Harga Rp35.000.',
                'product_price' => 35000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pizza-roll',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // DONAT - CATEGORY 2
            // =====================================================


            [
                'product_image' => 'donat.png',
                'product_name' => 'Donat Kentang Topping',
                'product_desc' => '1L Rp80.000. Setengah Rp40.000.',
                'product_price' => 80000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'donat-kentang-topping',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bomboloni Kentang',
                'product_desc' => '1L Rp88.000. Setengah Rp45.000.',
                'product_price' => 88000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bomboloni-kentang',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'donut.jpeg',
                'product_name' => 'Bomboloni Kentang Hazelnut',
                'product_desc' => 'Isi 6. Harga Rp50.000.',
                'product_price' => 50000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bomboloni-kentang-hazelnut',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'donat.png',
                'product_name' => 'Donat Kentang Topping Syusyu',
                'product_desc' => 'Harga Rp85.000.',
                'product_price' => 85000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'donat-kentang-topping-syusyu',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'donat.png',
                'product_name' => 'Donat Syusyu',
                'product_desc' => 'Bukan kentang. 1L. Harga Rp60.000.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'donat-syusyu',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'donut.jpeg',
                'product_name' => 'Bomboloni Syusyu',
                'product_desc' => 'Bukan kentang. 1L. Harga Rp70.000.',
                'product_price' => 70000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bomboloni-syusyu',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // DESSERT / PASTRY - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Singkong Thailand',
                'product_desc' => 'Harga Rp15.000.',
                'product_price' => 15000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'singkong-thailand',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Ketan Kinca Durian',
                'product_desc' => 'Harga Rp25.000.',
                'product_price' => 25000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'ketan-kinca-durian',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Klappetart',
                'product_desc' => 'Isi 3 cup ukuran 7x9 cm. Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'klappetart',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Lasagna Beef',
                'product_desc' => 'Ukuran cup 15x10 cm. Harga Rp70.000/cup.',
                'product_price' => 70000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'lasagna-beef',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'kue_sus.jpeg',
                'product_name' => 'Creme Puff',
                'product_desc' => 'Harga Rp8.000/pcs. Minimum order 6 pcs.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'creme-puff',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Zuppa Soup',
                'product_desc' => 'Isi 4. Harga Rp75.000.',
                'product_price' => 75000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'zuppa-soup',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Spaghetti Brulee Ayam',
                'product_desc' => 'Ukuran cup 15x10 cm. Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'spaghetti-brulee-ayam',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // PIE / PUFF - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Pie Keju',
                'product_desc' => 'Harga Rp8.000.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pie-keju',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pie Buah',
                'product_desc' => 'Harga Rp8.000.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pie-buah',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pie Bronis',
                'product_desc' => 'Harga Rp7.000.',
                'product_price' => 7000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pie-bronis',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pie Bronis Topping Nutella / Belgian',
                'product_desc' => 'Harga Rp8.000.',
                'product_price' => 8000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pie-bronis-topping-nutella-belgian',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pie Susu',
                'product_desc' => 'Harga Rp6.000.',
                'product_price' => 6000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pie-susu',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Cheese Roll',
                'product_desc' => 'Isi 8 pcs. Harga Rp40.000.',
                'product_price' => 40000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cheese-roll',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Choco Puff',
                'product_desc' => 'Isi 6 pcs. Harga Rp30.000.',
                'product_price' => 30000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'choco-puff',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // DESSERT BOX - CATEGORY 4
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Dessert Box Tiramisu Cake',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'dessert-box-tiramisu-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Dessert Box Belgian',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'dessert-box-belgian',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Mille Crepes',
                'product_desc' => 'Rp25.000/pcs. Paket 2 pcs Rp45.000.',
                'product_price' => 25000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'mille-crepes',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Dessert Box Budapest',
                'product_desc' => 'Harga Rp55.000.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'dessert-box-budapest',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // SNACK / DESSERT - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Kroket Sultan',
                'product_desc' => 'Rp9.000/pcs. Paket isi 6 Rp50.000.',
                'product_price' => 9000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'kroket-sultan',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Buko Pandan',
                'product_desc' => 'Cup 450 ml. Harga Rp20.000.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'buko-pandan',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Sago Mango',
                'product_desc' => 'Harga Rp20.000.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'sago-mango',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bukan Es Teller',
                'product_desc' => 'Harga Rp25.000.',
                'product_price' => 25000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bukan-es-teller',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Chomut Frappe',
                'product_desc' => 'Ukuran 350 ml. Harga Rp17.000.',
                'product_price' => 17000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'chomut-frappe',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Onde-Onde Mande',
                'product_desc' => 'Harga Rp4.500.',
                'product_price' => 4500,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'onde-onde-mande',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // WAFFLE - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Waffle Chocomaltine',
                'product_desc' => 'Harga Rp18.000.',
                'product_price' => 18000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'waffle-chocomaltine',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Waffle Coklat',
                'product_desc' => 'Harga Rp18.000.',
                'product_price' => 18000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'waffle-coklat',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Waffle Coklat Keju',
                'product_desc' => 'Harga Rp20.000.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'waffle-coklat-keju',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Waffle Nutella',
                'product_desc' => 'Harga Rp20.000.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'waffle-nutella',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // BROWNIE PASTRY / CAKE
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Brownie Pastry Banana',
                'product_desc' => 'Harga Rp85.000.',
                'product_price' => 85000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'brownie-pastry-banana',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Brownie Pastry Belgian',
                'product_desc' => 'Harga Rp85.000.',
                'product_price' => 85000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'brownie-pastry-belgian',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Talam Durian',
                'product_desc' => 'Harga Rp48.000.',
                'product_price' => 48000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'talam-durian',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Kue Bawang',
                'product_desc' => 'Isi 250 gram. Harga Rp35.000.',
                'product_price' => 35000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'kue-bawang',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Cake Tape Mantega Besar',
                'product_desc' => 'Ukuran besar. Harga Rp80.000.',
                'product_price' => 80000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cake-tape-mantega-besar',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Cake Tape Mantega Kecil',
                'product_desc' => 'Ukuran kecil. Harga Rp45.000.',
                'product_price' => 45000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cake-tape-mantega-kecil',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Bolu Jadul',
                'product_desc' => 'Harga mulai Rp65.000.',
                'product_price' => 65000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'bolu-jadul',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Pizza Pan',
                'product_desc' => 'Harga mulai Rp60.000. Menggunakan saus homemade. Update Agustus 2026.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'pizza-pan',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Brownie Burn Cheese Cake',
                'product_desc' => 'Rp100.000 per loyang. Rp55.000 setengah loyang. Rp20.000 per slice.',
                'product_price' => 100000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'brownie-burn-cheese-cake',
                'category_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Base Pizza',
                'product_desc' => 'Harga Rp20.000.',
                'product_price' => 20000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'base-pizza',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Base Pizza + Mozzarella',
                'product_desc' => 'Harga Rp30.000.',
                'product_price' => 30000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'base-pizza-mozzarella',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // SOURDOUGH
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Sourdough Roti Tawar Original',
                'product_desc' => 'Harga Rp50.000. Update Agustus 2026.',
                'product_price' => 50000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'sourdough-roti-tawar-original',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'Sourdough Roti Tawar Keju.jpg',
                'product_name' => 'Sourdough Roti Tawar Keju',
                'product_desc' => 'Harga Rp60.000. Update Agustus 2026.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'sourdough-roti-tawar-keju',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'sourdough_coklat.jpeg',
                'product_name' => 'Sourdough Roti Tawar Coklat',
                'product_desc' => 'Harga Rp65.000. Update Agustus 2026.',
                'product_price' => 65000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'sourdough-roti-tawar-coklat',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'Banana Bread Canola Oil',
                'product_desc' => 'Less gluten, less sugar. Harga Rp95.000. Update Agustus 2026.',
                'product_price' => 95000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'banana-bread-canola-oil',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'soft_cookies.jpg',
                'product_name' => 'Soft Cookies',
                'product_desc' => 'Harga Rp12.000.',
                'product_price' => 12000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'soft-cookies',
                'category_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // SOURDOUGH CB
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Sourdough CB',
                'product_desc' => 'Harga mulai Rp50.000. Update Agustus 2026.',
                'product_price' => 50000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'sourdough-cb',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'CB SD Ungu / Kuning Original',
                'product_desc' => 'Harga Rp55.000. Update Agustus 2026.',
                'product_price' => 55000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cb-sd-ungu-kuning-original',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => '',
                'product_name' => 'CB SD Ungu / Kuning Isi Keju / Cocip',
                'product_desc' => 'Harga Rp60.000. Harga dasar Rp55.000 + isi keju/cocip Rp5.000. Update Agustus 2026.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cb-sd-ungu-kuning-isi-keju-cocip',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'cbsd_carnberry.jpeg',
                'product_name' => 'CB SD Carnberry',
                'product_desc' => 'Harga Rp60.000. Update Agustus 2026.',
                'product_price' => 60000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'cb-sd-cranberry',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'kue_lumpur.jpeg',
                'product_name' => 'Kue Lumpur',
                'product_desc' => 'Harga Rp5.000/pcs.',
                'product_price' => 5000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'kue-lumpur',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================
            // DIMSUM - CATEGORY 2
            // =====================================================

            [
                'product_image' => '',
                'product_name' => 'Dimsum Mentai Original',
                'product_desc' => 'Isi 8 pcs. Original/polos. Harga Rp30.000.',
                'product_price' => 30000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'dimsum-mentai-original',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_image' => 'dimsum_mentai.jpeg',
                'product_name' => 'Dimsum Mentai',
                'product_desc' => 'Isi 8 pcs. Harga Rp35.000.',
                'product_price' => 35000,
                'product_is_available' => 1,
                'product_is_best_seller' => 0,
                'product_slug' => 'dimsum-mentai',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Masukkan semua produk
        // Pisahkan produk: yang punya gambar di atas, yang tanpa gambar di bawah
        $withImage = array_filter($products, function ($p) {
            return trim($p['product_image']) !== '';
        });

        $withoutImage = array_filter($products, function ($p) {
            return trim($p['product_image']) === '';
        });

        // array_values untuk reset index, lalu gabungkan
        $products = array_merge(array_values($withoutImage), array_values($withImage));

        // Masukkan semua produk
        $this->db->table('product')->insertBatch($products);
    }
}