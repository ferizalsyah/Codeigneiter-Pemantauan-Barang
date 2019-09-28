<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Jenis_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'bpm/jenis_barang/jenis_barang';
		$isi['judul']		= 'Data Jenis_barang';
		$isi['sub_judul']	= 'Data Jenis_barang';
		$isi['data'] 		= $this->db->query('select A.idjenis,nmjenis,B.nmkategori from a_tbljenis A inner join a_tblkategori B on A.idkategori = B.idkategori');
		$this->load->view('bpm/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'bpm/jenis_barang/jenis_tambah';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Jenis_model->get_ktgori();
		$this->load->view('bpm/index',$isi);
	}

	public function update($idjenis)	
	{
		$isi['content']		= 'bpm/jenis_barang/jenis_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data abrang';
		$where 				= array('idjenis' => $idjenis)
;		$isi['kt']			= $this->Jenis_model->get_ktgori();
		$isi['barang']		= $this->Jenis_model->edit_data($where,'a_tbljenis')->result();
		$this->load->view('bpm/index',$isi);
	}

	public function simpan() {
		$idjenis		= $this->input->post('id_jenis');
		$nama_jenis		= $this->input->post('nama_jenis');
		$jenis_barang	= $this->input->post('jenis_kategori');

		$data = array(
			'idjenis'			=> $idjenis,
			'nmjenis' 			=> $nama_jenis,
			'idkategori'		=> $jenis_barang,

		);

		$where = array(
			'idjenis' => $idjenis
		);

		$this->Jenis_model->input_data($data,'a_tbljenis');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>bpm/jenis_barang/jenis"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idjenis' => $id_barang);
		$this->Jenis_model->hapus_data($where,'a_tbljenis');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>bpm/jenis_barang/jenis"</script> <?php
	}

	public function edit(){
		$id_barang 		= $this->input->post('id_barang');
		$idjenis		= $this->input->post('id_jenis');
		$nama_jenis		= $this->input->post('nama_jenis');
		$jenis_barang	= $this->input->post('jenis_barang');
		
		$data = array(
			'idjenis'			=> $id_barang,
			'nmjenis' 			=> $nama_jenis,
			'idkategori'		=> $jenis_barang,

		);
		
		$where = array(
			'idjenis' => $idjenis
		);

		$this->Jenis_model->update_data($where,$data,'a_tbljenis');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>bpm/jenis_barang/jenis"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */