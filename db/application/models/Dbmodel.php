<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbmodel extends CI_Model {

	function crtdb($dataB){
		return $this->db->query("CREATE DATABASE $dataB");

	}
	function insertusr($db,$password){
		return $this->db->query("CREATE USER '$db'@'localhost' IDENTIFIED BY '$password' ");
	}
	function insertAkses($akses,$user,$dataB){
		$jumlah_dipilih = count($akses);
		for($x=0;$x<$jumlah_dipilih;$x++){
			$this->db->query("GRANT $akses[$x] ON $dataB.* TO '$user'@'localhost' ");
		}
		$this->db->query("FLUSH PRIVILEGES");
	}
	function selectUser($db){
		$query = $this->db->query("SELECT * FROM user WHERE User='$db'")->row_array();
		return $query;
	} 
	function selectDb($db){
		$query = $this->db->query("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db'");
		return $query->row_array();
	}
	function authUser($username,$password){
		$query = $this->db->query("SELECT * FROM user WHERE User='$username' && Password=PASSWORD('$password') LIMIT 1");
		return $query;
	}
	function insertusrdata($db,$password){
		return $this->db->query("CREATE USER '$db'@'localhost' IDENTIFIED BY '$password' ");
	}
	function database($database){
		$query = $this->db->query(" SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME LIKE '$database%'");
		return $query->result_array();
	}
	function account($database){
		$query = $this->db->query(" SELECT * FROM user WHERE User LIKE '$database%' ");
		return $query->result_array();
	}
	function dropDb($nama){
		return $query = $this->db->query("DROP DATABASE $nama ");
	}
	function dropUsr($nama){
		return $query = $this->db->query("DROP USER '$nama'@'localhost' ");
	}
	function Privileges($nama)
	{
		return $query= $this->db->query("SELECT * FROM mysql.user where User='$nama'");
	}
	function Privileges1($nama){
		return $query= $this->db->query("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA where SCHEMA_NAME='$nama'");
	}
	function SelectDatabase($nama){
		return $query= $this->db->query("SELECT * FROM mysql.db where User='$nama'");
	}
	function SelectDatabase1($database){
		return $query= $this->db->query("SELECT * FROM user WHERE User LIKE '$database%'");
	}
	function insertPriv($akses,$user,$dataB){
		$this->db->query("REVOKE ALL PRIVILEGES ON  $dataB.* FROM '$user'@'localhost' ");
		$jumlah_dipilih = count($akses);
		for($x=0;$x<$jumlah_dipilih;$x++){
			$this->db->query("GRANT $akses[$x] ON $dataB.* TO '$user'@'localhost' ");
		}
		$this->db->query("FLUSH PRIVILEGES");
	}
	function insertUsert($name,$db)
	{
		return $query = $this->db->query("GRANT ALL PRIVILEGES ON $name.* TO '$db'@'localhost'");
	}
	function showTables($nama)
	{
		return $this->db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$nama'")->result_array();
	}
	function addTables($dbname,$tbname,$nama,$type,$length,$null,$index,$ai)
	{
		$jumlah =count($nama);
		$this->db->query("CREATE TABLE $dbname.$tbname( tugas INT )");
		for ($x = 0; $x <$jumlah; $x++) {
				$this->db->query("ALTER TABLE $dbname.$tbname ADD $nama[$x] $type[$x]($length[$x]) $null[$x] $index[$x] $ai[$x] ");
		}
		$this->db->query("ALTER TABLE $dbname.$tbname DROP COLUMN tugas ");
	}
	function structure($nama)
	{
		return $this->db->query("SELECT * FROM information_schema.columns where TABLE_NAME='$nama' ")->result_array();
	}
	function tbname($nama)
	{
		return $this->db->query("SELECT * FROM information_schema.columns where TABLE_NAME='$nama' ")->row_array();
	}
}

/* End of file Dbmodel.php */
/* Location: ./application/models/Dbmodel.php */