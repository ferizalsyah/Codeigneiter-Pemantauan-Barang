<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Sdm_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/sdm/sdm_content';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->query('select A.*,B.nmprofesi from a_tblsdm A INNER JOIN a_tblprofesi B ON A.idprofesi=B.idprofesi');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/sdm/sdm_add';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Sdm_model->get_ktgori();
		$isi['data']		= $this->Sdm_model->get_ktgori1('a_tblprofesi');
		$this->load->view('admin/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'admin/sdm/sdm_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idsdm' => $id_barang);
		$isi['kt']			= $this->Sdm_model->get_ktgori();
		$isi['barang']		= $this->Sdm_model->edit_data($where,'a_tblsdm')->result();
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
			if($data == 'gif|jpg|png') {
				return 'default.jpg';
			}
			else {
				return 'default.pdf';
			}
		}

	}

	public function simpan()
	{
		$nama_ruang 		= $this->input->post('kdsdm');
		$nama				= $this->input->post('nmsdm');
		$nama_kampus		= $this->input->post('idprofesi');
		$alamat				= $this->input->post('alamat');
		$tmp_lahir 			= $this->input->post('tmp_lahir');
		$tgl_lahir			= $this->input->post('tgl_lahir');
		$foto 				= $this->uploadFile('gif|jpg|png', 2048, $_FILES['foto']['name'], 'foto'); 

		$data = array(
			'kdsdm' 			=> $nama_ruang,
			'nmsdm'				=> $nama,
			'idprofesi'			=> $nama_kampus,
			'alamat'			=> $alamat,
			'tmp_lahir'			=> $tmp_lahir,
			'tgl_lahir'			=> $tgl_lahir,
			'foto'				=> $foto

			);

		$this->Sdm_model->input_data($data,'a_tblsdm');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("tambah data berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/sdm/sdm"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idsdm' => $id_barang);
		$sql = $this->db->query("select * from a_tblsdm where idsdm='$id_barang'")->result();
		foreach ($sql as $value) {
			unlink('./assets/dist/img/'.$value->foto);	
		}
		$this->Sdm_model->hapus_data($where,'a_tblsdm');

		?> <script type="text/javascript">alert("delete data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/sdm/sdm"</script> 
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

		$this->Sdm_model->update_data($where,$data,'a_tblsdm');
		?>
	   		<script type="text/javascript">alert("Update data sdm berhasil."); window.location.href="<?php echo base_url();?>/admin/sdm/sdm"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */