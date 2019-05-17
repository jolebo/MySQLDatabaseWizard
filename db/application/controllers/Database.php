<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('crtdb');
	}
	function crtdb(){
		$prefix =htmlspecialchars($this->input->post('prefix',TRUE),ENT_QUOTES);
		$user = htmlspecialchars($this->input->post('User',TRUE),ENT_QUOTES);
		$dataB= $prefix.$user;
		$cek=$this->db->query("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dataB'");
		if ($cek->num_rows() > 0) { //proses mengingatkan data sudah ada
			$this->session->set_flashdata(md5('duplikat'), "<h6 align='center'>Nama Yang Anda Pilih Sudah Digunakan. Silahkan Coba Nama Lain</h6>");
                    // redirect ke halaman buat database
			redirect('database'); 
		}else {
			$this->dbmodel->crtdb($dataB);
			$data['db']=$this->dbmodel->selectDb($dataB);
			$this->load->view('crtusr', $data);
		}

	}


}

/* End of file Db.php */
/* Location: ./application/controllers/Db.php */