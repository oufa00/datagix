<?php

namespace App\Controllers;
use App\Models\UserModel;

use App\Controllers\BaseController;
class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if($user['role'] == "admin"){

                    return redirect()->to(base_url('admin'));

                }elseif($user['role'] == "editor"){

                    return redirect()->to(base_url('editor'));
                }
            }
        }
        return view('login');
    }
    public function register()
    {
        return view('layouts/register_compte');

    }
    public function register_user()
    {
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]',
        ];

        $errors = [
            'password' => [
                'validateUser' => "Email or Password didn't match",
            ],
        ];
        if (!$this->validate($rules, $errors)) {

            return view('layouts/register_compte', [
                "validation" => $this->validator,
            ]);

        } else {
            $model = new UserModel();
            $user = $model->where('email', $this->request->getVar('email'))
            ->first();
            if($user){
                $data = array("message" => "Email existe déja");
                return view('layouts/register_compte',  $data);
            }
            $new_user = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'phone_no'  => $this->request->getVar('phone'),
                'role'  => $this->request->getVar('role'),
                'password'=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $new_user->insert($data);
            $data = array("message" => "Inscription avec success");
            return view('login',$data);
        }

    }
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}