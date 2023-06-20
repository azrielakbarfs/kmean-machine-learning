<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:index.php");
		exit;
	}
	if (isset($_POST['button']))
	{
		$passlama = md5($_POST['lama']);
		$querylogin = mysql_query("SELECT * FROM login WHERE username = '$_POST[username]' AND password = '$passlama'");
		if ($datalogin = mysql_fetch_array($querylogin))
		{
			if ($_POST['baru'] == $_POST['konfirmasi'])
			{
				$pass = md5($_POST['baru']);
				mysql_query("UPDATE login SET password = '$pass' WHERE username = '$_POST[username]'");
				echo '<script type="text/javascript">alert("Password Berhasil diperbarui!");</script>';
				//header("location:admin.php");
			}
			else
			{
				echo '<script type="text/javascript">alert("Password Baru Tidak Sama!");</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("Password Lama Salah!");</script>';
		}
	}

include("header_admin.php");
?>


			<section id="main-content">
					<section class="wrapper">
						<br>

						<table width="100%" class="table">
						  <tr>
						    <td align="center" valign="top" bgcolor="#FFFFFF"><br />
						      <strong>Ganti Password</strong><br />
						      <br />
						      <form id="form1" name="form1" method="post" action="">
						        <table width="350" border="0" cellpadding="5" cellspacing="1" bgcolor="#000099">
						          <tr>
						            <td width="147" bgcolor="#FFFFFF">Username</td>
						            <td width="180" bgcolor="#FFFFFF">
									<input type="text" name="username" class="form-control" id="username" value="<?php echo $_SESSION['userlogin']; ?>" readonly /></td>
						          </tr>
						          <tr>
						            <td bgcolor="#FFFFFF">Password Lama</td>
						            <td bgcolor="#FFFFFF"><input type="password" name="lama" class="form-control" id="lama" required/></td>
						          </tr>
						          <tr>
						            <td bgcolor="#FFFFFF">Password Baru</td>
						            <td bgcolor="#FFFFFF"><input type="password" name="baru" class="form-control" id="baru" required/></td>
						          </tr>
						          <tr>
						            <td bgcolor="#FFFFFF">Konfirmasi Password</td>
						            <td bgcolor="#FFFFFF"><input type="password" name="konfirmasi" class="form-control" id="konfirmasi" required/></td>
						          </tr>

						          <tr>
						            <td bgcolor="#FFFFFF">&nbsp;</td>
									<br>
						            <td bgcolor="#FFFFFF">
									<br>	
									<input type="submit" name="button" id="button" value="Simpan" class="btn btn-primary" style="float:right;"/></td>
						          </tr>
								  
						        </table>
						      </form>
						      <br />
						    <br /></td>
						  </tr>
						  <tr>
						    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						    </table></td>
						  </tr>
						</table>

					</section>
			</section>








<!--footer start-->
<footer class="site-footer">
		<div class="text-center">
				Aplikasi Machine Learning - Clustering | Metode K-Means 
				<a href="#" class="go-top">
						<i class="fa fa-angle-up"></i>
				</a>
		</div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>


<script type="application/javascript">
	$(document).ready(function () {
			$("#date-popover").popover({html: true, trigger: "manual"});
			$("#date-popover").hide();
			$("#date-popover").click(function (e) {
					$(this).hide();
			});

			$("#my-calendar").zabuto_calendar({
					action: function () {
							return myDateFunction(this.id, false);
					},
					action_nav: function () {
							return myNavFunction(this.id);
					},
					ajax: {
							url: "show_data.php?action=1",
							modal: true
					},
					legend: [
							{type: "text", label: "Special event", badge: "00"},
							{type: "block", label: "Regular event", }
					]
			});
	});


	function myNavFunction(id) {
			$("#date-popover").hide();
			var nav = $("#" + id).data("navigation");
			var to = $("#" + id).data("to");
			console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
	}
</script>
</body>
</html>
