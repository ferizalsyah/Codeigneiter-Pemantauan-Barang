<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Sdm_model');
		$this->load->helper(array('url','download'));

	}


	public function index()
	{
		$isi['content']		= 'bpm/sdm/sdm_content';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data Barang';
		$isi['data']		= $this->db->query('select A.*,B.nmprofesi from a_tblsdm A INNER JOIN a_tblprofesi B ON A.idprofesi=B.idprofesi');
		$this->load->view('bpm/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'bpm/sdm/sdm_add';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data barang';
		$isi['kt']			= $this->Sdm_model->get_ktgori();
		$isi['data']		= $this->Sdm_model->get_ktgori1('a_tblprofesi');
		$this->load->view('bpm/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'bpm/sdm/sdm_update';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data barang';
		$where 				= array('idsdm' => $id_barang);
		$isi['kt']			= $this->Sdm_model->get_ktgori();
		$isi['barang']		= $this->Sdm_model->edit_data($where,'a_tblsdm')->result();
		$this->load->view('bpm/index',$isi);
	}

	public function simpan()
	{
		// $id_ruang 			= $this->input->post('idsdm');
		$nama_ruang 		= $this->input->post('kdsdm');
		$lantai				= $this->input->post('nmsdm');
		$nama_kampus		= $this->input->post('idprofesi');
		$alamat				= $this->input->post('alamat');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$tgl_lahir			= $this->input->post('tgl_lahir');
		$foto				= $this->input->post('foto');


		$config['upload_path']          = './assets/dist/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		
		
		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			die(print_r($error));
		}else{
			$data = array('upload_data' => $this->upload->data());
		// 	print($foto);
			// die(print_r($data));
		}	
	
		
		$data = array(
					'kdsdm' 			=> '',
					'nmsdm'				=> $lantai,
					'idprofesi'			=> $nama_kampus,
					'alamat'			=> $alamat,
					'tempat_lahir'		=> $tempat_lahir,
					'tgl_lahir'			=> $tgl_lahir,
					'foto'				=> $data['upload_data']['file_name']

			);

		$this->Sdm_model->input_data($data,'a_tblsdm');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>bpm/sdm/sdm"</script> <?php
	}

	public function hapus($id_barang)
	{
		$where = array('idsdm' => $id_barang);
		$this->Sdm_model->hapus_data($where,'a_tblsdm');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data lokasi berhasil."); window.location.href="<?php echo base_url();?>index.php/bpm/sdm/sdm"</script> <?php
	}

	public function edit(){
		$id_ruang 			= $this->input->post('idsdm');
		$nama_ruang 		= $this->input->post('kdsdm');
		$lantai				= $this->input->post('nmsdm');
		$nama_kampus		= $this->input->post('idprofesi');
		$alamat				= $this->input->post('alamat');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$tgl_lahir			= $this->input->post('tgl_lahir');		
		$foto				= $this->input->post('foto');
		$foto_old 			= $this->input->post('foto_old');

		if(isset($_FILES['foto']['file_name'])) {
			
			// lakukan uploa foto  jika variabel foto ditak kosong (berisi)
			$config['upload_path']          = './assets/dist/img/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;

			$this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if ($this->upload->do_upload('foto')) {
				$image_data = $this->upload->data('file_name');
				@unlink("./assets/dist/img/".$foto_old);
				// die(print_r($image_data));

			}  else { 
                $error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg', 'We had an error trying. Unable upload  image');
				die(print_r($error));
			}	
			
		} else {
			// lakukan insert data dengan data yang lawas 
			$image_data = $foto_old;

		}

		$data = array(
			'kdsdm' 			=> $nama_ruang,
			'nmsdm'				=> $lantai,
			'idprofesi'			=> $nama_kampus,
			'alamat'			=> $alamat,
			'tempat_lahir'		=> $tempat_lahir,
			'tgl_lahir'			=> $tgl_lahir,
			'foto'				=> $image_data
		);

		$where = array('idsdm' => $id_ruang);

		$this->Sdm_model->update_data($where,$data,'a_tblsdm');
		
		?>
		<script type="text/javascript">alert("hapus data lokasi berhasil."); window.location.href="<?php echo base_url();?>index.php/bpm/sdm/sdm"</script> <?php
	}

	public function download($id) {
		$sql = $this->db->query("SELECT * FROM a_tblsdm WHERE idsdm='$id'")->result();
		foreach ($sql as $value) {
			$path = "./assets/dist/img/".$value->foto;
			$dw = force_download($path,null);
			if($dw) 
				?> <script type="text/javascript">window.location.href="<?php echo base_url();?>index.php/bpm/sdm/sdm"</script> <?php
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */