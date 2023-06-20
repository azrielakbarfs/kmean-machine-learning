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

<!-- Dashboard content -->
	<!-- /<div class="row">

	<div class="alert alert-warning alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times; &nbsp;</span>
		 </button>
		 <strong>Selamat datang, <?php echo ucwords($_SESSION['userlogin']); ?>!</strong>.
	</div>
	</div>
	/basic datatable -->
	
<div class="row">
<div class="alert alert-success" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times; &nbsp;</span>
		 </button>
		 <p><strong>Aplikasi ini dikembangkan oleh:</strong></p> 
	<p><strong>1. Azriel Akbar Firman Syah</strong></p>
	<p><strong>2. Ahmad Fatkhur Rozi</strong></p>
	<p><strong>3. Febri Wika Inzaghi</strong></p>
	</div>		 
</div>

<!-- /dashboard content -->
<table align="center" style="height: 10vh;">
        <tr>
            <td align="center" valign="middle">
                <img src="./assets/images/bg.jpeg" alt="K-Means" style="width: 600px; height: 350px;">
            </td>
        </tr>
		</table>
<p style="font-size: 20px;"><br><b>Apa itu K-Means?</b></br></p>
<p style="font-size: 16px;"> K-Means adalah salah satu algoritma dalam analisis data yang digunakan untuk pengelompokan atau clustering.<br>
	Tujuan utama dari algoritma K-Means adalah mengelompokkan objek-objek data ke dalam beberapa kelompok atau 
	kluster berdasarkan kemiripan karakteristiknya. Algoritma K-Means bekerja dengan cara mengelompokkan data ke dalam K kelompok, di mana K merupakan jumlah kluster yang diinginkan.
</p>
<p>Baca Dokumentasi K-Means : <a href="https://scikit-learn.org/stable/modules/generated/sklearn.cluster.KMeans.html" target="_blank">Klik Disini</a></p>

<?php
include("footer.php");?>
