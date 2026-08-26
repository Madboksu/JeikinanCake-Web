<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class TestimonialController extends BaseController
{
    protected TestimonialModel $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * Simpan Testimoni Baru
     */
    public function save()
    {
        $rules = [
            'testimonial_name' => 'required',
            'testimonial_desc' => 'required',
            'testimonial_star' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/dashboard#testimonials-section'))
                ->withInput()->with('error', 'Mohon lengkapi formulir testimoni dengan benar.');
        }

        $avatarName = 'default_avatar.jpg';
        $avatarFile = $this->request->getFile('testimonial_image_file');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $uploadPath = FCPATH . 'image/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $avatarName = $avatarFile->getRandomName();
            $avatarFile->move($uploadPath, $avatarName);
        }

        $data = [
            'testimonial_name'  => $this->request->getPost('testimonial_name'),
            'testimonial_desc'  => $this->request->getPost('testimonial_desc'),
            'testimonial_star'  => (int) $this->request->getPost('testimonial_star'),
            'testimonial_date'  => date('Y-m-d'),
            'testimonial_image' => $avatarName,
        ];

        $this->testimonialModel->insert($data);

        return redirect()->to(base_url('admin/dashboard#testimonials-section'))
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Update Testimoni
     */
    public function update($id)
    {
        $testimonial = $this->testimonialModel->find($id);
        if (!$testimonial) {
            return redirect()->to(base_url('admin/dashboard#testimonials-section'))
                ->with('error', 'Testimoni tidak ditemukan.');
        }

        $data = [
            'testimonial_name' => $this->request->getPost('testimonial_name'),
            'testimonial_desc' => $this->request->getPost('testimonial_desc'),
            'testimonial_star' => (int) $this->request->getPost('testimonial_star'),
        ];

        $avatarFile = $this->request->getFile('testimonial_image_file');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $uploadPath = FCPATH . 'image/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $avatarFile->getRandomName();
            $avatarFile->move($uploadPath, $newName);
            $data['testimonial_image'] = $newName;
        }

        $this->testimonialModel->update($id, $data);

        return redirect()->to(base_url('admin/dashboard#testimonials-section'))
            ->with('success', 'Testimoni berhasil diperbarui!');
    }

    /**
     * Hapus Testimoni
     */
    public function delete($id)
    {
        $testimonial = $this->testimonialModel->find($id);
        if ($testimonial) {
            $this->testimonialModel->delete($id);
            return redirect()->to(base_url('admin/dashboard#testimonials-section'))
                ->with('success', 'Testimoni berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/dashboard#testimonials-section'))
            ->with('error', 'Testimoni tidak ditemukan.');
    }
}
