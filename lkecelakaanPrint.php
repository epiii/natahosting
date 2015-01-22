<?php 

session_start();
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
		if($_GET['id'] and $_GET['ruwet']){
			$idy 	= $_GET['id'];  #id_kecelakaan
			$ruwet	= base64_encode($idy.'ruwet'.$idy);
			if($_GET['ruwet']==$ruwet){
					$kue = "select * 
							from 
								tb_kecelakaan kc
								left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel  
								left join tb_subjkecel2 sk  on sk.id_subjkecel2 = kc.id_subjkecel2 
							where 
								kc.id_kecelakaan = '$idy'								
							order by id_kecelakaan desc";
									
				$hasil = mysql_fetch_array(mysql_query($kue));
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	*{
		text-transform:capitalize;
		font: Tahoma, Geneva, sans-serif;
		font-size:14px; 
		color: #000;
	}
	.fieldx{
		color:#000;
		list-style:none;
	}
	.info{
		color:#F00;
	}
	.isi{
		color:#009;
		list-style:none;
	
	}
	.terpilih{
		background:#999;}
	.subket{
		font-size: 12px;
		padding:0 0 0 2px;
	}
	.subbab{
		font-weight:bold;
		text-transform:uppercase;
	}
	.subbab2{
		font-weight:bold;
		text-transform: capitalize;
	}
	p.para{
		font-weight:normal;
		padding-left:10px;
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
	#headery {
		text-transform:uppercase;
		font:"Arial Black", Gadget, sans-serif;
		font-size:18px;
		font-weight:bold;
		
	}
</style>

</head>
<body>
<center>
<table width="800" >
  <tr>
    <th width="212" height="100"><img src="img/pgicon.jpg" width="90" height="81" alt="petrokimia" /></th>
    <th width="366" id="headery">laporan awal kejadian kecelakaan</th>
    <th width="206"><img src="img/k3icon.jpg" width="82" height="82" alt="k3" /></th>
  </tr>
</table>


<br />
<table width="800"  >
  <tr>
    <td class="subbab2">no. referensi kecelakaan: <?php echo $hasil['no_ref'];?></td>
  </tr>
</table>
<br />
<table width="800"  >
  <tr valign="top">
    <td colspan="8" class="subbab">I.detil laporan kecelakaan</td>
  </tr>
  <tr>
    <td width="229" valign="top" class="subbab2" >1. jenis kecelakaan</td>
    <td colspan="4" valign="top" ><span class="isi">
      	<?php
					
		/*$kueCid2	= mysql_query('select * from tb_jcidera');
        $jumCid2	= mysql_num_rows($kueCid2);
        
        echo '<table ><tr>';
        $i= 1;
		while($hasilCid2= mysql_fetch_assoc($kueCid2)){
            $kue = mysql_query("select * from tb_cidera where id_kecelakaan ='$idy' and id_jcidera = '$hasilCid2[id_jcidera]'");
			$jum=mysql_num_rows($kue);
			if($i%5==0){
                echo '</tr><tr>';
            }else{
				if($jum!=0){
                	echo '<td width="150"><label><input type="checkbox" checked="checked" disabled="disabled">'.$hasilCid2['nama_jcidera'].'</label></td>';
				}else{
                	echo '<td width="150"><label><input type="checkbox" disabled="disabled">'.$hasilCid2['nama_jcidera'].'</label></td>';
				}
			}
            $i++;
        }
        echo '</tr></table>';*/
	//=====================
		$sqljkecel	= "	select  *	
						from 
							tb_kecelakaan kc 
							left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel
						where
							kc.id_kecelakaan	= '$idy'" ;
		#var_dump($sqljkecel);
		$kuejkecel	=  mysql_query($sqljkecel);
		$hasiljkecel= mysql_fetch_array($kuejkecel);
		/*$vl1= array('kecelakaan kerja ( cidera akibat kerja )', 
					'bukan kecelakaan kerja (bukan cidera akibat kerja)',
					'penyakit akibat kerja ( sakit akibat kerja )' 
					);*/
		/*$vl1= array('1'=>'kecelakaan kerja ( cidera akibat kerja )', 
					'2'=>'bukan kecelakaan kerja (bukan cidera akibat kerja)',
					'3'=>'penyakit akibat kerja ( sakit akibat kerja )' 
					);*/
		/*$vl1= array('1', 
					'2',
					'3' 
					);*/
		#echo $hasiljkecel['id_subjkecel'];	
		if($hasiljkecel['id_subjkecel']=1){
			echo '
			<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />
				kecelakaan kerja ( cidera akibat kerja )</li><br>
			<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>
				bukan kecelakaan kerja (bukan cidera akibat kerja)</li><br>
			<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>
				penyakit akibat kerja ( sakit akibat kerja )</li><br>';
		}elseif ($hasiljkecel['id_subjkecel']=2){
			echo '
			<li ><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled/>
				kecelakaan kerja ( cidera akibat kerja )</li><br>
			<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" "checked="checked" />
				bukan kecelakaan kerja (bukan cidera akibat kerja)</li><br>
			<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>
				penyakit akibat kerja ( sakit akibat kerja )</li><br>';
		}elseif ($hasiljkecel['id_subjkecel']=3){
			echo '
			<li ><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled/>
				kecelakaan kerja ( cidera akibat kerja )</li><br>
			<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" />
				bukan kecelakaan kerja (bukan cidera akibat kerja)</li><br>
			<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" "checked="checked" />
				penyakit akibat kerja ( sakit akibat kerja )</li><br>';
		}else{
			echo '
			<li ><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled/>
				kecelakaan kerja ( cidera akibat kerja )</li><br>
			<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" />
				bukan kecelakaan kerja (bukan cidera akibat kerja)</li><br>
			<li ><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" />
				penyakit akibat kerja ( sakit akibat kerja )</li><br>';
		
		}
		
		
		/*foreach ($vl1 as &$vlue) {
			if($hasiljkecel['id_subjkecel']==$vlue){
				echo  '<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" 
							disabled="disabled"checked="checked" />'.$hasiljkecel['id_subjkecel'].'</li><br>';
			}else{
				echo '<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$vlue.'</li><br>';
			}
		}*/
			
		
			
/*			$sql2	= 'select * from tb_subjkecel jk where id_jkecel = 1';
			$kue2	=  mysql_query($sql2);
			
			while($hasil2= mysql_fetch_array($kue2)){ 
				 $kue = mysql_query("	select  *	
										from 
											tb_kecelakaan kc,
											tb_subjkecel sj,
											tb_subjkecel2 sk
										where
											kc.id_subjkecel 	= sj.id_subjkecel and
											kc.id_subjkecel2 	= sk.id_subjkecel2 and
											sj.id_subjkecel		= sk.id_subjkecel");
				
				$jum=mysql_num_rows($kue);
				if($jum!=0)
				#if($hasil['id_subjekcel']==$hasil2['id_subjekcel'])
				{
					echo  '<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" 
							disabled="disabled"checked="checked" />'.$hasil2['ket_subjkecel'].'</li>';
				}else{
					echo  '<li><input name="checkbox" type="checkbox" id="checkbox" 
							disabled="disabled"/>'.$hasil2['ket_subjkecel'].'</li>';
				}
			}*/
		
			/*$sql2="select  distinct jeniskecel from tb_jkecel";
			$kue2= mysql_query($sql2);
			while($hasil2= mysql_fetch_array($kue2)){ 
	  			if($hasil['jeniskecel']==$hasil2['jeniskecel']){
					echo  '<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasil2['jeniskecel'].'</li>';
				}else{
					echo  '<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$hasil2['jeniskecel'].'</li>';
				}
			}*/
		?></span>
      <p>&nbsp;</p></td>
    <td valign="top" ><span class="isi">
      <?php
			$kue2= mysql_query("select * from tb_subjkecel2");
			while($hasil2= mysql_fetch_array($kue2)){ 
	  			if($hasil['id_subjkecel2']==$hasil2['id_subjkecel2']){
					echo  '<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasil2['nama_subjkecel2'].'</li>';
				}else{
					echo  '<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$hasil2['nama_subjkecel2'].'</li>';
				}
			}
		?>
    </span></td>
    <td colspan="2" valign="top" ><span class="isi">
      <?php
			$kue2= mysql_query("select  * from tb_subjkecel where id_jkecel = 2");
			while($hasil2= mysql_fetch_array($kue2)){ 
	  			if($hasil['id_subjkecel']==$hasil2['id_subjkecel']){
					echo  '<li class="terpilih"><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasil2['ket_subjkecel'].'</li>';
				}else{
					echo  '<li><input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$hasil2['ket_subjkecel'].'</li>';
				}
			}
		?>
    </span></td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">2. judul kejadian </td>
    <td colspan="7" valign="top"><?php echo $hasil['judul_kejadian']?></td>
    </tr>
  <tr valign="top">
    <td colspan="8" class="subbab2">3. detil informasi</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3" >tempat kejadian</td>
    <td colspan="7" valign="top"><b>Lokasi:</b><br /><?php echo $hasil['tempat']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab3">waktu kejadian</td>
    <td colspan="4" valign="top"><b>Tanggal:</b><br /><?php echo $hasil['tgl_kejadian']?></td>
    <td colspan="3" valign="top"><b>waktu:</b><br />      
      <?php echo $hasil['jam_kejadian']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab3">tanggal pelaporan</td>
    <td colspan="4" valign="top"><b>tanggal:</b><br /><?php echo $hasil['tgl_lapor']?></td>
    <td colspan="3" valign="top"><b>waktu:</b><br />
      <?php echo $hasil['jam_lapor']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab3">dilaporkan oleh</td>
    <td colspan="4" valign="top"><b>nama lengkap</b><br /><?php echo $hasil['pelapor']?>:</td>
    <td colspan="3" valign="top"><b>jabatan:</b><br />
      <?php echo $hasil['jabatan_pelapor']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab3">dilaporkan kepada</td>
    <td colspan="4" valign="top"><b>nama lengkap:</b><br /><?php echo $hasil['laporke']?></td>
    <td colspan="3" valign="top"><b>jabatan:</b><br />
      <?php echo $hasil['jabatan_laporke']?></td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab2">4. Uraian singkat kejadian</td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab2">apa yang terjadi saat itu / apa kontak yang terjadi pada saat itu <br />
catatan : dilarang menyebut nama orang pada bagian ini <br />
 <p class="para"><?php echo $hasil['uraian']?></p></td>
  </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab2"><p>kerugian apa saja yang diakuibatkan oleh kejadia kecelakaan tersebut (cidera, kerusakan peraltan , pencemaran linkungan, dll).</p>
      <p class="para"><?php echo $hasil['kerugian']?></p></td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">5. Penanggung jawab lokasi</td>
    <td width="69" valign="top"><b>nama lengkap:</b><br />
      <?php echo $hasil['nama_pjlokasi']?></td>
    <td colspan="3" valign="top"><b>jabatan:</b><br />
      <?php echo $hasil['jabatan_pjlokasi']?></td>
    <td colspan="3" valign="top"><b>kontak:</b><br />
      <?php echo $hasil['kontak_pjlokasi']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab2" >6. Saksi</td>
    <td valign="top"><b>nama lengkap:</b><br />
      <?php echo $hasil['saksi1']?></td>
    <td colspan="3" valign="top"><b>jabatan:</b><br />
      <?php echo $hasil['jabatan_saksi1']?></td>
    <td colspan="3" valign="top"><b>kontak:</b><br />
      <?php echo $hasil['kontak_saksi1']?></td>
  </tr>
  <tr>
    <td valign="top" class="subbab2"></td>
    <td valign="top"><b>nama lengkap:</b><br />
      <?php echo $hasil['saksi2']?></td>
    <td colspan="3" valign="top"><b>jabatan:</b><br />
      <?php echo $hasil['jabatan_saksi2']?></td>
    <td colspan="3" valign="top"><b>kontak:</b><br />
      <?php echo $hasil['kontak_saksi2']?></td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">II. tindakan langsung</td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">7. tindakan langsung</td>
    <td colspan="4" valign="top"><center><b>oleh siapa</b></center></td>
    <td colspan="3" valign="top"><center><b>selesai pada</b></center></td>
    </tr>
  <?php 
  	$sqlTin = "select * from tb_tindakan where id_kecelakaan = '$idy'";
	$kueTin = mysql_query($sqlTin);
	$jum	= mysql_num_rows($kueTin);
	/*if($jum==0){
		echo '<tr>
			<td valign="top" >-</td>
			<td colspan="2" valign="top">-</td>
			<td colspan="2" valign="top">-</td>
		</tr>';
	}
	elseif($jum>0){*/
 		while($hasilTin = mysql_fetch_assoc($kueTin)){
	
	?>
      <tr>
        <td valign="top" ><?php echo $hasilTin['tindakan']?></td>
        <td colspan="4" valign="top"><center><?php echo $hasilTin['penindak'];?></center></td>
        <td colspan="3" valign="top"><center><?php echo $hasilTin['tanggal_tindakan'].' ('.$hasilTin['jam_tindakan'].')';?></center></td>
      </tr>
  <?php 
  		//} 
  } ?>
  <tr>
    <td colspan="8" valign="top" class="subbab">III. penilaian awal resiko</td>
    </tr>
  <tr valign="top">
    <td colspan="8">silahkan merujuk pada<br />
      <ul>
        <li>        lampiran xxx-xxx-xxx HSE Risk Matrix</li>
        <li>lampiran xxx-xxx-xxx Investigasi Level Matrix<br />
        </li>
      </ul></td>
    </tr>
    <?php 
		$sqlresawal	 = "select * from tb_tingkatresiko where id_kecelakaan = '$idy' and status='awal'";
		$kueresawal	 = mysql_query($sqlresawal);
		$hasilresawal= mysql_fetch_array($kueresawal);
		#echo 'hai : '.$sqlresawal; exit();	
	?>
  <tr>
    <td rowspan="5" valign="top" class="subbab2">8.tingkat resiko</td>
    <td colspan="7" valign="top"><b>konsekuensi aktual</b><br />
	<?php 
		$val1= array('catastrophic', 'major','moderate', 'minor', 'insignificant');
		foreach ($val1 as &$value) {
			if($hasilresawal['konsekuensi_aktual']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['konsekuensi_aktual'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?></td>
    </tr>
  <tr>
    <td colspan="7"><b>konsekuensi potensial</b><br />
    <?php
		$val1= array('catastrophic', 'major','moderate', 'minor', 'insignificant');
				foreach ($val1 as &$value) {
			if($hasilresawal['konsekuensi_potensial']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['konsekuensi_potensial'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>	</td>
    </tr>
  <tr>
    <td colspan="7"><b>kemungkinan</b><br />	  <?php
		$val1= array('almost certain', 'likely','possible', 'rare');
		foreach ($val1 as &$value) {
			if($hasilresawal['kemungkinan']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['kemungkinan'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?></td>
    </tr>
  <tr>
    <td colspan="7"><b>tingkat resiko aktual</b><br /><?php
		$val1= array('low', 'medium','high', 'extreme');
		foreach ($val1 as &$value) {
			if($hasilresawal['tingkat_resiko_aktual']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['tingkat_resiko_aktual'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>    </td>
    </tr>
  <tr>
    <td colspan="7"><b>tingkat resiko potensial</b><br /><?php
		$val1= array('low', 'medium','high', 'extreme');
		foreach ($val1 as &$value) {
			if($hasilresawal['tingkat_resiko_potensial']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['tingkat_resiko_potensial'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>    </td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">IV.sketsa, gambar atau foto kejadian kecelakaan</td>
    </tr>
  <tr valign="top">
    <td colspan="8"><?php
		$sqlFoto	= "select * from tb_foto where id_kecelakaan = '$idy'";
		$kueFoto	= mysql_query($sqlFoto);
		$jum		= mysql_num_rows($kueFoto);
		if($jum==0)
		{
			echo '<center style="height:10px;padding:250px"><b>TERLAMPIR</b></center>';
		}
		else
		{
			#echo '<table ><tr>';
			$i= 1;
			while($hasilFoto= mysql_fetch_assoc($kueFoto))
			{
				#if($i%2==0)
				#{
					#echo '</tr><tr>';
				#}
				#else
				#{
					/*echo '<td align="center">'.$hasilFoto['keterangan'].'<br>
								<img src="img/data/'.$hasilFoto['path'].'" width="200">
					 	 </td>';*/
					echo /*$hasilFoto['keterangan'].*/'<br>
								<img src="img/data/'.$hasilFoto['path'].'" width="200">';
				#}
				#$i++;
			}
			#echo '</tr></table>';
		}
		?>
        </td>
    </tr> 
    <?php
  	$sqlPkerja = "select * from tb_orgterlibat where id_kecelakaan = '$idy'";
  	$kuePkerja = mysql_query($sqlPkerja);
	while($hasilPkerja=mysql_fetch_assoc($kuePkerja)){
  ?>
  <tr>
    <td colspan="8" valign="top" class="subbab">Informasi orang yang terlibat kejadian kecelakaan</td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">I.data orang yang terlibat</td>
    </tr>
  <tr>
    <td rowspan="18" valign="top" class="subbab2">9. detil status pekerja</td>
    <td colspan="4" valign="top"><b>nama lengkap:</b></td>
    <td colspan="3" valign="top"><b>jenis kelamin :</b></td>
    </tr>
  <tr>

    <td colspan="4" valign="top"><?php echo $hasilPkerja['nama_orgterlibat']?></td>
    <td colspan="3" valign="top">
	<?php 
	if ($hasil['jkelamin']=='P'){
		echo '<input disabled="disabled"type="checkbox" />pria  <input type="checkbox"value="P" checked="checked" disabled="disabled"/>wanita';
	}else{
		echo '<input disabled="disabled"type="checkbox" checked="checked" />pria  <input type="checkbox"value="P" disabled="disabled"/>wanita';
	}
	?>    	</td>
    </tr>
  <tr>
    <td colspan="4" valign="top"><b>jabatan:</b></td>
    <td colspan="3" valign="top"><b>tanggal lahir:</b></td>
    </tr>
  <tr>
    <td colspan="4" valign="top"><?php echo $hasilPkerja['nama_jabatan']?></td>
    <td colspan="3" valign="top"><?php echo /*tgl_indo(*/$hasilPkerja['tgllahir']/*)*/?></td>
    </tr>
  <tr>
    <td colspan="7" valign="top"><b>perusahaan:</b></td>
    </tr>
  <tr>
    <td rowspan="4" valign="top"><b>pt petrokimia gresik</b></td>
    <td colspan="3" valign="top"><b>nik</b></td>
    <td colspan="3" valign="top"><b>lama bekerja di perusahaan</b></td>
    </tr>
  <tr>
    <td colspan="3" valign="top"><?php echo $hasilPkerja['NIK']?></td>
    <td colspan="3" valign="top"><?php 
		$tgl1 = "06-3-2013";
		$tgl2 = "08-3-2013";
		$selisih = strtotime($tgl2) -  strtotime($tgl1);
		$hari = $selisih/(60*60*24);

		$masuk 	= $hasil['tgl_masuk'];
		$nowz	= date('d-m-Y');
		
		echo $lama 	= strtotime($nowz) - strtotime($masuk) ;?>        </td>
    </tr>
  <tr>
    <td colspan="3" valign="top"><b>bagian</b></td>
    <td colspan="3" valign="top"><b>department</b></td>
    </tr>
  <tr>
    <td colspan="3" valign="top"><?php echo $hasilPkerja['nama_bagian']?></td>
    <td colspan="3" valign="top"><?php echo $hasilPkerja['nama_department']?></td>
    </tr>
  <tr>
    <td rowspan="4" valign="top"><strong>subkontraktor</strong></td>
    <td colspan="3" valign="top"><strong>nama perusahaan</strong></td>
    <td colspan="3" align="center" valign="middle"><b>lama bekerja di perusahaan</b></td>
    </tr>
  <tr>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" valign="top"><strong>nomor KIB</strong></td>
    <td colspan="3"  ><strong>masa berlaku</strong></td>
    </tr>
  <tr>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4" valign="top"><b>status kerja:</b></td>
    <td width="190" colspan="2" rowspan="2" align="center" valign="middle"><b>shift kerja </b></td>
    <td width="88" rowspan="2" valign="top"><span class="isi">
      <?php
    	$kueshift=mysql_query('select * from tb_shiftkerja');
		while($hasilshift=mysql_fetch_array($kueshift)){
			$sqlsf="select * from tb_orgterlibat where id_kecelakaan = '$idx' and nama_shiftkerja ='$hasilshift[nama_shiftkerja]'";
			$kuesf=mysql_query($sqlsf);
			$jum=mysql_num_rows($kuesf);
			if($jum!=0){
			#if($hasil['id_shiftkerja']==$hasilshift['id_shiftkerja']){
				echo  '<li class="terpilih"><input type="checkbox" disabled="disabled"checked="checked" />'.$hasilshift['nama_shiftkerja'].'</li>';
			}else{
				echo  '<li><input type="checkbox" disabled="disabled" />'.$hasilshift['nama_shiftkerja'].'</li>';
			}
		}
	?>
    </span></td>
    </tr>
  <tr>
    <td	 valign="top" colspan="4"><span class="isi">
      <?php
       	$kuestatus=mysql_query('select * from tb_statuskerja');
		while($hasilstatus=mysql_fetch_array($kuestatus)){
			if($hasil['id_statuskerja']==$hasilstatus['id_statuskerja']){
				echo  '<li class="terpilih"><input type="checkbox" disabled="disabled"checked="checked" />'.$hasilstatus['nama_statuskerja'].'</li>';
			}else{
				echo  '<li><input type="checkbox" disabled="disabled" />'.$hasilstatus['nama_statuskerja'].'</li>';
			}
		}
	?></span>    
    </td>
    </tr>
  
  <tr>
    <td colspan="4" valign="top"><b>masa kerja pada posisi saat ini </b></td>
    <td colspan="2" rowspan="3" align="center" valign="middle"><b>kejadian berulang</b></td>
    <td rowspan="3" align="left" valign="middle"><p>
          <input type="checkbox" disabled="disabled"/>
      ya</p>
      <p>
  <input type="checkbox" disabled="disabled"/>
      tidak</p></td>
  </tr>
  <tr>
    <td valign="top"><input type="checkbox" disabled="disabled"/>
      &lt;bulan</td>
    <td colspan="3" valign="top"><input type="checkbox" disabled="disabled"/>
      1-3 bulan</td>
    </tr>
  <tr>
    <td valign="top"><input type="checkbox" disabled="disabled"/>
      4 bulan</td>
    <td colspan="3" valign="top"><input type="checkbox" disabled="disabled"/>
      &gt;1 tahun</td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">10.aktifitas/pekerjaan yang dilakukan pada saat kejadian</td>
    <td colspan="7" valign="top"><?php echo $hasilPkerja['aktivitas']?></td>
    </tr>
    <?php } ?>
  <tr>
    <td colspan="8" valign="top" class="subbab"><p>I. cidera/sakit<br />
      informasi ini dilengkapi dengan berkonsultasi pada pusat pengobatan dan harus diisi oleh orang yang berkompeten dalam bidang kesehatan<br />
    </p>      </td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">11. jenis cidera</td>
    <td colspan="7"valign="top">
	<?php
        $sqlCid	= "select * from tb_cidera where id_kecelakaan ='$idy'";
		#var_dump($sqlCid);exit();
		$kueCid	= mysql_query($sqlCid);
        $jumCid	= mysql_num_rows($kueCid);
        //$cid	= array();
		while($hasilCid=mysql_fetch_assoc($kueCid)){
			echo '-';
			//$cid[]=$hasilCid;	
			//$cid[]=array (
				//	'id_jcidera'=>$hasilCid['id_jcidera'],
					#'nama_jcidera'=>$hasilCid['nama_jcidera'],
					#'id_jcidera'=>$hasilCid['id'],
			//);
		}
		
		#var_dump($cid);exit();
		$kueCid2	= mysql_query('select * from tb_jcidera');
        $jumCid2	= mysql_num_rows($kueCid2);
        
        echo '<table ><tr>';
        $i= 1;
		while($hasilCid2= mysql_fetch_assoc($kueCid2)){
            $kue = mysql_query("select * from tb_cidera where id_kecelakaan ='$idy' and id_jcidera = '$hasilCid2[id_jcidera]'");
			$jum=mysql_num_rows($kue);
			if($i%5==0){
                echo '</tr><tr>';
            }else{
				if($jum!=0){
                	echo '<td width="150"><label><input type="checkbox" checked="checked" disabled="disabled">'.$hasilCid2['nama_jcidera'].'</label></td>';
				}else{
                	echo '<td width="150"><label><input type="checkbox" disabled="disabled">'.$hasilCid2['nama_jcidera'].'</label></td>';
				}
			}
            $i++;
        }
        echo '</tr></table>';
    ?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">12. bagian tubuh </td>
    <td valign="top" colspan="7">
    <?php
		$kueBag2	= mysql_query('select * from tb_bagtubuh');
        $jumBag2	= mysql_num_rows($kueBag2);
        
        echo '<table ><tr>';
        $i= 1;
		while($hasilBag2= mysql_fetch_assoc($kueBag2)){
            if($i%5==0){
                echo '</tr><tr>';
            }else{
				if($hasilBag2['id_bagtubuh']==$cid['id_bagtubuh']){
                	echo '<td width="150"><label><input type="checkbox" checked="checked" disabled="disabled">'.$hasilBag2['nama_bagtubuh'].'</label></td>';
				}else{
                	echo '<td width="150"><label><input type="checkbox" disabled="disabled">'.$hasilBag2['nama_bagtubuh'].'</label></td>';
				}
			}
            $i++;
        }
        echo '</tr></table>';
		?>

    </td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <tr>
    <td valign="top" class="subbab2">13. deskripsi perawatan dan kondisi korban</td>
    <td colspan="7" valign="top"><p>catat semua pengamatan dan perawatan yang diberikan seperti informasi yang diberikan pada pasien (lampirkan laporan medis jika tersedia)<br /></p>
    <p><?php 
			$sqlRwt = "select * from tb_perawatan where id_kecelakaan = '$idy'";
			$kueRwt = mysql_query($sqlRwt);
			$hasilRwt	= mysql_fetch_assoc($kueRwt);
			echo $hasilRwt['deskripsi_per'];
		?>
        </p></td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">14.hasil perawatan</td>
    <td colspan="7" valign="top">
    <?php 
		echo $hasilRwt['hasil_per'];
		$val1= array('p1'=>'kembali kerja normal', 
					'p2'=>'menjalani perawatan P3K',
					'p3'=>'dirujuk untuk mendapatkan perawatan  dokter / rumah sakit  / pengobatan medis lanjut', 
					'p4'=>'kembali kerja dengan pembatasan aktivitas', 
					'p5'=>'tidak kembali ke tempat kerja ',
					'p6'=>'lain lain ');
		foreach ($val1 as &$value) {
			if($hasilRwt['hasil_per']==$value){
				echo '<span class="terpilih">
						  <input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" checked="checked" />halox'.$hasilRwt['hasil_per'].'</span><br>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value.'<br>';
			}
		}
	?>
    </td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">15. penyedia perawatan</td>
    <td colspan="4" valign="top"><b>nama lengkap</b><br />
      <?php if($hasilRwt['penanggungjawab']=='') echo '-'; else echo $hasilRwt['penanggungjawab']?></td>
    <td colspan="2" valign="top"><b>tanggal</b><br />
      <?php if($hasilRwt['tanggal']=='') echo '-'; else echo $hasil['tanggal']?></td>
    <td valign="top"><b>waktu</b><br />
      <?php if($hasilRwt['waktu']=='') echo '-'; else echo $hasil['waktu']?></td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">16. provider perawatan medis</td>
    <td colspan="4" valign="top"><b>nama tempat pengobatan</b><br />
      <?php if($hasilRwt['nama_tempat_pengobatan']=='') echo '-'; else echo $hasil['nama_tempat_pengobatan']?></td>
    <td colspan="2" valign="top"><b>contact person</b><br />
      <?php if($hasilRwt['contact_person']=='') echo '-'; else  echo $hasil['contact_person']?></td>
    <td valign="top"><b>contac no.</b><br />
      <?php if($hasilRwt['contact_no']=='') echo '-'; else echo $hasil['contact_no']?></td>
  </tr>
  <?php 
  	$sqlAlat 	= "select * from tb_kerusakanalat where id_kecelakaan = '$idy'";
	$kueAlat 	= mysql_query($sqlAlat);
	$hasilAlat 	= mysql_fetch_assoc($kueAlat);
	$jum 		= mysql_num_rows($kueAlat);
  ?>
  <tr>
    <td colspan="8" valign="top" class="subbab"><p>II. kerusakan equipment atau kerusakan property<br />
      kerusakan peralatan atau kerusakan property milik perusahaan</p>      </td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">17. nama peralatan</td>
    <td colspan="7" valign="top"><b>kode alat/no.aset/no seri/pembuat/model</b><br />
      <?php if($jum==0){echo '-';}else{echo $hasilAlat['nama_alat'];}?>
     </td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">18. detil</td>
    <td colspan="7" valign="top"><b>deskripsi kerusakan alat/property</b><br />
      <?php if($jum==0){echo '-';}else{echo $hasilAlat['deskripsi'];}?>
	</td>
    </tr>
  <tr>
    <td valign="top" class="subbab2">19. perkiraan biaya</td>
    <td colspan="7" valign="top">
	<?php 
		if($jum==0){
	?>		<input type="checkbox" disabled="disabled"/>Rp 0 - Rp. 100 jt
			<input type="checkbox" disabled="disabled"/>Rp. 100jt - Rp.1 milyar
			<input type="checkbox" disabled="disabled"/>Rp.1 milyar - Rp.5 milyar
			<input type="checkbox" disabled="disabled"/>Rp.5 milyar - Rp.20 milyar
			<input type="checkbox" disabled="disabled"/>
	<?php } else {?>     
    <?php 
		/*$val1= array('catastrophic', 'major','moderate', 'minor', 'insignificant');
		foreach ($val1 as &$value) {
			if($hasilresawal['konsekuensi_aktual']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['konsekuensi_aktual'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}*/
		}
	?>
        </tr>
  <tr>
    <td valign="top" class="subbab2">20. mekanisme kecelakaan</td>
    <td colspan="7" valign="top"><b>(contoh : tabrakan , kegagalan elektrik, terbalik)</b><br />
      <?php echo $hasilAlat['mekanisme']?></td>
    </tr>
  
  <tr>
    <td colspan="8" valign="top" class="subbab"><p>III. kerusakan lingkungan<br />
      kerusakan lingkungan yang disebabkan kejadian kecelakaan</p>      </td>
    </tr>
  
  <tr>
    <td height="30" valign="top" class="subbab2">21. tipe dampak</td>
    <td valign="top" colspan="7"><?php 
		#kerusakan lingkungan 
		$sqlLing 	= "select * from tb_kerusakanling where id_kecelakaan = '$idy'";
		#var_dump($sqlLing);exit();
		$kueLing	= mysql_query($sqlLing);
		$hasilLing	= mysql_fetch_assoc($kueLing);
		$jum		= mysql_num_rows($kueLing);
		
		$v1= array("water-ground",
					"water-surface",
					"land-undisturbed",
					"land-rehabilited",
					"land-general",
					"culture",
					"heritage",
					"air-quality",
					"fauna",
					"community",
					"others");
					
        foreach ($v1 as &$value) {
			if($hasilLing['id_tipedampak']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilLing['id_tipedampak'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">22. detail dampak</td>
    <td valign="top"><b>agen pencemar</b><br/><?php echo $hasilLing['agen_pencemar']?></td>
    <td colspan="3" valign="top"><b>volume</b><br /><?php echo $hasilLing['volume']?></td>
    <td colspan="2" valign="top"><b>durasi terpapar</b><br /><?php echo $hasilLing['durasi_terpapar']?></td>
    <td valign="top"><b>durasi dampak terpapar</b><br /><?php echo $hasilLing['durasi_dampak_papar']?></td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">23.komentar tambahan</td>
    <td colspan="7" valign="top">
    	<b>komentar (lampirkan informasi tambahan jika diperlukan )</b><br />
    	<?php echo $hasilLing['komen_tambahan']?>
    </td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">IV.lain-lain(kerugian produksi, proses bisnis, dampak komunitas, keamanan, dll)</td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">V. pemberitahuan kepada pihak luar</td>
  </tr>
  <?php 
  	$sqlTahu 	= "select * from tb_pemberitahuan where id_kecelakaan ='$idy' ";
	$kueTahu	=  mysql_query($sqlTahu);
	$hasilTahu	= mysql_fetch_assoc($kueTahu);
  ?>
  <tr>
    <td valign="top" class="subbab2">24. pemberitahuan ke pemerintah/instansi terkait</td>
    <td valign="top"><b>nama instansi:</b><br /><?php echo $hasilTahu['instansi'];?></td>
    <td colspan="3" valign="top"><b>nama petugas:</b><br /><?php echo $hasilTahu['dilaporkanke'];?></td>
    <td colspan="2" valign="top"><b>komentar:</b><br /><?php echo $hasilTahu['komentar'];?></td>
    <td valign="top"><b>waktu:</b><br /><?php echo $hasilTahu['tgl'].' ('.$hasilTahu['jam'].')';?></td>
  </tr>
  <tr>
    <td valign="top" class="subbab" colspan="8">VI.laporan diketahui oleh</td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <?php 
  	$sqlLapor 	= "select * from tb_laporan where id_kecelakaan ='$idy' ";
	$kueLapor	= mysql_query($sqlLapor);
	$hasilLapor	= mysql_fetch_assoc($kueLapor);
  ?>
  <tr>
    <td valign="top" class="subbab2">25. orang yang terlibat</td>
    <td valign="top"><b>nama lengkap:</b><br /><?php echo $hasilLapor['nm_korban'];?></td>
    <td colspan="3" valign="top"><b>komentar :</b><br /><?php echo $hasilLapor['kom_korban'];?></td>
    <td colspan="2" valign="top"><b>tanggal:</b><br /><?php echo $hasilLapor['tgl_korban'];?></td>
    <td valign="top"><b>tanda tangan :</b><br /></td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">26.pengawas/atasan langsung</td>
    <td valign="top"><b>nama lengkap:</b><br /><?php echo $hasilLapor['nm_atasan'];?></td>
    <td colspan="3" valign="top"><b>komentar :</b><br /><?php echo $hasilLapor['kom_atasan'];?></td>
    <td colspan="2" valign="top"><b>tanggal:</b><br /><?php echo $hasilLapor['tgl_atasan'];?></td>
    <td valign="top"><b>tanda tangan :</b><br /></td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">27.penanggung jawab lokasi</td>
    <td valign="top"><b>nama lengkap:</b><br /><?php echo $hasilLapor['nm_pjlokasi'];?></td>
    <td colspan="3" valign="top"><b>komentar :</b><br /><?php echo $hasilLapor['kom_pjlokasi'];?></td>
    <td colspan="2" valign="top"><b>tanggal:</b><br /><?php echo $hasilLapor['tgl_pjlokasi'];?></td>
    <td valign="top"><b>tanda tangan :</b><br /></td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">28. departemen LK3</td>
    <td valign="top"><b>nama lengkap:</b><br /><?php echo $hasilLapor['nm_LK3'];?></td>
    <td colspan="3" valign="top"><b>komentar :</b><br /><?php echo $hasilLapor['kom_LK3'];?></td>
    <td colspan="2" valign="top"><b>tanggal:</b><br /><?php echo $hasilLapor['tgl_LK3'];?></td>
    <td valign="top"><b>tanda tangan :</b><br /></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"valign="top" class="subbab" colspan="8" align="center">laporan kejadian kecelakaan </td>
  </tr>
  <tr>
    <td valign="top" class="subbab" colspan="8">I.ringkasan investigasi</td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <tr>
    <td valign="top" class="subbab2" colspan="8">29. uraian kejadian secara lengkap<br />
	<p class="para"><?php echo $hasil['uraian']?></p>
    </td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  
  <tr>
	<td colspan="8" valign="top" class="subbab">III. penilaian akhir resiko</td>
  </tr>
<tr valign="top">
    <td colspan="8">silahkan merujuk pada<br />
      <ul>
        <li>        lampiran xxx-xxx-xxx HSE Risk Matrix</li>
        <li>lampiran xxx-xxx-xxx Investigasi Level Matrix<br />
        </li>
      </ul></td>
    </tr>
    <?php 
		$sqlresawal	 = "select * from tb_tingkatresiko where id_kecelakaan = '$idy' and status='akhir'";
		$kueresawal	 = mysql_query($sqlresawal);
		$hasilresawal= mysql_fetch_array($kueresawal);
		#echo 'hai : '.$sqlresawal; exit();	
	?>
  <tr>
    <td rowspan="5" valign="top" class="subbab2">8.tingkat resiko</td>
    <td colspan="7" valign="top">konsekuensi aktual<br />
	<?php 
		$val1= array('catastrophic', 'major','moderate', 'minor', 'insignificant');
		foreach ($val1 as &$value) {
			if($hasilresawal['konsekuensi_aktual']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['konsekuensi_aktual'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?></td>
    </tr>
  <tr>
    <td colspan="7">konsekuensi potensial<br />
    <?php
		$val1= array('catastrophic', 'major','moderate', 'minor', 'insignificant');
				foreach ($val1 as &$value) {
			if($hasilresawal['konsekuensi_potensial']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['konsekuensi_potensial'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>	</td>
    </tr>
  <tr>
    <td colspan="7">kemungkinan    
	  <br />	  <?php
		$val1= array('almost certain', 'likely','possible', 'rare');
		foreach ($val1 as &$value) {
			if($hasilresawal['kemungkinan']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['kemungkinan'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?></td>
    </tr>
  <tr>
    <td colspan="7">tingkat resiko aktual<br /><?php
		$val1= array('low', 'medium','high', 'extreme');
		foreach ($val1 as &$value) {
			if($hasilresawal['tingkat_resiko_aktual']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['tingkat_resiko_aktual'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>    </td>
    </tr>
  <tr>
    <td colspan="7">tingkat resiko potensial<br /><?php
		$val1= array('low', 'medium','high', 'extreme');
		foreach ($val1 as &$value) {
			if($hasilresawal['tingkat_resiko_potensial']==$value){
				echo '<span class="terpilih">
						<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"checked="checked" />'.$hasilresawal['tingkat_resiko_potensial'].'</span>';
			}else{
				echo '<input name="checkbox" type="checkbox" id="checkbox" disabled="disabled"/>'.$value;
			}
		}
	?>    </td>
    </tr>
  <tr>
    <td colspan="8" valign="top" class="subbab">III. temuan-temuan investigasi (bukti-bukti)</td>
    </tr>
  <tr>
    <td valign="top" class="subbab2" colspan="8">31. penjelasan dari fakta-fakta yang teridentifikasi dan mengapa kecelakaan / cidera terjadi </td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <?php
  	/*$sqlInv	= "select * from tb_investigasi where id_kecelakaan ='$idy'";
	$kueInv	= mysql_query($sqlInv);
	while($hasilInv= mysql_fetch_assoc($kueInv)){*/
  	$sqlKati= "select * from tb_katinvestigasi";
	$kueKati= mysql_query($sqlKati);
	while($hasilKati= mysql_fetch_assoc($kueKati)){
  ?>	
  <tr>
  	<td valign="top"><b><?php echo $hasilKati['nama_katinvestigasi'];?></b><br /><?php echo $hasilKati['keterangan'];?></td>
  	<td colspan="7">
	<?php 	
		$sqlInv	= "select * from tb_investigasi where id_kecelakaan ='$idy' and id_katinvestigasi ='$hasilKati[id_katinvestigasi]'";
		$kueInv	= mysql_query($sqlInv);
		$jumInv	= mysql_num_rows($kueInv);
		if($jumInv==0){
			echo '-';
		}else{
			echo '<ol>';
			while($hasilInv= mysql_fetch_assoc($kueInv)){
				echo '<li>'.$hasilInv['hasil_investigasi'].'</li>';
			}
			echo '</ol>';
		}
	?>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="8" valign="top" class="subbab">IV.penyebab langsung</td>
    </tr>
  <tr>
    <td valign="top" class="subbab2" colspan="8">32. kesalahan atau kegagalan yang secara langsung menyebabkan terjadinya kontak (kecelakaan)</td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <tr><td colspan="8">
  <?php 
  	$sqlInv2= "select * from tb_investigasi where id_kecelakaan ='$idy' and status=1";
	$kueInv2= mysql_query($sqlInv2);
	$jumInv2= mysql_num_rows($kueInv2);
	echo '<ul>';
	while($hasilInv2 = mysql_fetch_assoc($kueInv2)){
		if($jumInv2==0){
			echo '-';
		}else {
			echo '<li>'.$hasilInv2['hasil_investigasi'].'</li>';
		}
	}
	echo '</ul>';
  ?>
  </td></tr>
  <tr>
    <td valign="top" class="subbab" colspan="8">V. penyebab dasar - faktor manusia<br />
    silahkan merujuk pada lampiran petunjuk pencarian data investigasi    </td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <tr>
    <td valign="top" class="subbab3">klasifikasi penyebab dasar</td>
    <td valign="top">keterangan</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>procedures<br />
    prosedur</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>training<br />
    pelatihan</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>quality control<br />
    kualitas kontrol</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>communication<br />
    komunikasi</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>management system<br />
    sistem manajemen</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>human engineering<br />
    rekayasa manusia</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>work direction<br />
    petunjuk kerja</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>VI.penyebab dasar-faktor peralatan<br />
    silahkan merujuk pada lampiran petunjuk pencarian dan investigasi</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3">klasifikasi penyebab dasar</td>
    <td valign="top">keterangan</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>torelable failure<br />
    kegagalan yang dapat ditolerir</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>design<br />
    rancangan</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>equipment / part defective<br />
    peralatan/suku cadang rusak</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>preventive/maintenance<br />
    pemeliharaan</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3"><p>repeat failure<br />
    kegagalan yang berulang</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab"><p>VII.penyebab dasar -bencana alam (sabotase)<br />
    silahkan merujuk pada lampiran petunjuk pecarian data investigasi</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab"><p>VIII.penyebab dasar-lain-lain (sebutkan)<br />
    silahkan merujuk pada lampiran petunjuk pencarian data investigasi</p>      </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab">IX.pencegahan/tindakan perbaikan dari hasil investigasi </td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab3">temuan no</td>
    <td valign="top">komentar pelaksana tindakan perbaikan</td>
    <td colspan="3" valign="top"><p>tanggung jawab<br />
      (nama personel)</p>      </td>
    <td colspan="2" valign="top">jabatan/bagian/departemen</td>
    <td valign="top"><p>due data<br />
      (tanggal target)</p>      </td>
  </tr>
  <tr>
    <td valign="top" class="subbab">X.lampiran investigasi</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab2">33.lampiran</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="subbab">XI.anggota tim investigasi</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  
  <tr>
    <td valign="top" class="subbab2">34. ketua tim</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br /><?php echo $hasil['ketua_timinv'];?></td>
    <td colspan="2" valign="top" ><b>tgl mulai :</b><br /><?php echo $hasil['tglmulai_timinv'];?></td>
    <td valign="top" ><b>tgl selesai:</b><br /><?php echo $hasil['tglakhir_timinv'];?></td>
  </tr>
  <?php 
		$sqlTim = "select * from tb_timinvestigasi where id_kecelakaan = '$idy'";
		$kueTim	= mysql_query($sqlTim);
		$hasilTim= mysql_fetch_assoc($kueTim);  
  ?>
  <tr>
    <td valign="top" class="subbab2">35. anggota tim</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br /><?php echo $hasilTim['nm_anggota1'];?></td>
    <td colspan="2" valign="top"><b>perusahaan :</b><br /><?php echo $hasilTim['per_anggota1'];?></td>
    <td valign="top"><b>jabatan :</b><br /><?php echo $hasilTim['jab_anggota1'];?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br /><?php echo $hasilTim['nm_anggota2'];?></td>
    <td colspan="2" valign="top"><b>perusahaan :</b><br /><?php echo $hasilTim['per_anggota2'];?></td>
    <td valign="top"><b>jabatan :</b><br /><?php echo $hasilTim['jab_anggota2'];?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br /><?php echo $hasilTim['nm_anggota3'];?></td>
    <td colspan="2" valign="top"><b>perusahaan :</b><br /><?php echo $hasilTim['per_anggota3'];?></td>
    <td valign="top"><b>jabatan :</b><br /><?php echo $hasilTim['jab_anggota3'];?></td>
  </tr>
  <tr>
    <td valign="top" class="subbab3" colspan="8">pengkaji ulang laporan kejadian kecelakaan</td>
    <!--<td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>-->
  </tr>
  <?php
  	$sqlKaji	= "select * from tb_kajiulang where id_kecelakaan = '$idy'";
	$kueKaji	= mysql_query($sqlKaji);
	$hasilKaji	= mysql_fetch_assoc($kueKaji);
	?>
  <tr>
    <td valign="top" class="subbab2">36. kabag k3</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br />
      <?php echo $hasilKaji['nm_kabagk3']?></td>
    <td colspan="2" valign="top"><b>tanda tangan :</b><br /></td>
    <td valign="top"><b>tanggal :</b><br /><?php echo $hasilKaji['tgl_kabagk3']?></td>
  </tr>
  <tr>
    <td valign="top" >&nbsp;</td>
    <td valign="top" colspan="7"><b>komentar :</b><br />
		<?php echo $hasilKaji['kom_kabagk3']?></td>
 </tr>
    <tr>
    <td valign="top" class="subbab2">37. manager LK3</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br />
      <?php echo $hasilKaji['nm_kadeplk3']?></td>
    <td colspan="2" valign="top"><b>tanda tangan :</b><br /></td>
    <td valign="top"><b>tanggal :</b><br /><?php echo $hasilKaji['tgl_kadeplk3']?></td>
  </tr>
  <tr>
    <td valign="top" >&nbsp;</td>
    <td valign="top" colspan="7"><b>komentar :</b><br />
		<?php echo $hasilKaji['kom_kadeplk3']?></td>
 </tr>
    <tr>
    <td valign="top" class="subbab2">38. kakomp (jika diperlukan)</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br />
      <?php echo $hasilKaji['nm_kakomp']?></td>
    <td colspan="2" valign="top"><b>tanda tangan :</b><br /></td>
    <td valign="top"><b>tanggal :</b><br /><?php echo $hasilKaji['tgl_kakomp']?></td>
  </tr>
  <tr>
    <td valign="top" >&nbsp;</td>
    <td valign="top" colspan="7"><b>komentar :</b><br />
		<?php echo $hasilKaji['kom_kakomp']?></td>
 </tr>
    <tr>
    <td valign="top" class="subbab2">39. direktur produksi</td>
    <td valign="top" colspan="4"><b>nama lengkap :</b><br />
      <?php echo $hasilKaji['nm_dproduksi']?></td>
    <td colspan="2" valign="top"><b>tanda tangan :</b><br /></td>
    <td valign="top"><b>tanggal :</b><br /><?php echo $hasilKaji['tgl_dproduksi']?></td>
  </tr>
  <tr>
    <td valign="top" >&nbsp;</td>
    <td valign="top" colspan="7"><b>komentar :</b><br />
		<?php echo $hasilKaji['kom_dproduksi']?></td>
 </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</center>
</body>
</html>
<?php 
			}
			else{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
			}
		}
		else
		{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
		}
	}
}	
?>