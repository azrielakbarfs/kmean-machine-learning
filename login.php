<?php
include("koneksi.php");
if (isset($_POST['btnlogin']))
{
	$password = md5($_POST['password']);
	$querylogin = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$_POST[username]' AND password = '$password'");
	if ($datalogin = mysqli_fetch_array($querylogin))
	{
		session_start();
		$_SESSION['userlogin'] = $datalogin['username'];
		header("location:admin.php");
	}
	else
	{
		echo '<script type="text/javascript">alert("Login Gagal!");</script>';
		//header("location:login.php?pesan=Login Gagal");
	}
}
?>

<div class="col-md-3"></div>

<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Login</h3>
	  </div>
	  <div class="panel-body">
			<form class="form-horizontal" role="form" action="" method="post">
			  <div class="form-group">
			    <label for="username" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="username" name="username" class="form-control" id="username" placeholder="username" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="btnlogin" class="btn btn-primary" style="float:right;">Login</button>
			    </div>
			  </div>
			</form>
	  </div>
	</div>
</div>

<div class="col-md-3"></div>
