<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemindaan_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_pemindahan');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/pengelolaan/pemindaan_barang';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data'] 		= $this->Model_pemindahan->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	// show update view 
	public function tambah()
	{
		$isi['content']		= 'admin/kampus/kampus_tambah';
		$isi['judul']		= 'add data';
		$isi['sub_judul']	= 'Tambah data kampus';
		$isi['kt']			= $this->Kampus_model->get_ktgori();
		$this->load->view('admin/index',$isi);
	}
	# menampilkan data update sebelum disimpan
	public function update($idkmpus)
	{
		$isi['content']		= 'admin/kampus/content_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idkampus' => $idkmpus);
		$isi['kt']			= $this->Kampus_model->get_ktgori();
		$isi['kampus']		= $this->Kampus_model->edit_data($where,'a_tblkampus')->result();
		$this->load->view('admin/index',$isi);
	}

	public function add_data() {

		$kd_kampus		= $this->input->post('kode_kampus');
		$nama_kampus	= $this->input->post('nama_kampus');
		$alamat 		= $this->input->post('alamat_kampus');

		$data = array(
					'kd_kampus'		=> $kd_kampus,
					'nmkampus' 		=> $nama_kampus,
					'alamat'		=> $alamat,
			);
		$this->Kampus_model->input_data($data,'a_tblkampus');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kampus/kampus"</script> <?php
	}

	public function hapus($idkampus)
	{
		$where = array('idkampus' => $idkampus);
		$this->Kampus_model->hapus_data($where,'a_tblkampus');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data kampus berhasil."); window.location.href="<?php echo base_url();?>/admin/kampus/kampus"</script> <?php
	}	

	public function update_simpan(){
		$idkampus 		= $this->input->post('idkampus');
		$kd_kampus		= $this->input->post('kode_kampus');
		$nama_kampus	= $this->input->post('nama_kampus');
		$alamat 		= $this->input->post('alamat_kampus');

		$data = array(
					'idkampus'		=> $idkampus,
					'kd_kampus'		=> $kd_kampus,
					'nmkampus' 		=> $nama_kampus,
					'alamat'		=> $alamat,
			);
		$where = array('idkampus' => $idkampus);
		$this->Kampus_model->update_data($where,$data,'a_tblkampus');

		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kampus/kampus"</script> <?php
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */