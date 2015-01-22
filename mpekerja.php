<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mpekerja'){
?>	
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_pekerja&judulx=Pekerja" target="_blank">Cetak Semua</a>
<button class="btn btn-warning" id="hapusBC">Kosongkan</button>
	<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">Hapus Antrian</a></li>
            <li><a href="#">Cetak Antrian</a></li>
        </ul>
        
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_2">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
	          <form class="form-horizontal cmxform" id="pekerjaFR" method="get" action="pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">NIK</label>
                  <div class="controls span7">
                    <input style="text-transform:uppercase; "id="NIKTB" name="NIKTB" placeholder="NIK" type="text" class="span12"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Nama Pekerja</label>
                  <div class="controls span7">
                    <input id="nama_pekerjaTB" name="nama_pekerjaTB" placeholder="nama pekerja(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Gender</label>
                  <div class="controls span7">
                    <select name="jkelaminTB" id="jkelaminTB" required>
                    	<option value="">pilih jenis kelamin ...</option>
                    	<option value="L">Laki </option>
                    	<option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Tanggal Lahir</label>
                  <div class="controls span7">
                    <input id="tgllahirTB" name="tgllahirTB"  type="text" required placeholder="yyyy-mm-dd"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Alamat</label>
                  <div class="controls span7">
                    <textarea id="alamatTB" name="alamatTB" placeholder="masukkan alamat"></textarea>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Kota</label>
                  <div class="controls span7">
                    <input id="kotaTB" name="kotaTB"  type="text" placeholder="masukkkan kota"class="row-fluid"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Tanggal Masuk </label>
                  <div class="controls span7">
                    <input id="tgl_masukTB" name="tgl_masukTB"  type="text" required placeholder="yyyy-mm-dd"class="row-fluid"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Tanggal Keluar</label>
                  <div class="controls span7">
                    <input id="tgl_keluarTB" name="tgl_keluarTB"  type="text" placeholder="yyyy-mm-dd"class="row-fluid"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Jabatan</label>
                  <div class="controls span7">
                    <select required  id="id_jabatanTB" name="id_jabatanTB" placeholder="masukkan jabatan"class="row-fluid">
                    
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Bagian</label>
                  <div class="controls span7">
                    <select id="id_bagianTB" name="id_bagianTB" required placeholder="masukkan bagian"class="row-fluid">
                    
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Department</label>
                  <div class="controls span7">
                    <select id="id_departmentTB" name="id_departmentTB" required placeholder="masukkan department"class="row-fluid">
                    
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Status Kerja</label>
                  <div class="controls span7">
                    <select id="id_statuskerjaTB" name="id_statuskerjaTB"required placeholder="masukkan status kerja"class="row-fluid">
                    
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="">Shift Kerja</label>
                  <div class="controls span7">
                    <select id="id_shiftkerjaTB" name="id_shiftkerjaTB"  required placeholder="masukkan shift kerja"class="row-fluid">
                    	
                    </select>
                  </div>
                </div>
                
                
                <div id="hasily"></div>
				<div class="form-actions row-fluid">
				  <div class="span7 offset3">
                    <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
                    <button type="button" class="btn btn-secondary" id="tes">tes</button>
                    <!--<button type="button" class="btn btn-secondary">Cancel</button>-->
                  </div>
                <!--</div>-->
              </form>
              
            </div>
             
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span8 -->
       	<!--en dof formx-->
		</div>
		</div>

