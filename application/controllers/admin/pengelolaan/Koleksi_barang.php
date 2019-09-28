 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Koleksi_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		if ($this->session->userdata('username')=="a") {
            redirect('login');        
            
        }	
		$this->load->model('Model_koleksi');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/pengelolaan/koleksi_barang';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data'] 		= $this->Model_koleksi->get_ktgori();
		
		$this->load->view('admin/index',$isi);
	}

	// show update view 
	public function tambah()
	{
		$isi['content']		= 'admin/kampus/kampus_tambah';
		$isi['judul']		= 'add data';
		$isi['sub_judul']	= 'Tambah data kampus';
		$isi['kt']			= $this->Model_koleksi->get_ktgori();
		$this->load->view('admin/index',$isi);
	}
	# menampilkan data update sebelum disimpan
	public function update($idkmpus)
	{
		$isi['content']		= 'admin/pengelolaan/koleksi_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idbarang' => $idkmpus);
		$isi['jenis']		= $this->db->get('a_tbljenis');
		$isi['merk']		= $this->db->get('a_tblmerk');
		$isi['kt']			= $this->Model_koleksi->get_ktgori();
		$isi['data']		= $this->Model_koleksi->edit_data($where)->result();
		$this->load->view('admin/index',$isi);
	}


	public function hapus($idkampus)
	{
		$where = array('idbarang' => $idkampus);
		$dataImage = $this->db->query("SELECT A.fotobarang,A.idbarang FROM b_tblbarang A WHERE idbarang=$idkampus")->result();
		foreach($dataImage as $img) {
			$path = FCPATH."assets/dist/img/$img->fotobarang";
			if(file_exists($path)) {
				unlink($path) or die('failed deleting file');
			}
			
		}

		$this->Model_koleksi->hapus_data($where,'b_tblbarang');


		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Hapus barang."); window.location.href="<?php echo base_url();?>admin/pengelolaan/koleksi_barang"</script> <?php
	
	}	
	public function aksi_upload($tag){
		$config['upload_path']          = './assets/dist/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;

		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload($tag)){
			$error = array('error' => $this->upload->display_errors());
			die(print_r($error));

		}
		// else{
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$path = FCPATH."assets/dist/img/".$oldfile;
		// 	@unlink($path);
		// 	// return $data;
		// }	
	}

	public function edit(){

		$idbrng 	= $this->input->post('idbarang');
		$nmbrng		= $this->input->post('nama_barang');
		$merk 		= $this->input->post('merk');
		$jnsbrng 	= $this->input->post('jenis_barang');
		$spesifikasi= $this->input->post('spesifikasi');
		$sn 		= $this->input->post('sn');
		$date 		= $this->input->post('date');
		$newfoto 		= $this->input->post('photo');
		$oldphoto 		= $this->input->post('oldphoto');



		$data = array(
			'idjenis'		=> $jnsbrng,
			'nmbarang' 	=> $nmbrng,
			'spesifikasi'	=> $spesifikasi,
			'idmerk' 		=> $merk,
			'sn' 			=> $sn,
			'fotobarang' 	=> $this->check($newfoto,$oldphoto),
			'tgl_input' 	=>$date
		);

		$where = array('idbarang' => $idbrng);
		$this->Model_koleksi->update_data($where,$data,'b_tblbarang');

		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("berhasil update barang."); window.location.href="<?php echo base_url();?>admin/pengelolaan/koleksi_barang"</script> <?php
	
	}
	public function check($a, $b) {
		if($a == Null || $a == '') {
			return $b;
		} else {

			$this->aksi_upload('photo');
			return $a;
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */