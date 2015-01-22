<?php 
// session_start(); 
// $x = mysql_fetch_assoc(mysql_query("select id_level from tb_users where user nama_lengkap = $_SESSION[namalengkap]"));
//echo $lev=$_SESSION['leveluser'];
?>
<div id="sidebar" class="">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
        <h2>PT. Petrokimia Gresik</h2>
        <u align="center">Staff LK3</u>
<!--         <form class="form-search">
  <div class="input-append">
    <input type="text" class=" search-query" placeholder="">
    <button class="btn_search color_4">Search</button>
  </div>
</form> -->
    </div>
 
	<ul id="sidebar_menu" class="navbar nav nav-list container full">
          <!--via ajax-->
          <!--
        <li class="accordion-group  color_18"> 
        	<a class="menu"  href="#home">
            	<img src="img/menu_icons/dashboard.png">
                <span>Home</span>
			</a> 
		</li>
        
        <li class="accordion-group  color_20"> 
        	<a class="menu"  href="#profil">
            	<img src="img/menu_icons/calendar.png">
                <span>Profil</span>
			</a> 
		</li>
        
        <li class="accordion-group color_7"> 
        	<a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> 
        		<img src="img/menu_icons/forms.png">
        		<span>Data Master</span>
			</a>
			<ul id="collapse1" class="accordion-body collapse">
        
                <li><a class="menu" href="#mpekerja">Pekerja</a></li>
                <li><a class="menu"href="#mbagian">Bagian</a></li>
                <li><a class="menu"href="#mjabatan">Jabatan</a></li>
                <li><a class="menu"href="#mdepartment">Department</a></li>
                <li><a class="menu"href="#mshift">Shift Kerja</a></li>
                <li><a class="menu"href="#mstatuskerja">Status Kerja</a></li>
                
                <li><a class="menu"href="#mjkecel">Jenis Kecelakaan</a></li>
                <li><a class="menu"href="#mjcidera">Jenis Cidera</a></li>
                <li><a class="menu"href="#mbagtubuh">Bagian Tubuh</a></li>
                <li><a class="menu"href="#mnilairesiko">Nilai Resiko</a></li>
                
                <li><a class="menu"href="#mkatinvestigasi">Kategori Investigasi</a></li>
                <li><a class="menu"href="#mjlampiran">Jenis Lampiran</a></li>
                <li><a class="menu"href="#mtipedampak">Tipe Dampak(linkungan)</a></li>
                
                <li><a class="menu"href="#mgas">Jenis Gas</a></li>
                <li><a class="menu"href="#mtempatsampling">Sample Tempat</a></li>
                
                <li><a class="menu"href="#msafetyp">aspek Safety Performance</a></li>
            </ul>
        </li>
        
        <li class="accordion-group color_14"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> 
            	<img src="img/menu_icons/others.png">
                <span>Transaksi</span>
			</a>
            <ul id="collapse2" class="accordion-body collapse">
	            <li><a class="menu" href="#tkecelakaan">Kecelakaan</a></li>
    		    <li><a class="menu" href="#temisi">Emisi Gas</a></li>
    		    <li><a class="menu" href="#tsafetyp">Safety Performance</a></li>
        	</ul>
        </li>
        
        <li class="accordion-group color_2"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> 
            	<img src="img/menu_icons/statistics.png">
                <span>Report/Laporan</span>
			</a>
            <ul id="collapse3" class="accordion-body collapse">
	            <li><a class="menu" href="#lkecelakaan">Lap Kecelakaan</a></li>
    		    <li><a class="menu" href="#lemisi">Lap Emisi Gas</a></li>
    		    <li><a class="menu" href="#lsafetyp">Lap Safety Performance</a></li>
        	</ul>
        </li>
        
        <li class="accordion-group color_8"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse4"> 
            	<img src="img/menu_icons/widgets.png">
                <span>Setting</span>
			</a>
            <ul id="collapse4" class="accordion-body collapse">
                <li><a class="menu" href="#slevel">Level</a></li>
    		    <li><a class="menu" href="#shakakses">Hak Akses</a></li>
    		    <li><a class="menu" href="#suser">User</a></li>
    		</ul> 
        </li>
        
         <li class="accordion-group  color_23"> 
        	<a class="menu"  href="logout.php">
            	<img src="img/menu_icons/calendar.png">
                <span>Logout</span>
			</a> 
		</li>-->
        
 		<!--=============================== via php request ====================================-->       
       <?php 
	   		/*$sql = "select * 
					from 
						tb_user u, 
						tb_hakakses ha, 
						tb_menu mn,
						tb_level lv
					where 
						u.username = $_SESSION[username] and
						u.id_level = lv.id_level and
						ha.id_menu = mn.id_menu";
						#var_dump($sql);exit();*/
	   ?>
        <li class="accordion-group  color_18"> 
        	<a class="menu"  href="?hlm=<?php echo enkrip('home');?>">
            	<img src="img/menu_icons/dashboard.png">
                <span>Home</span>
			</a> 
		</li>
        
        <li class="accordion-group  color_20"> 
        	<a class="menu"  href="?hlm=<?php echo enkrip('profil');?>">
            	<img src="img/menu_icons/calendar.png">
                <span>Profil</span>
			</a> 
		</li> <?php
			function enkrip($hlm){
            	$acak = base64_encode($hlm);
				return $acak;
			}
			function dekrip($hlm){
            	$acak = base64_decode($hlm);
				return $acak;
			}?>
        <?php
		if (($_SESSION['leveluser']=='admin') && (!empty($_SESSION['leveluser']))){
		?>
        <li class="accordion-group color_7"> 
        	<a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> 
        		<img src="img/menu_icons/forms.png">
        		<span>Data Master</span>
			</a>
           
            <ul id="collapse1" class="accordion-body collapse">
                <!--<li><a class="menu" href="?hlm=mpekerja&acak=<?php //echo enkrip('mpekerja');?>">Pekerja</a></li>-->
                <li><a class="menu"href="?hlm=<?php echo enkrip('mpekerja');?>">Pekerja</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mbagian')?>">Bagian</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mjabatan')?>">Jabatan</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mdepartment')?>">Department</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mshift')?>">Shift Kerja</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mstatuskerja')?>">Status Kerja</a></li>
                
                <!--<li><a class="menu"href="?hlm=<?php #echo enkrip('mjkecel')?>">Jenis Kecelakaan</a></li>-->
                <li><a class="menu"href="?hlm=<?php echo enkrip('mjcidera')?>">Jenis Cidera</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mbagtubuh')?>">Bagian Tubuh</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mnilairesiko')?>">Nilai Resiko</a></li>
                
                <li><a class="menu"href="?hlm=<?php echo enkrip('mkatinvestigasi')?>">Kategori Investigasi</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mjlampiran')?>">Jenis Lampiran</a></li>
                <!--<li><a class="menu"href="?hlm=<?php //echo enkrip('mtipedampak')?>">Tipe Dampak(linkungan)</a></li>-->
                
                <li><a class="menu"href="?hlm=<?php echo enkrip('mproduk')?>">Jenis Produk</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mgas')?>">Jenis Gas</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mtempatsampling')?>">Sample Tempat</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('msamplingemisi')?>">Sampling Emisi</a></li>
                
                <!--<li><a class="menu"href="?hlm=<?php //echo enkrip('msafetyp')?>">aspek Safety Performance</a></li>-->
            </ul>
        </li>
		<?php  } ?>
        
        <li class="accordion-group color_14"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> 
            	<img src="img/menu_icons/others.png">
                <span>Transaksi</span>
			</a>
            <ul id="collapse2" class="accordion-body collapse">
	            <li><a class="menu" href="?hlm=<?php echo enkrip('tkecelakaan')?>">Kecelakaan Awal</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('tkecelakaanakhir')?>">Kecelakaan Final</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('temisi')?>">Emisi Gas</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('tsafetyp')?>">Safety Performance</a></li>
        	</ul>
        </li>
        
        <li class="accordion-group color_2"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> 
            	<img src="img/menu_icons/statistics.png">
                <span>Report/Laporan</span>
			</a>
            <ul id="collapse3" class="accordion-body collapse">
	            <li><a class="menu" href="?hlm=<?php echo enkrip('lkecelakaan')?>">Lap Kecelakaan</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('lemisi')?>">Lap Emisi Gas</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('lsafetyp')?>">Lap Safety Performance</a></li>
        	</ul>
        </li>
        <?php
		if (($_SESSION['leveluser']=='admin') && (!empty($_SESSION['leveluser']))){
		?>
        
        <li class="accordion-group color_8"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse4"> 
            	<img src="img/menu_icons/widgets.png">
                <span>Setting</span>
			</a>
            <ul id="collapse4" class="accordion-body collapse">
                <!--<li><a class="menu" href="?hlm=<?php #echo enkrip('smenu')?>">Menu</a></li>
    		    <li><a class="menu" href="?hlm=<?php #echo enkrip('slevel')?>">Level</a></li>
    		    <li><a class="menu" href="?hlm=<?php #echo enkrip('shakakses')?>">Hak Akses</a></li>-->
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('suser')?>">User</a></li>
    		</ul> 
        </li>
        <?php } ?>
         <li class="accordion-group  color_23"> 
        	<a class="menu"  href="logout.php">
            	<img src="img/menu_icons/calendar.png">
                <span>Logout</span>
			</a> 
		</li>
        
 		<!--=============================== end of via php request ====================================-->       
        
      </ul>
      
      <div class="menu_states row-fluid container ">
        <h2 class="pull-left">Menu Settings</h2>
        <div class="options pull-right">
          <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="Icon Menu">1</button>
          <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="Fixed Menu">2</button>
          <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="Floating on Hover Menu">3</button>
        </div>
      </div>
      <!-- End sidebar_box --> 
      
    </div>
  </div>
</div>