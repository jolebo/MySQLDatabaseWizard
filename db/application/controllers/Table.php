<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	public function data($id)
	{
		$db = $id;
		$data['database'] = $this->dbmodel->selectDb($db);
		$this->load->view('dashboard/addTables',$data);
	}
	function AddTables()
	{
	$dbname = $this->input->post('database');
	$tbname = $this->input->post('tbname');
	$nama = $this->input->post('nama');
	$type = $this->input->post('type');
	$length =$this->input->post('length');
	$null = $this->input->post('null');
	$index = $this->input->post('index');
	$ai =$this->input->post('ai');
	$cek = $this->db->query("SELECT * FROM information_schema.columns where TABLE_NAME='$tbname' ");
	if ($cek->num_rows() > 0) {
		$url = base_url('Table/data/'.$dbname);
		$this->session->set_flashdata(md5("duplikat"),"Table Sudah Ada,Coba Nama Lain");
		redirect($url,'refresh');
	}else{
		$this->dbmodel->AddTables($dbname,$tbname,$nama,$type,$length,$null,$index,$ai);
		$url= base_url('dashboard/Selectdata/'.$dbname);
		redirect($url,'refresh');
	}
}
	function checkTable($id)
	{
		$nama = $id;
		$data['structure'] = $this->dbmodel->structure($nama);
		$data['table'] = $this->dbmodel->tbname($nama);
		$this->load->view('dashboard/structure', $data);
	}
}

/* End of file Table.php */
/* Location: ./application/controllers/Table.php */