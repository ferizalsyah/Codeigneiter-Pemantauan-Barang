<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita_model extends CI_Model{
	function tampil_data(){
		return $this->db->get('u_tblkategori');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function get_ktgori(){
		return $this->db->get('u_tblkategori');
		}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */