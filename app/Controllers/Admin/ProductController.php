<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected ProductModel $productModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Simpan Produk Baru
     */
    public function save()
    {
        $rules = [
            'product_name'  => 'required|min_length[3]',
            'product_price' => 'required|numeric',
            'category_id'   => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/dashboard'))
                ->withInput()->with('error', 'Mohon lengkapi formulir produk dengan benar.');
        }

        $name = $this->request->getPost('product_name');
        $slug = url_title($name, '-', true);

        // Upload Gambar
        $imageName = 'default_product.jpg';
        $imageFile = $this->request->getFile('product_image_file');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $uploadPath = FCPATH . 'image/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $imageName = $imageFile->getRandomName();
            $imageFile->move($uploadPath, $imageName);
        }

        $isBestSeller = $this->request->getPost('product_is_best_seller') ? 1 : 0;
        if ($isBestSeller) {
            $currentBestCount = $this->productModel->where('product_is_best_seller', 1)->countAllResults();
            if ($currentBestCount >= 3) {
                return redirect()->to(base_url('admin/dashboard'))
                    ->withInput()->with('error', 'Maksimal hanya 3 produk yang dapat dijadikan Best Seller!');
            }
        }

        $data = [
            'product_name'           => $name,
            'product_slug'           => $slug,
            'product_price'          => $this->request->getPost('product_price'),
            'category_id'            => $this->request->getPost('category_id'),
            'product_desc'           => $this->request->getPost('product_desc'),
            'product_image'          => $imageName,
            'product_is_available'   => $this->request->getPost('product_is_available') ? 1 : 0,
            'product_is_best_seller' => $isBestSeller,
        ];

        $this->productModel->insert($data);

        return redirect()->to(base_url('admin/dashboard'))
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Update Produk Existing
     */
    public function update($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(base_url('admin/dashboard'))
                ->with('error', 'Produk tidak ditemukan.');
        }

        $name = $this->request->getPost('product_name');
        $slug = url_title($name, '-', true);

        $isBestSeller = $this->request->getPost('product_is_best_seller') ? 1 : 0;
        if ($isBestSeller && !$product['product_is_best_seller']) {
            $currentBestCount = $this->productModel->where('product_is_best_seller', 1)->countAllResults();
            if ($currentBestCount >= 3) {
                return redirect()->to(base_url('admin/dashboard'))
                    ->withInput()->with('error', 'Maksimal hanya 3 produk yang dapat dijadikan Best Seller!');
            }
        }

        $data = [
            'product_name'           => $name,
            'product_slug'           => $slug,
            'product_price'          => $this->request->getPost('product_price'),
            'category_id'            => $this->request->getPost('category_id'),
            'product_desc'           => $this->request->getPost('product_desc'),
            'product_is_available'   => $this->request->getPost('product_is_available') ? 1 : 0,
            'product_is_best_seller' => $isBestSeller,
        ];

        $imageFile = $this->request->getFile('product_image_file');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $uploadPath = FCPATH . 'image/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $imageFile->getRandomName();
            $imageFile->move($uploadPath, $newName);
            $data['product_image'] = $newName;
        }

        $this->productModel->update($id, $data);

        return redirect()->to(base_url('admin/dashboard'))
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Toggle status Best Seller untuk Tampilan Landing Page
     */
    public function toggleBestSeller($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(base_url('admin/dashboard'))
                ->with('error', 'Produk tidak ditemukan.');
        }

        $newStatus = $product['product_is_best_seller'] ? 0 : 1;

        if ($newStatus == 1) {
            $currentBestCount = $this->productModel->where('product_is_best_seller', 1)->countAllResults();
            if ($currentBestCount >= 3) {
                return redirect()->to(base_url('admin/dashboard'))
                    ->with('error', 'Maksimal hanya 3 produk yang dapat dijadikan Best Seller!');
            }
        }

        $this->productModel->update($id, ['product_is_best_seller' => $newStatus]);

        $msg = $newStatus ? 'Produk dijadikan Best Seller di Landing Page.' : 'Produk dihapus dari daftar Best Seller.';
        return redirect()->to(base_url('admin/dashboard'))->with('success', $msg);
    }

    /**
     * Hapus Produk
     */
    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product) {
            $this->productModel->delete($id);
            return redirect()->to(base_url('admin/dashboard'))
                ->with('success', 'Produk berhasil dihapus.');
        }
        return redirect()->to(base_url('admin/dashboard'))
            ->with('error', 'Produk tidak ditemukan.');
    }
}
