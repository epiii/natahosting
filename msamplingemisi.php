<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='msamplingemisi'){
?>	
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_samplingemisi&judulx=Sampling Emisi" target="_blank">Cetak Semua</a>
<button class="btn btn-warning btn-large" id="hapusBC">Kosongkan</button>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_2">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
			  <form class="form-horizontal cmxform" id="samplingemisiFR" method="get" action="pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Tempat</label>
                  <div class="controls span7">
                    <select id="id_tempatsamplingTB" name="id_tempatsamplingTB" required >
                    	
                    </select>
                  </div>
                </div>                
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">gas</label>
                  <div class="controls span7">
                    <select id="id_gasTB" name="id_gasTB" required >
                    	
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Produk</label>
                  <div class="controls span7">
                    <select id="id_produkTB" name="id_produkTB" required >
                    	
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Baku Mutu</label>
                  <div class="controls span7">
                    <input id="baku_mutuTB" name="baku_mutuTB" minlength="3" type="text" required 
                    	placeholder="baku mutu (wajib diisi)"class="row-fluid"/>
                  </div>
                </div>
                
                <div id="hasily" style="visibility:hidden">loading....</div>
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
            <h4> <span>Data Master - Sampling Emisi </span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="nama_tempatsampling" selected="selected">Tempat Sample</option>
					<option value="nama_gas" selected="selected">Gas</option>
					<option value="nama_produk" selected="selected">Nama Produk</option>
					<option value="baku_mutu">Baku Mutu</option>
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
                        <th class="to_hide_phone  no_sort">no</th>
                        <th class="to_hide_phone ue no_sort">Tempat Sampling</th>
                        <th class="to_hide_phone ue no_sort">Gas</th>
                        <th class="to_hide_phone ue no_sort">Produk</th>
                        <th class="to_hide_phone ue no_sort">Baku Mutu</th>
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
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> -->

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
			
			if (combo == "nama_tempatsampling"){
				dataString = 'nama_tempatsampling='+ cari;
			}
			else if (combo == "nama_gas"){
				dataString = 'nama_gas='+ cari;
			}
			else if (combo == "nama_produk"){
				dataString = 'nama_produk='+ cari;
			}
			else if (combo == "baku_mutu"){
				dataString = 'baku_mutu='+ cari;
			}
			
			$.ajax({
				url	: "pmaster.php?aksi=tampil&menu=msamplingemisi",
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
			
			if (combo == "nama_tempatsampling"){
				dataString = 'starting='+page+'&nama_tempatsampling='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_gas"){
				dataString = 'starting='+page+'&nama_gas='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_produk"){
				dataString = 'starting='+page+'&nama_produk='+cari;//+'&random='+Math.random();
			}
			else if (combo == "baku_mutu"){
				dataString = 'starting='+page+'&baku_mutu='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"pmaster.php?aksi=tampil&menu=msamplingemisi",
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
		
		function combotempatsampling(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=msamplingemisi&tabel=tb_tempatsampling',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_tempatsampling+'>'+item.nama_tempatsampling+'</option>';
					});
					$('#id_tempatsamplingTB').html('<option value=>pilih tempat</option>'+optiony);
					/*$(".chzn-select").chosen({
						disable_search_threshold: 10
					});*/
	
				}
			});
		}
		function combogas(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=msamplingemisi&tabel=tb_gas',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_gas+'>'+item.nama_gas+'</option>';
					});
					$('#id_gasTB').html('<option value=>pilih gas</option>'+optiony);
					/*$(".chzn-select").chosen({
						disable_search_threshold: 10
					});*/
	
				}
			});
		}		
		function comboproduk(){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=msamplingemisi&tabel=tb_produk',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_produk+'>'+item.nama_produk+'</option>';
					});
					$('#id_produkTB').html('<option value=>pilih produk</option>'+optiony);
					/*$(".chzn-select").chosen({
						disable_search_threshold: 10
					});*/
	
				}
			});
		}

		
		function kosongkan(){
			$("#id_tempatsamplingTB").val('');
			$("#id_produkTB").val('');
			$("#id_gasTB").val('');
			$("#baku_mutuTB").val('');
			
			//$('#fieldset3').empty();
		}
		
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			combotempatsampling();
			comboproduk();
			combogas();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#idform").val('');
			$("#simpanBC").html('Simpan');
			$("#id_tempatsamplingTB").focus();
			$('#myModal').modal('show');
		});
		//end of tambah 
		
		//simpan(tambah & edit)
		$('#samplingemisiFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			urlx2       = "?aksi=simpan&menu=msamplingemisi";
			if(idformx!='') urlx2 += "&idx="+idformx;

			$('#hasily').show();
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data){
					var statusy 			= data.status;
					var nama_tempatsamplingy= data.nama_tempatsampling;
					var nama_gasy			= data.nama_gas;
					var nama_produky		= data.nama_produk;
					var baku_mutuy			= data.baku_mutu;
					
					if(statusy=='sukses'){
						if(idformx==''){
							$('#hasily').hide();
							$('#myModal').modal('hide');
							var idy = data.id_samplingemisi;
							loadData();
							$("#samplingemisi_"+idy).css("background","green");
						}else{
							$('#hasily').hide();
							var idy = idformx;
							$("#samplingemisi_"+idy).css("background","blue");
							var x ='';
								x+='update <br> tempat sampling : '+nama_tempatsamplingy+' <br> gas: '+nama_gasy;
								x+='<br> nama_produk: "'+nama_produky+'" <br> baku_mutu: '+baku_mutuy;
							$("#loadtabel").html(x).fadeIn(6000);
							loadData();
						
						}
						$("#myModal").modal('hide');
						$("#idform").val('');
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
			kosongkan();
			combotempatsampling();
			comboproduk();
			combogas();
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			
			$.ajax({
				url:"pmaster.php?aksi=ambiledit&menu=msamplingemisis",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy	= data.status;
					var id_gasy	= data.id_gas;
					var id_produky= data.id_produk;
					var baku_mutuy= data.baku_mutu;
					var id_tempatsamplingy= data.id_tempatsampling;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_tempatsamplingTB").val(id_tempatsamplingy);
						$("#id_produkTB").val(id_produky);
						$("#id_gasTB").val(id_gasy);
						$("#baku_mutuTB").val(baku_mutuy);
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
			var namay= $(this).attr("namaz");
			var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"pmaster.php",
				data:"aksi=cetak&menu=msamplingemisi&idx="+idy,//+"&namax="+namay+"&keteranganx="+keterangany,
				success:function(data){
					var tempatsamplingy 		= data.nama_tempatsampling;
					var keterangany	= data.keterangan;
					var bodyy		='';
						bodyy		+='<div align=center><b>Sampling Emisi</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>tempatsampling</td><td> :'+ tempatsamplingy+'</td></tr>';
						bodyy		+='<tr><td>Keterangan</td><td>: '+keterangany+'</td></tr></table>';
					//$(this).target="_blank";
					//window.open($(this).prop('href'));
					//return false;//alert('hai'+data);
					var print = $('<div>', {
											id:   'cetaktempatsampling',
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
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=msamplingemisi",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var keterangany	= data.keterangan;
							var namay 		= data.nama_tempatsampling;
								
							$("#tempatsampling_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('tempatsampling : "'+namay+'", keterangan : '+keterangany+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua tempatsampling  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "pmaster.php",
						data:"aksi=hapussemua&menu=msamplingemisi",
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
				//data :'tabelx=tb_samplingemisi&idx=id_tempatsamplingkerja',
				data :'tabelx=tb_samplingemisi',
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
				data: "tabelx=tb_samplingemisi",
				//data: "tabelx=tb_samplingemisi&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data)
				{
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