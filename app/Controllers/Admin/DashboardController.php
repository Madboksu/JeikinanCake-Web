<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\StoreInformationModel;
use App\Models\TestimonialModel;

class DashboardController extends BaseController
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
     * Halaman Tunggal CMS Admin (Teks, Landing Page, Testimoni, & Produk)
     */
    public function index()
    {
        $store = $this->storeModel->getStoreInfo();

        $data = [
            'title'        => 'CMS Kelola Website - Jeikinan Cake',
            'store'        => $store,
            'testimonials' => $this->testimonialModel->orderBy('testimonial_id', 'DESC')->findAll(),
            'products'     => $this->productModel->getProductsWithCategory(),
            'categories'   => $this->categoryModel->findAll(),
        ];

        return view('admin/dashboard', $data);
    }

    /**
     * Update Informasi Toko & Teks/Gambar Landing Page
     */
    public function updateStoreInfo()
    {
        $store = $this->storeModel->getStoreInfo();
        $storeId = $store ? $store['store_id'] : null;

        $updateData = [
            'store_name'        => $this->request->getPost('store_name'),
            'store_description' => $this->request->getPost('store_description'),
            'address'           => $this->request->getPost('address'),
            'whatsapp'          => $this->request->getPost('whatsapp'),
            'instagram'         => $this->request->getPost('instagram'),
            'opening_hours'     => $this->request->getPost('opening_hours'),
        ];

        $uploadPath = FCPATH . 'image/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle Store Logo Upload
        $logoFile = $this->request->getFile('store_logo_file');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $newName = $logoFile->getRandomName();
            $logoFile->move($uploadPath, $newName);
            $updateData['store_logo'] = $newName;
        }

        // Handle Store Image Upload
        $storeImgFile = $this->request->getFile('store_image_file');
        if ($storeImgFile && $storeImgFile->isValid() && !$storeImgFile->hasMoved()) {
            $newName = $storeImgFile->getRandomName();
            $storeImgFile->move($uploadPath, $newName);
            $updateData['store_image'] = $newName;
        }

        // Handle Hero Image Upload
        $heroImgFile = $this->request->getFile('hero_image_file');
        if ($heroImgFile && $heroImgFile->isValid() && !$heroImgFile->hasMoved()) {
            $newName = $heroImgFile->getRandomName();
            $heroImgFile->move($uploadPath, $newName);
            $updateData['hero_image'] = $newName;
        }

        if ($storeId) {
            $this->storeModel->update($storeId, $updateData);
        } else {
            $this->storeModel->insert($updateData);
        }

        return redirect()->to(base_url('admin/dashboard'))
            ->with('success', 'Teks dan gambar landing page berhasil diperbarui!');
    }
}
