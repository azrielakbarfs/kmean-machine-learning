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
						<h1>Perhitungan</h1>
						<hr>
						<table class="table table-bordered">
						  <tr>
								<th rowspan="2" style="text-align:center;">Alternatif</th>
								<th colspan="3" style="text-align:center;">Kriteria</th>
								<th rowspan="2" width="200" style="text-align:center;">Aksi</th>
							</tr>
							<tr>
								<?php
								$sql_k = mysqli_query($koneksi, 'Select * from kriteria');
								while ($dt_k = mysqli_fetch_assoc($sql_k)) {
								?>
								<th style="text-align:center;"><?= $dt_k['nama_kriteria'] ?></th>
								<?php
								} ?>
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
								<td style="text-align:center;"><?php echo $dt['kode_alternatif']; ?></td>
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
						<hr>
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Parameter</h3>
						  </div>
						  <div class="panel-body">
						  <b>Jumlah Cluster ( K-Min )&nbsp;:</b> 2 <br>
						  <b>Maksimum ( Max-Runs )&nbsp;:</b> 20
						  </div>
						</div>

						<form action="" method="post">
							<input type="submit" name="proses" value="Proses" class="btn btn-primary">
						</form>

						<hr>

<?php
if (isset($_POST['proses'])) {
?>
						<h1>Hasil Perhitungan</h1>
						<table class="table table-bordered">
						  <tr>
								<th style="text-align:center;" width="200">Kode Alternatif</th>
								<th style="text-align:center;">Nama Alternatif</th>
								<th style="text-align:center;" width="200">Centroid</th>
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

							//TITIK PERTAMA
							$x1 = $dt['C1'];
							$y1 = $dt['C2'];
							//TITIK KEDUA
							$x2 = $dt['C1'];
							$y2 = $dt['C3'];

							// Menghitung jarak Euclidean
							$dx = $x2 - $x1;
							$dy = $y2 - $y1;

							$distance = sqrt(pow($dx, 2) + pow($dy, 2));
								$jumlah = $distance;
								//$dt['C1'] + $dt['C2'] + $dt['C3'];
								if ($jumlah <= 0) {
										$m = " | <b>Cluster 1</b>";
								}
								elseif ($jumlah > 0 and $jumlah <= 1) {
										$m = " | <b>Cluster 2</b>";
								}
								//else{
										//$m = " ( K1 )";
								//}
							?>
							<tr>
								<td style="text-align:center;"><?php echo $dt['kode_alternatif']; ?></td>
								<td><?php echo $dt['nama_alternatif']; ?></td>
								<td style="text-align:center;"><?php echo $jumlah; echo $m; ?></td>
							</tr>
							<?php
							$no++;
							} ?>
						</table>
<?php
} ?>
					</section>
			</section>

<?php
include("footer.php"); ?>
