<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'product_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'product_desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'product_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'null'       => true,
            ],
            'product_is_available' => [
                'type'    => 'BOOLEAN',
                'default' => true,
                'null'    => true,
            ],
            'product_is_best_seller' => [
                'type'    => 'BOOLEAN',
                'default' => false,
                'null'    => true,
            ],
            'product_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('product_id', true);
        $this->forge->addUniqueKey('product_slug');
        $this->forge->addForeignKey('category_id', 'category', 'category_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
