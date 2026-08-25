<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreInformationModel extends Model
{
    protected $table            = 'store_information';
    protected $primaryKey       = 'store_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'store_name',
        'store_logo',
        'store_description',
        'store_image',
        'hero_image',
        'address',
        'whatsapp',
        'instagram',
        'opening_hours',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get first store information row
     */
    public function getStoreInfo()
    {
        return $this->first();
    }
}
