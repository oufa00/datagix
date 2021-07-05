<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModell;

class FileUpload extends Controller
{

    public function index() 
	{
        $userModel = new UserModell();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
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
 
    function upload() {    
       
        $userModel = new UserModell();
       
         
        $database = \Config\Database::connect();
        $db = $database->table('cv');
        $id = $this->request->getVar('id');
        
      
            $img = $this->request->getFile('file');
            $img->move(WRITEPATH . 'uploads');
    
            $data = [
                'id_user' =>  $id,
               'filename' =>  $img->getName(),
               'type'  => $img->getClientMimeType()
            ];
            
            $save = $db->insert($data);

            $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
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

