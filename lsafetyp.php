<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='lsafetyp'){
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

<!--<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">pencarian detail</a>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="box paint color_12">
				<div class="titlex">
				</div>

				<div class="content full">
                    <form class="form-horizontal cmxform" id="validateForm" method="get" action="plaporan.php" autocomplete="off">
                        <input type="hidden" id="idform" />
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3">bagtubuh </label>
                            <div class="controls span7">
	                            <input id="cname" name="nama_bagtubuhTB" 
                                placeholder="nama bagtubuh (wajib diisi)" type="text" required class="span12"/>
                            </div>
						</div>
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3" for="hint-field">keterangan </label>
                            <div class="controls span7">
                        	    <input id="cname2" name="keteranganTB" 
                                minlength="3" type="text" required placeholder="keterangan bagtubuh (wajib diisi)"class="row-fluid"/>
                            </div>
						</div>
                            
                        <div id="hasily"></div>
                        <div class="form-actions row-fluid">
                            <div class="span7 offset3">
	                            <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
                            </div>
                        </div>
                    </form>

				</div>
			</div>
        </div>
	</div>
</div>
-->
	<div class="row-fluid">
		<div class="box ">
			<div class="title">
				<h4> <span>Laporan Safety Performance</span></h4>
				&nbsp;
                <select name="tahunTB" required id="tahunTB">
						<option value="">pilih tahun ..</option>
                    	<?php
							$nowz = getdate();
							$tahun = $nowz['year'];	
							for($x = $tahun; $x>=1997; $x--){
								echo "<option value=$x>$x</option>";
							}
						?>
                    </select>                  
                  
				<!--<select id="tahunTB" required>
					<option value="" selected="selected">pilih tahun</option>
					<?php 
						/*$sql="select year(tgl_kejadian) as tahun from tb_kecelakaan";
						$kue=mysql_query($sql);
						while($hasil=mysql_fetch_assoc($kue)){*/
					?>
                    	<option value="<?php #echo $hasil['tahun']?>"><?php #echo $hasil['tahun']?></option>
					<?php #} ?>
            	</select>&nbsp;-->
				<select id="bulanTB" required>
					<option value="" selected="selected">pilih bulan</option>
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>
					<option value="11">Nopember</option>
					<option value="12">Desember</option>
				</select>&nbsp;
                <input type="button" class="btn" id="lihatBC" value="cetak"/>
				
                <xinput type="text" id="objekTB" placeholder="pencarian">&nbsp;
				<span id="loadtabel"></span>
			</div>
			
            <div class="content top">
				<!--<table id="datatable_examplez" class="responsive table table-striped table-bordered" 
				style="width:100%;margin-bottom:0; ">
					<thead>
						<tr>
							<th class="xjv no_sort">
								<label class="chexckbox ">
									<input type="checkbox">
								</label>
							</th>
							<th class="to_hide_phone  no_sort">no</th>
							<th class="to_hide_phone ue no_sort">jama kerja aman </th>
							<th class="to_hide_phone ue no_sort">bulan </th>
							<th class="to_hide_phone ue no_sort">tahun </th>
							<th class="ms no_sort ">aksi</th>
						</tr>
					</thead>
					<tbody id="isi"> 
					</tbody>
				</table>-->
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_jkecel',
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
				url	: "plaporan.php?aksi=tampil&menu=lsafetyp",
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
				url:"ptransaksi.php?aksi=tampil&menu=lsafetyp",
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_jcidera',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_bagtubuh',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_tipedampak',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_jcidera',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_bagtubuh',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_jkecel',
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
				data:'aksi=combo&menu=lsafetyp&tabel=tb_jkecel',
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
			var urlx2 = "?aksi=tambah&menu=lsafetyp";
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
				url:"ptransaksi.php?aksi=ambiledit&menu=lsafetyp",
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
		//$('i.gicon-eye-open').live("click",function() {	
		$('#lihatBC').click(function() {	
			$(this).target = "_blank";
			var tahuny 	= $('#tahunTB').val();
			var bulany	= $('#bulanTB').val();
			
			if(tahuny==''){
				alert('pilih tahun');
				$('#tahunTB').focus();
			}else if(bulany==''){
				alert('pilih bulan');
				$('#bulanTB').focus();
			}else {
				var ruwet = encode64(bulany+'ruwet'+tahuny);
				window.open("lsafetypPrint.php?tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
			}//return false;
		});//end of action detail
		
		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"-"+idy+"' ?"))
			
				$.get("ptransaksi.php?aksi=hapus&menu=lsafetyp", function(data){ 
					alert('info : '+data);
					//$("#bar").css("background","yellow").html(data.var1+", "+data.var2); 
				}); 
				
				/*$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=lsafetyp",
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
						data:"aksi=hapussemua&menu=lsafetyp",
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