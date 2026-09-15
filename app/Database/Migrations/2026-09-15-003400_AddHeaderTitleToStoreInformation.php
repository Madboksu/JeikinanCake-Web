<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHeaderTitleToStoreInformation extends Migration
{
    public function up()
    {
        $this->forge->addColumn('store_information', [
            'header_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'store_name',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('store_information', 'header_title');
    }
}
