<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		
		$this->load->model('login_model');
		$this->check_sesion(
			$this->session->userdata('username'),
			$this->session->userdata('level_user')
		);
	}
 
	public function index(){
		$data = array('error' => '');
		$this->load->view('login', $data)
;	}
 
	# login process here 
	public function login_process(){
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');

		$result = $this->login_model->check_user($username, $password); 
		if($result->num_rows() > 0){
			foreach ($result->result() as $row) {
				$id_user 			= $row->id_user;
				$username 			= $row->username;
				$nama_lengkap		= $row->nama_lengkap;
				$level_user			= $row->level_user;
			}
 
			$newdata = array(
			        'id_user'  		=> $id_user,
			        'username' 		=> $username,
			        'nama_lengkap'	=> $nama_lengkap,
			        'level_user'	=> $level_user,
			        'logged_in' 	=> TRUE
			);
			
			$this->session->set_userdata($newdata);
			$this->check_sesion(
				$this->session->userdata('username'),
				$this->session->userdata('level_user')
			);

		}else {
			?>
			<script type="text/javascript">alert("Maaf nama atau password anda salah."); window.location.href="<?php echo base_url();?>index.php/login"</script> <?php
		}
	}

	# validation user session
	function check_sesion($user_name_session,$level_user) {
		if($user_name_session) {
			switch ($level_user) {
				case '1':
					redirect('admin/admin');
					break;
				case '2':
					redirect('bpm/bpm');
					break;
				case '3':
					redirect('yayasan/yayasan');
					break;
				case '4':
					redirect('biroadm/biroadm');
					break;
				case '5':
					redirect('user/user');
					break;
			}
		}
	}
}
