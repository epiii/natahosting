<?php 
session_start();
error_reporting(0);
include "timeout.php";
include"lib/fungsi_indotgl.php";
include "lib/koneks.php";
if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
	echo "<script>alert('maaf waktu habis silahkan login lagi');window.close();</script>";
}
else{
	if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
		echo "<script>window.location='default.php'</script>";
	}else{
		if($_GET['pabrik'] and $_GET['tahun'] and $_GET['ruwet']){
			$pabriky =  $_GET['pabrik']; 
			$tahuny	= $_GET['tahun']; 
			$ruwet	= base64_encode($tahuny.'ruwet'.$tahuny);
			if($_GET['ruwet']==$ruwet){
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
	*{
		text-transform:capitalize;
		font: Tahoma, Geneva, sans-serif;
		font-size:14px;
		color: #000;
	}
	.subbab{
		font-weight:bold;
		text-transform:uppercase;
	}
	.header1{
		text-align:center;
		font-size:18px;
		font-weight:bold;
		text-transform: uppercase;
	}	
	.header2{
		text-align:center;
		font-size:14px;
		font-weight:bold;
		text-transform: uppercase;
	}
	.header3{
		text-align:center;
		font-weight:bold;
		text-transform: uppercase;
	}
	.subbab3{
		padding-left:25px;
		font-weight:bold;
		text-transform: capitalize;
	}
	table{
		background: #CCC;
		
	}
	table tr{
		background:#FFF;
	}
	table tr td{
		padding:5px 10px 5px 10px;
	}
	#header1 {
		text-transform:uppercase;
		font:"Arial Black", Gadget, sans-serif;
		font-size:18px;
		font-weight:bold;
		
	}
</style>
<body>
<center>
<table width="100%" >
  <tr>
    <th width="212" height="100"><img src="img/pgicon.jpg" width="90" height="81" alt="petrokimia" /></th>
    <th width="366" id="header1">laporan emisi </th>
    <th width="206"><img src="img/k3icon.jpg" width="82" height="82" alt="k3" /></th>
  </tr>
</table>
<br />
<table width="100%"  >
  <tr valign="top">
    <td colspan="23" class="header1">DATA emisi  produksi iii tahun <?php echo $tahuny; ?><br />
      pt petrokimia gresik </td>
  </tr>
  <tr valign="top">
    <td colspan="23" class="header2"><?php echo  'pabrik '.$pabriky;?></td>
  </tr>
  <tr>
    <th width="190" rowspan="3"valign="middle">produksi</th>
    <th width="190" rowspan="3"valign="middle">tempat</th>
    <th width="188" rowspan="3"valign="middle">parameter</th>
    <th width="137" rowspan="3"valign="middle">satuan</th>
    <th colspan="15" valign="top">BULAN</th>
    <th rowspan="3" valign="middle">minimum</th>
    <th width="43" rowspan="3" valign="middle">maksimum</th>
    <th width="44" rowspan="3" valign="middle">rata-rata</th>
    <th width="89" rowspan="3" valign="middle">baku mutu</th>
  </tr>
  <tr>
    <th colspan="12" valign="top">INTERNAL</th>
    <th colspan="3" valign="top">EKSTERNAL</th>
    </tr>
  <tr>
    <th width="41" valign="top">1</th>
    <th width="41" valign="top">2</th>
    <th width="41" valign="top">3</th>
    <th width="41" valign="top">4</th>
    <th width="41" valign="top">5</th>
    <th width="41" valign="top">6</th>
    <th width="41" valign="top">7</th>
    <th width="41" valign="top">8</th>
    <th width="41" valign="top">9</th>
    <th width="41" valign="top">10</th>
    <th width="41" valign="top">11</th>
    <th width="41" valign="top">12</th>
    <th width="41" valign="top">3</th>
    <th width="41" valign="top">7</th>
    <th width="84" valign="top">11</th>
    </tr>
  <?php
	function ambil($que){
		$que=mysql_query($que);
		$result=mysql_fetch_assoc($que);
		return round($result['obj'],1);	
	}
	$sql1="	select 
				distinct se.id_samplingemisi,
				se.baku_mutu,
				ts.id_tempatsampling,ts.nama_tempatsampling,
				p.nama_produk,
				g.nama_gas
			from 
				tb_tempatsampling ts,
				tb_samplingemisi se,
				tb_emisi e,
				tb_produk p,
				tb_gas g
			where 
				e.tahun='$tahuny' and
				se.id_samplingemisi	= e.id_samplingemisi and
				se.id_tempatsampling= ts.id_tempatsampling and 
				se.id_produk= p.id_produk and 
				se.id_gas=g.id_gas and
				e.pabrik = '$pabriky'
			order by p.nama_produk
			";
	$kue1	=	mysql_query($sql1);
	while($hasil1=mysql_fetch_array($kue1)){
		$sql2= "select   
					e.kadar
				from 
					tb_emisi e
				where 
					e.tahun = '$tahuny' and
					e.id_samplingemisi = '$hasil1[id_samplingemisi]' ";
	?>
      <!--internal-->

	<?php
		$sqlin1		= $sql2." and bulan = 1 and author='internal' and pabrik ='$pabriky'";
		$kuein1		= mysql_query($sqlin1);
		$hasilin1	= mysql_fetch_array($kuein1);
    ?>
	<?php
		$kuein2		= mysql_query($sql2." and bulan = 2 and author='internal' and pabrik = '$pabriky'");
		$hasilin2	= mysql_fetch_array($kuein2);
    ?>
	<?php
		$kuein3		= mysql_query($sql2." and bulan = 3 and author='internal' and pabrik = '$pabriky'");
		$hasilin3	= mysql_fetch_array($kuein3);
    ?>
	<?php
		$kuein4	= mysql_query($sql2." and bulan = 4 and author='internal' and pabrik ='$pabriky'");
		$hasilin4= mysql_fetch_array($kuein4);
    ?>
	<?php
		$kuein5= mysql_query($sql2." and bulan = 5 and author='internal' and pabrik ='$pabriky'");
		$hasilin5= mysql_fetch_array($kuein5);
    ?>
	<?php
		$kuein6	= mysql_query($sql2." and bulan = 6 and author='internal' and pabrik ='$pabriky'");
		$hasilin6	= mysql_fetch_array($kuein6);
    ?>
	<?php
		$kuein7		= mysql_query($sql2." and bulan = 7 and author='internal' and pabrik ='$pabriky'");
		$hasilin7= mysql_fetch_array($kuein7);
    ?>
	<?php
		$kuein8= mysql_query($sql2." and bulan = 8 and author='internal' and pabrik ='$pabriky'");
		$hasilin8= mysql_fetch_array($kuein8);
    ?>
    <?php
		$kuein9		= mysql_query($sql2." and bulan = 9 and author='internal' and pabrik ='$pabriky'");
		$hasilin9= mysql_fetch_array($kuein9);
    ?>
	<?php
		$kuein10= mysql_query($sql2." and bulan = 10 and author='internal' and pabrik ='$pabriky'");
		$hasilin10	= mysql_fetch_array($kuein10);
    ?>
	<?php
		$kuein11= mysql_query($sql2." and bulan = 11 and author='internal' and pabrik ='$pabriky'");
		$hasilin11= mysql_fetch_array($kuein11);
    ?>
	<?php
		$kuein12= mysql_query($sql2." and bulan = 12 and author='internal' and pabrik ='$pabriky'");
		$hasilin12= mysql_fetch_array($kuein12);
    ?>
	<tr>
    <td valign="top"><?php echo $hasil1['nama_produk'];?></td>
    <td valign="top"><?php echo $hasil1['nama_tempatsampling'];?></td>
    <td valign="top"><?php echo $hasil1['nama_gas'];?></td>
    <td valign="top">Mg/M3</td>
    <td valign="top"><?php echo $hasilin1['kadar'];?></td>
    <td valign="top"><?php echo $hasilin2['kadar'];?></td>
    <td valign="top"><?php echo $hasilin3['kadar'];?></td>
    <td valign="top"><?php echo $hasilin4['kadar'];?></td>
    <td valign="top"><?php echo $hasilin5['kadar'];?></td>
    <td valign="top"><?php echo $hasilin6['kadar'];?></td>
    <td valign="top"><?php echo $hasilin7['kadar'];?></td>
    <td valign="top"><?php echo $hasilin8['kadar'];?></td>
    <td valign="top"><?php echo $hasilin9['kadar'];?></td>
    <td valign="top"><?php echo $hasilin10['kadar'];?></td>
    <td valign="top"><?php echo $hasilin11['kadar'];?></td>
    <td valign="top"><?php echo $hasilin12['kadar'];?></td>
    
    <!--eksternal-->
	<?php
		#var_dump($sql2);exit();
		$sqlmaret=$sql2." and bulan = 3 and author='eksternal'";
		#var_dump($sqlmaret);exit();
		$kuemaret=mysql_query($sqlmaret);
		$hasilmaret=mysql_fetch_array($kuemaret);
    ?>
    <td valign="top"><?php echo $hasilmaret['kadar'];?></td>
    <?php
		$kuejuli=mysql_query($sql2." and bulan = 7 and author='eksternal'");
		$hasiljuli=mysql_fetch_array($kuejuli);
    ?>
    <td valign="top"><?php echo $hasiljuli['kadar'];?></td>
    <?php
		$kuenop=mysql_query($sql2." and bulan = 11 and author='eksternal'");
		$hasilnop=mysql_fetch_array($kuenop);
    ?>
    <td valign="top"><?php echo $hasilnop['kadar'];?></td>
    <td valign="top"><?php echo ambil($kuemin);?></td>
    <?php
	$kuemax="select max(kadar)as obj from tb_emisi where tahun = '$tahuny' and id_samplingemisi = '$hasil1[id_samplingemisi]' ";
	$kuemin="select min(kadar)as obj from tb_emisi where tahun = '$tahuny' and id_samplingemisi = '$hasil1[id_samplingemisi]' ";
	$kueavg="select avg(kadar)as obj from tb_emisi where tahun = '$tahuny' and id_samplingemisi = '$hasil1[id_samplingemisi]' ";
	?>
    <td valign="top"><?php echo ambil($kuemax);?></td>
    <td valign="top"><?php echo ambil($kueavg);?></td>
    <td valign="top"><?php echo $hasil1['baku_mutu'];?></td>
  </tr>
<?php }?>
</table>
</center>
</body>
</html>
<?php 
			}else{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
			}
		}else{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
		}
	}
}	
?>