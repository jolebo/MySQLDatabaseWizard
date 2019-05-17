<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Controller {

	public function index()
	{
		$this->load->view('insertUserDatabase/addUser');
	}
	function addUserDb(){
		$this->form_validation->set_rules('nama', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
            $this->session->set_flashdata(md5('salah'), "<h6 align='center'>Password does not match!</h6>");
			redirect('UserData');
		}else{
			$prefix = $this->input->post('prefix');
			$dataB = $this->input->post('database');
			$db = $prefix.$this->input->post('nama');
			$password = $this->input->post('password');
			$cekUser=$this->db->query("SELECT User FROM user WHERE User ='$db' ");
			$cekdb=$this->db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dataB'");
            if ($cekUser->num_rows() > 0) { //proses mengingatkan nama sudah ada
            	$this->session->set_flashdata(md5('duplikat'), "<h6 align='center'>Nama Yang Anda Pilih Sudah Digunakan. Silahkan Coba Nama Lain</h6>");
            	redirect(base_url('UserData'));
            }
            else {
            	if ($cekdb->num_rows() == 0) { //proses mengingatkan database tidak ada
            		$this->session->set_flashdata(md5('duplikat'), "<h6 align='center'>Database Yang Anda Pilih Tidak Ada. Silahkan Masukkan Dengan Benar</h6>");
            		redirect(base_url('UserData'));
            	}else{
            		$this->dbmodel->insertusrdata($db,$password);
            		$data['user']=$this->dbmodel->selectUser($db);
            		$data['db']=$this->dbmodel->selectDb($dataB);
            		$this->load->view('hakAkses', $data);
            	}
            }
        }

    }
    function generate(){
    	$db = $this->input->post('db');
    	$data['db']=$this->dbmodel->selectDb($db);
    	$data['pwd'] = random_string('alnum',8);
    	$data['info'] = $this->dbmodel->selectUser($db)->row_array();
    	$this->load->view('addUser2', $data);
    }

}

/* End of file UserData.php */
/* Location: ./application/controllers/UserData.php */