<div class="avgrund-cover"></div>
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
		<div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Data Master - Pekerja </span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="nama_pekerja" selected="selected">nama</option>
					<option value="jkelamin">gender</option>
					<option value="nama_jabatan">jabatan</option>
					<option value="nama_bagian">bagian</option>
					<option value="nama_department">department</option>
					<option value="nama_statuskerja">status</option>
					<option value="nama_shiftkerja">shift</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="jv no_sort">
                            <label class="checkbox ">
	                            <input type="checkbox">
                            </label></th>
                        <th class="to_hide_phone  no_sort">no</th>
                        <th class="to_hide_phone ue no_sort">NIK</th>
                        <th class="to_hide_phone ue no_sort">Nama</th>
                        <th class="to_hide_phone ue no_sort">Gender</th>
                        <th class="to_hide_phone ue no_sort">Tgl Lahir</th>
                        <th class="to_hide_phone ue no_sort">Jabatan</th>
                        <th class="to_hide_phone ue no_sort">Bagian</th>
                        <th class="to_hide_phone ue no_sort">Department</th>
                        <th class="to_hide_phone ue no_sort">Status</th>
                        <th class="to_hide_phone ue no_sort">Shift</th>
                        <th class="to_hide_phone ue no_sort">Tgl Masuk</th>
                        <th class="to_hide_phone ue no_sort">Tgl Keluar</th>
                        <th class="ms no_sort ">Aksi</th>
                    </tr>
                </thead>
                <tbody id="isi"> 
                	<!--grid tabel-->
                </tbody>
               
            </table>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
  <!--</div>-->
      
 
<script src="js/jquery.js" type="text/javascript"> </script> 
<!--<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> -->
<!--Modal Concept -->
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
<!--<script src="js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="js/bootstrap-button.js" type="text/javascript"></script> 
<script src="js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> -->

