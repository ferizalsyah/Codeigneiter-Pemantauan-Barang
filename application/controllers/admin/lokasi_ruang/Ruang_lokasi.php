<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruang_lokasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Ruang_lokasi_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/ruang/ruang_lokasi';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->query('select A.*,B.nmkampus from a_tblokasi A INNER JOIN a_tblkampus B ON A.idkampus=B.idkampus');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/ruang/ruang_lokasi_tambah';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Ruang_lokasi_model->get_ktgori();
		$isi['data']		= $this->Ruang_lokasi_model->get_ktgori1('a_tblkmpus');
		$this->load->view('admin/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'admin/ruang/ruang_lokasi_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idruang' => $id_barang);
		$isi['kt']			= $this->Ruang_lokasi_model->get_ktgori();
		$isi['barang']		= $this->Ruang_lokasi_model->edit_data($where,'a_tblokasi')->result();
		$this->load->view('admin/index',$isi);
	}

	public function simpan()
	{
		$id_ruang 			= $this->input->post('idruang');
		$nama_ruang 		= $this->input->post('nama_ruang');
		$lantai				= $this->input->post('lantai_ruang');
		$nama_kampus		= $this->input->post('nama_kampus');


		$data = array(
					'idruang'			=> $id_ruang,
					'nmruang' 			=> $nama_ruang,
					'lantai'			=> $lantai,
					'idkampus'			=> $nama_kampus,
			);

		$this->Ruang_lokasi_model->input_data($data,'a_tblokasi');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>admin/lokasi_ruang/ruang_lokasi"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idruang' => $id_barang);
		$this->Ruang_lokasi_model->hapus_data($where,'a_tblokasi');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data lokasi berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/lokasi_ruang/ruang_lokasi"</script> <?php
	}

	public function edit(){
		$id_ruang 			= $this->input->post('idruang');
		$nama_ruang 		= $this->input->post('nama_ruang');
		$lantai				= $this->input->post('lantai_ruang');
		$nama_kampus		= $this->input->post('nama_kampus');


		$data = array(
					'idruang'			=> $id_ruang,
					'nmruang' 			=> $nama_ruang,
					'lantai'			=> $lantai,
					'idkampus'			=> $nama_kampus,
			);
	$where = array(
		'idruang' => $id_ruang
	);

	$this->Ruang_lokasi_model->update_data($where,$data,'a_tblokasi');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data lokasi berhasil."); window.location.href="<?php echo base_url();?>/admin/lokasi_ruang/ruang_lokasi"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */