<?php

namespace App\Controllers;

// use App\Models\ProductModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('pages/admin/dashboard',$data);
    }
    
}