<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
	
    public function authLogin($username, $pass) {
        $query = array(
            'username' => $username,
            'password' => $pass
        );

        $this->db->update('tbl_user',)
        $this->db->select('*')->from('tbl_user');
        $this->db->where($query);
        $result = $this->db->get()->row();



        return $result;
    }


    public function registerUser($body) {
        $data = array(
            'username' => $body['username'],
            'email' => $body['email'],
            'no'    => $body['no'],
            'alamat' => $body['alamat']
        );
        $result = $this->db->insert($data, 'tbl_user');
        if ($result) return 1;
        else return 0;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */