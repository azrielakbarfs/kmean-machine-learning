<?php
include("koneksi.php");
if (@$_SESSION['userlogin'] == "")
{
	header("location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>K-Means | Clustering</title>
	<link rel="icon" href="./assets/images/logo.png" type="image/png">

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


	    <!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="index.php">Clustering K-Means</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a href="admin.php">Home</a>
	                    </li>
											<li>
	                        <a href="kriteria.php">Kriteria</a>
	                    </li>
											<li class="dropdown">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alternatif <span class="caret"></span></a>
							          <ul class="dropdown-menu" role="menu">
							            <li><a href="alternatif.php">Lihat Alternatif</a></li>
							            <li><a href="nilai_bobot_alternatif.php">Nilai Bobot Alternatif</a></li>
							          </ul>
							        </li>
											<li>
	                        <a href="perhitungan.php">Perhitungan</a>
	                    </li>
											<li>
	                        <a href="ganti-password.php">Password</a>
	                    </li>
											<li>
	                        <a href="logout.php">Logout</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>

	    <!-- Page Content -->
	    <div class="container">
