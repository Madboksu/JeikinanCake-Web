<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $existing = $this->db->table('admin')->where('username', 'admin')->get()->getRow();
        if (!$existing) {
            $data = [
                'username'      => 'admin',
                'password_hash' => password_hash('admin', PASSWORD_BCRYPT),
            ];
            $this->db->table('admin')->insert($data);
        }
    }
}
