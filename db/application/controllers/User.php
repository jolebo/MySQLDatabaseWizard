<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$prefix =htmlspecialchars($this->input->post('prefix',TRUE),ENT_QUOTES);
		$user = htmlspecialchars($this->input->post('User',TRUE),ENT_QUOTES);
		$dataB= $prefix.$user;
		$data['db']=$this->dbmodel->selectDb($dataB);
		return $this->load->view('crtusr',$data);
	}
	function addUser(){
		$this->form_validation->set_rules('nama', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_conf', 'Password', 'required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
            $dataB = $this->input->post('db');
			$data['db']=$this->dbmodel->selectDb($dataB);
            $this->load->view('crtusr', $data);
		}else{
			$dataB = $this->input->post('db');
			$prefix = $this->input->post('prefix');
			$nama = $this->input->post('nama');
			$password = $this->input->post('password');
			$db= $prefix.$nama;
			$cek=$this->db->query("SELECT User FROM user WHERE User ='$db' ");
            if ($cek->num_rows() > 0) { //proses mengingatkan data sudah ada
            	$this->session->set_flashdata(md5('duplikat'), "<h6 align='center'>Nama Yang Anda Pilih Sudah Digunakan. Silahkan Coba Nama Lain</h6>");
            	$data['db']=$this->dbmodel->selectDb($dataB);
            	$this->load->view('crtusr', $data);
            }else {
            	$this->dbmodel->insertusr($db,$password);
            	$data['user']=$this->dbmodel->selectUser($db);
            	$data['db']=$this->dbmodel->selectDb($dataB);
            	$this->load->view('hakAkses', $data);
            }
        }

    }
    function generate(){
    	$db = $this->input->post('db');
    	$data['db']=$this->dbmodel->selectDb($db);
    	$data['pwd'] = random_string('alnum',8);
    	$data['info'] = $this->dbmodel->selectDb($db);
    	$this->load->view('crtusr2', $data);
    }
    function akses(){
    	$data['user'] = $this->dbmodel->selectUser()->row_array();
    	$this->load->view('hakAkses',$data);
    }
    function insertAkses(){
    	$dataB = $this->input->post('database');
    	$user = $this->input->post('user');
    	$akses= $this->input->post('akses');
    	

    	$this->dbmodel->insertAkses($akses,$user,$dataB);

    	$data['user']=$this->dbmodel->selectUser($user);
    	$data['db']=$this->dbmodel->selectDb($dataB);
    	$this->load->view('dashboard/penutup',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
