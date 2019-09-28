<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merk extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();		
		//if ($this->session->userdata('username')=="") {
            //redirect('login');        
            
        //}
		$this->load->model('Merk_model');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/merek/merk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data'] 		= $this->db->get('a_tblmerk');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/merek/merk_tambah';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Merk_model->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	public function update($idmerk)
	{
		$isi['content']		= 'admin/merek/merk_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idmerk' => $idmerk);
		// $isi['kt']			= $this->Merk_model->get_ktgori();
		$isi['barang']		= $this->Merk_model->edit_data($where,'a_tblmerk')->result();
		$this->load->view('admin/index',$isi);
	}

	public function simpan()
	{
		$kode_barang	= $this->input->post('nama_merek');

		$data = array(
					'nmmerk'			=> $kode_barang,


			);
		$this->Merk_model->input_data($data,'a_tblmerk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>admin/merk/merk"</script> <?php
	}

	public function hapus($idmerk)
	{
		$where = array('idmerk' => $idmerk);
		$this->Merk_model->hapus_data($where,'a_tblmerk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>admin/merk/merk"</script> <?php
	}

	public function edit(){
		$idmerk 			= $this->input->post('idmerk');
		$kode_barang 		= $this->input->post('nama_merk');

		$data = array(
					'idmerk'			=> $idmerk,
					'nmmerk'			=> $kode_barang,

			);
	$where = array(
		'idmerk' => $idmerk
	);

	$this->Merk_model->update_data($where,$data,'a_tblmerk');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data merek berhasil."); window.location.href="<?php echo base_url();?>admin/merk/merk"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */