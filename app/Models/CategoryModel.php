<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'category';
    protected $primaryKey       = 'category_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['category_name'];

    // Dates
    protected $useTimestamps = false;

    /**
     * Get all categories with product counts
     */
    public function getCategoriesWithCount()
    {
        return $this->select('category.*, COUNT(product.product_id) as total_products')
                    ->join('product', 'product.category_id = category.category_id', 'left')
                    ->groupBy('category.category_id')
                    ->findAll();
    }
}
