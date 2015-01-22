<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='lkecelakaan'){
?>	
<style>
a.toggler {
	text-decoration:none;
	color:white;
	background: #000;
	cursor: pointer;
	padding: 5px;
	}

a.toggler.off {
	text-decoration:none;
	width:100%;
	font:Arial, Helvetica, sans-serif;
	color:white;
	background: #0271A6;
}
</style>
<link href="css/style-page.css" rel="stylesheet" />        
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

<!--<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">pencarian detail</a>-->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
	<div class="modal-body">
		<div class="row-fluid">
			<!--<div class="box paint color_18">-->
			<div class="box paint color_12">
				<div class="titlex">
						<!--<h4> <i class="icon-book"></i><span>Form Kecelakaan</span> </h4>-->
				</div>

				<div class="content full">
					<section id="wizard">
						<div id="rootwizard">
							<div class="content row-fluid mb5">
								<ul class="row-fluid fluid mb5">
									<li class="span3"><a class="btn btn-default btn-large" href="#tab1" data-toggle="tab"><small>1.</small><strong> Detail </strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab2" data-toggle="tab"><small>2.</small> <strong>Orang </strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab3" data-toggle="tab"><small>3.</small> <strong>cidera</strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab4" data-toggle="tab"><small>4.</small> <strong>Lingkungan </strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab5" data-toggle="tab"><small>5.</small> <strong>Kerusakan Properti</strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab6" data-toggle="tab"><small>6.</small> <strong>Tindakan Langsung</strong></a></li>
									<li class="span3"><a class="btn btn-default btn-large" href="#tab7" data-toggle="tab"><small>7.</small> <strong>Tingkat Resiko(Awal)</strong></a></li>
								</ul>
							</div>
							<div class="tab-content content">
								<input type="hidden" id="idform" />
								<!--detail kecelakaan -->
                                <!--<form action="ptransaksi.php" method="get" id="kecelakaanFR">-->
								<div class="tab-pane" id="tab1">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>	
											<!-- judul kejadian  -->
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="judul_kejadianTB">Judul</label>
												<div class="controls span9">
													<input type="text" id="judul_kejadianTB" name="judul_kejadianTB" required placeholder="judul kejadian (wajib diisi)"class="row-fluid">
												</div>
											</div>
											
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="kategori">kategori</label>
												<div class="controls span10">
						                    	<select class="chzn-select" id="id_jkecelTB" 
                                                	data-placeholder="id_jkecelTB" name="id_jkecelTB">
                                            		</select>											
												</div>
											</div>
										
                                        	<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tgl_kejadianTB">Tanggal Kejadian </label>
												<div class="controls span9">
													<input type="text" id="tgl_kejadianTB" name="tgl_kejadianTB" required placeholder="Tanggal Kejadian(wajib diisi)" class="row-fluid">
												</div>
											</div>
										
                                        	<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="jam_kejadianTB">Jam Kejadian </label>
												<div class="controls span9">
													<input type="text" id="jam_kejadianTB" name="jam_kejadianTB" placeholder="jam kejadian(wajib diisi)" class="row-fluid">
												</div>
											</div>
										
                                        	<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tgl_laporTB">Tanggal Lapor </label>
												<div class="controls span9">
													<input type="text" id="tgl_laporTB" name="tgl_laporTB" placeholder="tanggal lapor" class="row-fluid">
												</div>
											</div>									
									
                                    		<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="jam_laporTB">Jam Lapor </label>
												<div class="controls span9">
													<input type="text" id="jam_laporTB" name="jam_laporTB" placeholder="jam lapor" class="row-fluid">
												</div>
											</div>
                                            
                                    		<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tempatTB">Tempat Kejadian</label>
												<div class="controls span9">
													<input type="text" id="tempatTB" name="tempatTB" placeholder="tempat kejadian" class="row-fluid">
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							
                            	<div class="tab-pane" id="tab2">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
							
                            				<div class="form-row control-group row-fluid">
											  <label class="control-label span2">Nama</label>
												<div class="controls span9">
													<input type="text" name="orgterlibatTB" autocomplete="on" id="orgterlibatTB" >
													<div id="hasilcari">hasil</div>
                                                </div>
											</div>
							
                            				<div class="form-row control-group row-fluid">
												<label class="control-label span2">Jabatan </label>
												<div class="controls span9">
													<input type="text" id="jabatanTB" name="jabatanTB" placeholder="jabatan" readonly class="row-fluid">
												</div>
											</div>
							
                            				<div class="form-row control-group row-fluid">
												<label class="control-label span2">Bagian</label>
												<div class="controls span9">
													<input type="text" id="bagianTB" name="bagianTB" placeholder="jabatan" readonly class="row-fluid">
												</div>
											</div>
								
                                			<div class="form-row control-group row-fluid">
												<label class="control-label span2">Department</label>
												<div class="controls span9">
													<input type="text" id="departmentTB" name="departmentTB" placeholder="" class="row-fluid">
												</div>
											</div>
											
										</fieldset>
									</form>
								</div>						
							
                            	<div class="tab-pane" id="tab3">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset id="fieldset3">
											<!--<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="kategori">cidera</label>
												<div class="controls span10">
                                                    <select class="chzn-select" id="id_jcideraTB"
                                                        data-placeholder="id_jcideraTB" name="id_jcideraTB">
                                                    </select>
                                                    <select class="chzn-select" id="id_bagtubuhTB"
                                                        data-placeholder="id_bagtubuhTB" name="id_bagtubuhTB">
                                                    </select>											
                                                    <a href="#" class="toggler off" title="tidak aktif" nilai="0">kiri</a>
                                                    <a href="#" class="toggler off" title="tidak aktif" nilai="0">kanan</a>
													<a href="#" id="tambahcideraBC"><i class="icon-plus-sign"></i>  tambah</a>
                                                </div>
											</div>-->
											
                                        
                                       <!-- anggota tubuh 
                                        	<div class="control-group row-fluid"> 
												<button class="btn">tangan</button>
                                                <span class="btn-group">
                                                	<a href="#" class="btn ok">kiri</a>
                                                    <button class="btn ok" data-toggle='checkbox'>kiri</button>
                                                    <button class="btn">kanan</button>
                                                </span>
                                            </div>
                                            <div class="control-group row-fluid"> 
											    <button class="btn">kaki</button>
                                                <span class="btn-group">
                                                    <button class="btn">kiri</button>
                                                    <button class="btn">kanan</button>
                                                </span>
                                            </div>
                        
                        					<div class="form-row control-group row-fluidx">
												<label class="control-label span2">Tubuh </label>
                                                <div class="controls span9x">
                                                
                                                    <input type="radio" id="bagian_tubuhTB"name="bagian_tubuhTB" > lklkl
                                                        <textarea></textarea>
                                                </div>
											</div>
											
                                              <div class="pull-left">
                                                <label class="radio off">off
                                                  <input type="radio" name="toggle" id="toggle1-off" value="off" checked="">
                                                </label>
                                                <label class="radio on">on
                                                  <input type="radio" name="toggle" id="toggle1-on" value="on">
                                                </label>
                                                <div class="toggle">
                                                  <div class="yes"> ON </div>
                                                  <div class="switch"> </div>
                                                  <div class="no"> OFF </div>
                                                </div>
                                              </div>-->
                                            
                        					<!--<div class="form-row control-group row-fluid">
												<label class="control-label span2">Cidera</label>
												<div class="controls span9">
													<input type="text" id="address" name="address" placeholder="" class="row-fluid">
													<p class="help-block">Please choose your shipping option</p>
												</div>
											</div>-->
                                            
										</fieldset>
									</form>
								</div>
						
                        		<div class="tab-pane" id="tab4">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="kategori">Kategori </label>
												<div class="controls span10">
						                    	<select class="chzn-select" id="id_tipedampakTB"
                                                	data-placeholder="id_tipedampakTB" name="id_tipedampakTB">
                                            	</select>											
												</div>
											</div>
											
						
                        					<div class="form-row control-group row-fluid">
												<label class="control-label span2">Pencemar / Polutan</label>
												<div class="controls span9">
													<input type="text" id="agen_pencemarTB" name="agen_pencemarTB" placeholder="" class="row-fluid">
												</div>
											</div>
						
                        					<div class="form-row control-group row-fluid">
												<label class="control-label span2">Volume</label>
												<div class="controls span9">
													<input type="text" id="volumeTB" name="volumeTB" placeholder="" class="row-fluid">
												</div>
											</div>									
							
                            				<div class="form-row control-group row-fluid">
												<label class="control-label span2">Area Terpapar</label>
												<div class="controls span9">
													<input type="text" id="area_terpaparTB" name="area_terpaparTB" placeholder="" class="row-fluid">
												</div>
											</div>
								
                                			<div class="form-row control-group row-fluid">
												<label class="control-label span2">Durasi Terpapar</label>
												<div class="controls span9">
													<input type="text" id="durasi_terpaparTB" name="durasi_terpaparTB" placeholder="" class="row-fluid">
												</div>
											</div>									
									
                                    		<div class="form-row control-group row-fluid">
												<label class="control-label span2">Durasi Dampak Terpapar</label>
												<div class="controls span9">
													<input type="text" id="durasi_dampak_paparTB" name="durasi_dampak_paparTB" placeholder="" class="row-fluid">
												</div>
											</div>									
								
                                			<div class="form-row control-group row-fluid">
												<label class="control-label span2">Keterangan </label>
												<div class="controls span9">
													<input type="text" id="komen_tambahanTB" name="komen_tambahanTB" placeholder="" class="row-fluid">
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							
                            	<div class="tab-pane" id="tab5">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
							
                            				<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Nama Alat</label>
												<div class="controls span9">
													<input type="text" id="nama_alatTB" name="nama_alatTB" placeholder="nama alat / keterangan" class="row-fluid">
												</div>
											</div>									
								
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Detil </label>
												<div class="controls span9">
                                            		<textarea id="deskripsiTB" name="deskripsiTB" placeholder="deskripsi kerusakan " class="row-fluid"></textarea>
												</div>
											</div>									
								
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Biaya</label>
												<div class="controls span9">
													<select id="biayaTB" name="biayaTB">
                                                    	<option value="">pilih kerugian</option>
                                                    	<option value="1">Rp 0 – Rp 100 juta</option>
                                                    	<option value="2">Rp 100 juta – Rp 1 milyar</option>
                                                    	<option value="3">Rp 1 milyar – Rp 5 milyar </option>
                                                    	<option value="4">Rp 5 milyar – Rp 20 milyar </option>
                                                    	<option value="5"> > Rp 20 milyar</option>
                                                    </select>
                                                  </div>
											</div>									
								
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Mekanisme Kejadian </label>
												<div class="controls span9">
													<textarea id="mekanismeTB" name="mekanismeTB" placeholder="mekanisme kejadian" class="row-fluid"></textarea>
                                                </div>
											</div>
										</fieldset>
									</form>
								</div>						
						
                        		<div class="tab-pane" id="tab6">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">oleh</label>
												<div class="controls span3">
													<input type="text" id="penindakTB1" name="penindakTB1" placeholder="oleh" class="row-fluid">
                                                </div>
											</div>									
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Tindakan </label>
												<div class="controls span10">
													<textarea name="tindakanTB1" id="tindakanTB1" placeholder="tindakanTB1"></textarea>
                                                </div>
											</div>									
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">tanggal</label>
												<div class="controls span1">
													<input type="text" id="tanggal_tindakanTB1" name="tanggal_tindakanTB1" placeholder="tanggal" class="row-fluid">
                                                </div>
											</div>									
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">jam </label>
												<div class="controls span1">
													<input type="text" id="jam_tindakanTB1" name="jam_tindakanTB1" placeholder="jam" class="row-fluid">
                                                </div>
											</div>									
                                            <div class="control-group row-fluid"> 
												<a href="#" id="tambahtindakanBC"><i class="icon-plus-sign"></i>  tambah</a>
											    </div>    
										</fieldset>
									</form>
								</div>
                                
                        		<div class="tab-pane" id="tab7">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Konsekuensi Aktual</label>
												<div class="controls span9">
													<select id="konsekuensi_aktualTB" name="konsekuensi_aktualTB">
                                                    	<option value="">pilih resiko aktual....</option>
                                                    	<option value="catastrophic">catastropic</option>
                                                    	<option value="major">major</option>
                                                    	<option value="moderate">moderate</option>
                                                    	<option value="minor">minor</option>
                                                    	<option value="insignificant">insignificant</option>
                                                    </select>
                                                </div>
											</div>
                                                
											<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="name">Konsekuensi Potensial</label>
												<div class="controls span9">
													<select id="konsekuensi_potensialTB" name="konsekuensi_potensialTB">
                                                    	<option value="">pilih konsekuansi potensial....</option>
                                                    	<option value="catastrophic">catastropic</option>
                                                    	<option value="major">major</option>
                                                    	<option value="moderate">moderate</option>
                                                    	<option value="minor">minor</option>
                                                    	<option value="insignificant">insignificant</option>
                                                    </select>
                                                </div></div>
                                                
											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Kemungkinan</label>
												<div class="controls span9">
													<select id="kemungkinanTB" name="kemungkinanTB">
                                                    	<option value="">pilih kemungkinan....</option>
                                                    	<option value="almost certain">almost certain</option>
                                                    	<option value="likely">likely</option>
                                                    	<option value="possible">possible</option>
                                                    	<option value="unlikely">unlikely</option>
                                                    	<option value="rare">rare</option>
                                                    </select>
                                                </div></div>

											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Tingkat Resiko Aktual</label>
												<div class="controls span9">
													<select id="tingkat_resiko_aktualTB" name="tingkat_resiko_aktualTB">
                                                    	<option value="">pilih resiko aktual...</option>
                                                    	<option value="low">low</option>
                                                    	<option value="medium">medium</option>
                                                    	<option value="high">high</option>
                                                    	<option value="extreme">extreme</option>
                                                    </select>
                                                </div></div>

											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Tingkat Resiko Potensial</label>
												<div class="controls span9">
													<select id="tingkat_resiko_potensialTB" name="tingkat_resiko_potensialTB">
                                                    	<option value="">pilih resiko potensial...</option>
                                                    	<option value="low">low</option>
                                                    	<option value="medium">medium</option>
                                                    	<option value="high">high</option>
                                                    	<option value="extreme">extreme</option>
                                                    </select>
                                                </div>
											</div>
	                                               
										</fieldset>
									</form>
								</div>
                                
								<div class="description content">
									<ul class="pager wizard mb5">
										<li class="previous ">
											<button class="btn btn-primary pull-left btn-large"><i class="icon-caret-left"></i> Kembali </button>
										</li>
										<li class="next">
											<button class="btn btn-primary btn-large pull-right" >Lanjutkan <i class="icon-caret-right"></i></button>
										</li>
										<li class="next finish" style="display:none;">
											<button class="btn btn-success pull-right btn-large" type="submit"id="simpanBC">Simpan</button>
										</li>
									</ul>
								</div>
                                <!--</form>-->
							</div>
							
						</div>
					</section>
				</div>
			</div>
        </div>
	</div>
</div>
	<div class="row-fluid">
		<div class="box ">
			<div class="title">
				<h4> <span>Filter data Kecelakaan </span></h4>&nbsp;
				<select id="kategoriTB">
					<option value="judul_kejadian" selected="selected">Judul Kejadian</option>
					<option value="tempat">Tempat </option>
					<option value="keterangan">Kategori</option>
				</select>&nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">&nbsp;
				<span id="loadtabel"></span>
			</div>
			<!-- End .title -->
			<div class="content top">
				<table id="datatable_examplez" class="responsive table table-striped table-bordered" 
				style="width:100%;margin-bottom:0; ">
					<thead>
						<tr>
							<th class="xjv no_sort">
								<label class="chexckbox ">
									<input type="checkbox">
								</label>
							</th>
							<th class="to_hide_phone  no_sort">no</th>
							<th class="to_hide_phone ue no_sort">Judul Kejadian</th>
							<th class="to_hide_phone ue no_sort">Tempat</th>
							<th class="to_hide_phone ue no_sort">Tgl Kejadian</th>
							<th class="to_hide_phone ue no_sort">Jam Kejadian</th>
							<th class="to_hide_phone ue no_sort">Kategori</th>
							<th class="ms no_sort ">aksi</th>
						</tr>
					</thead>
					<tbody id="isi"> 
						<!--grid tabel-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<script type="text/javascript">
    $(document).ready(function(){
		$('#tambahcideraBC').click(function(){
			
			
			//alert('halop');
		});	
		$('a.toggler').click(function(){
			$(this).toggleClass('off');
			if ($(this).attr('title')=='aktif'){ 
				$(this).attr({'title':'tidak aktif','nilai':'0'});
			}else{
				$(this).attr({'title':'aktif','nilai':'1'});
			}
		});
		
		$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});

			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else if($current==1){
				$('#rootwizard').find('.pager .previous').hide();
			}
			else {
				$('#rootwizard').find('.pager .previous').show();
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}});
		//end of wizard 
		
		//combo jeniskecel
		function combojkecel(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_jkecel',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_jkecel+'>('+item.sub_jeniskecel+'-'+item.jeniskecel+')'+item.keterangan+'</option>';
					});
					$('#id_jkecelTB').html('<option value=></option>'+optiony);
	
					$(".chzn-select").chosen({
						disable_search_threshold: 10
					});
	
					$('#myModal').modal('show');
				}
			});
		}
		
		
		
		//combojkecel();
		loadData();
		
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "judul_kejadian"){
				dataString = 'judul_kejadian='+ cari;
			}
			else if (combo == "tempat"){
				dataString = 'tempat='+ cari;
			}
			else if (combo == "keterangan"){
				dataString = 'keterangan='+ cari;
			}
			
			$.ajax({
				url	: "plaporan.php?aksi=tampil&menu=lkecelakaan",
				type: "GET",
				data: dataString,
				success:function(data){
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
				}
			});
			
		}
		//end of fungsi loading mode "normal"
		
		//fungsi loading mode "paging"
		var page;
		function pagination(page){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "judul_kejadian"){
				dataString = 'starting='+page+'&judul_kejadian='+cari;//+'&random='+Math.random();
			}
			else if (combo == "tempat"){
				dataString = 'starting='+page+'&tempat='+cari;//+'&random='+Math.random();
			}
			else if (combo == "keterangan"){
				dataString = 'starting='+page+'&keterangan='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"ptransaksi.php?aksi=tampil&menu=lkecelakaan",
				data: dataString,
				type:"GET",
				success:function(data){
					$("#loadtabel").fadeOut();
					$('#isi').hide().html(data).fadeIn(1000);
					
				}
			});
		}
		//end of fungsi loading mode "paging"
		
		//action klik paging
		$('li.nextpaging').live('click',function(){
			var pg = $(this).attr('pg');
			pagination(pg);
		});
		$('li.prevnext').live('click',function(){
			var pg = $(this).attr('pg');
			pagination(pg);
		});
		//action klik paging
		
		//cari keteranganTB 
		$("#kategoriTB").change(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
			  $("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;
		});
		
		//cari objekTB
		$("#objekTB").keyup(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
				$("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;	
		});
		
		function kosongkan(){
			$("#judul_kejadianTB").val('');
			$("#id_jkecelTB").val('');
			$("#tgl_kejadianTB").val('');
			$("#tgl_laporTB").val('');
			$("#jam_kejadianTB").val('');
			$("#jam_laporTB").val('');
			$("#tempatTB").val('');
			
			$("#id_tipedampakTB").val('');
			$("#agen_pencemarTB").val('');
			$("#volumeTB").val('');
			$("#area_terpaparTB").val('');
			$("#durasi_terpaparTB").val('');
			$("#durasi_dampak_paparTB").val('');
			$("#komen_tambahanTB").val('');
			
			$("#nama_alatTB").val('');
			$("#deskripsiTB").val('');
			$("#biayaTB").val('');
			$("#mekanismeTB").val('');
			
			$("#konsekuensi_aktualTB").val('');
			$("#konsekuensi_potensialTB").val('');
			$("#kemungkinanTB").val('');
			$("#tingkat_resiko_aktualTB").val('');
			$("#tingkat_resiko_potensialTB").val('');
			
			$("#penindakTB1").val('');
			$("#tindakanTB1").val('');
			$("#tanggal_tindakanTB1").val('');
			$("#jam_tindakanTB1").val('');
			
			$('#fieldset3').empty();
		}
		
		//orang terlibat
		$('#orgterlibatTB').keyup(function(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				data:'nama='+$(this).value,
				success:function(data){
					alert('halo');
				}
			});
			//alert($(this).val());
		});
		
		
		//combo cidera
		/*function combojcidera(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_jcidera',
				success:function(data){
					var optiony='';
						optiony+= '<select class="chzn-select" id="id_jcideraTB" data-placeholder="id_jcideraTB" name="id_jcideraTB">';
						$.each(data, function(id,item){
							optiony+='<option value='+item.id_jcidera+'>'+item.nama_jcidera+'('+item.keterangan+')'+'</option>';
						});
						optiony+='</select>';
				}
			});
		}*/
		
		//combo bagtubuh 
