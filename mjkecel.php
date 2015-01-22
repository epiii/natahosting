<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mjkecel'){
?>	
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" href="#myModal" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_jkecel&judulx=Jenis Kecelakaan" target="_blank">Cetak Semua</a>
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
            
			<form class="form-horizontal cmxform" id="validateForm" method="get" action="pmaster.php" autocomplete="off">
                <input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Jenis Kecelakaan  </label>
                    <div class="controls span7">
                        <select class="chzn-select" id="nama_jeniskecelTB" name="nama_jeniskecelTB">
                        	<option value=""></option>
                        	<option value="kecelakaan kerja">kecelakaan kerja</option>
                        	<option value="bukan kecelakaan">bukan kecelakaan</option>
                        	<option value="penyakit akibat">penyakit akibat</option>
                        </select>
                        <!--<input id="cname" name="jeniskecelTB" placeholder="nama jkecel (wajib diisi)" type="text" required class="span12"/>-->
                    </div>
                </div>
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Sub Jenis Kecelakaan  </label>
                    <div class="controls span7">
                        <select class="chzn-select" id="sub_jeniskecelTB"name="sub_jeniskecelTB">
                        	<option value=""></option>
                        	<option value="LTI">LTI</option>
                        	<option value="RWI">RWI</option>
                        	<option value="MTI">MTI</option>
                        	<option value="FAI">FAI</option>
                        </select>
                        <!--<input id="cname" name="jeniskecelTB" placeholder="nama jkecel (wajib diisi)" type="text" required class="span12"/>-->
                    </div>
                </div>
                <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="hint-field">Keterangan</label>
    	            <div class="controls span7">
        			    <input id="keteranganTB" name="keteranganTB" minlength="3" type="text" required placeholder="keterangan (wajib diisi)"class="row-fluid"/>
	                </div>
                </div>
                
                <div id="hasily"></div>
				<div class="form-actions row-fluid">
				  <div class="span7 offset3">
                    <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
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
            <h4> <span>Data Master - Jenis Kecelakaan </span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="jeniskecel" selected="selected">jenis kecelakaan</option>
					<option value="sub_jeniskecel">sub jenis kecelakaan</option>
					<option value="keterangan">keterangan</option>
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
                        <th class="to_hide_phone ue no_sort">Jenis </th>
                        <th class="to_hide_phone ue no_sort">Sub Jenis </th>
                        <th class="to_hide_phone ue no_sort">Keterangan</th>
                        <th class="ms no_sort ">aksi</th>
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
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> -->
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<!-- Data tables plugin --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Custom made scripts for this template --> 
<script type="text/javascript">
    $(document).ready(function() 
	{	
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "jeniskecel"){
				dataString = 'jeniskecel='+ cari;
			}
			else if (combo == "sub_jeniskecel"){
				dataString = 'sub_jeniskecel='+ cari;
			}
			else if (combo == "keterangan"){
				dataString = 'keterangan='+ cari;
			}
			
			$.ajax({
				url	: "pmaster.php?aksi=tampil&menu=mjkecel",
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
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "jeniskecel"){
				dataString = 'starting='+page+'&jeniskecel='+cari;//+'&random='+Math.random();
			}
			else if (combo == "sub_jeniskecel"){
				dataString = 'starting='+page+'&sub_jeniskecel='+cari;//+'&random='+Math.random();
			}
			else if (combo == "keterangan"){
				dataString = 'starting='+page+'&keterangan='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"pmaster.php?aksi=tampil&menu=mjkecel",
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
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#nama_jeniskecelTB").val('');
			$("#sub_jeniskecelTB").val('');
			$("#keteranganTB").val('');
			$("#simpanBC").html('Simpan');
			$("#cname").focus();
		});
		//end of tambah 
		
		//simpan(tambah & edit)
		$('#validateForm').submit(function() {
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mjkecel";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mjkecel&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) 
				{
					var statusy = data.status;
					var nama_jenisy = data.nama_jeniskecel;
					var sub_jenisy	= data.sub_jeniskecel;
					var keterangany = data.keterangan;
					if(statusy=='sukses')
					{
						if(idformx=='')
						{
							var idy = data.id;
						}
						else
						{
							var idy = idformx;
						}
						$("#idform").val('');
						$('#hasily').hide();
						$("#nama_jeniskecelTB").val('');
						$("#sub_jeniskecelTB").val('');
						$("#keteranganTB").val('');
						$("#form-horizontal cmxform").hide();
						//$("#jkecel_"+idformx).css("background","blue").delay(2000).tampil(datax);
						if(idformx=="")
						{ //add
							loadData();
							$("#jkecel_"+idy).css("background","green");
						} //edit
						else{
							$("#jkecel_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> jkecel : "'+nama_jenisy+'" <br> sub jenis: '+sub_jenisy+'" <br> keterangan : '+keterangany).fadeIn(6000);
							loadData();
						}
					}else{
						alert('gagal menyimpan operasi database');
						}
					
				}
			});
			return false;
		});
		//end of simpan(tambah & edit)
		
		//action klik edit
		$('i.gicon-edit').live("click",function() {	
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//var jenisy= $(this).attr("namaz");
			//var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				url:"pmaster.php?aksi=ambiledit&menu=mjkecel",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy			= data.status;
					var keterangany		= data.keterangan;
					var sub_jeniskecely	= data.sub_jeniskecel;
					var nama_jeniskecely= data.nama_jeniskecel;
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#nama_jeniskecelTB").prop("selected");
						$("#nama_jeniskecelTB").val(nama_jeniskecely);
						$("#sub_jeniskecelTB").val(sub_jeniskecely);
						$("#keteranganTB").val(keterangany);
						$("#simpanBC").html('Update');
					}else{
						alert('terjadi kesalahan pada database');
					}
					//$('#isi').hide().html(data).fadeIn(1000);
					//$("#loadtabel").fadeOut();
				}
			});
			
		});	
		//end of action klik edit
		
		//action detail
		$('i.gicon-eye-open').live("click",function() {	
			var idy = $(this).attr("idz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"pmaster.php",
				data:"aksi=cetak&menu=mjkecel&idx="+idy,//+"&namax="+jenisy+"&keteranganx="+keterangany,
				success:function(data){
					var nama_jeniskecely= data.jeniskecel;
					var sub_jeniskecely	= data.jeniskecel;
					var keterangany	= data.keterangan;
					var bodyy		='';
						bodyy		+='<div align=center><b>Jenis Kecelakaan</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>nama jenis kecelakaan </td><td> : '+ nama_jeniskecely+'</td></tr>';
						bodyy		+='<tr><td>sub jenis kecelakaan </td><td> : '+ sub_jeniskecely+'</td></tr>';
						bodyy		+='<tr><td>Keterangan</td><td>: '+keterangany+'</td></tr></table>';
					//$(this).target="_blank";
					//window.open($(this).prop('href'));
					//return false;//alert('hai'+data);
					var print = $('<div>', {
											id:   'cetakjkecel',
											html: bodyy,
											css:  {
												/*backgroundColor:'#fff',*/
												margin:'50px',
												color:    '#000',
												width:    '100%',
												height:   '200px'
											}
									}),
					opener = $('<div>').append(print);
					window.open('data:text/html;charset=utf-8,' + opener.html());
					//$('#test').bind('click', function() {
						// window.open('data:text/html;charset=utf-8,' + opener.html());
					//})
					//window.open('data:text/html;charset=utf-8,' + html('halo'));
					//alert('halo'+data);//$("#loadtabel").hide();//html("loading...");
					//$("#isi").hide().html(data).fadeIn(1000);
					
				}
			});
		});	
		//end of action detail
		
		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			var jenisy= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=mjkecel",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var keterangany	= data.keterangan;
							var jenisy 		= data.jeniskecel;
								
							$("#jkecel_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('jkecel : "'+jenisy+'", keterangan : '+keterangany+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua jkecel  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "pmaster.php",
						data:"aksi=hapussemua&menu=mjkecel",
						success: function(data){
							if(data.status=='sukses'){
								loadData();}
							else{
								alert('terjadi kesalahan pada proses database');}
						}
				});
		});
		//hapus
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_jkecel&idx=id_jkecelkerja',
				data :'tabelx=tb_jkecel',
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
				data: "tabelx=tb_jkecel",
				//data: "tabelx=tb_jkecel&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data)
				{
				alert(data);
				}
			});
		});
		// Chosen select plugin
        $(".chzn-select").chosen({
          disable_search_threshold: 3
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