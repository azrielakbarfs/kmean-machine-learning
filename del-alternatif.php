<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:index.php");
		exit;
	}
	mysqli_query($koneksi, "DELETE FROM alternatif WHERE kode_alternatif = '" . $_GET['kode_alternatif'] . "'");
	header("location:alternatif.php");
?>
