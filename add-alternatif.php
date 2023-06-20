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
		$query = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE kode_alternatif = '" . $_POST['kode_alternatif'] . "'");
		$data = $_POST['kode_alternatif'] . "," . $_POST['nama_alternatif'] . "," . $_POST['ket'];
if (!$data == mysqli_fetch_array($query))
{
	mysqli_query($koneksi, "INSERT INTO alternatif(kode_alternatif, nama_alternatif, ket) VALUES('$_POST[kode_alternatif]', '$_POST[nama_alternatif]', '$_POST[ket]')");

	for($i=0; $i < count($_POST['kriteria']); $i++){
		$kode_kriteria = $_POST['kode_kriteria'][$i];
		$nilai = $_POST['kriteria'][$i];
		mysqli_query($koneksi, "INSERT INTO nilai(id_nilai, kode_alternatif, kode_kriteria, nilai) VALUES('0','$_POST[kode_alternatif]', '$kode_kriteria', '$nilai')");
	}

	echo '<script type="text/javascript">alert("Alternatif berhasil ditambah!");</script>';
}
else
{
	echo '<script type="text/javascript">alert("Alternatif gagal ditambah!");</script>';
}
	}


include("header_admin.php");
?>

			<section id="main-content">
					<section class="wrapper">
						<h1>Alternatif</h1>
						<table class="table">
						  <tr>
						    <td align="center" valign="top" bgcolor="#FFFFFF"><br />
						      <strong>Tambah Data Alternatif</strong><br />
						      <br />
						      <form id="form1" name="form1" method="post" action="">
						        <table width="450" border="0" cellpadding="5" cellspacing="1" bgcolor="#000099">
						          <tr>
						            <td width="159" bgcolor="#FFFFFF">Kode Alternatif</td>
						            <td width="218" bgcolor="#FFFFFF"><input type="text" name="kode_alternatif" class="form-control" id="kode_alternatif" required/></td>
						          </tr>
						          <tr>
						            <td bgcolor="#FFFFFF">Nama Alternatif</td>
						            <td bgcolor="#FFFFFF"><input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control" required/></td>
						          </tr>
											<tr>
						            <td bgcolor="#FFFFFF">Keterangan</td>
						            <td bgcolor="#FFFFFF"><input type="text" name="ket" id="ket" class="form-control"/></td>
						          </tr>
											<?php
											$sql_k = mysqli_query($koneksi, 'Select * from kriteria');
											while ($dt_k = mysqli_fetch_assoc($sql_k)) {
											?>
											<tr>
						            <td bgcolor="#FFFFFF">nilai bobot <?php echo $dt_k['nama_kriteria']; ?><input type="text" name="kode_kriteria[]" id="<?php echo $dt_k['kode_kriteria']; ?>" hidden value="<?php echo $dt_k['kode_kriteria']; ?>"/></td>
						            <td bgcolor="#FFFFFF"><input type="number" name="kriteria[]" required id="<?php echo $dt_k['nama_kriteria']; ?>" class="form-control" value=""/></td>
						          </tr>
											<?php
											} ?>
						          <tr>
						            <td bgcolor="#FFFFFF">&nbsp;</td>
						            <td bgcolor="#FFFFFF">
													<br>
													<a href="alternatif.php" class="btn btn-default">Kembali</a>
													<input type="submit" name="button" class="btn btn-primary" style="float:right;" id="button" value="Simpan" /></td>
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




<?php
include("footer.php"); ?>
