<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_image',
        'product_name',
        'product_desc',
        'product_price',
        'product_is_available',
        'product_is_best_seller',
        'product_slug',
        'category_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get best seller products for homepage section (always returns up to 3 items)
     */
    public function getBestSellers(int $limit = 3)
    {
        $best = $this->select('product.*, category.category_name')
                     ->join('category', 'category.category_id = product.category_id', 'left')
                     ->where('product_is_best_seller', 1)
                     ->orderBy('product.product_id', 'DESC')
                     ->findAll($limit);

        $count = count($best);
        if ($count < $limit) {
            $existingIds = array_column($best, 'product_id');
            $needed = $limit - $count;

            $builder = $this->select('product.*, category.category_name')
                            ->join('category', 'category.category_id = product.category_id', 'left');
            if (!empty($existingIds)) {
                $builder->whereNotIn('product.product_id', $existingIds);
            }
            $fill = $builder->orderBy('product.product_id', 'DESC')->findAll($needed);
            $best = array_merge($best, $fill);
        }

        return $best;
    }

    /**
     * Get all available products with category name
     */
    public function getProductsWithCategory(?int $categoryId = null)
    {
        $builder = $this->select('product.*, category.category_name')
                        ->join('category', 'category.category_id = product.category_id', 'left');

        if ($categoryId !== null) {
            $builder->where('product.category_id', $categoryId);
        }

        return $builder->orderBy('product.product_id', 'DESC')->findAll();
    }

    /**
     * Get paginated products for the catalog page with filters, sorting, and search
     * Matching the Product Catalog Page UI filters:
     * - Sort By: Available Product, A-Z, Z-A, Recommended
     * - Category Filter: All, Pastry, Hampers, Cake, Cookie, etc.
     * - Search Bar: Search keyword
     * - Pagination: CodeIgniter 4 Pager (12 per page)
     */
    public function getFilteredProducts(?int $categoryId = null, ?string $sortBy = null, ?string $keyword = null, int $perPage = 12)
    {
        $this->select('product.*, category.category_name')
             ->join('category', 'category.category_id = product.category_id', 'left');

        // Filter by Category
        if ($categoryId !== null && $categoryId > 0) {
            $this->where('product.category_id', $categoryId);
        }

        // Filter by Search Keyword
        if (!empty($keyword)) {
            $this->groupStart()
                    ->like('product_name', $keyword)
                    ->orLike('product_desc', $keyword)
                ->groupEnd();
        }

        // Sorting Logic from UI Sidebar
        switch (strtolower((string) $sortBy)) {
            case 'available':
                $this->where('product_is_available', 1);
                $this->orderBy('product.product_id', 'DESC');
                break;
            case 'a-z':
                $this->orderBy('product_name', 'ASC');
                break;
            case 'z-a':
                $this->orderBy('product_name', 'DESC');
                break;
            case 'recommended':
                $this->where('product_is_best_seller', 1);
                $this->orderBy('product.product_id', 'DESC');
                break;
            default:
                $this->orderBy('product.product_id', 'DESC');
                break;
        }

        return $this->paginate($perPage);
    }

    /**
     * Search products by name or description
     */
    public function searchProducts(string $keyword)
    {
        return $this->select('product.*, category.category_name')
                    ->join('category', 'category.category_id = product.category_id', 'left')
                    ->groupStart()
                        ->like('product_name', $keyword)
                        ->orLike('product_desc', $keyword)
                    ->groupEnd()
                    ->where('product_is_available', 1)
                    ->findAll();
    }

    /**
     * Get single product by slug
     */
    public function getBySlug(string $slug)
    {
        return $this->select('product.*, category.category_name')
                    ->join('category', 'category.category_id = product.category_id', 'left')
                    ->where('product_slug', $slug)
                    ->first();
    }
}
