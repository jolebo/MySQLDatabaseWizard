<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
	<title>cPanel</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/js/append.js') ?>"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

	<!-- icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">

	<!-- my font -->


	<!-- style -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/' ?>style.css">

</head>

<body>
	<!-- navbar -->
	<?php
	$user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	?>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-teal fixed-top shadow">
		<div class="container">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/image/text.png') ?>" width="140"></a>

			<!-- content -->
			<ul class="nav justify-content-end navbar-nav">
				<li class="nav-item mr-5">
					<a class="nav-link" href="#"><i class="fa fa-search fa-fw mr-2 text-white" aria-hidden="true" style="font-size:20px;"></i>
					Search</a>
				</li>
				<li class="nav-item mr-4">
					<a class="nav-link  dropdown-toggle text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw mr-2 text-white" aria-hidden="true" style="font-size:20px;"></i>
					<?php echo $user['User'] ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="fas fa-bell fa-fw text-white" style="font-size:20px;"></i>
						<!-- Counter - Alerts -->
						<span class="badge badge-danger badge-sm" style="position:absolute; left: 1087px;bottom:35px;">3</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link font-weight-bold text-white" href="<?= base_url('login/logout')?>"><i class="fas fa-sign-out-alt fa-fw mr-2 text-white"
						style="font-size:20px;"></i>
					LOGOUT</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- end navbar -->
	<?php if ($this->session->flashdata(md5('duplikat'))) : ?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $this->session->flashdata(md5('duplikat'));?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div> <!-- end div -->
<?php endif; ?>

<div class="row" style="margin-top:70px;">
	<div class="col-1">
		<div class="card shadow " style="position:fixed;padding-top:100px; margin-top: -100px; ">
			<div class="card-body text-center text-muted"><h2><i class="fas fa-database"></i></h2><h2 style="margin-bottom:468px;"><i class="fas fa-users mt-4"></i></h2>
			</div>
		</div>
	</div>
	<div class="col-11 mt-3">
		<h1 class="font-weight-normal"><span class="badge bg-teal"><i class="fas fa-database text-white"></i></span> MySQL
		&reg; Database Wizard</h1>
		<hr style="width:98%; float:left"><br>
		<div class=" h5 font-weight-normal alert alert-success" style="width:95%;">
			<div class="flex-container mr-4">
				<div><i class="fas fa-users-cog"  style="position:absolute; margin-top:10px; left:7px;"></i></div>
			</div>Create Tables
		</div>
		<h2 class="font-weight-normal mt-4">Create Table</h2>
		<form id="id_form" action=" <?= base_url('table/addTables') ?>" method="post" autocomplete ="off">
			<table class="table">
				<tr>
					<td><input type="button" name="add_btn" value="Add" id="add_btn"></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				</tr>
				<tr>
					<td>Table Name</td>
				</tr>
				<tr>
					<td><input type="hidden" name="database" value="<?php echo $database['SCHEMA_NAME']?>">
						<input type="text" name="tbname" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Name</td><td>Type</td><td>Length/Values <a href="#" data-toggle="tooltip" data-placement="right" title="if coloumn type is enum,please enter the values using this format: 'a','b','c'... ">?</a></td><td>Null</td><td>Index</td><td>A_I</td><td>&nbsp;</td>
				</tr>
				<tbody id="container">
					<!-- nanti rows nya muncul di sini -->
				</tbody>
				<tr>
					<td><input type="submit" name=submit value="Save"></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				</tr>
			</table>
		</form>
		<!-- end footer -->

	</div>
</div>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
<script>
	$('#myModal').modal('show');
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
</body>

</html>