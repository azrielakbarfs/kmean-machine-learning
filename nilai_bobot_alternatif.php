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
						<h1>Nilai Bobot Alternatif</h1>
						<hr>
						<table class="table table-striped">
						  <tr>
								<th width="50">No.</th>
								<th width="200">Kode</th>
								<th>Nama Alternatif</th>
								<?php
								$sql_k = mysqli_query($koneksi, 'Select * from kriteria');
								while ($dt_k = mysqli_fetch_assoc($sql_k)) {
								?>
								<th style="text-align:center;"><?php echo $dt_k['nama_kriteria']; ?></th>
								<?php
								} ?>
								<th style="text-align:center;" width="200" style="text-align:center;">Aksi</th>
						  </tr>
							<?php
							$sql = mysqli_query($koneksi, "SELECT alternatif.kode_alternatif,`nama_alternatif`,
																		REPLACE(GROUP_CONCAT(CASE WHEN `kode_kriteria` = 'C1' THEN `nilai` END, ',') , ',', '') AS C1 ,
																		REPLACE(GROUP_CONCAT(CASE WHEN `kode_kriteria` = 'C2' THEN `nilai` END), ',', '') AS C2,
																		REPLACE(GROUP_CONCAT(CASE WHEN `kode_kriteria` = 'C3' THEN `nilai` END), ',', '') AS C3
																	FROM alternatif JOIN nilai
																	ON alternatif.kode_alternatif = nilai.kode_alternatif
																	GROUP BY nilai.kode_alternatif");
							$no = 1;
							while ($dt = mysqli_fetch_assoc($sql)) {
							?>
							<tr>
								<td><?php echo $no; ?>.</td>
								<td><?php echo $dt['kode_alternatif']; ?></td>
								<td><?php echo $dt['nama_alternatif']; ?></td>
								<td style="text-align:center;"><?php echo $dt['C1']; ?></td>
								<td style="text-align:center;"><?php echo $dt['C2']; ?></td>
								<td style="text-align:center;"><?php echo $dt['C3']; ?></td>
								<td align="center">
									<a href="edit-nilai.php?kode_alternatif=<?php echo $dt['kode_alternatif']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
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
