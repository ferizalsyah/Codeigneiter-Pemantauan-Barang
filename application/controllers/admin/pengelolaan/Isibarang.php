<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Isibarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		if ($this->session->userdata('username')=="") {
            redirect('login');        
            
        }
		$this->load->model('Isi_barang');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/pengelolaan/isi_barang';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data'] 		= $this->db->get('b_tblbarang');
		$isi['jenis']		= $this->db->get('a_tbljenis');
		$isi['merk']		= $this->db->get('a_tblmerk');


		$this->load->view('admin/index',$isi);
	}	

	// show update view 
	public function tambah()
	{
		$isi['content']		= 'admin/kampus/kampus_tambah';
		$isi['judul']		= 'add data';
		$isi['sub_judul']	= 'Tambah data kampus';
		$isi['kt']			= $this->Isi_barang->get_ktgori();
		$this->load->view('admin/index',$isi);
	}
	# menampilkan data update sebelum disimpan
	public function update($idkmpus)
	{
		$isi['content']		= 'admin/kampus/content_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idkampus' => $idkmpus);
		$isi['kt']			= $this->Isi_barang->get_ktgori();
		$isi['data']		= $this->Isi_barang->edit_data($where,'b_tblbarang')->result();
		$this->load->view('admin/index',$isi);
	}

	public function add_data() {

		$nmbrng		= $this->input->post('nama_barang');
		$merk 		= $this->input->post('merk');
		$jnsbrng 	= $this->input->post('jenis_barang');
		$spesifikasi= $this->input->post('spesifikasi');
		$sn 		= $this->input->post('sn');
		$date 		= $this->input->post('date');
		$file 		=$this->aksi_upload();

		if($file['upload_data']) {
			$data = array(
				'idjenis'		=> $jnsbrng,
				'nmbarang' 		=> $nmbrng,
				'spesifikasi'	=> $spesifikasi,
				'idmerk' 		=> $merk,
				'sn' 			=> $sn,
				'fotobarang' 	=> $file['upload_data']['file_name'],
				'tgl_input' 	=>$date
			);

			$this->Isi_barang->input_data($data,'b_tblbarang');
		
			?>
				<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
				<script type="text/javascript">alert("Tambah data  berhasil."); window.location.href="<?php echo base_url();?>admin/pengelolaan/koleksi_barang"</script> <?php
		} else{
			print_r($file['upload_data']['full_path']);

		}	
		
	}

	public function aksi_upload(){
		$config['upload_path']          = './assets/dist/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload('photo')){
			$error = array('error' => $this->upload->display_errors());
			die(print_r($error));
		}else{
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}	
	}


	public function hapus($idkampus)
	{
		$where = array('idbarang' => $idkampus);
		$this->Isi_barang->hapus_data($where,'b_tblbarang');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data kampus berhasil."); window.location.href="<?php echo base_url();?>/admin/kampus/kampus"</script> <?php
	}	

	public function update_simpan(){
		$idkampus 		= $this->input->post('idkampus');
		$kd_kampus		= $this->input->post('kode_kampus');
		$nama_kampus	= $this->input->post('nama_kampus');
		$alamat 		= $this->input->post('alamat_kampus');
		$old_foto 		= $this->input->post('oldphoto');
		$new_photo 		= $this->input->post('newphoto');

		function check($a, $b) {
			if($a != Null or $a != '') 
				return $a;
			else 
				return $b;
		}
		$data = array(
					'idkampus'		=> $idkampus,
					'kd_kampus'		=> $kd_kampus,
					'nmkampus' 		=> $nama_kampus,
					'alamat'		=> $alamat,
					'fotobarang'	=> check($old_foto,$new_photo)
			);

		$where = array('idkampus' => $idkampus);
		$this->Isi_barang->update_data($where,$data,'b_tblbarang');

		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kampus/kampus"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
