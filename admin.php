<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='admin'){
?>	
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_4">
          
            <div class="title">
              <h4> <span>Data Pengguna</span> </h4>
            </div>
            
			<?php
				include "lib/koneks.php";
				$adminR = mysql_fetch_array(mysql_query("select * from tb_users where username = '$_SESSION[namauser]'"));
			?>
            <div class="content">
              <form class="form-horizontal cmxform" id="validateForm" method="get" action="" autocomplete="off">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Nama<span class="help-block">tidak boleh kosong</span> </label>
                  <div class="controls span7">
                    <input id="cname" name="cname" value="<?php echo $adminR['nama_lengkap'];?>" type="text" Required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Username<span class="help-block">Required min 3 characters</span> </label>
                  <div class="controls span7">
                    <input value="<?php echo $_SESSION[namauser]?>"  id="cname2" name="cname2" minlength="3" type="text" Readonly class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Email <span class="help-block">Enter a valid email address</span> </label>
                  <div class="controls span7">
                    <input value="<?php echo $adminR['email_admin']?>"  id="cemail" type="email" name="email" required class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Password</label>
                  <div class="controls span7 ">
                    <div class="input-prepend row-fluid"> <span class="add-on"><i class="icon-lock"></i></span>
                      <input class="row-fluid" type="password" id="password" name="password" placeholder="min 5 characters">
                    </div>
                  </div>
                </div>
                <div class="control-group row-fluid">
                  <label class="control-label span3">Confirm Password</label>
                  <div class="controls span7">
                    <div class="input-prepend row-fluid"> <span class="add-on"><i class="icon-lock"></i></span>
                      <input class="row-fluid" type="password" id="confirm_password" placeholder="confirm password" name="confirm_password">
                    </div>
                  </div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary">Cancel</button>
                  </div>
                </div>
              </form>
              
            </div>
             
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span8 -->
       
        <!-- End .span4 --> 
      </div>
      <!-- End .row-fluid --> 
</script>-->
<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>