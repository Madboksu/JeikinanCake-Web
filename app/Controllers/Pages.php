<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\StoreInformationModel;
use App\Models\TestimonialModel;

class Pages extends BaseController
{
    protected StoreInformationModel $storeModel;
    protected ProductModel $productModel;
    protected CategoryModel $categoryModel;
    protected TestimonialModel $testimonialModel;

    public function __construct()
    {
        $this->storeModel       = new StoreInformationModel();
        $this->productModel     = new ProductModel();
        $this->categoryModel    = new CategoryModel();
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * Halaman Landing (Homepage)
     * Mengirimkan data store_information, 3 produk best seller, & testimoni
     */
    public function index()
    {
        $data = [
            'title'        => 'Home - Jeikinan Cake',
            'store'        => $this->storeModel->getStoreInfo(),
            'best_sellers' => $this->productModel->getBestSellers(3),
            'testimonials' => $this->testimonialModel->getLatestTestimonials(6),
        ];

        return view('home', $data);
    }

    /**
     * Halaman Katalog Produk
     * Mendukung search, filter kategori, sorting (Available, A-Z, Z-A, Recommended), & pagination 12 item
     */
    public function product()
    {
        $categoryId = $this->request->getGet('category') ? (int) $this->request->getGet('category') : null;
        $sortBy     = $this->request->getGet('sort');
        $keyword    = $this->request->getGet('search');

        $data = [
            'title'        => 'Product - Jeikinan Cake',
            'store'        => $this->storeModel->getStoreInfo(),
            'products'     => $this->productModel->getFilteredProducts($categoryId, $sortBy, $keyword, 12),
            'pager'        => $this->productModel->pager,
            'categories'   => $this->categoryModel->findAll(),
            'selectedCat'  => $categoryId,
            'selectedSort' => $sortBy,
            'keyword'      => $keyword,
        ];

        return view('product', $data);
    }

    /**
     * Halaman Keranjang Belanja
     */
    public function cart()
    {
        $data = [
            'title' => 'Keranjang Belanja - Jeikinan Cake',
            'store' => $this->storeModel->getStoreInfo(),
        ];

        return view('cart', $data);
    }
}
