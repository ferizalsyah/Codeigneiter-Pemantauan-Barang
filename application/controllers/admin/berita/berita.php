<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('berita_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/berita/berita_content';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->query('SELECT * FROM u_tblberita A INNER JOIN u_tblkategori B ON A.idberita = B.idkategori');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/berita/berita_add';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->berita_model->get_ktgori();
		$isi['data']		= $this->berita_model->get_ktgori('u_tblkategori');
		$this->load->view('admin/index',$isi);
	}

	public function update($idberita)
	{
		$isi['content']		= 'admin/berita/berita_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idberita' =>$idberita);
		$isi['kt']			= $this->berita_model->get_ktgori();
		$isi['barang']		=  $this->db->query("SELECT * FROM u_tblberita A INNER JOIN u_tblkategori B ON A.idberita = B.idkategori where A.idberita='$idberita'")->result();
		$this->load->view('admin/index',$isi);
	} 	

	private function uploadFile($typeFile, $maxSize, $name, $formName) {
		$config['upload_path'] 			= './assets/dist/img/';
		$config['allowed_types']        = $typeFile;
		$config['max_size']             = $maxSize;

		/* load library upload file */
		$this->load->library('upload', $config);
		if($this->upload->do_upload($formName)) {
			return $name;
		} else {

			// tindakan apabila upload file gagal 
			//  jika tindakan gagal maka kembalikan default.jpg or default.pdf jika yng di upload pdf file
			if($typeFile == 'gif|jpg|png') {
				return 'default.jpg';
			}
			else {
				return 'default.pdf';
			}
		}

	}

	public function simpan()
	{
		$judul				= $this->input->post('judul');
		$idkategori			= $this->input->post('idkategori');
		$isi				= $this->input->post('isi');
		$tgl_berita			= $this->input->post('tgl_berita');
		$foto_berita 		= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'], 'foto'); 

		$data = array(
			'judul' 			=> $judul,
			'idkategori'		=> $idkategori,
			'isiberita'			=> $isi,
			'tglberita'		 	=> $tgl_berita,
			'fotoberita'		=> $foto_berita

			);

		$this->berita_model->input_data($data,'u_tblberita');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("tambah data berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/berita/berita"</script> <?php
	}

	public function hapus($idberita)
	{
		$where = array('idberita' => $idberita);
		$sql = $this->db->query("SELECT * FROM u_tblberita where idberita='$idberita'")->result();
		foreach ($sql as $value) {
			unlink('./assets/dist/img/'.$value->foto);	
		}
		$this->berita_model->hapus_data($where,'u_tblberita');

		?> <script type="text/javascript">alert("delete data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/berita/berita"</script> 
		<?php


	}

	public function edit(){
		$idberita 			= $this->input->post('idberita');
		$judul 				= $this->input->post('judul');
		$idkategori 		= $this->input->post('idkategori');
		$isi				= $this->input->post('isi');
		$tgl_berita			= $this->input->post('tgl_berita');
		// $foto_berita			= $this->input->post('fotoberita');
		if(!empty($_FILES['fotoberita']['name'])) {
			// hapus foto lawas dan ganti dengan foto baru
			@unlink('./assets/dist/img/'.$this->input->post('foto_old'));
			$foto 				= $this->uploadFile('gif|jpg|png', 2048, $_FILES['fotoberita']['name'],'fotoberita');
		} else {

			$foto 				= $this->input->post('foto_old');
		}


		$data = array(
			'judul' 			=> $judul,
			'idkategori'		=> $idkategori,
			'isiberita'			=> $isi,
			'tglberita'			=> $tgl_berita,
			'fotoberita'		=> $foto,
		);
		$where = array(
			'idberita' => $idberita
		);

		$this->berita_model->update_data($where,$data,'u_tblberita');
		?>
	   		<script type="text/javascript">alert("Update data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/berita/berita"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */