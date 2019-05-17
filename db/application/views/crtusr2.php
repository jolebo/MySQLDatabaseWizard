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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><!-- jQuery Library-->
	<script src="<?= base_url('assets/js/passwordcheck.js')?>"></script>

	<!-- icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">

	<!-- my font -->


	<!-- style -->
	<link rel="stylesheet" href="<?=base_url().'assets/css/'?>style.css">

</head>

<body>
	<?php
	$user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	?>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-teal fixed-top">
		<div class="container">
			<img src="<?php echo base_url('assets/image/text.png') ?>" width="140">

			<!-- content -->
			<ul class="nav justify-content-end navbar-nav">
				<li class="nav-item mr-5">
					<a class="nav-link" href="#"><i class="fa fa-search fa-fw mr-2 text-white" aria-hidden="true" style="font-size:20px;"></i>
					Search</a>
				</li>
				<li class="nav-item mr-4">
					<a class="nav-link  dropdown-toggle text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw mr-2 text-white" aria-hidden="true" style="font-size:20px;"></i>
					<?php echo $user['User'] ?></a></a>
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
	<?php if ($this->session->flashdata(md5('duplikat')) || $this->session->flashdata(md5('gagal')) ) : ?>
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
					<?php echo $this->session->flashdata(md5('gagal'));?>
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
		<div class="card shadow " style="position:fixed;padding-top:100px; margin-top: -100px; z-index: -1;">
			<div class="card-body text-center text-muted">
				<h2><i class="fas fa-th"></i></h2>
				<h2 style="margin-bottom:468px;"><i class="fas fa-users mt-4"></i></h2>
			</div>
		</div>
	</div>
	<div class="col-11 mt-3">
		<h1 class="font-weight-normal"><span class="badge bg-teal"><i class="fas fa-database text-white"></i></span> MySQL
		&reg; Database Wizard</h1>
		<hr style="width:98%; float:left"><br>

		<div class=" h5 font-weight-normal alert alert-success" style="width:95%;">
			<div class="flex-container mr-4">
				<div><i class="fas fa-check-circle" style="position:absolute; margin-top:10px; left:10px;"></i></div>
			</div>
			you have created a Maria Db/MySQL database named "<?php echo $db['SCHEMA_NAME'] ?>"
		</div>

		<h2 class="font-weight-normal mt-4"> Step 2 : Create Database Users</h2>

		
		<div class="row">
			<div class="col-5">
				<form action="<?= base_url('user/addUser') ?>" method="post" id="register">
					<h5 class="font-weight-bold"> Username</h5>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><?= $user['User']; ?>_</div>
						</div>
						<input type="hidden" value="<?= $user['User']; ?>_" name="prefix">
						<input type="hidden" name="db" value="<?php echo $db['SCHEMA_NAME'] ?>">
						<input type="text" name="nama" class="form-control" id="inlineFormInputGroup">
						<?= form_error('nama'); ?>
					</div>
					<small class="text-muted">
						<b>Note</b>:54 Character max
					</small>
					<h5 class="font-weight-bold"> Password</h5>
					<div class="input-group mb-2">
						<input type="password" id="password" value="<?php echo $pwd; ?>" name="password" class="form-control" id="inlineFormInputGroup">
						<?= form_error('password'); ?>
					</div>
					<h5 class="font-weight-bold"> Password (again):</h5>
					<div class="input-group mb-2">
						<input type="password" name="password_conf" value="<?php echo $pwd; ?>" class="form-control" id="inlineFormInputGroup">
						<?= form_error('password_conf'); ?>
					</div>                                    
					<h5 class="font-weight-bold">strenght <i class="fa fa-info-circle" aria-hidden="true"></i></h5>
					<div class="progress bg-white " style="height: 20px; border: 1px solid #acacac;">
						<div class="progress-bar bg-light text-muted " role="progressbar" aria-valuenow="25" aria-valuemin="0"
						aria-valuemax="100">
						<span class="mx-auto" id="result" style="margin-left: 170px;"></span>
					</div>

				</div>
				<p>Your Password : <?php echo $pwd; ?></p>
				<button class="btn btn-primary mt-3">Create Users</button>
			</form>
		</div>
		<div class="col-7">
			<form action="user/generate" method="post">
				<input type="hidden" name="db" value="<?php echo $db['SCHEMA_NAME'] ?>">
				<a href="<?= base_url('user/generate')?>"><button class="btn btn-sm btn-light" style="box-shadow:1px 1px 3px rgba(0,0,0,0.25); margin-top: 285px;">Password
				Generator</button></a>
			</form>
		</div>
	</div>

	<div class="mt-3 row text-primary">
		<div class="col-2"></div>
		<div class="col-4 text-right">
			<i class="fas fa-arrow-alt-circle-left "></i> Go Back
		</div>
		<div class="col-4">
			<i class="fas fa-arrow-alt-circle-left"></i> Go Back to the main MySQL page
		</div>
		<div class="col-2"></div>
	</div>
	

	<!-- footer -->
	<div class="row mt-3">
		<div class="col-3">
			<img src="<?php echo base_url('assets/image/objeck.png') ?>" width="60" style="margin-top:25px;"><small class="text-muted " style="font-size: 9px; position: absolute; margin-top: 48px; margin-left: 8px;">76.0
							20</small>
		</div>
		<div class="col-9">
			<div class="text-right mt-5">
				<a class="text-primary mr-4">Home</a>
				<a class="text-primary mr-4">Trade Mark</a>
				<a class="text-primary mr-4">Privacy Policy</a>
				<a class="text-primary mr-4">Documentation</a>
			</div>
		</div>
	</div>
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
</script>
</body>

</html>