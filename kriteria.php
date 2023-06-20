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
						<h1>Kriteria</h1>
						<hr>
						<!--<a href="add-kriteria.php" class="btn btn-primary">+ Tambah</a>-->
						<br><br>
						<table class="table table-striped">
						  <tr>
								<th width="50">No.</th>
								<th width="200">Kode</th>
								<th>Nama Kriteria</th>
								<th width="200" style="text-align:center;">Aksi</th>
						  </tr>
							<?php
							$sql = mysqli_query($koneksi, 'Select * from kriteria');
							$no = 1;
							while ($dt = mysqli_fetch_assoc($sql)) {
							?>
							<tr>
								<td><?php echo $no; ?>.</td>
								<td><?php echo $dt['kode_kriteria']; ?></td>
								<td><?php echo $dt['nama_kriteria']; ?></td>
								<td align="center">
									<a href="edit-kriteria.php?kode_kriteria=<?php echo $dt['kode_kriteria']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
									<!--<a href="del-kriteria?kode_kriteria=<?php echo $dt['kode_kriteria']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><span class="glyphicon glyphicon-trash"></span></a>-->
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
