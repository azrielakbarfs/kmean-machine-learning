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
		mysqli_query($koneksi, "UPDATE kriteria SET nama_kriteria = '$_POST[nama_kriteria]'  WHERE kode_kriteria = '$_POST[kode_kriteria]'");
		header("location:kriteria.php");
	}

include("header_admin.php");
?>


			<section id="main-content">
					<section class="wrapper">
						<h1>Kriteria</h1>
						<table width="1000" class="table">
						  <tr>
						    <td align="center" valign="top" bgcolor="#FFFFFF"><br />
						      <strong>Edit Data kriteria</strong><br />
						      <br />
						      <?php
									$querykriteria = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_kriteria = '$_GET[kode_kriteria]'");
									$datakriteria = mysqli_fetch_array($querykriteria);
								?>
						      <form id="form1" name="form1" method="post" action="">
						        <table width="450" border="0" cellpadding="5" cellspacing="1" bgcolor="#000099">
						          <tr>
						            <td bgcolor="#FFFFFF">kode kriteria</td>
						            <td bgcolor="#FFFFFF"><input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria" readonly value="<?php echo $datakriteria['kode_kriteria']; ?>" required/></td>
						          </tr>
						          <tr>
						            <td width="160" bgcolor="#FFFFFF">Nama kriteria</td>
						            <td width="267" bgcolor="#FFFFFF"><input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" value="<?php echo $datakriteria['nama_kriteria']; ?>" required /></td>
						          </tr>
						          <tr>
						            <td bgcolor="#FFFFFF">&nbsp;</td>
						            <td bgcolor="#FFFFFF"><br>
													<a href="kriteria.php" class="btn btn-default">Kembali</a>
													<input type="submit" name="button" id="button" value="Simpan" class="btn btn-primary" style="float:right;"/></td>
						          </tr>
						        </table>
						      </form>
						      <br />
						    <br /></td>
						  </tr>
						  <tr>
						    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						      <tr>
						    </table></td>
						  </tr>
						</table>

					</section>
			</section>





<?php
include("footer.php"); ?>
