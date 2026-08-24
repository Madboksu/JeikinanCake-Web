<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'testimonial_image' => 'default.png',
                'testimonial_name'  => 'Siti Rahma',
                'testimonial_desc'  => 'Kuenya sangat lembut dan manisnya pas! Recommended banget buat acara ulang tahun.',
                'testimonial_date'  => date('Y-m-d'),
                'testimonial_star'  => 5,
            ],
            [
                'testimonial_image' => 'default.png',
                'testimonial_name'  => 'Budi Santoso',
                'testimonial_desc'  => 'Pelayanan cepat dan desain cake sesuai permintaan.',
                'testimonial_date'  => date('Y-m-d', strtotime('-2 days')),
                'testimonial_star'  => 5,
            ],
        ];

        $this->db->table('testimonial')->insertBatch($testimonials);
    }
}
