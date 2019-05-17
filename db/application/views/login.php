<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($this->session->userdata('ses_nama')== TRUE):
	redirect('home'); ?>
	<?php else: ?>

		<!doctype html>
		<html lang="en">

		<head>
			<title>Cpanel Login</title>


			<style>
				body{
					background-color: #acacac
				}
				section::before {
					content: "";
					position: fixed;
					z-index: -1;
					background-size:cover;
					background-position:center top;
					display: block;
					background-repeat: none;
					width: 1366px;
					height: 100%;
					filter: blur(2px) ;
					-webkit-filter: blur(2px) ;
					background-position-x: -2px;

				}
				.card{
					width:100%;
					margin-top:90px; 
					border-radius: 7px !important;
				}
				input[type=text],input[type=password]{
					border-radius:40px 40px 40px !important;
					padding: 15px;
					font-size: 14px;
					height: 50px;
				}

				.btn-circle{
					border-radius:40px 40px 40px !important;
					font-size: 14px ;
				}
				.btn-teal{
					background-color: teal;
				}
				.text-orange{
					color: orangered
				}
			</style>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<link rel="stylesheet" href="style.css">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<!-- font -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y"
			crossorigin="anonymous">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
			crossorigin="anonymous">

		</head>

		<body class="bg-info">
			<section>
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div>
								<i class="fab-cpanel fa-x7 text-white"></i>
							</div>
						</div>

						<div class="col-lg-4">
							<?php if ($this->session->flashdata('msg') ) : ?>
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
												<?php echo $this->session->flashdata('msg');?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div> <!-- end div -->
							<?php endif; ?>

							<!-- form login card---------------------------------------------------------------------------------------------------->
							<form action="<?= base_url('login/auth')?>" method="post">
								<div class="card text-center shadow  o-hidden border-0 " style="width:100%; margin: 38.5px auto; padding: 20px;">
									<div class="text-center">
										<img src="<?php echo base_url('assets/image/logo.png') ?>" width="120" alt="kominfo">
										<div class="row">
											<div class="col-4"></div>
											<div class="col-4">
											</div>
											<div class="col-4"></div>
										</div>
									</div>
									<div class="card-body">
										<div class="input-group ">
											<div class="input-group">
												<input type="text" name="username" class="form-control" placeholder="Enter your username "
												aria-describedby="button-addon3">
											</div>
										</div>
										<br>
										<div class="form-group">
											<input type="Password" minlength="6" name="password" class="form-control"  aria-describedby="helpId" placeholder="Enter your password">
										</div>
										<button type="submit" class="text-white btn btn-teal btn-lg btn-circle btn-block" role="button">
											Masuk
										</button>
									</form>
									<hr>
									<a href="" data-toggle="modal" data-target="#exampleModal" class="text-primary" style="text-decoration:none; font-size:14px;">Buat akun </a>
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle"></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<b>Hubungi Administrator Untuk Membuat Akun Baru / Reset Kata Sandi</b>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
												</div>
											</div>
										</div>
									</div> <!-- end div -->
								</div>
							</div>
							<!-- akhir form login card---------------------------------------------------------------------------------------------->

						</div>
					</div>
				</div>
			</section>
		</body>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
		<script>
			$('#myModal').modal('show');
		</script>
		</html>
		<?php endif; ?>