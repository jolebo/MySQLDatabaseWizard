<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	function auth(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$cek_user=$this->dbmodel->authUser($username,$password);
		// cek apakah user tersedia
		if($cek_user->num_rows() > 0){
			$data=$cek_user->row_array();
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['User']);
			redirect('home','refresh');
        }else{  // jika username dan password tidak ditemukan atau salah
        	$url=base_url('login');
        	echo $this->session->set_flashdata('msg','<h6 align="center">Username Atau Password Salah<h6>');
        	redirect($url);
        }
    }
    function logout(){
                $this->session->sess_destroy();
                $url=base_url('login');
                redirect($url);
            }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */