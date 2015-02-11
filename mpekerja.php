<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mpekerja'){
?>	
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" onclick="cetakSemua();" class="btn btn-info btn-large">Cetak Semua</a>
<button class="btn btn-warning btn-large" id="hapusBC">Kosongkan</button>
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
                        <!-- <th class="jv no_sort"><label class="checkbox "><input type="checkbox"></label></th> -->
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
<script src="js/jquery.js" type="text/javascript"> </script> 
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<script type="text/javascript">
  $(document).ready(function(){	
    // first action 
    loadData();

    // searching action
      // kategori
      $("#kategoriTB").change(function(){
        var cari = $("input#objekTB").val();
        var combo = $("select#kategoriTB").val();
        if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
          loadData();
        }else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
          $("input#objekTB").focus();
          loadData();
        }else{
          loadData();
        }return false;
      });

      //objekTB
      $("#objekTB").keyup(function(){
        var cari = $("input#objekTB").val();
        var combo = $("select#kategoriTB").val();
        if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
          loadData();
        }else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
          $("input#objekTB").focus();
          loadData();
        }else{
          loadData();
        }return false; 
      });

    //simpan(tambah & edit)
    $('#pekerjaFR').on('submit',function() {
        simpan();
    });
    //end of simpan(tambah & edit)
    
    //klik tambah 
    $("#tambahBC").on('click',function(){
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
  });

  //hapus semua
  function hapusSemua(){
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
  }

  function hapus(idy){  
    var namay= $(this).attr("namaz");
    if(confirm("lanjutkan menghapus '"+namay+"' ?"))
      $.ajax({
          type: "GET",
          dataType:"json",
          url: "pmaster.php?aksi=hapus&menu=mpekerja",
          data:"idx=" + idy,
          cache: false,
          success: function(data){
            if(data.status=='gagal'){
              alert('gagal hapus');
            }else{
              $("#mpekerja_"+idy).attr('style','background-color:red;').fadeOut(2000);
              setTimeout(function(){
                loadData();
                $("#loadtabel").html('mpekerja : "'+idy+'" terhapus').fadeIn(6000);
              },1000);
            }
          }
      });

  }

  function simpan(){
      var idformx = $("#idform").val();
      var urlx    = $(this).attr('action');
      urlx2       = "?aksi=simpan&menu=mpekerja";
      if(idformx!='') urlx2 += "&idx="+idformx;

      $('#hasily').html("loading ....");
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: urlx + urlx2,
        data: $(this).serialize(),
        success: function(data){
          var statusy = data.status;
          var nama_pekerjay = data.nama_pekerja;
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
  }

	function combojabatan(id_j){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType :'json',
			data:'aksi=combo&menu=mpekerjas&tabel=tb_jabatan',
			success:function(data){
				var optiony = '';
				$.each(data, function(id,item){
          if(item.id_jabatan==id_j)
            optiony+='<option selected="selected" value='+item.id_jabatan+'>'+item.nama_jabatan+'</option>';
          else
            optiony+='<option value='+item.id_jabatan+'>'+item.nama_jabatan+'</option>';
				});$('#id_jabatanTB').html('<option value=>Pilih jabatan</option>'+optiony);
			}
    });
	}

	function combobagian(id_b){
    $.ajax({
			url:'pmaster.php',
			type:'get',
			dataType :'json',
			data:'aksi=combo&menu=mpekerjas&tabel=tb_bagian',
			success:function(data){
				var optiony = '';
				$.each(data, function(id,item){
          if(item.id_bagian==id_b)
            optiony+='<option selected="selected" value='+item.id_bagian+'>'+item.nama_bagian+'</option>';
          else
          	optiony+='<option value='+item.id_bagian+'>'+item.nama_bagian+'</option>';
				});$('#id_bagianTB').html('<option value="">Pilih bagian</option>'+optiony)
      }
    });
  }

  function combodepartment(id_d){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType :'json',
			data:'aksi=combo&menu=mpekerjas&tabel=tb_department',
			success:function(data){
				var optiony = '';
				$.each(data, function(id,item){
            if(item.id_department==id_d)
              optiony+='<option selected="selected" value='+item.id_department+'>'+item.nama_department+'</option>';
            else
    					optiony+='<option value='+item.id_department+'>'+item.nama_department+'</option>';
				});
				$('#id_departmentTB').html('<option value="">Pilih department</option>'+optiony);
      }
    });
  }
		
	function combostatuskerja(id_s){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType :'json',
			data:'aksi=combo&menu=mpekerjas&tabel=tb_statuskerja',
			success:function(data){
				var optiony = '';
				$.each(data, function(id,item){
          if(item.id_statuskerja==id_s)
            optiony+='<option selected="selected" value='+item.id_statuskerja+'>'+item.nama_statuskerja+'</option>';
          else
            optiony+='<option value='+item.id_statuskerja+'>'+item.nama_statuskerja+'</option>';
				});
				$('#id_statuskerjaTB').html('<option value=>Pilih Status Kerja</option>'+optiony);
	    }
    });
  }

	function comboshiftkerja(id_s){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType :'json',
			data:'aksi=combo&menu=mpekerjas&tabel=tb_shiftkerja',
			success:function(data){
				var optiony = '';
				$.each(data, function(id,item){
          if(item.id_shiftkerja==id_s)
            optiony+='<option selected="selected" value='+item.id_shiftkerja+'>'+item.nama_shiftkerja+'</option>';
          else
            optiony+='<option value='+item.id_shiftkerja+'>'+item.nama_shiftkerja+'</option>';
				});
				$('#id_shiftkerjaTB').html('<option value=>Pilih Shift Kerja</option>'+optiony);
  		}
    });
  }
		
	function loadData(){
		$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
		var kategori   = $("#kategoriTB").val();
		var cari       = $("#objekTB").val();
		var dataString = 'kategori='+kategori+'&cari='+cari;			
		
		$.ajax({
			url	: "pmaster.php?aksi=tampil&menu=mpekerja",
			type: "GET",	
			data: dataString,
			success:function(data){
				$("#loadtabel").fadeOut(1000);
				$('#isi').hide().html(data).fadeIn(1000);
			}
		});
	}
		
	function pagination(page){
		$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
		var kategori   = $("#kategoriTB").val();
		var cari       = $("#objekTB").val();
		dataString = 'starting='+page+'&kategori='+kategori+'&cari='+cari;

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

  function cetakSemua(){
    var par1  = $('#kategoriTB').val();
    var par2  = $('#objekTB').val();
    var tok   = <?php echo '\''.$_SESSION['namauser'].$_SESSION['passuser'].'\'';?>;
    var token = encode64(par1+par2+tok);
    window.open('report/r_mpekerja.php?token='+token+'&kategori='+par1+'&cari='+par2,'_blank');
  }

  function edit(idy){
    $("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
    $.ajax({
      url:"pmaster.php?aksi=ambiledit&menu=mpekerja",
      data: "idx="+idy,
      dataType:'json',
      type:"GET",
      success:function(dt){
        var statusy     = dt.status;
        var keterangany = dt.keterangan;
        var namay       = dt.nama_bagian;
        if(statusy=='sukses'){
          $("#idform").val(idy);
          $("#NIKTB").val(dt.NIK);
          $("#nama_pekerjaTB").val(dt.nama_pekerja);
          $("#jkelaminTB").val(dt.jkelamin);
          $("#tgllahirTB").val(dt.tgllahir);
          $("#alamatTB").val(dt.alamat);
          $("#kotaTB").val(dt.kota);
          $("#tgl_masukTB").val(dt.tgl_masuk);
          $("#tgl_keluarTB").val(dt.tgl_keluar);
          
          combobagian(dt.id_bagian);
          combojabatan(dt.id_jabatan);
          combodepartment(dt.id_department);
          combostatuskerja(dt.id_statuskerja);
          comboshiftkerja(dt.id_shiftkerja);
          $("#simpanBC").html('Update');
          $('#myModal').modal('show');
        }else{
          alert('terjadi kesalahan pada database');
        }
      }
    });
  } 


</script>
<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>