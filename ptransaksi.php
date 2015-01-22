<?php
	ob_start();
	error_reporting(0);
	include"lib/koneks.php";
	include"lib/pagination_class.php";

 	$aksi 	= @$_GET['aksi'];
	$menu	= @$_GET['menu'];
	$page 	= @$_GET['page'];
	$cari	= @$_GET['cari'];
	$tabel 	= @$_GET['tabel'];
	
	switch ($aksi){
	#result =====================================================================================================				
			case 'result':
				switch($menu){
					case 'tkecelakaan':
						switch($tabel){
							case 'tb_kecelakaan2': //reset data lapora kecelakaan final
								$idx	= $_GET['idx'];
								//update status kecelakaan final 1 => 0
								$sqlStatus	= "update tb_kecelakaan set status ='0' where id_kecelakaan ='$idx'";
								$kueStatus	= mysql_query($sqlStatus);
								
								//hapus tb berelasi 
								$sqlHapus1	= "delete from tb_investigasi where id_kecelakaan = '$idx'";
								$sqlHapus2 	= "delete from tb_kajiulang where id_kecelakaan = '$idx'";
								$sqlHapus3	= "delete from tb_tingkatresiko where id_kecelakaan = '$idx'";
								$sqlHapus4	= "delete from tb_lampiran where id_kecelakaan = '$idx'";
								$sqlHapus5	= "delete from tb_penyebabdasar where id_kecelakaan = '$idx'";
								$sqlHapus6	= "delete from tb_timinvestigasi where id_kecelakaan = '$idx'";
								
								$kueHapus1	= mysql_query($sqlHapus1);
								$kueHapus2	= mysql_query($sqlHapus2);
								$kueHapus3	= mysql_query($sqlHapus3);
								$kueHapus4	= mysql_query($sqlHapus4);
								$kueHapus5	= mysql_query($sqlHapus5);
								$kueHapus6	= mysql_query($sqlHapus6);
								
								if($kueStatus){
									echo '{"status":"sukses"}';
								}else{
									echo '{"status":"gagal"}';
								}
							break;

							case 'tb_kecelakaan':
								/*$sql = "select * 
										from 
											tb_pekerja pk,
											tb_jabatan jb,
											tb_department dp,
											tb_statuskerja sk,
											tb_shiftkerja sf,
											tb_bagian bg
										where 
											pk.id_jabatan= jb.id_jabatan and
											pk.id_bagian= bg.id_bagian and
											pk.id_department = dp.id_department and
											pk.id_shiftkerja= sf.id_shiftkerja and
											pk.id_statuskerja = sk.id_statuskerja and
											pk.id_pekerja='$_GET[id_pekerja]'
											";*/
									/*$sql = "SELECT CONCAT('KK-PKG-',LPAD(IfNull(MAX(SUBSTRING(no_ref,8,3))+1,1),3,'0')) 
											AS URUT FROM tb_kecelakaan Where DATE_FORMAT(tgl_kejadian,'%Y')='".Date('Y')."'*/
									//$tglkejadian = '2012-12-05';
									//2012-01-05
									$tglx	= $_GET["tgl"];
									$thn= substr($tglx,0,4); 
									$bln= substr($tglx,5,2); 
									$tgl= substr($tglx,8,2); 
									
									$kuejum	= mysql_query("select * from tb_kecelakaan");
									$jum 	= mysql_num_rows($kuejum);
									//var_dump($jum);exit();
									if($jum==0){
										//var_dump($jum);exit();
										$noref='KK-PKG-1 '.$tgl.'.'.$bln.'.'.$thn;
									}else{
										$sql = mysql_fetch_assoc(mysql_query("select max(id_kecelakaan)as id from tb_kecelakaan"));
										$idlast = $sql['id'];
										$idnew	= $idlast + 1;
										$noref='KK-PKG-'.$idnew.'.'.$tgl.'.'.$bln.'.'.$thn;
									}
									//var_dump($noref);exit();
									#var_dump($thn);exit();
									if($kuejum){
										echo '{
											"status":"sukses",
											"no_ref":"'.$noref.'"
											}';
									}else{
										echo '{
											"status":"gagal"
											}';
									}
							break;
							case 'tb_orgterlibat':
								$sql = "select * 
										from 
											tb_pekerja pk,
											tb_jabatan jb,
											tb_department dp,
											tb_statuskerja sk,
											tb_shiftkerja sf,
											tb_bagian bg
										where 
											pk.id_jabatan= jb.id_jabatan and
											pk.id_bagian= bg.id_bagian and
											pk.id_department = dp.id_department and
											pk.id_shiftkerja= sf.id_shiftkerja and
											pk.id_statuskerja = sk.id_statuskerja and
											pk.id_pekerja='$_GET[id_pekerja]'
											";
								$jalan	= 	mysql_query($sql)or die("kueri tb_kecelakaan ERROR");
								$ambilR = 	mysql_fetch_assoc($jalan);
								echo '{
										"status":"sukses",
										"nama_jabatan":"'.$ambilR['nama_jabatan'].'",
										"tgllahir":"'.$ambilR['tgllahir'].'",
										"nama_bagian":"'.$ambilR['nama_bagian'].'",
										"nama_department":"'.$ambilR['nama_department'].'",
										"nama_shiftkerja":"'.$ambilR['nama_shiftkerja'].'",
										"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'",
										"jkelamin":"'.$ambilR['jkelamin'].'"
										}';
								exit();
							break;
							case 'tb_pekerja':
								$sql = "select *
										from 
											tb_pekerja p
												left join tb_bagian b on b.id_bagian = p.id_bagian
												left join tb_department d  on d.id_department = p.id_department 
													left join tb_jabatan j on j.id_jabatan = p.id_jabatan  
													left join tb_statuskerja s on s.id_statuskerja = p.id_statuskerja  
													left join tb_shiftkerja f on f.id_shiftkerja = p.id_shiftkerja 
										where id_pekerja = '$_GET[idx]'";
								#var_dump($sql);exit();
								$jalan	= 	mysql_query($sql)or die("kueri tb_kecelakaan ERROR");
								$ambilR = 	mysql_fetch_assoc($jalan);
								echo '{
										"status":"sukses",
										"nama_jabatan":"'.$ambilR['nama_jabatan'].'",
										"tgllahir":"'.$ambilR['tgllahir'].'",
										"nama_bagian":"'.$ambilR['nama_bagian'].'",
										"nama_department":"'.$ambilR['nama_department'].'",
										"nama_shiftkerja":"'.$ambilR['nama_shiftkerja'].'",
										"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'",
										"jkelamin":"'.$ambilR['jkelamin'].'"
										}';
								exit();
							break;
						}
					break;
					
					case 'tsafetyp':
						$sql ="select * from tb_safetyp where id_safetyp = '$_GET[idx]'";
						$jalan	= 	mysql_query($sql) or die("kueri dafety perform ERROR");
									#var_dump($sql);exit();
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"fatality":"'.$ambilR['fatality'].'",
								"uac":"'.$ambilR['uac'].'",
								"near_miss":"'.$ambilR['near_miss'].'",
								"ldwc":"'.$ambilR['ldwc'].'",
								"jam_normal":"'.$ambilR['jam_normal'].'",
								"jam_lembur":"'.$ambilR['jam_lembur'].'",
								"jam_absen":"'.$ambilR['jam_absen'].'",
								"bulan":"'.$ambilR['bulan'].'",
								"tahun":"'.$ambilR['tahun'].'"
								}';
						exit();
					break;
				}
			break;
	#ambil edit =====================================================================================================				
			case 'ambiledit':
				switch($menu){
					case 'tkecelakaan':
						$kueK	= "	select * 
									from 
										tb_kecelakaan kc
										left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel  
										left join tb_subjkecel2 sk on sk.id_subjkecel2 = kc.id_subjkecel2  
										left join tb_tingkatresiko tr on tr.id_kecelakaan = kc.id_kecelakaan 
										/*left join tb_perawatan pw on pw.id_kecelakaan = kc.id_kecelakaan 
										left join tb_kerusakanalat ka on ka.id_kecelakaan = kc.id_kecelakaan 
										left join tb_kerusakanling kl on kl.id_kecelakaan = kc.id_kecelakaan 
										left join tb_pemberitahuan pb on pb.id_kecelakaan = kc.id_kecelakaan 
										left join tb_laporan lp on pb.id_kecelakaan = kc.id_kecelakaan */
									where 
										kc.id_kecelakaan = '$_GET[idx]' and
										tr.status = 'awal'
										";
						$jalan	= 	mysql_query($kueK) or die("kueri  tb_kecelakaan ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"info":"sukses",
								"no_ref":"'.$ambilR['no_ref'].'",
								"judul_kejadian":"'.$ambilR['judul_kejadian'].'",
								"id_subjkecel":"'.$ambilR['id_subjkecel'].'",
								"id_subjkecel2":"'.$ambilR['id_subjkecel2'].'",
								"tgl_kejadian":"'.$ambilR['tgl_kejadian'].'",
								"tgl_lapor":"'.$ambilR['tgl_lapor'].'",
								"jam_kejadian":"'.$ambilR['jam_kejadian'].'",
								"jam_lapor":"'.$ambilR['jam_lapor'].'",
								"tempat":"'.$ambilR['tempat'].'",
								"pelapor":"'.$ambilR['pelapor'].'",
								"jabatan_pelapor":"'.$ambilR['jabatan_pelapor'].'",
								"laporke":"'.$ambilR['laporke'].'",
								"jabatan_laporke":"'.$ambilR['jabatan_laporke'].'",
								"uraian":"'.$ambilR['uraian'].'",
								"kerugian":"'.$ambilR['kerugian'].'",
								"nama_pjlokasi":"'.$ambilR['nama_pjlokasi'].'",
								"jabatan_pjlokasi":"'.$ambilR['jabatan_pjlokasi'].'",
								"kontak_pjlokasi":"'.$ambilR['jabatan_pjlokasi'].'",
								"saksi1":"'.$ambilR['saksi1'].'",
								"saksi2":"'.$ambilR['saksi2'].'",
								"jabatan_saksi1":"'.$ambilR['jabatan_saksi1'].'",
								"jabatan_saksi2":"'.$ambilR['jabatan_saksi2'].'",
								"kontak_saksi1":"'.$ambilR['kontak_saksi1'].'",
								"kontak_saksi2":"'.$ambilR['kontak_saksi2'].'",
								"ketua_timinv":"'.$ambilR['ketua_timinv'].'",
								"status":"'.$ambilR['status'].'",
								"konsekuensi_aktual":"'.$ambilR['konsekuensi_aktual'].'",
								"konsekuensi_potensial":"'.$ambilR['konsekuensi_potensial'].'",
								"kemungkinan":"'.$ambilR['kemungkinan'].'",
								"tingkat_resiko_aktual":"'.$ambilR['tingkat_resiko_aktual'].'",
								"tingkat_resiko_potensial":"'.$ambilR['tingkat_resiko_potensial'].'",
								"pj_per":"'.$ambilR['pj_per'].'",
								"tgl_per":"'.$ambilR['tgl_per'].'",
								"jam_per":"'.$ambilR['jam_per'].'",
								"tempat_per":"'.$ambilR['tempat_per'].'",
								"contactper_per":"'.$ambilR['contactper_per'].'",
								"hasil_per":"'.$ambilR['hasil_per'].'",
								"deskripsi_per":"'.$ambilR['deskripsi_per'].'",
								"hasil_per":"'.$ambilR['hasil_per'].'",
								"nama_alat":"'.$ambilR['nama_alat'].'",
								"deskripsi":"'.$ambilR['deskripsi'].'",
								"biaya":"'.$ambilR['biaya'].'",
								"mekanisme":"'.$ambilR['mekanisme'].'",
								"id_tipedampak":"'.$ambilR['id_tipedampak'].'",
								"agen_pencemar":"'.$ambilR['agen_pencemar'].'",
								"volume":"'.$ambilR['volume'].'",
								"area_terpapar":"'.$ambilR['area_terpapar'].'",
								"durasi_terpapar":"'.$ambilR['durasi_terpapar'].'",
								"durasi_dampak_papar":"'.$ambilR['durasi_dampak_papar'].'",
								"komen_tambahan":"'.$ambilR['komen_tambahan'].'",
								"instansi":"'.$ambilR['instansi'].'",
								"dilaporkanke":"'.$ambilR['dilaporkanke'].'",
								"tgl":"'.$ambilR['tgl'].'",
								"jam":"'.$ambilR['jam'].'",
								"komentar":"'.$ambilR['komentar'].'",
								"nm_korban":"'.$ambilR['nm_korban'].'",
								"kom_korban":"'.$ambilR['kom_korban'].'",
								"tgl_korban":"'.$ambilR['tgl_korban'].'",
								"nm_atasan":"'.$ambilR['nm_atasan'].'",
								"kom_atasan":"'.$ambilR['kom_atasan'].'",
								"tgl_atasan":"'.$ambilR['tgl_atasan'].'",
								"nm_pjlokasi":"'.$ambilR['nm_pjlokasi'].'",
								"kom_pjlokasi":"'.$ambilR['kom_pjlokasi'].'",
								"tgl_pjlokasi":"'.$ambilR['tgl_pjlokasi'].'",
								"nm_LK3":"'.$ambilR['nm_LK3'].'",
								"kom_LK3":"'.$ambilR['kom_LK3'].'",
								"tgl_LK3":"'.$ambilR['tgl_LK3'].'",
								
							}';
						//exit();
					break;
					case 'temisi':
						$jalan	= 	mysql_query("
							select * 
								from 
									tb_tempatsampling ts,
									tb_gas g,
									tb_produk p,
									tb_samplingemisi se,
									tb_emisi e
									
								where 
									se.id_samplingemisi	= e.id_samplingemisi and
									se.id_tempatsampling= ts.id_tempatsampling and
									se.id_gas= g.id_gas and
									se.id_produk=p.id_produk and
									e.id_emisi = '$_GET[idx]'")
									or die("kueri  t emisi ERROR");
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"id_samplingemisi":"'.$ambilR['id_samplingemisi'].'",
								"pabrik":"'.$ambilR['pabrik'].'",
								"author":"'.$ambilR['author'].'",
								"nama_tempatsampling":"'.$ambilR['nama_tempatsampling'].'",
								"nama_gas":"'.$ambilR['nama_gas'].'",
								"kadar":"'.$ambilR['kadar'].'",
								"bulan":"'.$ambilR['bulan'].'",
								"tahun":"'.$ambilR['tahun'].'"
								}';
						exit();
					break;
					case 'tsafetyp':
						$sql ="select * from tb_safetyp where id_safetyp = '$_GET[idx]'";
						$jalan	= 	mysql_query($sql) or die("kueri dafety perform ERROR");
									#var_dump($sql);exit();
						$ambilR = 	mysql_fetch_assoc($jalan);
						echo '{
								"status":"sukses",
								"fatality":"'.$ambilR['fatality'].'",
								"uac":"'.$ambilR['uac'].'",
								"near_miss":"'.$ambilR['near_miss'].'",
								"ldwc":"'.$ambilR['ldwc'].'",
								"jam_normal":"'.$ambilR['jam_normal'].'",
								"jam_lembur":"'.$ambilR['jam_lembur'].'",
								"jam_absen":"'.$ambilR['jam_absen'].'",
								"bulan":"'.$ambilR['bulan'].'",
								"tahun":"'.$ambilR['tahun'].'"
								}';
						exit();
					break;
				}
			break;

	# tambah =================================================================================================					
			case 'tambah' :
				switch($menu)
				{
					case 'temisi':
						$simpanQ=mysql_query("insert into tb_emisi set 	author	= '$_POST[authorTB]',
																		pabrik	= '$_POST[pabrikTB]',
																		id_samplingemisi='$_POST[id_tempatsamplingTB]',
																		kadar= $_POST[kadarTB],
																		bulan= $_POST[bulanTB],
																		tahun= $_POST[tahunTB], 
																		tanggal = NOW()
																			")or die('eror sql');
						$idx=mysql_insert_id();
						/*$tersimpanQ=mysql_fetch_assoc(mysql_query("select * 
																	from 
																		tb_samplingemisi se, 
																		tb_gas g,
																		tb_	
																	");*/
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"pabrik":"'.$_POST['pabrikTB'].'",
									"author":"'.$_POST['authorTB'].'",
									"id_samplingemisi":"'.$_POST['id_samplingemisiTB'].'",
									"kadar":"'.$_POST['kadarTB'].'",
									"bulan":"'.$_POST['bulanTB'].'",
									"tahun":"'.$_POST['tahunTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					case 'tsafetyp':
						$sql	= "insert into tb_safetyp set 	jam_normal	= '$_POST[jam_normalTB]',
																jam_lembur	= '$_POST[jam_lemburTB]',
																jam_absen	= '$_POST[jam_absenTB]',
																fatality	= '$_POST[fatalityTB]',
																uac			= '$_POST[uacTB]',
																near_miss	= '$_POST[near_missTB]',
																ldwc		= '$_POST[ldwcTB]',
																bulan		= '$_POST[bulanTB]',
																tahun		= '$_POST[tahunTB]'";
						#secho $sql; exit(); 
						
						$simpanQ=mysql_query($sql);//or die('eror sql');
						$idx=mysql_insert_id();
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"jam_normal":"'.$_POST['jam_normalTB'].'",
									"jam_lembur":"'.$_POST['jam_lemburTB'].'",
									"jam_absen":"'.$_POST['jam_absenTB'].'",
									"uac":"'.$_POST['uacTB'].'",
									"near_miss":"'.$_POST['near_missTB'].'",
									"ldwc":"'.$_POST['ldwcTB'].'",
									"fatality":"'.$_POST['fatalityTB'].'",
									"bulan":"'.$_POST['bulanTB'].'",
									"tahun":"'.$_POST['tahunTB'].'"	
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'tkecelakaanakhir':
						//id_kecelakaan 
						$idx	= $_POST['id_kecelakaanTB'];
						
						//tingkat resiko akhir ==================================================
						$sql1	= "insert into tb_tingkatresiko set	konsekuensi_aktual		='$_POST[konsekuensi_aktual2TB]',
																	konsekuensi_potensial	='$_POST[konsekuensi_potensial2TB]',
																	kemungkinan				='$_POST[kemungkinan2TB]',
																	tingkat_resiko_aktual	='$_POST[tingkat_resiko_aktual2TB]',
																	tingkat_resiko_potensial='$_POST[tingkat_resiko_potensial2TB]',
																	status					='akhir',
																	id_kecelakaan			='$idx'
																	";	
						#var_dump($sql1);exit();
						mysql_query($sql1) or die or die('sql1 (tingkat-resiko)');
						
						//temuan investigasi ====================================================
						foreach ($_POST['rowi'] as $key => $count ){
								$id_katinvestigasi	= $_POST['id_katinvestigasiTB_'.$count];
								$hasil_investigasi	= $_POST['hasil_investigasiTB_'.$count];
								$status				= $_POST['statusTB_'.$count];
								
								$sql2	= "insert into tb_investigasi set 	id_katinvestigasi	= '$id_katinvestigasi',
																			hasil_investigasi	= '$hasil_investigasi',
																			status				= '$status',
																			id_kecelakaan		= '$idx'
																			";
							#var_dump($sql12);exit();
							mysql_query($sql2) or die or die('sql2 (investigasi)');
						}
						
						//lampiran ==================================================
						$sql3	= "insert into tb_lampiran set		jsa				='$_POST[jsaTB]',
																	saksi			='$_POST[saksiTB]',
																	sketsa			='$_POST[sketsaTB]',
																	foto			='$_POST[fotoTB]',
																	training		='$_POST[trainingTB]',
																	perbaikan		='$_POST[perbaikanTB]',
																	prosedur		='$_POST[prosedurTB]',
																	keterampilan	='$_POST[keterampilanTB]',
																	pemberitahuan	='$_POST[pemberitahuanTB]',
																	id_kecelakaan	='$idx'
																	";	
						#var_dump($sql3);exit();
						mysql_query($sql3) or die or die('sql3(lampiran)');
						
						
						//penyebab ==================================================
						foreach ($_POST['rowp'] as $key => $count ){
								$id_subsebabdasar	= $_POST['id_subsebabdasarTB_'.$count];
								$penyebab			= $_POST['penyebabTB_'.$count];
								
								$sql4	= "insert into tb_penyebabdasar set id_subsebabdasar	= '$id_subsebabdasar',
																			penyebab			= '$penyebab',
																			id_kecelakaan		= '$idx'
																			";
							#var_dump($sql4);exit();
							mysql_query($sql4) or die('sql4	(investigasi)');
						}
						
						//tim investigasi ==================================================
						$sql5	= "insert into tb_timinvestigasi set	nm_anggota1		='$_POST[nm_anggota1TB]',
																		nm_anggota2		='$_POST[nm_anggota2TB]',
																		nm_anggota3		='$_POST[nm_anggota3TB]',
																		nm_anggota4		='$_POST[nm_anggota4TB]',
																		
																		per_anggota1	='$_POST[per_anggota1TB]',
																		per_anggota2	='$_POST[per_anggota2TB]',
																		per_anggota3	='$_POST[per_anggota3TB]',
																		per_anggota4	='$_POST[per_anggota4TB]',
																		
																		jab_anggota1	='$_POST[jab_anggota1TB]',
																		jab_anggota2	='$_POST[jab_anggota2TB]',
																		jab_anggota3	='$_POST[jab_anggota3TB]',
																		jab_anggota4	='$_POST[jab_anggota4TB]',
																		
																		id_kecelakaan	='$idx'
																	";	
						#var_dump($sql5);exit();
						mysql_query($sql5) or die or die('sql5 (tim investigasi)');
						
						//tim kaji ulang ==================================================
						$sql6	= "insert into tb_kajiulang set 	nm_kabagk3		='$_POST[nm_kabagk3TB]',
																	nm_kadeplk3		='$_POST[nm_kadeplk3TB]',
																	nm_kakomp		='$_POST[nm_kakompTB]',
																	nm_dproduksi	='$_POST[nm_dproduksiTB]',
																	
																	tgl_kabagk3		='$_POST[tgl_kabagk3TB]',
																	tgl_kadeplk3	='$_POST[tgl_kadeplk3TB]',
																	tgl_kakomp		='$_POST[tgl_kakompTB]',
																	tgl_dproduksi	='$_POST[tgl_dproduksiTB]',
																	
																	kom_kabagk3		='$_POST[kom_kabagk3TB]',
																	kom_kadeplk3	='$_POST[kom_kadeplk3TB]',
																	kom_kakomp		='$_POST[kom_kakompTB]',
																	kom_dproduksi	='$_POST[kom_dproduksiTB]',
																	
																	id_kecelakaan	='$idx'
																	";	
						#var_dump($sql6);exit();
						mysql_query($sql6) or die or die('sql6 (kaji ulang)');
						
						//update kecelakaan => final ====================================
						$sql7	= "update tb_kecelakaan set status 			='1',
															ketua_timinv	= '$_POST[ketua_timinvTB]',
															tglmulai_timinv	= '$_POST[tglmulai_timinvTB]',
															tglakhir_timinv	= '$_POST[tglakhir_timinvTB]'
									where id_kecelakaan = '$idx'";
						#var_dump($sql7);exit();
						mysql_query($sql7)or die('sql 7 gagal');
						
						#if($kue1 and $kue2 and $sql4 and $sql3 and $sql5 and $sql6 and $sql7 and $sql8 and $sql9){
							//mysql_query("COMMIT");
							echo '{"status":"sukses"}';
						#}else{
							//mysql_query("ROLLBACK");
							#echo '{"status":"gagal"}';
						#}
					break;
					
					case 'tkecelakaan':
						#kecelakaan
						if($_POST['id_subjkecel2TB']=='undefined')
						{$id_subjkecel2x='NULL';}
						else{$id_subjkecel2x=$_POST['id_subjkecel2TB'];}
						
						$sql1 	= "insert into 	tb_kecelakaan set 
												no_ref			= '$_POST[no_refTB]', 
												id_subjkecel 	= '$_POST[id_subjkecelTB]', 
												id_subjkecel2 	= $id_subjkecel2x, 
												judul_kejadian 	= '$_POST[judul_kejadianTB]',
												tempat			= '$_POST[tempatTB]',
												tgl_kejadian	= '$_POST[tgl_kejadianTB]',
												tgl_lapor		= '$_POST[tgl_laporTB]',
												jam_kejadian	= '$_POST[jam_kejadianTB]',
												jam_lapor		= '$_POST[jam_laporTB]',
												pelapor			= '$_POST[pelaporTB]',
												laporke			= '$_POST[laporkeTB]',
												jabatan_pelapor	= '$_POST[jabatan_pelaporTB]',
												jabatan_laporke	= '$_POST[jabatan_laporkeTB]',
												saksi1			= '$_POST[saksi1TB]',
												saksi2			= '$_POST[saksi2TB]',
												jabatan_saksi1	= '$_POST[jabatan_saksi1TB]',
												jabatan_saksi2	= '$_POST[jabatan_saksi2TB]',
												kontak_saksi1	= '$_POST[kontak_saksi1TB]',
												kontak_saksi2	= '$_POST[kontak_saksi2TB]',
												uraian			= '$_POST[uraianTB]',
												nama_pjlokasi	= '$_POST[nama_pjlokasiTB]',
												jabatan_pjlokasi= '$_POST[jabatan_pjlokasiTB]',
												kontak_pjlokasi	= '$_POST[kontak_pjlokasiTB]',
												kerugian		= '$_POST[kerugianTB]'
												";
						//var_dump($sql1);exit();
						#mysql_query("BEGIN");
						$kue1 	= mysql_query($sql1)or die('sql1');;
						$idx	= mysql_insert_id();
						
						#tindakan langsung
			            foreach ($_POST['rows'] as $key => $count ){
							$penindak		= $_POST['penindakTB_'.$count];
							$tindakan		= $_POST['tindakanTB_'.$count];
							$tanggal_tindakan= $_POST['tanggal_tindakanTB_'.$count];
			 				$jam_tindakan	= $_POST['tanggal_tindakanTB_'.$count];
			 
							$sql2= "INSERT INTO tb_tindakan set penindak 		= '$penindak',
																tindakan		= '$tindakan',
																tanggal_tindakan= '$tanggal_tindakan',
																jam_tindakan	= '$jam_tindakan',
																id_kecelakaan	= '$idx'
																";
			 				#var_dump($sql2);exit();
							mysql_query($sql2) or die(mysql_error());
						}
						
						#tingkat resiko awal
						$sql3= "insert into tb_tingkatresiko set	id_kecelakaan			='$idx', 
																	konsekuensi_aktual		='$_POST[konsekuensi_aktualTB]',
																	konsekuensi_potensial	='$_POST[konsekuensi_potensialTB]',
																	kemungkinan				='$_POST[kemungkinanTB]',
																	tingkat_resiko_aktual	='$_POST[tingkat_resiko_aktualTB]',
																	tingkat_resiko_potensial='$_POST[tingkat_resiko_potensialTB]',
																	status					='awal'
																	";	
						#var_dump($sql3);exit();
						mysql_query($sql3) or die or die('sql3');
						
						
						#org terlibat
						foreach ($_POST['rowz'] as $key => $countz ){
							$NIK				= $_POST['NIKTB_'.$countz];
							$jkelamin			= $_POST['jkelaminTB_'.$countz];
							$nama_orgterlibat	= $_POST['orgterlibat2TB_'.$countz];
							$tgllahir			= $_POST['tgllahirTB_'.$countz];
			 				$nama_jabatan		= $_POST['nama_jabatanTB_'.$countz];
							$nama_bagian		= $_POST['nama_bagianTB_'.$countz];
							$nama_department	= $_POST['nama_departmentTB_'.$countz];
							$nama_shiftkerja 	= $_POST['nama_shiftkerjaTB_'.$countz];
							$nama_statuskerja	= $_POST['nama_statuskerjaTB_'.$countz];
							$aktivitas			= $_POST['aktivitasTB_'.$countz];
							 
							$sql4= "INSERT INTO tb_orgterlibat  set NIK				= '$NIK',
																nama_orgterlibat	= '$nama_orgterlibat',
																jkelamin			= '$jkelamin',
																tgllahir			= '$tgllahir',
																nama_bagian			= '$nama_bagian',
																nama_jabatan		= '$nama_jabatan',
																nama_department		= '$nama_department',
																nama_shiftkerja 	= '$nama_shiftkerja',
																nama_statuskerja	= '$nama_statuskerja',
																aktivitas			= '$aktivitas', 
																id_kecelakaan		= '$idx'";
			 				#var_dump($sql5);exit();
							mysql_query($sql4) or die or die('sql4');
						}
						
						#jenis cidera	
						foreach ($_POST['rowc'] as $key => $count ){
								$id_jcidera	= $_POST['id_jcideraTB_'.$count];
								$id_bagtubuh= $_POST['id_bagtubuhTB_'.$count];
								$kanan		= $_POST['kananTB_'.$count];
								$kiri		= $_POST['kiriTB_'.$count];
				 
								$sql5 = "insert into tb_cidera set 	
															id_jcidera	= '$id_jcidera',
															id_bagtubuh	= '$id_bagtubuh',
															kanan		= '$kanan',
															kiri		= '$kiri',
															id_kecelakaan= '$idx'
															";
							#var_dump($sql12);exit();
							mysql_query($sql5) or die or die('sql5');
						}
						
						#kerusakan alat
						$sql6= "insert into tb_kerusakanalat set	nama_alat		='$_POST[nama_alatTB]',
																	deskripsi		='$_POST[deskripsiTB]',
																	biaya			='$_POST[biayaTB]',
																	mekanisme		='$_POST[mekanismeTB]',
																	id_kecelakaan	='$idx'
																	";
						
						#var_dump($sql6);exit();
						mysql_query($sql6) or die or die('sql6');
						
						
						#kerusakan lingkungan
						$sql7 = "insert into tb_kerusakanling set	id_kecelakaan='$idx', 
																	id_tipedampak='$_POST[id_tipedampakTB]', 
																	agen_pencemar='$_POST[agen_pencemarTB]',
																	volume='$_POST[volumeTB]',
																	area_terpapar='$_POST[area_terpaparTB]',
																	durasi_terpapar='$_POST[durasi_terpaparTB]',
																	durasi_dampak_papar='$_POST[durasi_dampak_paparTB]',
																	komen_tambahan='$_POST[komen_tambahanTB]'
																	";
						#var_dump($sql2);exit();
						$kue7	= mysql_query($sql7) or die or die('sql7');
						
						
						#pemberitahuan
						$sql8 = "insert into tb_pemberitahuan set	id_kecelakaan 	= '$idx',
																	instansi		= '$_POST[instansiTB]',
																	dilaporkanke	= '$_POST[dilaporkankeTB]',
																	komentar		= '$_POST[komentarTB]',
																	tgl				= '$_POST[tglTB]',
																	jam				= '$_POST[jamTB]'
																	";
						//var_dump($sql8);exit();
						mysql_query($sql8) or die or die('sql8');
												
					  	
						#laporan
						$sql9 = "insert into tb_laporan set 	id_kecelakaan 	= '$idx',
																nm_korban		= '$_POST[nm_korbanTB]',
																nm_atasan		= '$_POST[nm_atasanTB]',
																nm_pjlokasi		= '$_POST[nm_pjlokasiTB]',
																nm_LK3			= '$_POST[nm_LK3TB]',
																
																tgl_korban		= '$_POST[tgl_korbanTB]',
																tgl_atasan		= '$_POST[tgl_atasanTB]',
																tgl_pjlokasi	= '$_POST[tgl_pjlokasiTB]',
																tgl_LK3			= '$_POST[tgl_LK3TB]',
																
																kom_korban		= '$_POST[kom_korbanTB]',
																kom_atasan		= '$_POST[kom_atasanTB]',
																kom_pjlokasi	= '$_POST[kom_pjlokasiTB]',
																kom_LK3			= '$_POST[kom_LK3TB]'
																";
						//var_dump($sql9);exit();
						mysql_query($sql9)or die('sql9');
						
						#upload foto
						$upload_directory	= 'img/data/';         
						$count_data			= count($_FILES['data']) ;   
						
						#foto 	
						$v	= count($_FILES)+1;
						for($i=1;$i<$v;$i++){
							$fileKet	= $_POST['BFoto'.$i];
							$fileName 	= $_FILES['AFoto'.$i]['name'];
							$fileSize 	= $_FILES['AFoto'.$i]['size'];
							$move 		= move_uploaded_file($_FILES['AFoto'.$i]['tmp_name'],$upload_directory.$fileName);
							$sql201		= "insert into tb_foto set 	path = '$fileName', keterangan	= '$fileKet', id_kecelakaan='$idx'";							
							if($move){
								header("Location: index.php?hlm=dGtlY2VsYWthYW4=");
							}else{
								echo "Gagal mengupload gambar";
							}
							mysql_query($sql201) or die();
						}
						
						/*#upload foto
						$upload_directory	= 'img/data/';         
						$count_data			= count($_FILES['data']) ;   
						
						#foto 	
						foreach ($_POST['rowu'] as $key => $count ){
							$path		= $_POST['pathTB_'.$count];
							$keterangan	= $_POST['keteranganTB_'.$count];
			 
							$sql120	= "insert into tb_foto set 	keterangan	= '$keterangan',
																path 		= '$path',
																id_kecelakaan= '$idx'
																";
							#var_dump($sql12);exit();
							mysql_query($sql20) or die or die('sql20');
						}*/

						/*for($x=0;$x<$count_data;$x++){
							$ket	= $_POST['keteranganTB'][$x];
							$nama 	= $_FILES['data']['name'][$x];
							$dir	= $_FILES['data']['tmp_name'][$x];
							move_uploaded_file($dir, $upload_directory.$name); 
							
							$sql20	= "insert into tb_foto set 	path 			= '$nama',
																keterangan		= '$ket',
																id_kecelakaan 	= '$idy' 
																";
							$kue20 = mysql_query($sql20);
							#if($kue20){
							#	echo '"status":"sukses"';
							#}else{
							#	echo '"status":"gagal"';
							#} 
						}*/
						//echo "upload successfully..";
						
						#var_dump($sql6);exit();
						#$kue3 	= mysql_query($sql3);
						
						//$kue2= mysql_query($sql2);
						//$kue3= mysql_query($sql3);
						#$kue4= mysql_query($sql4);
						#$kue6= mysql_query($sql4);
						
						#if($kue1 and $kue2 and $sql4 and $sql3 and $sql5 and $sql6 and $sql7 and $sql8 and $sql9){
							//mysql_query("COMMIT");
							echo '{"status":"sukses"}';
						#}else{
							//mysql_query("ROLLBACK");
							#echo '{"status":"gagal"}';
						#}
						break;

				}
			break;

	#combo=======================================================================================
			case 'combo':
				switch($menu){
					case'tsafetyp':
						switch($tabel){
							case 'tb_safetyp':
								$sql 	= "select * from tb_safetyp order by id_safetyp";
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
					case'temisi':
						switch($tabel){
							case 'tb_samplingemisi':
								$sql 	= "	select 
												se.id_samplingemisi,
												ts.nama_tempatsampling, 
												g.nama_gas
												 
											from 
												tb_samplingemisi se,
												tb_tempatsampling ts,
												tb_gas g
												
											where
												se.id_tempatsampling = ts.id_tempatsampling and  
												se.id_gas = g.id_gas and  
												not exists 
												(select 
													e.id_samplingemisi 
												from 
													tb_emisi e 
												where 
													se.id_samplingemisi = e.id_samplingemisi and 
													e.tahun='$_GET[tahun]' and 
													e.bulan='$_GET[bulan]' and 
													e.pabrik='$_GET[pabrik]' and 
													e.author='$_GET[author]' )
												
											order by 
												ts.nama_tempatsampling asc";
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
							case 'tb_tempatsampling':
								$sql 	= "	select * 
											from 
												tb_tempatsampling ts, tb_gas g, tb_samplingemisi se 
											where 
												ts.id_tempatsampling = se.id_tempatsampling and
												g.id_gas = se.id_gas
												order by ts.nama_tempatsampling";
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
								$sql 	= "select * from tb_gas order by nama_gas";
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
					
					case'tkecelakaan':
						switch($tabel){
							case 'tb_subsebabdasar':
								$sql 	= "select * from tb_subsebabdasar where id_sebabdasar = '$_GET[idsub]' order by id_subsebabdasar ";
								//var_dump($sql);exit();
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
							case 'tb_sebabdasar':
								$sql 	= "select * from tb_sebabdasar order by id_sebabdasar";
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
							case 'tb_katinvestigasi':
								$sql 	= "select * from tb_katinvestigasi order by id_katinvestigasi";
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
							case 'tb_pekerja':
								$sql 	= "select * from tb_pekerja order by nama_pekerja";
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
							case 'tb_jkecel':
								$sql 	= "select * from tb_jkecel order by id_jkecel";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									//echo'{	
											echo json_encode($ambil);
											//.'"
										//}';
								}
								else{
									echo '{"status":"gagal"}';
									}
							break;
							case 'tb_subjkecel':
								$sql 	= "select * from tb_subjkecel where id_jkecel= '$_GET[id1]' order by id_subjkecel ";
								#var_dump($sql);
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
							case 'tb_subjkecel2':
								$sql 	= "select * from tb_subjkecel2 where id_subjkecel= '$_GET[id2]' order by id_subjkecel2 ";
								#var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								
								elseif (empty($ambil)){
									echo '{"status":"kosong"}';
								}
								else{
									echo '{"status":"gagal"}';
								}
								
							break;
							
							case 'tb_tipedampak':
								$sql 	= "select * from tb_tipedampak order by id_tipedampak";
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

							case 'tb_jcidera':
								$sql 	= "select * from tb_jcidera order by id_jcidera";
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
							case 'tb_bagtubuh':
								$sql 	= "select * from tb_bagtubuh order by id_bagtubuh";
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
			break;	
			
	# tampil =================================================================================================				
			case 'tampil' :
				switch ($menu) {
					case 'temisi':
						$sqlu="	select * 
								from 
									tb_tempatsampling ts,
									tb_gas g,
									tb_produk p,
									tb_samplingemisi se,
									tb_emisi e
									
								where 
									se.id_samplingemisi	= e.id_samplingemisi and
									se.id_tempatsampling= ts.id_tempatsampling and
									se.id_gas= g.id_gas and
									se.id_produk=p.id_produk ";
							if (isset($_GET['nama_tempatsampling']) and !empty($_GET['nama_tempatsampling'])){
								$nama_tempatsampling= $_GET['nama_tempatsampling'];
								$sql = $sqlu."and ts.nama_tempatsampling like '%$nama_tempatsampling%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['nama_gas']) and !empty($_GET['nama_gas'])){
								$nama_gas= $_GET['nama_gas'];
								$sql = $sqlu."and g.nama_gas like '%$nama_gas%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['kadar']) and !empty($_GET['kadar'])){
								$kadar= $_GET['kadar'];
								$sql = $sqlu."and e.kadar like '%$kadar%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['bulan']) and !empty($_GET['bulan'])){
								$bulan= $_GET['bulan'];
								$sql = $sqlu."and e.bulan like '%$bulan%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['tahun']) and !empty($_GET['tahun'])){
								$tahun= $_GET['tahun'];
								$sql = $sqlu."and e.tahun like '%$tahun%' order by e.id_emisi desc";
							}
							else {
								$sql = $sqlu;
							}
							#var_dump($sql);
							#exit();
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
								while($emisix = mysql_fetch_array($result)){
									if($emisix['bulan']==3){$bulan=='Maret';}
									elseif($emisix['bulan']==7){$bulan=='Juli';}
									else {$bulan=='Nopember';}
									//var_dump($bulan);
									echo"
										<tr id='emisi_$emisix[id_emisi]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$emisix[id_emisi]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $emisix[author]</td>
											<td class='to_hide_phone'> Pabrik $emisix[pabrik]</td>
											<td class='to_hide_phone'> $emisix[nama_tempatsampling]</td>
											<td class='to_hide_phone'> $emisix[nama_gas]</td>
											<td class='to_hide_phone'> $emisix[kadar]</td>
											<td class='to_hide_phone'> $emisix[bulan] $bulan </td>
											<td class='to_hide_phone'> $emisix[tahun]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$emisix[id_emisi]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<!--<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$emisix[id_emisi]' class='gicon-eye-open'>
															detail
														</i>
													</a>--> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$emisix[id_emisi]' class='gicon-remove'>
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
					
					case 'tkecelakaan':
						$sqlu="	select * 
								from 
									tb_kecelakaan kc
									left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel  
									left join tb_subjkecel2 sk  on sk.id_subjkecel2 = kc.id_subjkecel2   
								";
							if (isset($_GET['judul_kejadian']) and !empty($_GET['judul_kejadian'])){
								$judul_kejadian= $_GET['judul_kejadian'];
								$sql = $sqlu." and kc.judul_kejadian like '%$judul_kejadian%' order by kc.judul_kejadian desc";
							}
							elseif (isset($_GET['tempat']) and !empty($_GET['tempat'])){
								$tempat= $_GET['tempat'];
								$sql = $sqlu."and kc.tempat like '%$tempat%' order by kc.tempat desc";
							}
							else {
								$sql = $sqlu.'order by id_kecelakaan desc';
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
								while($kecelakaanx = mysql_fetch_array($result)){
									if($kecelakaanx['status']==1){
										$hapusx="final";
										}else{
										$hapusx="<a class='btn ' rel='tooltip'	data-placement='bottom' data-original-title='hapus'>
													<i idz='$kecelakaanx[id_kecelakaan]' namaz='$kecelakaanx[judul_kejadian]' classx='gicon-removex' class='hapusLK'>
														hapus
													</i>
												</a>";
											
										/*$hapusx="<a class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$kecelakaanx[id_kecelakaan]' namaz='$kecelakaanx[judul_kejadian]'
														xclass='gicon-remove'>
															hapus
														</i>
													</a>";*/
											
											}
									echo"
										<tr id='kecelakaan_$kecelakaanx[id_kecelakaan]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$kecelakaanx[id_kecelakaan]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $kecelakaanx[judul_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[tempat]</td>
											<td class='to_hide_phone'> $kecelakaanx[tgl_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[jam_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a class='btn '>
														<i idz='$kecelakaanx[id_kecelakaan]' class='gicon-editx'>
															edit 
														</i>
													</a>
													<!--<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$kecelakaanx[id_kecelakaan]' xclass='gicon-eye-open'>
															detail
														</i>
													</a>--> 
												$hapusx	 
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

					case 'tkecelakaanakhir':
						$sqlu="	select * 
								from 
									tb_kecelakaan kc
									left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel  
									left join tb_subjkecel2 sk  on sk.id_subjkecel2 = kc.id_subjkecel2 ";
							if (isset($_GET['judul_kejadian']) and !empty($_GET['judul_kejadian'])){
								$judul_kejadian= $_GET['judul_kejadian'];
								$sql = $sqlu." and kc.judul_kejadian like '%$judul_kejadian%' order by kc.id_kecelakaan desc";
							}
							elseif (isset($_GET['tempat']) and !empty($_GET['tempat'])){
								$tempat= $_GET['tempat'];
								$sql = $sqlu."and kc.tempat like '%$tempat%' order by kc.id_kecelakaan desc";
							}
							elseif (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = $sqlu."and jk.keterangan like '%$keterangan%' order by kc.id_kecelakaan desc";
							}
							else {
								$sql = $sqlu.' order by kc.id_kecelakaan desc';
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
								while($kecelakaanx = mysql_fetch_array($result)){
									if($kecelakaanx['status']=='0'){
										$laporx = "<a data-toggle='modal' class='btn btn-small'
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i 	idx='$kecelakaanx[id_kecelakaan]' 
															jdl='$kecelakaanx[judul_kejadian]' 
															kat1='$kecelakaanx[ket_jkecel]' 
															kat2='$kecelakaanx[nama_subjkecel]' 
															kat3='$kecelakaanx[nama_subjkecel2]' 
															tgl1='$kecelakaanx[tgl_kejadian]'  
															tgl2='$kecelakaanx[tgl_lapor]'  
															jam1='$kecelakaanx[jam_kejadian]'  
															jam2='$kecelakaanx[jam_lapor]'  
															idz='$kecelakaanx[no_ref]'  
															tempat='$kecelakaanx[tempat]'  
															class='gicon-lapor'>
															Lapor 
														</i>
													</a>";
										$trcolor	= "style='background:green'";
										$reset		= "";
									}
									else{
										$laporx ='';
										/*$laporx ="<a data-toggle='modal' href='#' class='btn btn-small'>
														<i idz='$kecelakaanx[id_kecelakaan]' >
															&nbsp;
														</i>
												  </a>";*/
										$trcolor ="";
										$reset	="<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$kecelakaanx[id_kecelakaan]' class='reset' namaz='$kecelakaanx[judul_kejadian]' xclass='gicon-remove'>
															Reset
														</i>
													</a>";
									}
									echo"
										<tr $trcolor id='kecelakaan_$kecelakaanx[id_kecelakaan]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$kecelakaanx[id_kecelakaan]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $kecelakaanx[no_ref]</td>
											<td class='to_hide_phone'> $kecelakaanx[judul_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[tempat]</td>
											<td class='to_hide_phone'> $kecelakaanx[tgl_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[jam_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													$laporx
													$reset	
													<!--<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$kecelakaanx[id_kecelakaan]' xclass='gicon-edit'>
															Edit
														</i>
													</a>--> 
													<!--<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$kecelakaanx[id_kecelakaan]' xclass='gicon-eye-open'>
															detail
														</i>
													</a>--> 
													<!--<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$kecelakaanx[id_kecelakaan]' namaz='$kecelakaanx[judul_kejadian]'xclass='gicon-remove'>
															Reset
														</i>
													</a>--> 
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

					case 'tsafetyp':
						$sqlu="	select * 
								from tb_safetyp jk";
							if (isset($_GET['tahun']) and !empty($_GET['tahun'])){
								$tahun= $_GET['tahun'];
								$sql = $sqlu."where jk.tahun like '%$tahun%' order by jk.id_safetyp desc";
							}
							elseif (isset($_GET['bulan']) and !empty($_GET['bulan'])){
								$bulan= $_GET['bulan'];
								$sql = $sqlu."where jk.bulan like '%$bulan%' order by jk.id_safetyp desc";
							}
							else {
								$sql = $sqlu." order by jk.id_safetyp desc";
							}

							if(isset($_GET['starting'])){ //nilai awal halaman
								$starting=$_GET['starting'];
							}else{
								$starting=0;
							}
							
							$recpage= 5;//jumlah data per halaman
							$obj 	= new pagination_class($sql,$starting,$recpage);
							$result =$obj->result;
							
							$bulanx = array("Januari",
											"Februari",
											"Maret",
											"April",
											"Mei",
											"Juni",
											"Juli",
											"Agustus",
											"September",
											"Oktober",
											"Nopember",
											"Desember"
											);
							
							if(mysql_num_rows($result)!=0){
								$nox 	= $starting+1;
								while($safetypx = mysql_fetch_array($result)){
									$jam_kerja_aman = $safetypx['jam_normal'] + $safetypx['jam_lembur'] - $safetypx['jam_absen']; 
									$i=$safetypx['bulan'] - 1;
									$bln = $bulanx[$i];
									echo"
										<tr id='safetyp_$safetypx[id_safetyp]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$safetypx[id_safetyp]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jam_kerja_aman   jam</td>
											<td class='to_hide_phone'> $safetypx[fatality]</td>
											<td class='to_hide_phone'> $safetypx[uac]</td>
											<td class='to_hide_phone'> $safetypx[near_miss]</td>
											<td class='to_hide_phone'> $safetypx[ldwc]</td>
											<td class='to_hide_phone'> $bln </td>
											<td class='to_hide_phone'> $safetypx[tahun]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal'  class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$safetypx[id_safetyp]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$safetypx[id_safetyp]' 
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
	
	#ubah=======================================================================================			
			case 'ubah' :
				switch ($menu){
					case 'tsafetyp':
						$sql="update tb_safetyp set fatality	='$_POST[fatalityTB]', 
												uac			='$_POST[uacTB]', 
												near_miss	='$_POST[near_missTB]', 
												ldwc		='$_POST[ldwcTB]', 
												jam_normal	='$_POST[jam_normalTB]', 
												jam_lembur	='$_POST[jam_lemburTB]', 
												jam_absen	='$_POST[jam_absenTB]',
												bulan		='$_POST[bulanTB]', 
												tahun		='$_POST[tahunTB]' 
											where id_safetyp = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mshift':
						$simpanQ=mysql_query("update tb_shiftkerja set 	nama_shiftkerja ='$_POST[nama_shiftkerjaTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_shiftkerja = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_shiftkerja":"'.$_POST['nama_shiftkerjaTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;

					
					case 'temisi':
						$sql="update tb_emisi set 	id_samplingemisi	='$_POST[id_tempatsamplingTB]', 
													kadar				='$_POST[kadarTB]', 
													bulan				='$_POST[bulanTB]', 
													tahun				='$_POST[tahunTB]'
												where id_emisi= '$_GET[idx]'";
						/*						
						$updateR = mysql_fetch_assoc(mysql_query("select * 
																from tb_emisi e, tb_gas g, tb_samplingemisi se,tb_tempatsampling ts 
																	where 
																		e.id_samplingemisi = se.id_samplingeimsi and
																		se.id_gas= g.id_gas and
																		se.id_tempatsampling = ts.id_tempatsampling and
																		e.id_emisi = '$_GET[idx]'
																			
																"));
						
						*/
						#var_dump($sql);exit();
						$simpanQ=mysql_query($sql);
						//echo $sql; exit();
						if($simpanQ){
								echo'{
										"status":"sukses",
										"nama_gas":"'.$updateR['nama_gas'].'",
										"nama_tempatsampling":"'.$updateR['nama_tempatsampling'].'",
										"tahun":"'.$updateR['tahun'].'",
										"bulan":"'.$updateR['bulan'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					exit();
				}
			break;
			
	#hapusx ====================================================================================	
			case 'hapus' :
				switch($menu){
					case 'tkecelakaan':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_kecelakaan where id_kecelakaan ='$_GET[idx]'"));
							mysql_query("delete from tb_kecelakaan where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from tb_tindakan where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from tb_tingkatresiko where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from tb_foto where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_cidera where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_perawatan where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_keruskaanalat where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_kerusakanling where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_pemberitahuan where id_kecelakaan ='$_GET[idx]'");
							mysql_query("delete from  tb_laporan where id_kecelakaan ='$_GET[idx]'");
							
							$hapusQ=mysql_query("delete from tb_kecelakaan where id_kecelakaan ='$_GET[idx]'");
							if($terhapusQ){
								echo '{"status":"sukses","id":"'.$_GET[idx].'","judul_kejadian":"'.$terhapusQ['judul_kejadian'].'"}';
							}else{
								echo '{"status":"gagal","id":"'.$_GET[idx].'"}';	
							}
					break;
						
					case 'temisi':
						$kue 		= "select * from tb_emisi where id_emisi ='$_GET[idx]'";
						$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
						$kue2		= "delete from tb_emisi where id_emisi = '$_GET[idx]'";
						#var_dump($kue2);
						$hapusQ		= mysql_query($kue2);
						
						if($hapusQ){
							echo '{"status":"sukses","id":"'.$_GET[idx].'","bulan":"'.$terhapusQ['bulan'].'","tahun":"'.$terhapusQ['tahun'].'"}';
						}else{
							echo '{"status":"gagal","id":"'.$_GET[idx].'"}';						
						}
					break;
					case 'tsafetyp' :
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_safetyp where id_safetyp ='$_GET[idx]'"));
							$hapusQ=mysql_query("delete 
												from tb_safetyp
												where 
													id_safetyp ='$_GET[idx]'")
													or die("kuei hapus jam kerja error");
							if($terhapusQ){
								echo '{
										"status":"sukses",
										"id_safetyp":"'.$_GET[idx].'",
										"jam_normal":"'.$terhapusQ['jam_normal'].'",
										"jam_absen":"'.$terhapusQ['jam_absen'].'",
										"jam_lembur":"'.$terhapusQ['jam_lembur'].'"
										}';
							}else{
								echo '{
										"status":"gagal",
										"id":"'.$_GET[idx].'"
										}';						
							}
						break;


				}
			break;
	
	#hapusemuax ====================================================================================	
			case 'hapussemua' :
					switch($menu){
						case 'tkecelakaan':
							$hapusQ=mysql_query("truncate tb_kecelakaan")or die("gagal mengosongkan tb_kecelakaan");
							#$hapusQ=mysql_query("delete * tb_kecelakaan")or die("gagal mengosongkan tb_kecelakaan");
							if($hapusQ){
								echo '{"status":"sukses"}';
							}else{
								echo '{"status":"gagal"}';						
							}
						break;
					}
			break;
		}
	

?>