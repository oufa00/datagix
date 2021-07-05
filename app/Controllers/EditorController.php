<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModell;

class EditorController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "editor") {
            echo 'Accès refusé';
            exit;
        }
    }
    public function index()
    {
        $userModel = new UserModell();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view("editor/dashboard",$data);
    }
}