<!-- Data tables plugin --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Custom made scripts for this template --> 
<script type="text/javascript">
    $(document).ready(function(){	
		function combojabatan(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=mpekerjas&tabel=tb_jabatan',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_jabatan+'>'+item.nama_jabatan+'</option>';
					});
					$('#id_jabatanTB').html('<option value=>Pilih jabatan</option>'+optiony);
				}
			});
		}
		function combobagian(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=mpekerjas&tabel=tb_bagian',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_bagian+'>'+item.nama_bagian+'</option>';
					});
					$('#id_bagianTB').html('<option value=>Pilih bagian</option>'+optiony);
		}});}
		function combodepartment(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=mpekerjas&tabel=tb_department',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_department+'>'+item.nama_department+'</option>';
					});
					$('#id_departmentTB').html('<option value=>Pilih department</option>'+optiony);
		}});}
		
		function combostatuskerja(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=mpekerjas&tabel=tb_statuskerja',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_statuskerja+'>'+item.nama_statuskerja+'</option>';
					});
					$('#id_statuskerjaTB').html('<option value=>Pilih Status Kerja</option>'+optiony);
		}});}
		function comboshiftkerja(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=mpekerjas&tabel=tb_shiftkerja',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_shiftkerja+'>'+item.nama_shiftkerja+'</option>';
					});
					$('#id_shiftkerjaTB').html('<option value=>Pilih Shift Kerja</option>'+optiony);
		}});}
		
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "nama_pekerja"){
				dataString = 'nama_pekerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_shiftkerja"){
				dataString = 'nama_shiftkerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_statuskerja"){
				dataString = 'nama_statuskerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_bagian"){
				dataString = 'nama_bagian='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_department"){
				dataString = 'nama_department='+cari;//+'&random='+Math.random();
			}
			else if (combo == "jkelamin"){
				dataString = 'jkelamin='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_jabatan"){
				dataString = 'nama_jabatan='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_shiftkerja"){
				dataString = 'nama_shiftkerja='+cari;//+'&random='+Math.random();
			}
			
			$.ajax({
				url	: "pmaster.php?aksi=tampil&menu=mpekerja",
				type: "GET",
				data: dataString,
				success:function(data){
					//$('#divPageData').html(data);
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
				}
			});
		}
		
		//fungsi loading mode "paging"
		var page;
		function pagination(page){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "nama_pekerja"){
				dataString = 'starting='+page+'&nama_pekerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_shiftkerja"){
				dataString = 'starting='+page+'&nama_shiftkerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_statuskerja"){
				dataString = 'starting='+page+'&nama_statuskerja='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_bagian"){
				dataString = 'starting='+page+'&nama_bagian='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_department"){
				dataString = 'starting='+page+'&nama_department='+cari;//+'&random='+Math.random();
			}
			else if (combo == "jkelamin"){
				dataString = 'starting='+page+'&jkelamin='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_jabatan"){
				dataString = 'starting='+page+'&nama_jabatan='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_shiftkerja"){
				dataString = 'starting='+page+'&nama_shiftkerja='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"pmaster.php?aksi=tampil&menu=mpekerja",
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
		
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			combojabatan();
			combobagian();
			comboshiftkerja();
			combodepartment();
			combostatuskerja();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#idform").val('');
			$("#NIKTB").prop({disabled:false});
						
			$("#simpanBC").html('Simpan');
			
			$('#myModal').modal('show');
		});
		//end of tambah 
		function option(){
			var jab = $('#id_jabatan').html();
			alert(jab);	
		}
		function kosongkan(){
			$('#NIKTB').val('');
			$('#nama_pekerjaTB').val('');
			$('#jkelaminTB').val('');
			$('#tgllahirTB').val('');
			$('#tgl_masukTB').val('');
			$('#tgl_keluarTB').val('');
			$('#alamatTB').val('');
			$('#kotaTB').val('');
			$('#id_jabatnTB').val('');
			$('#id_bagianTB').val('');
			$('#id_departmentTB').val('');
			$('#id_shiftkerjaTB').val('');
			$('#id_statuskerjaTB').val('');
		}
		
		//simpan(tambah & edit)
		$('#pekerjaFR').submit(function() {
			//var data2 = $().val
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mpekerja";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=mpekerja&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data){
					var statusy = data.status;
					var nama_pekerjay	= data.nama_pekerja;
					if(statusy=='sukses'){
						if(idformx==''){
							var idy = data.id;
							loadData();
							$("#pekerja_"+idy).css("background","green");
							$('#hasily').html("");
							$('#myModal').modal('hide');
						}else{
							var idy = idformx;
							$("#pekerja_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> nama pekerja: "'+nama_pekerjay+'" <br> status: '+statusy).fadeIn(6000);
							loadData();
							$('#hasily').html("");
							$('#myModal').modal('hide');
						}
						$("#idform").val('');
					}else{
						alert('gagal menyimpan operasi database');
					}
				}
			});
			return false;
		});
		//end of simpan(tambah & edit)
		
		$('.ed').live('click',function(){
			$('#myModal').modal('show');	
		});
		//action klik edit
		$('i.gicon-edit').live("click",function() {	
			kosongkan();
			combojabatan();
			combobagian();
			comboshiftkerja();
			combodepartment();
			combostatuskerja();
			var idy = $(this).attr("idz");
			$.ajax({
				url:"pmaster.php?aksi=ambiledit&menu=mpekerja",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy			= data.status;
					var NIKy			= data.NIK;
					var nama_pekerjay	= data.nama_pekerja;
					var jkelaminy		= data.jkelamin;
					var tgllahiry		= data.tgllahir;
					var alamaty			= data.alamat;
					var kotay			= data.kota;
					var id_jabatany		= data.id_jabatan;
					var id_bagiany		= data.id_bagian;
					var id_departmenty	= data.id_department;
					var id_statuskerjay	= data.id_statuskerja;
					var id_shiftkerjay	= data.id_shiftkerja;
					var tgl_masuky		= data.tgl_masuk;
					var tgl_keluary		= data.tgl_keluar;
						
					if(statusy=='sukses'){
						$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
						$('#idform').val(NIKy);
						$("#NIKTB").val(NIKy);
						//$("#NIKTB").prop({disabled:true});
						
						$("#nama_pekerjaTB").val(nama_pekerjay);
						$("#jkelaminTB").val(jkelaminy);
						$("#tgllahirTB").val(tgllahiry);
						$("#alamatTB").val(alamaty);
						$("#kotaTB").val(kotay);
						$("#id_jabatanTB").val(id_jabatany);
						$("#id_bagianTB").val(id_bagiany);
						$("#id_departmentTB").val(id_departmenty);
						$("#id_statuskerjaTB").val(id_statuskerjay);
						$("#id_shiftkerjaTB").val(id_shiftkerjay);
						$("#tgl_masukTB").val(tgl_masuky);
						$("#tgl_keluarTB").val(tgl_keluary);
					
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');
					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
		});	
		//end of action klik edit
		
		//action detail
		$('i.gicon-eye-open').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"pmaster.php",
				data:"aksi=cetak&menu=mpekerja&idx="+idy,//+"&namax="+namay+"&keteranganx="+keterangany,
				success:function(data){
					var nama_pekerjay 	= data.nama_pekerja;
					var jkelaminy		= data.jkelamin;
					var tgllahiry		= data.tgllahir;
					var alamaty			= data.alamat;
					var kotay			= data.kota;
					var jabatany		= data.jabatan;
					var bagiany			= data.bagian;
					var departmenty		= data.department;
					var statuskerjay	= data.statuskerja;
					var shiftkerjay		= data.shiftkerja;
					var tglmasuky		= data.tglmasuk;
					var tglkeluary		= data.tglkeluar;
					
					var bodyy		='';
						bodyy		+='<div align=center><b>Pekerja</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>nama </td><td> : '+nama_pekerjay+'</td></tr>';
						bodyy		+='<tr><td>jenis kelamin</td><td> : '+jkelaminy+'</td></tr>';
						bodyy		+='<tr><td>tanggal lahir</td><td> : '+tgllahiry+'</td></tr>';
						bodyy		+='<tr><td>alamat</td><td> : '+alamaty+'</td></tr>';
						bodyy		+='<tr><td>kota </td><td> : '+kotay+'</td></tr>';
						bodyy		+='<tr><td>jabatan</td><td> : '+jabatany+'</td></tr>';
						bodyy		+='<tr><td>bagian</td><td> : '+bagiany+'</td></tr>';
						bodyy		+='<tr><td>department</td><td> : '+departmenty+'</td></tr>';
						bodyy		+='<tr><td>status kerja</td><td> : '+statuskerjay+'</td></tr>';
						bodyy		+='<tr><td>shift kerja</td><td> : '+shiftkerjay+'</td></tr>';
						bodyy		+='<tr><td>tanggal masuk </td><td> : '+tglmasuky+'</td></tr>';
						bodyy		+='<tr><td>tanggal keluar</td><td> : '+tglkeluary+'</td></tr>';
				
					var print = $('<div>', {
											id:   'cetakpekerja',
											html: bodyy,
											css:  {
												margin:'50px',
												color:    '#000',
												width:    '100%',
												height:   '200px'
											}
									}),
					opener = $('<div>').append(print);
					window.open('data:text/html;charset=utf-8,' + opener.html());
				}
			});
		});	
		//end of action detail
		
		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=mpekerja",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var namay 		= data.nama_pekerja;
								
							$("#mpekerja_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('mpekerja : "'+namay+'" terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {
			if(confirm("lanjutkan menghapus semua data pekerja ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "pmaster.php",
						data:"aksi=hapussemua&menu=mpekerja",
						success: function(data){
							if(data.status=='sukses'){
								loadData();}
							else{
								alert('terjadi kesalahan pada proses database');}
						}
				});
		});
		//hapus
		$('#tes').click(function(){
			option();
		});
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_pekerja&idx=id_jciderakerja',
				data :'tabelx=tb_pekerja',
				success:function(data){
					//opener = $('<div>').append(print);
					//window.open('data:text/html;charset=utf-8,' + opener.html(data));
					
					}
				});
			})
		//end of cetak semua
		
		$('#cetakBCz').click(function(e) {
			e.preventDefault(); // if you have a URL in the link
			jQuery.ajax({
				type: "GET",
				processData: false,
				url: "lib/tespddf.php",
				data: "tabelx=tb_pekerja",
				//data: "tabelx=tb_pekerja&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data){
					alert(data);
				}
			});
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