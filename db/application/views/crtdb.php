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
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/' ?>style.css">

</head>

<body>
	<!-- navbar -->
	<?php
        $user = $this->db->query("SELECT * FROM user WHERE User ='".$this->session->userdata('ses_nama')."' ")->row_array();
        ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-teal">
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
			<!-- end content -->

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

	<div class="row">
		<div class="col-1">
			<div class="card shadow ">
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

			<div class=" h5 font-weight-normal text-muted" style="width:95%;">
				MySQL Databse allow you to store lots of informaation in an easy to access manner.The database themselves are not
				easily ready by hummans. MySQL databse are required by many Web applications including some bulletin boards,content
				management systems,and orther. To use a databased ,you'll need to create it .Only MySQL Users (different than mail
				or orther users) that have priveleges to access a database can read from or write to that database
			</div>

			<h2 class="font-weight-normal mt-5"> Step 1 : Create A Database</h2>
			<h5 class="font-weight-bold"> New Databse</h5>
			<form action="<?= base_url('database/crtdb') ?>" method="post">
				<div class="form-row">
					<div class="col-5">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><?php echo $user['User'] ?>_</div>
							</div>
							<input type="text" class="form-control" name="User" id="inlineFormInputGroup">
							<input type="hidden" name="prefix" value="<?php echo $user['User'] ?>_">

						</div>
					</div>
				</div>
				<small class="text-muted">
					<b>Note</b>:54 Character max
				</small><br>
				<button class="btn btn-primary mt-3">Next Step</button>
			</form>
			<div class="row mt-5">
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