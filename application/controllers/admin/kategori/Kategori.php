<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori  extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_kategori');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/kategori/kategori_content.php';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->get('tbl_kategori');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/kategori/kategori_add';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Model_kategori->get_ktgori();
		$isi['data']		= $this->Model_kategori->get_ktgori1('tbl_kategori');
		$this->load->view('admin/index',$isi);
	}

	public function update($id_nomor)
	{
		$isi['content']		= 'admin/kategori/kategori_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('id_nomor' => $id_nomor);
		$isi['kt']			= $this->Model_kategori->get_ktgori();
		$isi['barang']		= $this->Model_kategori->edit_data($where,'tbl_kategori')->result();
		$this->load->view('admin/index',$isi);
	}

	private function uploadFile($typeFile, $maxSize, $name, $formName) {
		$config['upload_path'] 			= './assets/dist/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['allowed_types']        = $typeFile;
		$config['max_size']             = $maxSize;

		/* load library upload file */
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload($formName)) {
			return $name;
		} else{
			$error = $this->upload->display_errors();
			die($error);
		}

	}

	public function simpan()
	{
		$id_nomor    		= $this->input->post('id_nomor');
		$kategori    		= $this->input->post('kategori');
		$title			    = $this->input->post('title');
		$foto 				= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'], 'foto'); 

		$data = array(
			'id_nomor' 			=> $id_nomor,
			'kategori' 			=> $kategori,
			'title' 			=> $title,
			'foto'				=> $foto
			);

		$this->Model_kategori->input_data($data,'tbl_kategori');
		?>
		
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("tambah data berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/kategori/kategori"</script> <?php
	}

	public function hapus($id_nomor)
	{
		$where = array('id_nomor' => $id_nomor);
		$sql = $this->db->get_where("tbl_kategori", $where)->result();
		foreach ($sql as $value) {
			unlink('./assets/dist/img/'.$value->foto);	
		}
		$this->Model_kategori->hapus_data($where,'tbl_kategori');

		?> <script type="text/javascript">alert("delete data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/sdm/sdm"</script> 
		<?php


	}

	public function edit(){
		$id_nomor 			= $this->input->post('id_nomor');
		$title 				= $this->input->post('title');
		$kategori 			= $this->input->post('kategori');
		$foto				= $this->input->post('foto');

		if(!empty($_FILES['foto']['name'])) {
			// hapus foto lawas dan ganti dengan foto baru
			@unlink('./assets/dist/img/'.$this->input->post('foto_old'));
			$foto 				= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'],'foto');
		} else {

			$foto 				= $this->input->post('foto_old');
		}


		$data = array(
			'id_nomor' 			=> $id_nomor,
			'kategori' 			=> $kategori,
			'title'				=> $title,
			'foto'				=> $foto
		);
		$where = array(
			'id_nomor' => $id_nomor
		);

		$this->Model_kategori->update_data($where,$data,'tbl_kategori');
		?>
	   		<script type="text/javascript">alert("Update data kategori berhasil."); window.location.href="<?php echo base_url();?>/admin/kategori/kategori"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */