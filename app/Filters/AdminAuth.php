<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to.
     * Called BEFORE the controller action.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('is_admin_logged_in')) {
            return redirect()->to(base_url('admin/login'))->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing required
    }
}
