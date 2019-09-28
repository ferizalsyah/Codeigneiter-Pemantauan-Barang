<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sumber_br extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Sumber_barang_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/sumber_barang/data_sumber_barang';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data'] 		= $this->db->get('a_tblsumber');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/sumber_barang/sumber_tambah';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Sumber_barang_model->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'admin/sumber_barang/sumber_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idsumber' => $id_barang);
		$isi['kt']			= $this->Sumber_barang_model->get_ktgori();
		$isi['barang']		= $this->Sumber_barang_model->edit_data($where,'a_tblsumber')->result();
		$this->load->view('admin/index',$isi);
	}

	public function simpan()
	{
		$nama_sumber		= $this->input->post('nm_sumber');

		$data = array(
					'nmsumber' 		=> $nama_sumber,

			);
		$this->Sumber_barang_model->input_data($data,'a_tblsumber');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data data sumber berhasil."); window.location.href="<?php echo base_url();?>admin/sumber_barang/sumber_br"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idsumber' => $id_barang);
		$this->Sumber_barang_model->hapus_data($where,'a_tblsumber');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data sumber berhasil."); window.location.href="<?php echo base_url();?>admin/sumber_barang/sumber_br"</script> <?php
	}

	public function edit(){
		$idsumber 			= $this->input->post('idsumber');
		$nama_sumber 		= $this->input->post('nm_sumber');
		$data = array(
					'idsumber'		=> $idsumber,
					'nmsumber'		=> $nama_sumber,
		);
	$where = array(
		'idsumber' => $idsumber
	);

	$this->Sumber_barang_model->update_data($where,$data, 'a_tblsumber');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data sumber berhasil."); window.location.href="<?php echo base_url();?>admin/sumber_barang/sumber_br"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */