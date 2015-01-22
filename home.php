<?php 
	if (isset($_GET['hlm']) and dekrip($_GET['hlm'])=='home' ){
		echo '<center><h1>Selamat Datang Di Sistem Pelaporan Kecelakaan Kerja, <i>Safety Performance </i> dan Emisi Udara </h1> </center>';     
	}else{
		echo '<script>location.href=\'index.php?hlm=aG9tZQ==\';</script>';
		// header("location:index.php");
	}
?>