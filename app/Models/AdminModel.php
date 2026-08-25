<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password_hash'];

    // Dates
    protected $useTimestamps = false;

    /**
     * Find admin user by username for authentication
     */
    public function getByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
}
