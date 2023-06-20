<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:index.php");
		exit;
	}

include("header_admin.php");
?>

			<section id="main-content">
					<section class="wrapper">
						<h1>Alternatif</h1>
						<hr>
						<a href="add-alternatif.php" class="btn btn-primary">+ Tambah</a>
						<br><br>
						<table class="table table-striped">
						  <tr>
						  <th width="50">No.</th>
								<th width="200">Kode</th>
								<th>Nama Alternatif</th>
								<th>Keterangan</th>
								<th width="200" style="text-align:center;">Aksi</th>
						  </tr>
							<?php
							$sql = mysqli_query($koneksi, 'Select * from alternatif');
							$no = 1;
							while ($dt = mysqli_fetch_assoc($sql)) {
							?>
							<tr>
								<td><?php echo $no; ?>.</td>
								<td><?php echo $dt['kode_alternatif']; ?></td>
								<td><?php echo $dt['nama_alternatif']; ?></td>
								<td><?php if ($dt['ket'] == "") { echo '-'; }else{echo $dt['ket'];} ?></td>
								<td align="center">
									<a href="edit-alternatif.php?kode_alternatif=<?php echo $dt['kode_alternatif']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="del-alternatif.php?kode_alternatif=<?php echo $dt['kode_alternatif']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
							<?php
							$no++;
							} ?>
						</table>

					</section>
			</section>

<?php
include("footer.php"); ?>
