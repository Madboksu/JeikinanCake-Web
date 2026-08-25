<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonial';
    protected $primaryKey       = 'testimonial_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'testimonial_image',
        'testimonial_name',
        'testimonial_desc',
        'testimonial_date',
        'testimonial_star',
    ];

    // Dates
    protected $useTimestamps = false;

    /**
     * Get latest testimonials for homepage slider/grid
     */
    public function getLatestTestimonials(int $limit = 6)
    {
        return $this->orderBy('testimonial_date', 'DESC')
                    ->orderBy('testimonial_id', 'DESC')
                    ->findAll($limit);
    }
}
