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

	<!-- icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">

	<!-- my font -->


	<!-- style -->
	<link rel="stylesheet" href="<?= base_url().'assets/css/style.css'?> ">

</head>

<body>
	<?php
	$username = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
	?>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-teal fixed-top shadow">
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
					<?php echo $username['User'] ?></a>
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
	<?php if ($this->session->flashdata(md5('duplikat')) ) : ?>
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
				Add User Account To "<?php echo $user['SCHEMA_NAME'] ?>"
			</div>
			
			<form action="<?= base_url('dashboard/insertToDB') ?>" method="post">
				<input type="hidden" name="db" value="<?php echo $user['SCHEMA_NAME'] ?>">
				<select name="user">
					<?php foreach ($alldb as $row): ?>
					<option class="form-control" value="<?php echo $row["User"] ?>"><?php echo $row["User"] ?></option>
				<?php endforeach; ?>
				</select>
				<button class="btn btn-primary mt-3">next step</button>
			</form>
			<div class="mt-3 row text-primary">
				<div class="col-2"></div>
			
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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
</body>

</html>