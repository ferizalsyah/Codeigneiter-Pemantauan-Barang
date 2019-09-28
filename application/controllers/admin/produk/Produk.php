<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Produk_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/produk/produk_content';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->get('tbl_produk');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/produk/produk_add';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Produk_model->get_ktgori();
		$isi['data']		= $this->Produk_model->get_ktgori1('tbl_produk');
		$this->load->view('admin/index',$isi);
	}

	public function update($id_produk)
	{
		$isi['content']		= 'admin/produk/produk_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('id_produk' => $id_produk);
		$isi['kt']			= $this->Produk_model->get_ktgori();
		$isi['barang']		= $this->Produk_model->edit_data($where,'tbl_produk')->result();
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
			if($typeFile== 'gif|jpg|png') {
				return 'default.jpg';
			}
			else {
				return 'default.pdf';
			}
		}

	}

	public function simpan()
	{
		$id_produk	 		= $this->input->post('id_produk');
		$nama_produk		= $this->input->post('nama_produk');
		$harga				= $this->input->post('harga');
		$tanggal_input		= $this->input->post('Tanggal_input');
		$jumlah_produk 		= $this->input->post('jumlah_produk');
		$deskripsi			= $this->input->post('Deskripsi');
		$foto_1 			= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'], 'foto'); 

		$data = array(
			'id_produk' 	=> $id_produk,
			'nama_produk'	=> $nama_produk,
			'harga'			=> $harga,
			'tanggal_input'	=> $tanggal_input,
			'jumlah_produk'	=> $jumlah_produk,
			'Deskripsi'		=> $deskripsi,
			'foto_1'		=> $foto_1

			);

		$this->Produk_model->input_data($data,'tbl_produk');
		// $query = $this->db->get_where('tbl_produk', array('id' =>'tbl_produk'));
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("tambah data berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/produk/produk"</script> <?php
	}

	public function hapus($id_produk)
	{
		$where = array('id_produk' => $id_produk);
		$sql = $this->db->query("select * from tbl_produk where id_produk='$id_produk	'")->result();
		// $sql = $this->db->get_where('tbl_produk', array('id' =>'$id_produk'), $limit);
		foreach ($sql as $value) {
			unlink('./assets/dist/img/'.$value->foto);	
		}
		$this->Produk_model->hapus_data($where,'tbl_produk');

		?> <script type="text/javascript">alert("delete data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/produk/produk"</script> 
		<?php


	}

	public function edit(){
		$id_ruang 			= $this->input->post('idsdm');
		$nama_ruang 		= $this->input->post('kdsdm');
		$lantai				= $this->input->post('nmsdm');
		$nama_kampus		= $this->input->post('idprofesi');
		$alamat				= $this->input->post('alamat');
		$tmp_lahir 			= $this->input->post('tmp_lahir');
		$tgl_lahir			= $this->input->post('tgl_lahir');

		if(!empty($_FILES['foto']['name'])) {
			// hapus foto lawas dan ganti dengan foto baru
			@unlink('./assets/dist/img/'.$this->input->post('foto_old'));
			$foto 				= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'],'foto');
		} else {

			$foto 				= $this->input->post('foto_old');
		}


		$data = array(
			'kdsdm' 			=> $nama_ruang,
			'nmsdm'				=> $lantai,
			'idprofesi'			=> $nama_kampus,
			'alamat'			=> $alamat,
			'tmp_lahir'			=> $tmp_lahir,
			'tgl_lahir'			=> $tgl_lahir,
			'foto'				=> $foto
		);
		$where = array(
			'idsdm' => $id_ruang
		);

		$this->Produk_model->update_data($where,$data,'tbl_produk');
		?>
	   		<script type="text/javascript">alert("Update data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/sdm/sdm"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */