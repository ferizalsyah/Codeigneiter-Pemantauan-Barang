<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Kategori_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/kategori_barang/kategori_barang';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Kategori';
		$isi['data'] 		= $this->db->get('a_tblkategori');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/kategori_barang/kategori_tambah';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Kategori_model->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'admin/kategori_barang/content_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idkategori' => $id_barang);
		$isi['kt']			= $this->Kategori_model->get_ktgori();
		$isi['barang']		= $this->Kategori_model->edit_data($where,'a_tblkategori')->result();
		$this->load->view('admin/index',$isi);
	}

	public function simpan()
	{
		$kode_barang 		= $this->input->post('nama_kategori');

		$data = array(
					'nmkategori'			=> $kode_barang,
			);
		$this->Kategori_model->input_data($data,'a_tblkategori');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kategori_barang/kategori"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idkategori' => $id_barang);
		$this->Kategori_model->hapus_data($where,'a_tblkategori');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kategori_barang/kategori"</script> <?php
	}

	public function edit(){
		$id_barang 			= $this->input->post('id_kategori');
		$kode_barang 		= $this->input->post('nama_kategori');

		$data = array(
					'idkategori'			=> $id_barang,
					'nmkategori'			=> $kode_barang,
			);
	$where = array(
		'idkategori' => $id_barang
	);

	$this->Kategori_model->update_data($where,$data,'a_tblkategori');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>admin/kategori_barang/kategori"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */