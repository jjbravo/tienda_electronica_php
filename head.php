<?php

//session_name("loginUsuario");
//session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Tienda</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="./css/style.css" rel="stylesheet" media="screen">
				<!-- jQuery -->

<script src="//code.jquery.com/jquery.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Title</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
				
				<?php 
				echo $LOG;
				 ?>
				
				<?php 

					echo $LINK;

				 ?>
			</ul>

			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Go</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><?php echo $USER; ?></li>
				<li class="carrito"><a  href="./carrito.php"><img src="./img/carrito.png"></a></li>
				
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>

	<div class="container-fluid">
	
		  <div class="col-md-2">

		  	<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#"><span class="badge pull-right">42</span> Home</a></li>
			  <li ><a href="#"><span class="badge pull-right">42</span> Home</a></li>
			  <li ><a href="#"><span class="badge pull-right">42</span> Home</a></li>
			  <li ><a href="#"><span class="badge pull-right">42</span> Home</a></li>
		
			</ul>

		  </div>
 