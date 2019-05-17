<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{	$user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	$database = $user['User']."_";
	$data['db'] = $this->dbmodel->database($database);
	$data=$this->load->view('dashboard/dashboard',$data);
}
function account(){
	$user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	$database = $user['User']."_";
	$data['db'] = $this->dbmodel->account($database);
	$data= $this->load->view('dashboard/account',$data);
}
function dropDb($id){
	$nama = $id;
	$this->dbmodel->dropDb($nama);
	redirect('dashboard','refresh');
}
function dropUsr($id){
	$nama =$id;
	$this->dbmodel->dropUsr($nama);
	redirect('dashboard/account','refresh');
}
function Privileges($id){
	$nama = $id;
	$data['user']=$this->dbmodel->Privileges($nama)->row_array();
	$data['db']=$this->dbmodel->SelectDatabase($nama)->row_array();
	$this->load->view('dashboard/edit',$data);
}
function insertAkses(){
	$dataB = $this->input->post('database');
	$user = $this->input->post('user');
	$akses= $this->input->post('akses');
	$this->dbmodel->insertPriv($akses,$user,$dataB);

	$this->session->set_flashdata(md5('msg'), "<h6 align='center'>Privileges Successfully Replaced</h6>");
	redirect('dashboard/account','refresh');
}
function SelectUsr($id){
	$user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	$database = $user['User']."_";
	$nama= $id;
	$data['user']=$this->dbmodel->Privileges1($nama)->row_array();
	$data['db']=$this->dbmodel->SelectDatabase($nama)->row_array();
	$data['alldb']=$this->dbmodel->SelectDatabase1($database)->result_array();
	$this->load->view("dashboard/AddUser",$data);
}
function insertToDB(){
	$name = $this->input->post('db');
	$db=$this->input->post('user');
	$cekUser=$this->db->query("SELECT User FROM user WHERE User ='$db' ");
	$this->dbmodel->insertUsert($name,$db);
	redirect('dashboard','refresh');
}
function Selectdata($id){
	$nama =$id;
	$data['row'] = $this->dbmodel->Privileges1($nama)->row_array();
	$data['table'] = $this->dbmodel->showTables($nama);
	$this->load->view('dashboard/showTable', $data);
}
}
/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */