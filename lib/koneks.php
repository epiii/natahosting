<?php 
	
	//hosting
	// $konekx 	= mysql_connect("mysql.idhostinger.com","u858160308_natas","1tambah1=2");
	// $dbx		= mysql_select_db("u858160308_natas");
	
	//offline
	$konekx 	= mysql_connect("localhost","root","");
	$dbx		= mysql_select_db("k3nata");
	
	
	if(!$konekx) echo "<script>alert('maaf tidak terhubung dengan database ')</script>";
?>