/*		function combobagtubuh(){
			var optiony='';
					
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_bagtubuh',
				success:function(data){
					optiony+= '<select class="chzn-select" id="id_bagtubuhTB" data-placeholder="id_bagtubuhTB" name="id_bagtubuhTB">';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_bagtubuh+'>'+item.nama_bagtubuh+'('+item.keterangan+')'+'</option>';
					});
					optiony+='</select>';
				}
			});
			return optiony;
		}*/
		
		//combo tipedampak  lingkungan
		function combotipedampak(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_tipedampak',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_tipedampak+'>'+item.nama_tipedampak+'</option>';
					});
					$('#id_tipedampakTB').html('<option value=></option>'+optiony);
				}
			});
		}
		function createRowCidera(){
			var cideraSM='';
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_jcidera',
				success:function(data){
					//var optiony='';
						cideraSM+= '<select class="chzn-select" id="id_jcideraTB" data-placeholder="id_jcideraTB" name="id_jcideraTB">';
						$.each(data, function(id,item){
							cideraSM+='<option value='+item.id_jcidera+'>'+item.nama_jcidera+'('+item.keterangan+')'+'</option>';
						});
						cideraSM+='</select>';
				}
			});
			
			var bagtubuh='';
					
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_bagtubuh',
				success:function(data){
					bagtubuh+= '<select class="chzn-select" id="id_bagtubuhTB" data-placeholder="id_bagtubuhTB" name="id_bagtubuhTB">';
					$.each(data, function(id,item){
						bagtubuh+='<option value='+item.id_bagtubuh+'>'+item.nama_bagtubuh+'('+item.keterangan+')'+'</option>';
					});
					bagtubuh+='</select>';
				}
			});

			//var cidera = combojcidera();
			//var bagtubuh = combobagtubuh();
			var row = '';
				row+='<label class="control-label span2"  for="kategori">cidera</label>';
				row+='<div class="controls span10">'+cideraSM+'-'+tipedampakSM;
					row+='<a href="#" class="toggler off" title="tidak aktif" nilai="0">kiri</a>';
					row+='<a href="#" class="toggler off" title="tidak aktif" nilai="0">kanan</a>';
					row+='<a href="#" id="tambahcideraBC"><i class="icon-plus-sign"></i>  tambah</a>';
				row+='</div>';
				//$('#fieldset3').append(row);
				$('#fieldset3').append(cideraSM);
		}
		//tutup modal dialog
		$('#myModal').on('hidden', function () {
			kosongkan();
			//alert("ttupu");
		})
		
		
		
		//klik tambah 
		$("#tambahBC").click(function(){
			//createRowCidera();
			//kosongkan();
			combojkecel();
			//combojcidera();
			//combobagtubuh();
			combotipedampak();
			/*$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_jkecel',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_jkecel+'>'+item.keterangan+'('+item.jeniskecel+'-'+item.sub_jeniskecel+')</option>';
					});
					$('#id_jkecelTB').html('<option value=></option>'+optiony);
					//$(".chzn-select").chosen({
						//disable_search_threshold: 3
					//});
					$('#myModal').modal('show');
				}
			});*/
			
			//$("#judul_kejadianTB").focus();
			
			//alert('ok');
			//$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#titlex").html('<h4> <i class="icon-book"></i><span>Form Kecelakaan</span> </h4>');
			$('#myModal').modal('show');

		});
		//end of tambah 
		
		//$('#id_jkecelTB').focus(function(){
			/*$.ajax({
				url:'ptransaksi.php',
				dataType :'json',
				data:'aksi=combo&menu=lkecelakaan&tabel=tb_jkecel',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+= '<option'+item.id_jkecel+'>'+item.keterangan+'</option>';
					});
					$('#id_jkecelTB').html(optiony);
					alert(optiony);
				}	
			});*/
			//alert('masuk');
		//});
			
		function simpan(){
			var urlx = $('.form-horizontal').attr('action');
			var urlx2 = "?aksi=tambah&menu=lkecelakaan";
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $('.form-horizontal').serialize(),
				success: function(data){
					var statusy = data.status;
					$('#myModal').modal('hidden');
				}
			});
			return false;
		}
		
		//aksi simpan
		$('#simpanBC').click(function(){
			simpan();
			loadData();
		});
		$('.form-horizontal').submit(function(){
			simpan();
			loadData();
		});
		//end of aksi simpan
		
		//action klik edit
		$('i.gicon-edit').live("click",function() {	
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");

			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=lkecelakaan",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var keterangany	= data.keterangan;
					var namay 		= data.nama_shiftkerja;
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#cname").val(namay);
						$("#cname2").val(keterangany);
					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
		});	
		//end of action klik edit
		
		//action cetak
		$('i.gicon-eye-open').live("click",function() {	
			$(this).target = "_blank";
			var id = $(this).attr('idz');
			var ruwet = encode64(id+'ruwet'+id);
			//alert(ruwet+'-'+id);
			window.open("lkecelakaanPrint.php?id="+id+"&ruwet="+ruwet);
			return false;
		});	
		//end of action detail
		
		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"-"+idy+"' ?"))
			
				$.get("ptransaksi.php?aksi=hapus&menu=lkecelakaan", function(data){ 
					alert('info : '+data);
					//$("#bar").css("background","yellow").html(data.var1+", "+data.var2); 
				}); 
				
				/*$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=lkecelakaan",
						data:"idx=" + idy,
						success: function(datax){
							//alert(data);
							//var data 			= $.parseJSON(datax);
							var statusy			= data.status;
							var judul_kejadiany	= data.judul_kejadian;
							var tempaty			= data.tempat;
								
							$("#kecelakaan_"+idy).css("background","red").fadeOut(2000).loadData();
							$("#loadtabel").html('judul_kejadian: "'+judul_kejadiany+'", tempat: '+tempaty+' terhapus').fadeIn(6000);
							
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});*/
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua data ?"))
				$.ajax({
						type: "GET",	
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=lkecelakaan",
						success: function(data){
							//var x = jQuery.parseJSON(data);
							if(data.status=='sukses'){
							//if(data=='sukses'){
								loadData();
							}else{
								alert('terjadi kesalahan pada proses database');
							}
						}
				});
		});
		
		$('.btn ok').click(function(){
			
			//toggle(function(){
				alert('ok');
			//}
		});

    });




</script>

<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>