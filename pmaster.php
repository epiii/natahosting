 <?php
	include"lib/koneks.php";
	include"lib/pagination_class.php";
 
 	$aksi 	= isset($_GET['aksi'])?$_GET['aksi']:'';
 	$page 	= isset($_GET['page'])?$_GET['page']:'';
 	$cari 	= isset($_GET['cari'])?$_GET['cari']:'';
 	$tabel 	= isset($_GET['tabel'])?$_GET['tabel']:'';
 	$menu 	= isset($_GET['menu'])?$_GET['menu']:'';
	
	switch ($aksi){
	#tambah  ===================================================================================================
			case 'tambah':
				$tb = 'tb_'.substr($menu, 1);
				$s  ='INSERT INTO '.$tb.' SET ';
				foreach ($_POST as $i => $v) {
					$s.=substr($i, 0,-2).'="'.$v.'",';
				}
				print_r($s);exit();
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
					case 'mpekerja':
							$kue="	select * 
									from 
										tb_pekerja p, 
										tb_bagian b, 
										tb_jabatan j, 
										tb_department d, 
										tb_statuskerja s, 
										tb_shiftkerja f
										
									where 
										p.NIK = '$_GET[idx]' and 
										b.id_bagian= p.id_bagian and 
										j.id_jabatan= p.id_jabatan and 
										d.id_department = p.id_department and 
										s.id_statuskerja= p.id_statuskerja and 
										f.id_shiftkerja= p.id_shiftkerja ";
							$jalan	= mysql_query($kue)or die("kueri cetak shift kerja ERROR");
							$cetakR = mysql_fetch_assoc($jalan);
							echo '{
									"nama_pekerja":"'.$cetakR['nama_pekerja'].'",
									"jkelamin":"'.$cetakR['jkelamin'].'",
									"tgllahir":"'.$cetakR['tgllahir'].'",
									"alamat":"'.$cetakR['alamat'].'",
									"kota":"'.$cetakR['kota'].'",
									"jabatan":"'.$cetakR['nama_jabatan'].'",
									"bagian":"'.$cetakR['nama_bagian'].'",
									"department":"'.$cetakR['nama_department'].'",
									"statuskerja":"'.$cetakR['nama_statuskerja'].'",
									"shiftkerja":"'.$cetakR['nama_shiftkerja'].'",
									"tglmasuk":"'.$cetakR['tgl_masuk'].'",
									"tglkeluar":"'.$cetakR['tgl_keluar'].'"
								}';
							//exit();
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
							$jalan	= 	mysql_query("select * from tb_pekerja where id_pekerja= '$_GET[idx]'")
										or die("kueri cetak pekerja ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"NIK":"'.$ambilR['NIK'].'",
									"nama_pekerja":"'.$ambilR['nama_pekerja'].'",
									"jkelamin":"'.$ambilR['jkelamin'].'",
									"tgllahir":"'.$ambilR['tgllahir'].'",
									"alamat":"'.$ambilR['alamat'].'",
									"kota":"'.$ambilR['kota'].'",
									"id_jabatan":"'.$ambilR['id_jabatan'].'",
									"id_bagian":"'.$ambilR['id_bagian'].'",
									"id_department":"'.$ambilR['id_department'].'",
									"id_statuskerja":"'.$ambilR['id_statuskerja'].'",
									"id_shiftkerja":"'.$ambilR['id_shiftkerja'].'",
									"tgl_masuk":"'.$ambilR['tgl_masuk'].'",
									"tgl_keluar":"'.$ambilR['tgl_keluar'].'"
									}';
						exit();
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
									ORDER BY '.$_GET['kategori'].' ASC'; 
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
										<tr id='$r[id_pekerja]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$r[id_pekerja]'>
											</label></td>
											
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
											<td class='to_hide_phone'> $r[tgl_masuk]</td>
											<td class='to_hide_phone'> $r[tgl_keluar]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$r[id_pekerja]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$r[id_pekerja]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$r[id_pekerja]' namaz='$r[nama_bagian]'
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
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$sbagianx[id_bagian]'>
											</label></td>
											
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
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$shiftx[id_shiftkerja]'>
											</label></td>
											
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
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$jabatanx[id_jabatan]'>
											</label></td>
											
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
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$departmentx[id_department]'>
											</label></td>
											
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
									<tr id='department_$departmentx[id_department]'>
										<td><label class='checkbox '>
										<input type='checkbox' id='CB$departmentx[id_department]'>
										</label></td>
										
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
				}
			break;
}