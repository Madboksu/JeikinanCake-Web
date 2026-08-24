<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'password_hash' => password_hash('admin', PASSWORD_BCRYPT),
        ];

        $this->db->table('admin')->insert($data);
    }
}
