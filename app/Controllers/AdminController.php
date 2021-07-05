<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModell;
class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Accès refusé';
            exit;
        }
    }
    public function index()
    {
        $userModel = new UserModell();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view("admin/dashboard", $data);
    }
}