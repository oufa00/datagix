<?php 
namespace App\Controllers;
use App\Models\UserModell;
use CodeIgniter\Controller;

class UserCrud extends Controller
{
    // show users list
    public function index(){
        $userModel = new UserModell();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('user_view', $data);
    }

    // add user form
    public function create(){
        return view('add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new UserModell();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'ville'  => $this->request->getVar('ville'),
            'localite'  => $this->request->getVar('localite'),
        ];
        
        $userModel->insert($data);
        if (session()->get('role') == "admin") {
            return redirect()->to(base_url('admin'));
        }
        else{
        if (session()->get('role') == "editor") {
            return redirect()->to(base_url('editor'));
        }
        else{
            echo 'Accès refusé';
            exit;
        }
        }
        
    }

    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_view', $data);
    }

    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        if (session()->get('role') == "admin") {
            return redirect()->to(base_url('admin'));
        }
        else{
        if (session()->get('role') == "editor") {
            return redirect()->to(base_url('editor'));
        }
        else{
            echo 'Accès refusé';
            exit;
        }
        }
        
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModell();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        if (session()->get('role') == "admin") {
            return redirect()->to(base_url('admin'));
        }
        else{
        if (session()->get('role') == "editor") {
            return redirect()->to(base_url('editor'));
        }
        else{
            echo 'Accès refusé';
            exit;
        }
        }
        
    }    
}