<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

    public function __construct(){
            parent::__construct();
            $this->load->model('rest_api/User', 'user');
            $this->input = file_get_contents('php://input');
    }
    

    public function login() {
        $input = json_decode($this->input, TRUE);
        if(empty($input['username']) || empty($input['password'])) {
            die('username dan password tidak ada!!');
        }


        $result = $this->user->authLogin($input['username'], $input['password']);
        if($result) {
            $data = array(
                'data' => $result,
                'message' => 'data ditemukan',
                'errror' => null,
            );
        } else {
            $data = array(
                'data' => null,
                'message' => 'tidak ditemukan',
                'errror' => 'username atau password tidak ditemukan!',
            );
        }

        header('Content-Type', 'application/json');
        echo json_encode($data);
            
    }

    public function signup() {
        $input = json_decode($this->input);
 
        $result = $this->user->registerUser($input);
        if(result) {
            $data = array(
                'message' => 'berhasil untuk signup',
                'errror' => null,
            );
        } else {
            $data = array(
                'message' => 'gagal untuk signup',
                'errror' => 'cek email atau passwrd',
            );
        }

        header('Content-Type', 'application/json');
        echo json_encode($data);

    }
    public function getAllCategory() {
        $input = json_decode($this->input);
        
        $result = $this->db->get('tbl_kategori')->result();
        header('Content-Type', 'application/json');
        $data = array(
            'message' => 'data ditemukan sebanyak',
            'errror' => null,
            
            'data' => $result
        );
        echo json_encode($data);
    }
 
	
}
