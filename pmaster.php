 <?php
 	session_start();
	require_once"lib/koneks.php";
	require_once"lib/pagination_class.php";
  	require_once 'lib/tglindo.php';
 
 	$aksi 	= isset($_GET['aksi'])?$_GET['aksi']:'';
 	$page 	= isset($_GET['page'])?$_GET['page']:'';
 	$cari 	= isset($_GET['cari'])?$_GET['cari']:'';
 	$tabel 	= isset($_GET['tabel'])?$_GET['tabel']:'';
 	$menu 	= isset($_GET['menu'])?$_GET['menu']:'';
	$tb  	= 'tb_'.substr($menu, 1);
	$id 	= 'id_'.substr($menu, 1);
	
	switch ($aksi){
	#tambah  ===================================================================================================
		case 'simpan':
			$arr = array();
			foreach ($_POST as $i => $v) {
				$arr[]=substr($i, 0,-2).'="'.$v.'"';
			}$f   = implode(',', $arr);
			$s    = isset($_GET['idx'])?'UPDATE '.$tb.' SET '.$f.' WHERE '.$id.'='.$_GET['idx']:'INSERT INTO '.$tb.' SET '.$f;
			$e    = mysql_query($s);
			$stat = $e?'sukses':'gagal simpan ('.mysql_error().')'; 
			echo json_encode(array('status'=>$stat));
		break;

	#combo ===================================================================================================
		case 'combo':
			switch($menu){
				case 'mpekerjas':
					switch ($tabel)
					{
						case 'tb_jabatan':
							$sql 	= "select * from tb_jabatan order by nama_jabatan";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;								
						
						case 'tb_bagian':
							$sql 	= "select * from tb_bagian order by nama_bagian";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;	
						
						case 'tb_department':
							$sql 	= "select * from tb_department order by nama_department";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;	
						
						case 'tb_shiftkerja':
							$sql 	= "select * from tb_shiftkerja order by nama_shiftkerja";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;	
						
						case 'tb_statuskerja':
							$sql 	= "select * from tb_statuskerja order by nama_statuskerja ";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;	
					}
				break;
				
				case'msamplingemisi':
					switch($tabel)
					{
						case 'tb_tempatsampling':
							$sql 	= "select * from tb_tempatsampling order by nama_tempatsampling";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;
						
						case 'tb_produk':
							$sql 	= "select * from tb_produk order by nama_produk ";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;
						
						case 'tb_gas':
							$sql 	= "select * from tb_gas tb_gas order by nama_gas";
							$kue	= mysql_query($sql);
							$ambil	= array();
							while($ambilR	= mysql_fetch_assoc($kue)){
								$ambil[]=$ambilR;
							}
							if($ambil!=NULL){
								echo json_encode($ambil);
							}
							else{
								echo '{"status":"gagal"}';
							}
						break;
					}
			break;
		}
					
	#cetak =====================================================================================================
		case 'cetak':
			switch($menu){
				case 'mshift':
						$jalan	= mysql_query("select * from tb_shiftkerja where id_shiftkerja = '$_GET[idx]'")
									or die("kueri cetak shift kerja ERROR");
						$cetakR = mysql_fetch_assoc($jalan);
						echo '{"nama_shift":"'.$cetakR['nama_shiftkerja'].'",
								"keterangan":"'.$cetakR['keterangan'].'"}';
						exit();
				break;
				case 'mstatuskerja':
						$jalan	= mysql_query("select * from tb_statuskerja where id_statuskerja = '$_GET[idx]'")
									or die("kueri cetak statuskerja ERROR");
						$cetakR = mysql_fetch_assoc($jalan);
						echo '{"nama_statuskerja":"'.$cetakR['nama_statuskerja'].'"}';
						exit();
				break;
			}

	#ambil edit =====================================================================================================				
		case 'ambiledit':
			switch($menu){
				case 'msamplingemisis':
						$jalan	= 	mysql_query("select * 
												from tb_samplingemisi se,
												tb_produk p, 
												tb_gas g, 
												tb_tempatsampling ts 
												where 
													se.id_samplingemisi = '$_GET[idx]' and
													se.id_tempatsampling=ts.id_tempatsampling  and
													se.id_produk=p.id_produk and
													se.id_gas =g.id_gas 
													")
									or die("kueri cetak samping emisi ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"id_gas":"'.$ambilR['id_gas'].'",
								"baku_mutu":"'.$ambilR['baku_mutu'].'",
								"id_tempatsampling":"'.$ambilR['id_tempatsampling'].'",
								"id_produk":"'.$ambilR['id_produk'].'"
								}';
					exit();
				break;

				case 'mpekerja':
					$s    = 'SELECT * FROM  tb_pekerja WHERE  id_pekerja= '.$_GET['idx'];
					$e    = mysql_query($s);
					$stat = $e?'sukses':'gagal'.mysql_error();
					$r    = mysql_fetch_assoc($e);
					$out  = array(
								'status'         =>$stat,
								'NIK'            =>$r['NIK'],
								'nama_pekerja'   =>$r['nama_pekerja'],
								'jkelamin'       =>$r['jkelamin'],
								'tgllahir'       =>$r['tgllahir'],
								'alamat'         =>$r['alamat'],
								'kota'           =>$r['kota'],
								'id_jabatan'     =>$r['id_jabatan'],
								'id_bagian'      =>$r['id_bagian'],
								'id_department'  =>$r['id_department'],
								'id_statuskerja' =>$r['id_statuskerja'],
								'id_shiftkerja'  =>$r['id_shiftkerja'],
								'tgl_masuk'      =>$r['tgl_masuk'],
								'tgl_keluar'     =>$r['tgl_keluar']
							);
					echo json_encode($out);
				break;

				case 'mshift':
						$jalan	= 	mysql_query("select * from tb_shiftkerja where id_shiftkerja = '$_GET[idx]'")
									or die("kueri cetak shift kerja ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_shiftkerja":"'.$ambilR['nama_shiftkerja'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mbagian':
						$jalan	= 	mysql_query("select * from tb_bagian where id_bagian = '$_GET[idx]'")
									or die("kueri tb_bagian ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_bagian":"'.$ambilR['nama_bagian'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mjabatan':
						$jalan	= 	mysql_query("select * from tb_jabatan where id_jabatan = '$_GET[idx]'")
									or die("kueri tb_jabatan ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_jabatan":"'.$ambilR['nama_jabatan'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mdepartment':
						$jalan	= 	mysql_query("select * from tb_department where id_department= '$_GET[idx]'")
									or die("kueri tb_department ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_department":"'.$ambilR['nama_department'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mstatuskerja':
						$jalan	= 	mysql_query("select * from tb_statuskerja where id_statuskerja= '$_GET[idx]'")
									or die("kueri tb_statuskerja ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'"
								}';
					exit();
				break;
				case 'mstatuskerja':
						$jalan	= 	mysql_query("select * from tb_statuskerja where id_statuskerja= '$_GET[idx]'")
									or die("kueri tb_statuskerja ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'"
								}';
					exit();
				break;
				case 'mjcidera':
						$jalan	= 	mysql_query("select * from tb_jcidera where id_jcidera= '$_GET[idx]'")
									or die("kueri tb_jcidera ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_jcidera":"'.$ambilR['nama_jcidera'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mjkecel':
						$jalan	= 	mysql_query("select * from tb_jkecel where id_jkecel= '$_GET[idx]'")
									or die("kueri tb_jkecel ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_jkecel":"'.$ambilR['nama_jeniskecel'].'",
								"sub_jkecel":"'.$ambilR['sub_jeniskecel'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mbagtubuh':
						$jalan	= 	mysql_query("select * from tb_bagtubuh where id_bagtubuh= '$_GET[idx]'")
									or die("kueri tb_bagtubuh ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_bagtubuh":"'.$ambilR['nama_bagtubuh'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mnilairesiko':
						$jalan	= 	mysql_query("select * from tb_nilairesiko where id_nilairesiko= '$_GET[idx]'")
									or die("kueri tb_nilairesiko ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_nilairesiko":"'.$ambilR['nama_nilairesiko'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mkatinvestigasi':
						$jalan	= 	mysql_query("select * from tb_katinvestigasi where id_katinvestigasi= '$_GET[idx]'")
									or die("kueri tb_katinvestigasi ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_katinvestigasi":"'.$ambilR['nama_katinvestigasi'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mjlampiran':
						$jalan	= 	mysql_query("select * from tb_jlampiran where id_jlampiran= '$_GET[idx]'")
									or die("kueri tb_jlampiran ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_jlampiran":"'.$ambilR['nama_jlampiran'].'"
								}';
					exit();
				break;
				case 'mproduk':
						$jalan	= 	mysql_query("select * from tb_produk where id_produk = '$_GET[idx]'")
									or die("kueri tb_produk ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_produk":"'.$ambilR['nama_produk'].'"
								}';
					exit();
				break;
				case 'mtipedampak':
						$jalan	= 	mysql_query("select * from tb_tipedampak where id_tipedampak= '$_GET[idx]'")
									or die("kueri tb_tipedampak ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_tipedampak":"'.$ambilR['nama_tipedampak'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mproduk':
						$jalan	= 	mysql_query("select * from tb_produk where id_produk= '$_GET[idx]'")
									or die("kueri tb_produk ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_produk":"'.$ambilR['nama_produk'].'"
								}';
					exit();
				break;
				case 'mtempatsampling':
						$jalan	= 	mysql_query("select * from tb_tempatsampling where id_tempatsampling= '$_GET[idx]'")
									or die("kueri tb_tempatsampling ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_tempatsampling":"'.$ambilR['nama_tempatsampling'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'msafetyp':
						$jalan	= 	mysql_query("select * from tb_safetyp where id_safetyp= '$_GET[idx]'")
									or die("kueri tb_safetyp ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_safetyp":"'.$ambilR['nama_safetyp'].'",
								"target_bln":"'.$ambilR['target_bln'].'",
								"target_thn":"'.$ambilR['target_thn'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
					exit();
				break;
				case 'mgas':
						$jalan	= 	mysql_query("select * from tb_gas where id_gas= '$_GET[idx]'")
									or die("kueri tb_gas ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"nama_gas":"'.$ambilR['nama_gas'].'"
								}';
					exit();
				break;
				
			}
		break;

	#tampil =====================================================================================================
		case 'tampil' :
			switch ($menu) {
				case 'mpekerja':
						$sql = 'SELECT
									p.NIK,
									p.id_pekerja,
									p.nama_pekerja,
									p.jkelamin,
									p.tgllahir,
									j.nama_jabatan,
									b.nama_bagian,
									d.nama_department,
									s.nama_statuskerja,
									f.nama_shiftkerja,
									p.tgl_masuk,
									p.tgl_keluar
								FROM
									tb_pekerja p
									LEFT JOIN tb_bagian b ON b.id_bagian = p.id_bagian
									LEFT JOIN tb_department d ON d.id_department = p.id_department
									LEFT JOIN tb_jabatan j ON j.id_jabatan = p.id_jabatan
									LEFT JOIN tb_statuskerja s ON s.id_statuskerja = p.id_statuskerja
									LEFT JOIN tb_shiftkerja f ON f.id_shiftkerja = p.id_shiftkerja
								WHERE 
									'.$_GET['kategori'].' LIKE "%'.$_GET['cari'].'%" 
								ORDER BY 
									'.$_GET['kategori'].' ASC'; 
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						// var_dump($_SESSION);exit();
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='mpekerja_$r[id_pekerja]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[NIK]</td>
										<td class='to_hide_phone'> $r[nama_pekerja]</td>
										<td class='to_hide_phone'> $r[jkelamin]</td>
										<td class='to_hide_phone'> $r[tgllahir]</td>
										<td class='to_hide_phone'> $r[nama_jabatan]</td>
										<td class='to_hide_phone'> $r[nama_bagian]</td>
										<td class='to_hide_phone'> $r[nama_department]</td>
										<td class='to_hide_phone'> $r[nama_statuskerja]</td>
										<td class='to_hide_phone'> $r[nama_shiftkerja]</td>
										<td class='to_hide_phone'> ".tgl_indo($r['tgl_masuk'])."</td>
										<td class='to_hide_phone'> ".tgl_indo($r['tgl_keluar'])."</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a onclick='edit(".$r['id_pekerja'].");' xhref='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i namez='$r[nama_pekerja]'>
														edit
													</i>
												</a> 
												<a target='_blank' href='report/r_mpekerja.php?token=".base64_encode($r['id_pekerja'].$_SESSION['namauser'].$_SESSION['passuser'])."&idx=".$r['id_pekerja']."' class='btn target='_blank' btn-small'>
													detail
												</a> 
												<a href='#' onclick='hapus(".$r['id_pekerja'].");' class='btn btn-small'>
													<i namez='$r[nama_pekerja]' >
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'msamplingemisi':
						$sql = 'SELECT
									t.nama_tempatsampling,
									g.nama_gas,
									p.nama_produk,
									se.baku_mutu
								FROM
									tb_samplingemisi se
									JOIN tb_gas g ON g.id_gas = se.id_gas
									JOIN tb_tempatsampling t ON t.id_tempatsampling = se.id_tempatsampling
									JOIN tb_produk p ON p.id_produk = se.id_produk
								WHERE 
								 	'.$_GET['kategori'].' LIKE "%'.$_GET['cari'].'%" 
								ORDER BY 
									'.$_GET['kategori'].' ASC'; 
						var_dump($sql);
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						// var_dump($_SESSION);exit();
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='msamplingemisi_$r[id_samplingemisi]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_tempatsampling]</td>
										<td class='to_hide_phone'> $r[nama_gas]</td>
										<td class='to_hide_phone'> $r[nama_produk]</td>
										<td class='to_hide_phone'> $r[baku_mutu]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a onclick='edit(".$r['id_pekerja'].");' xhref='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i namez='$r[nama_pekerja]'>
														edit
													</i>
												</a> 
												<a target='_blank' href='report/r_mpekerja.php?token=".base64_encode($r['id_pekerja'].$_SESSION['namauser'].$_SESSION['passuser'])."&idx=".$r['id_pekerja']."' class='btn target='_blank' btn-small'>
													detail
												</a> 
												<a href='#' onclick='hapus(".$r['id_pekerja'].");' class='btn btn-small'>
													<i namez='$r[nama_pekerja]' >
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mkatinvestigasi':
						if (isset($_GET['nama_katinvestigasi']) and !empty($_GET['nama_katinvestigasi'])){
							$nama_katinvestigasi= $_GET['nama_katinvestigasi'];
							$sql = "select * from tb_katinvestigasi
									where nama_katinvestigasi like '%$nama_katinvestigasi%' order by id_katinvestigasi desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_katinvestigasi
									where keterangan like '%$keterangan%' order by id_katinvestigasi desc";
						}
						else {
							$sql = "select * from tb_katinvestigasi order by id_katinvestigasi desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='katinvestigasi_$r[id_katinvestigasi]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_katinvestigasi]</td>
										<td class='to_hide_phone'> $r[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$r[id_katinvestigasi]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$r[id_katinvestigasi]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$r[id_katinvestigasi]' namaz='$r[nama_katinvestigasi]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mgas':
						if (isset($_GET['nama_gas']) and !empty($_GET['nama_gas'])){
							$nama_gas= $_GET['nama_gas'];
							$sql = "select * from tb_gas 
									where nama_gas like '%$nama_gas%' order by id_gas desc";
						}
						else {
							$sql = "select * from tb_gas  order by id_gas  desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='gas_$r[id_gas]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_gas]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$r[id_gas]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$r[id_gas]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$r[id_gas]' namaz='$r[nama_gas]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mproduk':
						if (isset($_GET['nama_produk']) and !empty($_GET['nama_produk'])){
							$nama_produk= $_GET['nama_produk'];
							$sql = "select * from tb_produk
									where nama_produk like '%$nama_produk%' order by id_produk desc";
						}
						else {
							$sql = "select * from tb_produk order by id_produk desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='produk_$r[id_produk]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_produk]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$r[id_produk]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$r[id_produk]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$r[id_produk]' namaz='$r[nama_produk]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mbagian':
						if (isset($_GET['nama_bagian']) and !empty($_GET['nama_bagian'])){
							$nama_bagian= $_GET['nama_bagian'];
							$sql = "select * from tb_bagian
									where nama_bagian like '%$nama_bagian%' order by id_bagian desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_bagian 
									where keterangan like '%$keterangan%' order by id_bagian desc";
						}
						else {
							$sql = "select * from tb_bagian order by id_bagian desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($sbagianx = mysql_fetch_array($result)){
								echo"
									<tr id='bagian_$sbagianx[id_bagian]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $sbagianx[nama_bagian]</td>
										<td class='to_hide_phone'> $sbagianx[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$sbagianx[id_bagian]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$sbagianx[id_bagian]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$sbagianx[id_bagian]' namaz='$sbagianx[nama_bagian]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mtempatsampling':
						if (isset($_GET['nama_tempatsampling']) and !empty($_GET['nama_tempatsampling'])){
							$nama_tempatsampling= $_GET['nama_tempatsampling'];
							$sql = "select * from tb_tempatsampling
									where nama_tempatsampling like '%$nama_tempatsampling%' order by id_tempatsampling desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_tempatsampling
									where keterangan like '%$keterangan%' order by id_tempatsampling desc";
						}
						else {
							$sql = "select * from tb_tempatsampling order by id_tempatsampling desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='tempatsampling_$r[id_tempatsampling]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_tempatsampling]</td>
										<td class='to_hide_phone'> $r[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$r[id_tempatsampling]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$r[id_tempatsampling]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$r[id_tempatsampling]' namaz='$r[nama_tempatsampling]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;

				case 'mbagtubuh':
					if (isset($_GET['nama_bagtubuh']) and !empty($_GET['nama_bagtubuh'])){
						$nama_bagtubuh= $_GET['nama_bagtubuh'];
						$sql = "select * from tb_bagtubuh
								where nama_bagtubuh like '%$nama_bagtubuh%' order by id_bagtubuh desc";
					}
					else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
						$keterangan= $_GET['keterangan'];
						$sql = "select * from tb_bagtubuh 
								where keterangan like '%$keterangan%' order by id_bagtubuh desc";
					}
					else {
						$sql = "select * from tb_bagtubuh order by id_bagtubuh desc";
					}

					if(isset($_GET['starting'])){ //nilai awal halaman
						$starting=$_GET['starting'];
					}else{
						$starting=0;
					}
					
					$recpage= 5;//jumlah data per halaman
					$obj 	= new pagination_class($sql,$starting,$recpage);
					$result =$obj->result;
					
					if(mysql_num_rows($result)!=0){
						$nox 	= $starting+1;
						while($r = mysql_fetch_array($result)){
							echo"
								<tr id='bagtubuh_$r[id_bagtubuh]'>
									<td class='to_hide_phone'> $nox </td>
									<td class='to_hide_phone'> $r[nama_bagtubuh]</td>
									<td class='to_hide_phone'> $r[keterangan]</td>
									<td class='ms'>
										
										<div class='btn-group1'>
											<a data-toggle='modal' href='#myModal' class='btn btn-small'  
												rel='tooltip' data-placement='left' data-original-title=' Edit '>
												<i idz='$r[id_bagtubuh]' class='gicon-edit'>
													edit
												</i>
											</a> 
											<a class='btn btn-small' rel='tooltip' data-placement='top' 
												data-original-title='detail'>
												<i idz='$r[id_bagtubuh]' class='gicon-eye-open'>
													detail
												</i>
											</a> 
											<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
												data-original-title='hapus'>
												<i idz='$r[id_bagtubuh]' namaz='$r[nama_bagtubuh]'
												class='gicon-remove'>
													hapus
												</i>
											</a> 
										</div>
										
									</td>
								</tr>";
								$nox++;
						}
					}else{
						echo "<tr align='center'>
								<td  colspan=7 ><span style='color:yellow;text-align:center;'>
								... data tidak ditemukan ...</span></td></tr>";
					 }
					 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
					 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
				
				case 'mjcidera':
						if (isset($_GET['nama_jcidera']) and !empty($_GET['nama_jcidera'])){
							$nama_jcidera= $_GET['nama_jcidera'];
							$sql = "select * from tb_jcidera
									where nama_jcidera like '%$nama_jcidera%' order by id_jcidera desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_jcidera
									where keterangan like '%$keterangan%' order by id_jcidera desc";
						}
						else {
							$sql = "select * from tb_jcidera order by id_jcidera desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($r = mysql_fetch_array($result)){
								echo"
									<tr id='jcidera_$r[id_jcidera]'>
										
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $r[nama_jcidera]</td>
										<td class='to_hide_phone'> $r[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$r[id_jcidera]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$r[id_jcidera]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$r[id_jcidera]' namaz='$r[nama_jcidera]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
							
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 unset($shiftx);
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
				
				case 'mshift':
						if (isset($_GET['nama_shiftkerja']) and !empty($_GET['nama_shiftkerja'])){
							$nama_shiftkerja= $_GET['nama_shiftkerja'];
							$sql = "select * from tb_shiftkerja
									where nama_shiftkerja like '%$nama_shiftkerja%' order by id_shiftkerja desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_shiftkerja 
									where keterangan like '%$keterangan%' order by id_shiftkerja desc";
						}
						else {
							$sql = "select * from tb_shiftkerja order by id_shiftkerja desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($shiftx = mysql_fetch_array($result)){
								echo"
									<tr id='shift_$shiftx[id_shiftkerja]'>
										
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $shiftx[nama_shiftkerja]</td>
										<td class='to_hide_phone'> $shiftx[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$shiftx[id_shiftkerja]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$shiftx[id_shiftkerja]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$shiftx[id_shiftkerja]' namaz='$shiftx[nama_shiftkerja]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
							
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 unset($shiftx);
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
				
				case 'mjabatan':
						if (isset($_GET['nama_jabatan']) and !empty($_GET['nama_jabatan'])){
							$nama_jabatan= $_GET['nama_jabatan'];
							$sql = "select * from tb_jabatan
									where nama_jabatan like '%$nama_jabatan%' order by id_jabatan desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_jabatan 
									where keterangan like '%$keterangan%' order by id_jabatan desc";
						}
						else {
							$sql = "select * from tb_jabatan order by id_jabatan desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($jabatanx = mysql_fetch_array($result)){
								echo"
									<tr id='jabatan_$jabatanx[id_jabatan]'>
										
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $jabatanx[nama_jabatan]</td>
										<td class='to_hide_phone'> $jabatanx[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$jabatanx[id_jabatan]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$jabatanx[id_jabatan]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$jabatanx[id_jabatan]' namaz='$jabatanx[nama_jabatan]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
				
				case 'mdepartment':
						if (isset($_GET['nama_department']) and !empty($_GET['nama_department'])){
							$nama_department= $_GET['nama_department'];
							$sql = "select * from tb_department
									where nama_department like '%$nama_department%' order by id_department desc";
						}
						else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_department 
									where keterangan like '%$keterangan%' order by id_department desc";
						}
						else {
							$sql = "select * from tb_department order by id_department desc";
						}

						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($departmentx = mysql_fetch_array($result)){
								echo"
									<tr id='department_$departmentx[id_department]'>
										
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $departmentx[nama_department]</td>
										<td class='to_hide_phone'> $departmentx[keterangan]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' href='#myModal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<i idz='$departmentx[id_department]' class='gicon-edit'>
														edit
													</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<i idz='$departmentx[id_department]' class='gicon-eye-open'>
														detail
													</i>
												</a> 
												<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<i idz='$departmentx[id_department]' namaz='$departmentx[nama_department]'
													class='gicon-remove'>
														hapus
													</i>
												</a> 
											</div>
											
										</td>
									</tr>";
									$nox++;
							}
						}else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						 }
						 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
				
				case 'mstatuskerja':
					if (isset($_GET['nama_statuskerja']) and !empty($_GET['nama_statuskerja'])){
						$nama_statuskerja= $_GET['nama_statuskerja'];
						$sql = "select * from tb_statuskerja
								where nama_statuskerja like '%$nama_statuskerja%' order by id_statuskerja desc";
					}
					else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
						$keterangan= $_GET['keterangan'];
						$sql = "select * from tb_statuskerja 
								where keterangan like '%$keterangan%' order by id_statuskerja desc";
					}
					else {
						$sql = "select * from tb_statuskerja order by id_statuskerja desc";
					}

					if(isset($_GET['starting'])){ //nilai awal halaman
						$starting=$_GET['starting'];
					}else{
						$starting=0;
					}

					$recpage= 5;//jumlah data per halaman
					$obj 	= new pagination_class($sql,$starting,$recpage);
					$result =$obj->result;
					
					if(mysql_num_rows($result)!=0){
						$nox 	= $starting+1;
						while($departmentx = mysql_fetch_array($result)){
							echo"
								<tr id='department_$departmentx[id_statuskerja]'>
									
									<td class='to_hide_phone'> $nox </td>
									<td class='to_hide_phone'> $departmentx[nama_statuskerja]</td>
									<td class='ms'>
										
										<div class='btn-group1'>
											<a data-toggle='modal' href='#myModal' class='btn btn-small'  
												rel='tooltip' data-placement='left' data-original-title=' Edit '>
												<i idz='$departmentx[id_statuskerja]' class='gicon-edit'>
													edit
												</i>
											</a> 
											<a class='btn btn-small' rel='tooltip' data-placement='top' 
												data-original-title='detail'>
												<i idz='$departmentx[id_statuskerja]' class='gicon-eye-open'>
													detail
												</i>
											</a> 
											<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
												data-original-title='hapus'>
												<i idz='$departmentx[id_statuskerja]' namaz='$departmentx[nama_statuskerja]'
												class='gicon-remove'>
													hapus
												</i>
											</a> 
										</div>
										
									</td>
								</tr>";
								$nox++;
						}
					}else{
						echo "<tr align='center'>
								<td  colspan=7 ><span style='color:yellow;text-align:center;'>
								... data tidak ditemukan ...</span></td></tr>";
					 }
					 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
					 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
				break;
			}
		break;
	
	#hapus =====================================================================================================			
		case 'hapus' :
			$s    = 'DELETE from tb_'.(substr($menu, 1)).' where id_'.(substr($menu, 1)).'='.$_GET['idx'];
			// var_dump($s);
			$e    = mysql_query($s);
			$stat = $e?'sukses':'gagal';
			$out  = json_encode(array(
						'status' =>$stat,
						'id'     =>$_GET['idx']
					));
			echo $out;
		break;
}
