<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestimonialTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'testimonial_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'testimonial_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'testimonial_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'testimonial_desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'testimonial_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'testimonial_star' => [
                'type'       => 'TINYINT',
                'constraint' => 3,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('testimonial_id', true);
        $this->forge->createTable('testimonial');
    }

    public function down()
    {
        $this->forge->dropTable('testimonial');
    }
}
