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
		mysqli_query($koneksi, "UPDATE alternatif SET nama_alternatif = '{$_POST['nama_alternatif']}', ket = '{$_POST['ket']}' WHERE kode_alternatif = '{$_POST['kode_alternatif']}'");

		for($i=0;$i < count($_POST['kriteria']); $i++){
			$kode_kriteria = $_POST['kode_kriteria'][$i];
			$nilai  			 = $_POST['kriteria'][$i];

			$query = mysqli_query($koneksi, "SELECT * FROM nilai WHERE kode_alternatif = '$_POST[kode_alternatif]' AND kode_kriteria = '$kode_kriteria'");
			if (!$data = mysqli_fetch_array($query))
			{
				mysqli_query($koneksi, "INSERT INTO nilai(id_nilai, kode_alternatif, kode_kriteria, nilai) VALUES('0','$_POST[kode_alternatif]', '$kode_kriteria', '$nilai')");
			}
			mysqli_query($koneksi, "UPDATE nilai SET nilai = '$nilai' WHERE kode_alternatif = '$_POST[kode_alternatif]' AND kode_kriteria = '$kode_kriteria'");

		}
		header("location:perhitungan.php");

	}

include("header_admin.php");
?>


			<section id="main-content">
					<section class="wrapper">
						<h1>Nilai Bobot Alternatif</h1>
						<table width="1000" class="table">
						  <tr>
						    <td align="center" valign="top" bgcolor="#FFFFFF"><br />
						      <strong>Edit Data Nilai Bobot Alternatif</strong><br />
						      <br />
						      <?php
									$queryalternatif = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE kode_alternatif = '$_GET[kode_alternatif]'");
									$dataalternatif = mysqli_fetch_array($queryalternatif);
								?>
						      <form id="form1" name="form1" method="post" action="">
						        <table width="450" border="0" cellpadding="5" cellspacing="1" bgcolor="#000099">
						          <tr>
						            <td bgcolor="#FFFFFF">kode alternatif</td>
						            <td bgcolor="#FFFFFF"><input type="text" name="kode_alternatif" class="form-control" id="kode_alternatif" readonly value="<?php echo $dataalternatif['kode_alternatif']; ?>" required/></td>
						          </tr>
						          <tr>
						            <td width="160" bgcolor="#FFFFFF">Nama alternatif</td>
						            <td width="267" bgcolor="#FFFFFF"><input type="text" class="form-control" name="nama_alternatif" id="nama_alternatif" value="<?php echo $dataalternatif['nama_alternatif']; ?>" required /></td>
						          </tr>
											<tr>
						            <td width="160" bgcolor="#FFFFFF">Keterangan</td>
						            <td width="267" bgcolor="#FFFFFF"><input type="text" class="form-control" name="ket" id="ket" value="<?php echo $dataalternatif['ket']; ?>" /></td>
						          </tr>
											<?php
											$sql_k = mysqli_query($koneksi, 'Select * from kriteria');

											while ($dt_k = mysqli_fetch_assoc($sql_k)) {
												$sql_nilai = mysqli_query($koneksi, "Select * from nilai where kode_alternatif = '$_GET[kode_alternatif]' and kode_kriteria = '$dt_k[kode_kriteria]'");
												$dt_nilai = mysqli_fetch_assoc($sql_nilai);
													if ($dt_nilai['nilai'] == 0) {
															$nilai = 0;
													}else{
															$nilai = $dt_nilai['nilai'];
													}
											?>
											<tr>
						            <td bgcolor="#FFFFFF">nilai bobot <?php echo $dt_k['nama_kriteria']; ?><input type="text" name="kode_kriteria[]" id="<?php echo $dt_k['kode_kriteria']; ?>" hidden value="<?php echo $dt_k['kode_kriteria']; ?>"/></td>
						            <td bgcolor="#FFFFFF"><input type="number" name="kriteria[]" required id="<?php echo $dt_k['nama_kriteria']; ?>" class="form-control" value="<?php echo $nilai; ?>"/></td>
						          </tr>
											<?php
											} ?>
						          <tr>
						            <td bgcolor="#FFFFFF">&nbsp;</td>
						            <td bgcolor="#FFFFFF"><br>
													<a href="nilai_bobot_alternatif.php" class="btn btn-default">Kembali</a>
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
